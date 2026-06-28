<div class="d-flex justify-content-between mb-3">
  <h4> Data Kategori</h4>
  <form method="post" action="/kategori/create" class="d-flex">
    <input type="text" name="nama_kategori" class="form-control me-2" placeholder="Kategori baru..." required>
    <button class="btn btn-primary btn-sm">Tambah</button>
  </form>
</div>

<table class="table table-bordered table-striped">
  <thead class="table-primary">
    <tr>
      <th>No</th>
      <th>Nama Kategori</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no=1; foreach($kategori as $k): ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $k['nama_kategori'] ?></td>
      <td>
        <form method="post" action="/kategori/edit/<?= $k['id_kategori'] ?>" class="d-inline">
          <input type="text" name="nama_kategori" value="<?= $k['nama_kategori'] ?>" class="form-control d-inline w-auto">
          <button class="btn btn-warning btn-sm">Ubah</button>
        </form>
        <a href="/kategori/delete/<?= $k['id_kategori'] ?>" class="btn btn-danger btn-sm"
           onclick="return confirm('Hapus kategori ini?')">Hapus</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
