<?php
namespace App\Controllers;

use App\Models\PeminjamanModel;
use App\Models\BukuModel;

class Peminjaman extends BaseController
{
    protected $pModel;
    protected $bModel;

    public function __construct()
    {
        $this->pModel = new PeminjamanModel();
        $this->bModel = new BukuModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');

        $builder = $this->pModel
            ->select('peminjaman.*, user.username, buku.judul_buku, buku.stok')
            ->join('user', 'user.id_user = peminjaman.id_user')
            ->join('buku', 'buku.id_buku = peminjaman.id_buku')
            ->orderBy('peminjaman.tgl_pinjam', 'DESC');

        // Filter data sesuai role
        if (session()->get('role') !== 'admin') {
            $builder->where('peminjaman.id_user', session()->get('id_user'));
        }

        // Filter keyword jika ada
        if ($keyword) {
            $builder->groupStart()
                    ->like('buku.judul_buku', $keyword)
                    ->orLike('user.username', $keyword)
                    ->groupEnd();
        }

        $data = [
            'judul' => 'Data Peminjaman',
            'peminjaman' => $builder->findAll(),
            'keyword' => $keyword
        ];

        echo view('layout/header', $data);
        echo view('pages/peminjaman_index', $data);
        echo view('layout/footer');
    }

    public function create()
    {
        if (session()->get('role') !== 'mahasiswa') {
            return redirect()->to('/dashboard')->with('error', 'Hanya mahasiswa yang bisa meminjam buku!');
        }

        // Ambil kategori dari GET jika ada
        $kategori_id = $this->request->getGet('kategori_id');

        // Query buku dengan stok > 0
        $bukuQuery = $this->bModel->where('stok >', 0);

        // Filter berdasarkan kategori jika dipilih
        if ($kategori_id) {
            $bukuQuery->where('id_kategori', $kategori_id);
        }

        $data = [
            'judul' => 'Form Peminjaman Buku',
            'buku' => $bukuQuery->findAll(),
            'kategori' => (new \App\Models\KategoriModel())->findAll(),
            'kategori_id' => $kategori_id
        ];

        echo view('layout/header', $data);
        echo view('pages/peminjaman_form', $data);
        echo view('layout/footer');
    }

    public function store()
    {
        if (session()->get('role') !== 'mahasiswa') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak!');
        }

        $idBuku = $this->request->getPost('id_buku');
        if (!$idBuku) {
            return redirect()->back()->with('error', 'Silakan pilih buku terlebih dahulu.');
        }

        $buku = $this->bModel->find($idBuku);
        if (!$buku) {
            return redirect()->back()->with('error', 'Buku tidak ditemukan.');
        }

        if ((int)$buku['stok'] <= 0) {
            return redirect()->back()->with('error', 'Stok buku habis.');
        }

        // Simpan data peminjaman
        $this->pModel->insert([
            'id_user' => session()->get('id_user'),
            'id_buku' => $idBuku,
            'tgl_pinjam' => date('Y-m-d'),
            'status' => 'dipinjam'
        ]);

        // Kurangi stok buku
        $newStok = (int)$buku['stok'] - 1;
        $this->bModel->update($idBuku, ['stok' => $newStok]);

        session()->setFlashdata('success', 'Buku berhasil dipinjam! Sisa stok: ' . $newStok);
        return redirect()->to('/peminjaman');
    }

    public function returnBook($id)
    {
        $peminjaman = $this->pModel->find($id);
        if (!$peminjaman) {
            return redirect()->back()->with('error', 'Data peminjaman tidak ditemukan.');
        }

        $buku = $this->bModel->find($peminjaman['id_buku']);
        if (!$buku) {
            return redirect()->back()->with('error', 'Data buku tidak ditemukan.');
        }

        // Hak akses
        if (session()->get('role') === 'mahasiswa') {
            if ($peminjaman['id_user'] != session()->get('id_user')) {
                return redirect()->to('/peminjaman')
                    ->with('error', 'Kamu tidak boleh mengembalikan pinjaman orang lain!');
            }
        } elseif (session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak!');
        }

        // Proses pengembalian
        $this->pModel->update($id, [
            'status' => 'dikembalikan',
            'tgl_dikembalikan' => date('Y-m-d')
        ]);

        // Tambah stok buku
        $newStok = (int)$buku['stok'] + 1;
        $this->bModel->update($buku['id_buku'], ['stok' => $newStok]);

        session()->setFlashdata('success', 'Buku berhasil dikembalikan! Stok sekarang: ' . $newStok);
        return redirect()->to('/peminjaman');
    }
}
