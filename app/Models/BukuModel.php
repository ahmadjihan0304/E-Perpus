<?php
namespace App\Models;
use CodeIgniter\Model;

class BukuModel extends Model {
    protected $table = 'buku';
    protected $primaryKey = 'id_buku';
    protected $allowedFields = [
        'judul_buku', 'id_kategori', 'pengarang', 'penerbit',
        'tahun_terbit', 'stok', 'lokasi_rak'
    ];
    protected $useTimestamps = false;

    // Relasi join kategori
    public function getBukuWithKategori() {
        return $this->select('buku.*, kategori.nama_kategori')
                    ->join('kategori', 'kategori.id_kategori = buku.id_kategori', 'left')
                    ->findAll();
    }
}
