<div class="container mt-4">
    <h3 class="mb-4"><?= esc($judul) ?></h3>

    <!-- Alert -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php elseif (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <!-- Tombol Tambah -->
    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
        + Tambah Mahasiswa
    </button>

    <!-- Tabel Mahasiswa -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Angkatan</th>
                    <th>No. HP</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($mahasiswa)): ?>
                    <?php $no = 1; foreach ($mahasiswa as $mhs): ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= esc($mhs['nim']) ?></td>
                            <td><?= esc($mhs['nama']) ?></td>
                            <td><?= esc($mhs['jurusan']) ?></td>
                            <td><?= esc($mhs['angkatan']) ?></td>
                            <td><?= esc($mhs['no_hp']) ?></td>
                            <td><?= esc($mhs['alamat']) ?></td>
                            <td class="text-center">
                                <!-- Tombol Edit (modal) -->
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalEdit<?= $mhs['id_mahasiswa'] ?>">
                                    Edit
                                </button>
                                <!-- Tombol Hapus -->
                                <a href="<?= base_url('mahasiswa/delete/' . $mhs['id_mahasiswa']) ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="modalEdit<?= $mhs['id_mahasiswa'] ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="<?= base_url('mahasiswa/update/' . $mhs['id_mahasiswa']) ?>" method="post">
                                        <div class="modal-header bg-warning">
                                            <h5 class="modal-title">Edit Mahasiswa</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label>NIM</label>
                                                <input type="text" name="nim" class="form-control" value="<?= esc($mhs['nim']) ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>Nama</label>
                                                <input type="text" name="nama" class="form-control" value="<?= esc($mhs['nama']) ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>Jurusan</label>
                                                <input type="text" name="jurusan" class="form-control" value="<?= esc($mhs['jurusan']) ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label>Angkatan</label>
                                                <input type="text" name="angkatan" class="form-control" value="<?= esc($mhs['angkatan']) ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label>No. HP</label>
                                                <input type="text" name="no_hp" class="form-control" value="<?= esc($mhs['no_hp']) ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label>Alamat</label>
                                                <input type="text" name="alamat" class="form-control" value="<?= esc($mhs['alamat']) ?>">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-warning">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="6" class="text-center">Belum ada data mahasiswa.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah Mahasiswa -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('mahasiswa/store') ?>" method="post">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">Tambah Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>NIM</label>
                        <input type="text" name="nim" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Jurusan</label>
                        <input type="text" name="jurusan" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Angkatan</label>
                        <input type="text" name="angkatan" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>No. HP</label>
                        <input type="text" name="no_hp" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
