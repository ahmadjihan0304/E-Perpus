<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= esc($judul ?? 'Perpus Onlen') ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body { background-color: #f7f8fa; }
    .navbar-brand { font-weight: bold; color: #0d6efd !important; }
    .user-info {
      display: flex; align-items: center; gap: 8px;
      color: #fff; font-weight: 500;
    }
    .user-role {
      font-size: 0.8rem; background: rgba(255,255,255,0.2);
      padding: 2px 6px; border-radius: 6px;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand" href="/dashboard">
      <i class="bi bi-book-half"></i> E-Perpustakaan
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php if (session()->get('isLoggedIn')): ?>
          <li class="nav-item">
            <a class="nav-link <?= (uri_string() == 'dashboard') ? 'active' : '' ?>" href="/dashboard">
              <i class="bi bi-speedometer2"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= (uri_string() == 'peminjaman') ? 'active' : '' ?>" href="/peminjaman">
              <i class="bi bi-arrow-left-right"></i> Peminjaman
            </a>
          </li>
          <?php if (session()->get('role') === 'admin'): ?>
          <li class="nav-item">
            <a class="nav-link <?= (uri_string() == 'mahasiswa') ? 'active' : '' ?>" href="/mahasiswa">
              <i class="bi bi-people"></i> Mahasiswa
            </a>
          </li>
          <li class="nav-item">
        <a class="nav-link <?= (uri_string() == 'kategori') ? 'active' : '' ?>" href="/kategori">
          <i class="bi bi-tags"></i> Kategori
        </a>
      </li>
          <li class="nav-item">
            <a class="nav-link <?= (uri_string() == 'buku') ? 'active' : '' ?>" href="/buku">
              <i class="bi bi-journal-bookmark"></i> Buku
            </a>
          </li>
          <?php endif; ?>
        <?php endif; ?>
      </ul>

      <!-- User Info di Sebelah Kanan -->
      <ul class="navbar-nav ms-auto">
        <?php if (session()->get('isLoggedIn')): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle user-info" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
              <i class="bi bi-person-circle"></i>
              <?= esc(session()->get('username')) ?>
              <span class="user-role">
                <?= ucfirst(session()->get('role')) ?>
              </span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow-sm">
              <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-house-door"></i> Dashboard</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-danger" href="/logout"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
            </ul>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">
