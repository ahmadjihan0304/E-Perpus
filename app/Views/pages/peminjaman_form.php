<h4>Tambah Peminjaman</h4>

<!-- Filter Kategori -->
<form method="get" action="" class="mb-3 d-flex align-items-center gap-2">
  <label class="mb-0">Filter Kategori:</label>
  <select name="kategori_id" class="form-select form-select-sm" onchange="this.form.submit()">
    <option value="">-- Semua Kategori --</option>
    <?php foreach($kategori as $k): ?>
      <option value="<?= $k['id_kategori'] ?>" <?= (isset($kategori_id) && $kategori_id == $k['id_kategori']) ? 'selected' : '' ?>>
        <?= $k['nama_kategori'] ?>
      </option>
    <?php endforeach; ?>
  </select>
</form>

<form method="post" action="/peminjaman/store">
  <div class="mb-3">
    <label>Pilih Buku</label>
    <select name="id_buku" class="form-select" required>
      <?php if(empty($buku)): ?>
        <option value="">Tidak ada buku tersedia</option>
      <?php else: ?>
        <?php foreach($buku as $b): ?>
          <option value="<?= $b['id_buku'] ?>">
            <?= $b['judul_buku'] ?> (stok: <?= $b['stok'] ?>)
          </option>
        <?php endforeach; ?>
      <?php endif; ?>
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Simpan</button>
  <a href="/peminjaman" class="btn btn-secondary">Kembali</a>
</form>
