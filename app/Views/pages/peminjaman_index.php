<div class="container mt-4">

  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?= session()->getFlashdata('success'); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>

  <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <?= session()->getFlashdata('error'); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>

  <div class="card shadow border-0">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
        <h4 class="mb-2 mb-md-0">📘 Daftar Peminjaman Buku</h4>

        <!-- Search Box -->
        <form class="d-flex mb-2 mb-md-0" method="get" action="">
          <input class="form-control form-control-sm me-2" type="search" name="keyword" placeholder="Cari judul buku / peminjam" value="<?= esc($keyword ?? '') ?>">
          <button class="btn btn-outline-primary btn-sm" type="submit"><i class="bi bi-search"></i> Cari</button>
        </form>

        <?php if (session()->get('role') === 'mahasiswa'): ?>
          <a href="/peminjaman/create" class="btn btn-primary btn-sm ms-2">
            <i class="bi bi-plus-circle"></i> Pinjam Buku
          </a>
        <?php endif; ?>
      </div>

      <div class="table-responsive mt-3">
        <table class="table table-striped table-bordered align-middle">
          <thead class="table-primary text-center">
            <tr>
              <th>No</th>
              <th>Judul Buku</th>
              <th>Peminjam</th>
              <th>Tanggal Pinjam</th>
              <th>Tanggal Kembali</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($peminjaman)): ?>
              <tr><td colspan="7" class="text-center text-muted">Belum ada data peminjaman</td></tr>
            <?php else: ?>
              <?php $no = 1; foreach ($peminjaman as $p): ?>
                <tr>
                  <td class="text-center"><?= $no++; ?></td>
                  <td><?= esc($p['judul_buku']); ?></td>
                  <td><?= esc($p['username']); ?></td>
                  <td class="text-center"><?= esc($p['tgl_pinjam']); ?></td>
                  <td class="text-center">
                    <?= $p['tgl_dikembalikan'] ?? '<em class="text-muted">-</em>'; ?>
                  </td>
                  <td class="text-center">
                    <?php if ($p['status'] === 'dipinjam'): ?>
                      <span class="badge bg-warning text-dark">Dipinjam</span>
                    <?php else: ?>
                      <span class="badge bg-success">Dikembalikan</span>
                    <?php endif; ?>
                  </td>
                  <td class="text-center">
                    <?php
                      $isOwner = ($p['id_user'] == session()->get('id_user'));
                      $isAdmin = (session()->get('role') === 'admin');
                      if ($p['status'] === 'dipinjam' && ($isAdmin || $isOwner)):
                    ?>
                      <a href="/peminjaman/return/<?= $p['id_peminjaman']; ?>"
                         class="btn btn-success btn-sm"
                         onclick="return confirm('Yakin ingin mengembalikan buku ini?');">
                         <i class="bi bi-arrow-return-left"></i> Kembalikan
                      </a>
                    <?php else: ?>
                      <span class="text-muted">—</span>
                    <?php endif; ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
