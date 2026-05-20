<?php
namespace App\Controllers;

use App\Models\BukuModel;
use App\Models\KategoriModel;

class Buku extends BaseController
{
    protected $bukuModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->bukuModel = new BukuModel();
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');

        $bukuQuery = $this->bukuModel
            ->select('buku.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id_kategori = buku.id_kategori', 'left');

        if ($keyword) {
            $bukuQuery->groupStart()
                ->like('judul_buku', $keyword)
                ->orLike('nama_kategori', $keyword)
                ->orLike('pengarang', $keyword)
                ->orLike('penerbit', $keyword)
                ->orLike('lokasi_rak', $keyword)
                ->groupEnd();
        }

        $data = [
            'judul' => 'Data Buku',
            'buku'  => $bukuQuery->findAll(),
            'keyword' => $keyword
        ];

        echo view('layout/header', $data);
        echo view('pages/buku_index', $data);
        echo view('layout/footer');
    }

    public function create()
    {
        $data = [
            'judul' => 'Tambah Buku',
            'kategori' => $this->kategoriModel->findAll(),
            'buku' => null
        ];
        echo view('layout/header', $data);
        echo view('pages/buku_form', $data);
        echo view('layout/footer');
    }

    public function store()
    {
        $postData = $this->request->getPost();
        if (empty($postData['lokasi_rak'])) {
            $postData['lokasi_rak'] = '-';
        }

        $this->bukuModel->save($postData);
        session()->setFlashdata('success', 'Data buku berhasil disimpan!');
        return redirect()->to('/buku');
    }

    public function edit($id)
    {
        $data = [
            'judul' => 'Edit Buku',
            'buku' => $this->bukuModel->find($id),
            'kategori' => $this->kategoriModel->findAll()
        ];
        echo view('layout/header', $data);
        echo view('pages/buku_form', $data);
        echo view('layout/footer');
    }

    public function update($id)
    {
        $postData = $this->request->getPost();
        if (empty($postData['lokasi_rak'])) {
            $postData['lokasi_rak'] = '-';
        }

        $this->bukuModel->update($id, $postData);
        session()->setFlashdata('success', 'Data buku berhasil diupdate!');
        return redirect()->to('/buku');
    }

    public function delete($id)
    {
        $this->bukuModel->delete($id);
        session()->setFlashdata('success', 'Data buku berhasil dihapus!');
        return redirect()->to('/buku');
    }
}
