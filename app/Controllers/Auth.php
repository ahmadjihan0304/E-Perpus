<?php
namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/dashboard');
        }

        return view('layout/header')
             . view('pages/login')
             . view('layout/footer');
    }

    public function login()
    {
        $post = $this->request->getPost();
        $user = $this->userModel->where('username', $post['username'])->first();

        if ($user && password_verify($post['password'], $user['password'])) {
            session()->set([
                'isLoggedIn' => true,
                'id_user'    => $user['id_user'],
                'username'   => $user['username'],
                'role'       => $user['role']
            ]);
            return redirect()->to('/dashboard');
        } else {
            session()->setFlashdata('error', 'Username atau password salah!');
            return redirect()->back();
        }
    }
public function register()
{
    if (session()->get('isLoggedIn')) {
        return redirect()->to('/dashboard');
    }
    echo view('layout/header', ['judul'=>'Register']);
    echo view('pages/register');
    echo view('layout/footer');
}

public function registerProcess()
{
    $post = $this->request->getPost();

    // validasi
    if (empty($post['username']) || empty($post['password']) || empty($post['nim']) || empty($post['nama'])) {
        session()->setFlashdata('error','Lengkapi semua field');
        return redirect()->back()->withInput();
    }

    // cek username / nim unik
    $existing = $this->userModel->where('username', $post['username'])->first();
    if ($existing) {
        session()->setFlashdata('error','Username sudah dipakai');
        return redirect()->back()->withInput();
    }

    // 1) simpan user
    $userData = [
        'username' => $post['username'],
        'password' => password_hash($post['password'], PASSWORD_DEFAULT),
        'role'     => 'mahasiswa'
    ];
    $this->userModel->insert($userData);
    $idUser = $this->userModel->getInsertID();

    // 2) simpan mahasiswa
    $mahasiswaModel = new \App\Models\MahasiswaModel();
    $mData = [
        'nim' => $post['nim'],
        'nama' => $post['nama'],
        'jurusan' => $post['jurusan'] ?? null,
        'angkatan' => $post['angkatan'] ?? null,
        'no_hp' => $post['no_hp'] ?? null,
        'alamat' => $post['alamat'] ?? null,
        'id_user' => $idUser
    ];
    $mahasiswaModel->insert($mData);

    session()->setFlashdata('success','Registrasi berhasil. Silakan login.');
    return redirect()->to('/login');
}

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
