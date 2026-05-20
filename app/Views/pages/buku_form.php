<h4><?= $judul ?></h4>
<form method="post" action="<?= isset($buku) ? '/buku/update/'.$buku['id_buku'] : '/buku/store' ?>">
  <div class="mb-3">
    <label>Judul Buku</label>
    <input type="text" name="judul_buku" class="form-control" value="<?= $buku['judul_buku'] ?? '' ?>" required>
  </div>

  <div class="mb-3">
    <label>Kategori</label>
    <select name="id_kategori" class="form-select" required>
      <option value="">-- Pilih Kategori --</option>
      <?php foreach($kategori as $k): ?>
        <option value="<?= $k['id_kategori'] ?>" <?= isset($buku) && $buku['id_kategori']==$k['id_kategori'] ? 'selected' : '' ?>>
          <?= $k['nama_kategori'] ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="mb-3">
    <label>Pengarang</label>
    <input type="text" name="pengarang" class="form-control" value="<?= $buku['pengarang'] ?? '' ?>">
  </div>

  <div class="mb-3">
    <label>Penerbit</label>
    <input type="text" name="penerbit" class="form-control" value="<?= $buku['penerbit'] ?? '' ?>">
  </div>

  <div class="mb-3">
    <label>Tahun Terbit</label>
    <input type="number" name="tahun_terbit" class="form-control" value="<?= $buku['tahun_terbit'] ?? '' ?>">
  </div>

  <div class="mb-3">
    <label>Stok</label>
    <input type="number" name="stok" class="form-control" value="<?= $buku['stok'] ?? '' ?>" required>
  </div>

  <div class="mb-3">
    <label>Lokasi Rak</label>
    <input type="text" name="lokasi_rak" class="form-control" value="<?= $buku['lokasi_rak'] ?? '' ?>" placeholder="Contoh: 1A">
  </div>

  <button type="submit" class="btn btn-success"><?= isset($buku) ? 'Update' : 'Simpan' ?></button>
  <a href="/buku" class="btn btn-secondary">Kembali</a>
</form>
