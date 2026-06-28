<style>
/* Background perpustakaan */
body {
    background: linear-gradient(135deg, #fdf6e3, #f0e6d2);
    position: relative;
}

/* Background image rak buku */
body::before {
    content: "";
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: url('https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?auto=format&fit=crop&w=1350&q=80') center center / cover no-repeat;
    opacity: 0.15;
    z-index: -1;
}

/* Wrapper untuk centering form di konten */
.login-register-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: calc(100vh - 120px); /* sesuaikan header/footer */
    padding: 2rem 0;
}

/* Card animasi */
.register-card {
    animation: fadeInUp 0.8s ease forwards;
    border-radius: 15px;
    background: rgba(255,255,255,0.95);
    box-shadow: 0 12px 25px rgba(0,0,0,0.15);
    padding: 2rem;
    transition: transform 0.3s ease;
}

.register-card:hover {
    transform: translateY(-5px);
}

/* Button hover */
.btn-primary {
    transition: all 0.3s ease;
}
.btn-primary:hover {
    background-color: #0069d9;
    transform: scale(1.05);
}

/* Input focus */
.form-control:focus, textarea.form-control:focus {
    border-color: #0069d9;
    box-shadow: 0 0 5px rgba(0, 105, 217, 0.5);
}

/* Small text animation */
.text-center small {
    opacity: 0;
    animation: fadeInUp 1.2s ease forwards;
    display: block;
}

/* FadeInUp animation */
@keyframes fadeInUp {
  0% { opacity: 0; transform: translateY(50px); }
  100% { opacity: 1; transform: translateY(0); }
}
</style>

<div class="login-register-wrapper">
  <div class="col-md-6">
    <div class="register-card">
      <h4 class="mb-3 text-center">Daftar Akun Mahasiswa</h4>
      <form method="post" action="/register/process">
        <div class="mb-2"><input name="username" class="form-control" placeholder="Username" required></div>
        <div class="mb-2"><input type="password" name="password" class="form-control" placeholder="Password" required></div>
        <div class="mb-2"><input name="nim" class="form-control" placeholder="NIM" required></div>
        <div class="mb-2"><input name="nama" class="form-control" placeholder="Nama lengkap" required></div>
        <div class="mb-2"><input name="jurusan" class="form-control" placeholder="Jurusan"></div>
        <div class="mb-2"><input name="angkatan" class="form-control" placeholder="Angkatan (YYYY)"></div>
        <div class="mb-2"><input name="no_hp" class="form-control" placeholder="No. HP"></div>
        <div class="mb-2"><textarea name="alamat" class="form-control" placeholder="Alamat"></textarea></div>
        <button class="btn btn-primary w-100">Daftar</button>
      </form>

      <hr>

      <div class="text-center">
        <small>Sudah punya akun? <a href="/login">Login</a></small>
      </div>
    </div>
  </div>
</div>
