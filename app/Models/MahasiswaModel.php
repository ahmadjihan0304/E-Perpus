<?php
namespace App\Models;
use CodeIgniter\Model;

class MahasiswaModel extends Model {
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id_mahasiswa';
    protected $allowedFields = [
        'nim', 'nama', 'jurusan', 'angkatan', 'no_hp', 'alamat', 'id_user'
    ];
    protected $useTimestamps = false;

    // Relasi ke user (opsional, digunakan di controller)
    public function getMahasiswaWithUser() {
        return $this->select('mahasiswa.*, user.username, user.role')
                    ->join('user', 'user.id_user = mahasiswa.id_user', 'left')
                    ->findAll();
    }
}
