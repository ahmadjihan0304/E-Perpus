<?php
namespace App\Controllers;

use App\Models\KategoriModel;

class Kategori extends BaseController
{
    protected $kategoriModel;

    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $data = [
            'judul' => 'Data Kategori',
            'kategori' => $this->kategoriModel->findAll()
        ];
        echo view('layout/header', $data);
        echo view('pages/kategori_index', $data);
        echo view('layout/footer');
    }

    public function create()
    {
        $this->kategoriModel->save($this->request->getPost());
        session()->setFlashdata('success', 'Kategori berhasil ditambahkan!');
        return redirect()->to('/kategori');
    }

    public function edit($id)
    {
        $this->kategoriModel->update($id, $this->request->getPost());
        session()->setFlashdata('success', 'Kategori berhasil diupdate!');
        return redirect()->to('/kategori');
    }

    public function delete($id)
    {
        $this->kategoriModel->delete($id);
        session()->setFlashdata('success', 'Kategori berhasil dihapus!');
        return redirect()->to('/kategori');
    }
}
