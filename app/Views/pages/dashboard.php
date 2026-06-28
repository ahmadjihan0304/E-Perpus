<h3 class="mb-4">Dashboard</h3>

<?php if($user_role === 'admin'): ?>
<div class="row text-center">
  <!-- Card Total Buku -->
  <div class="col-md-4 mb-3">
    <div class="card shadow-sm border-primary">
      <div class="card-body">
        <h1><?= $total_buku ?></h1>
        <p class="text-muted">Total Buku</p>
      </div>
    </div>
  </div>

  <!-- Card Total Mahasiswa -->
  <div class="col-md-4 mb-3">
    <div class="card shadow-sm border-success">
      <div class="card-body">
        <h1><?= $total_mahasiswa ?></h1>
        <p class="text-muted">Total Mahasiswa</p>
      </div>
    </div>
  </div>

  <!-- Card Total Peminjaman -->
  <div class="col-md-4 mb-3">
    <div class="card shadow-sm border-warning">
      <div class="card-body">
        <h1><?= $total_peminjaman ?></h1>
        <p class="text-muted">Buku Yang Sedang Dipinjam</p>
      </div>
    </div>
  </div>
</div>
<?php else: ?>
<!-- User Mahasiswa: Center card Total Peminjaman -->
<div class="row justify-content-center text-center">
  <div class="col-md-4 mb-3">
    <div class="card shadow-sm border-warning">
      <div class="card-body">
        <h1><?= $total_peminjaman ?></h1>
        <p class="text-muted">Buku Yang Sedang Dipinjam</p>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>

<!-- List detail peminjaman aktif -->
<div class="row mt-4">
  <div class="col-12">
    <h4>Buku yang Sedang Dipinjam</h4>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Judul Buku</th>
          <th>Nama User</th>
          <th>Tanggal Pinjam</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($active_peminjaman)): ?>
          <?php $no = 1; foreach($active_peminjaman as $p): ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $p['judul_buku'] ?></td>
            <td><?= $p['username'] ?></td>
            <td><?= $p['tgl_pinjam'] ?></td>
            <td><?= $p['status'] ?></td>
          </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="5" class="text-center">Tidak ada data peminjaman aktif</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
