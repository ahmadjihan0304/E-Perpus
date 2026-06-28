<?php
namespace App\Controllers;

use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{
    protected $mModel;

    public function __construct()
    {
        $this->mModel = new MahasiswaModel();
    }

    public function index()
    {
        $data = [
            'judul' => 'Data Mahasiswa',
            'mahasiswa' => $this->mModel->orderBy('id_mahasiswa', 'DESC')->findAll()
        ];

        echo view('layout/header', $data);
        echo view('pages/mahasiswa_index', $data);
        echo view('layout/footer');
    }

    public function store()
    {
        $data = [
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'jurusan' => $this->request->getPost('jurusan'),
            'angkatan' => $this->request->getPost('angkatan'),
            'no_hp' => $this->request->getPost('no_hp'),
            'alamat' => $this->request->getPost('alamat'),
        ];

        if (empty($data['nim']) || empty($data['nama'])) {
            session()->setFlashdata('error', 'NIM dan Nama wajib diisi!');
            return redirect()->to('/mahasiswa');
        }

        $this->mModel->insert($data);
        session()->setFlashdata('success', 'Data mahasiswa berhasil disimpan!');
        return redirect()->to('/mahasiswa');
    }

    public function update($id)
    {
        $data = [
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'jurusan' => $this->request->getPost('jurusan'),
            'angkatan' => $this->request->getPost('angkatan'),
        ];

        if (empty($data['nim']) || empty($data['nama'])) {
            session()->setFlashdata('error', 'NIM dan Nama wajib diisi!');
            return redirect()->to('/mahasiswa');
        }

        $this->mModel->update($id, $data);
        session()->setFlashdata('success', 'Data mahasiswa berhasil diperbarui!');
        return redirect()->to('/mahasiswa');
    }

    public function delete($id)
    {
        if (!$this->mModel->find($id)) {
            session()->setFlashdata('error', 'Data mahasiswa tidak ditemukan!');
            return redirect()->to('/mahasiswa');
        }

        $this->mModel->delete($id);
        session()->setFlashdata('success', 'Data mahasiswa berhasil dihapus!');
        return redirect()->to('/mahasiswa');
    }
}
