<?php
namespace App\Controllers;

use App\Models\BukuModel;
use App\Models\PeminjamanModel;
use App\Models\MahasiswaModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $bukuModel = new BukuModel();
        $peminjamanModel = new PeminjamanModel();
        $mahasiswaModel = new MahasiswaModel();

        $session = session();
        $userId = $session->get('id_user');
        $userRole = $session->get('role'); // cek role

        // peminjaman aktif
        $peminjamanModel->select('peminjaman.*, user.username, buku.judul_buku')
            ->join('user', 'user.id_user = peminjaman.id_user')
            ->join('buku', 'buku.id_buku = peminjaman.id_buku')
            ->where('peminjaman.status', 'dipinjam')
            ->orderBy('peminjaman.tgl_pinjam', 'DESC');

        if ($userRole != 'admin') {
            $peminjamanModel->where('peminjaman.id_user', $userId);
        }

        $activePeminjaman = $peminjamanModel->findAll();

        $data = [
            'judul' => 'Dashboard',
            'total_buku' => $bukuModel->countAllResults(false),
            'total_mahasiswa' => $userRole === 'admin' ? $mahasiswaModel->countAllResults(false) : null,
            'total_peminjaman' => count($activePeminjaman),
            'active_peminjaman' => $activePeminjaman,
            'user_role' => $userRole
        ];

        echo view('layout/header', $data);
        echo view('pages/dashboard', $data);
        echo view('layout/footer');
    }
}
