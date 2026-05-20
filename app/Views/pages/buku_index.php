<div class="d-flex justify-content-between mb-3">
  <h4>📚 Data Buku</h4>
  <form class="d-flex" method="get" action="/buku">
    <input type="text" name="keyword" class="form-control form-control-sm me-2"
           placeholder="Cari buku..." value="<?= $keyword ?? '' ?>">
    <button type="submit" class="btn btn-secondary btn-sm">Cari</button>
  </form>
  <a href="/buku/create" class="btn btn-primary btn-sm">+ Tambah Buku</a>
</div>

<table class="table table-bordered table-striped">
  <thead class="table-primary">
    <tr>
      <th>No</th>
      <th>Judul</th>
      <th>Kategori</th>
      <th>Pengarang</th>
      <th>Penerbit</th>
      <th>Stok</th>
      <th>Lokasi Rak</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php if(!empty($buku)): ?>
      <?php $no=1; foreach($buku as $b): ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= $b['judul_buku'] ?></td>
        <td><?= $b['nama_kategori'] ?></td>
        <td><?= $b['pengarang'] ?></td>
        <td><?= $b['penerbit'] ?></td>
        <td><?= $b['stok'] ?></td>
        <td><?= $b['lokasi_rak'] ?? '-' ?></td>
        <td>
          <a href="/buku/edit/<?= $b['id_buku'] ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="/buku/delete/<?= $b['id_buku'] ?>" class="btn btn-danger btn-sm"
             onclick="return confirm('Hapus buku ini?')">Hapus</a>
        </td>
      </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr>
        <td colspan="8" class="text-center">Belum ada data buku. Silakan tambah buku terlebih dahulu.</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>
