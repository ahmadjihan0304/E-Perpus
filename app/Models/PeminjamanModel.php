<?php
namespace App\Models;
use CodeIgniter\Model;

class PeminjamanModel extends Model {
    protected $table = 'peminjaman';
    protected $primaryKey = 'id_peminjaman';
    protected $allowedFields = [
        'id_user', 'id_buku', 'tgl_pinjam', 'tgl_kembali',
        'tgl_dikembalikan', 'status'
    ];
    protected $useTimestamps = false;

    // Relasi ke user dan buku untuk laporan
    public function getLaporan() {
        return $this->select('peminjaman.*, user.username, buku.judul_buku')
                    ->join('user', 'user.id_user = peminjaman.id_user')
                    ->join('buku', 'buku.id_buku = peminjaman.id_buku')
                    ->orderBy('peminjaman.tgl_pinjam', 'DESC')
                    ->findAll();
    }

    public function getByUser($id_user) {
        return $this->select('peminjaman.*, buku.judul_buku')
                    ->join('buku', 'buku.id_buku = peminjaman.id_buku')
                    ->where('peminjaman.id_user', $id_user)
                    ->findAll();
    }
}
