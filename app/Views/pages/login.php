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
.login-card {
    animation: fadeInUp 0.8s ease forwards;
    border-radius: 15px;
    background: rgba(255,255,255,0.95);
    box-shadow: 0 12px 25px rgba(0,0,0,0.15);
    padding: 2rem;
    transition: transform 0.3s ease;
}

.login-card:hover {
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
.form-control:focus {
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
  <div class="col-md-4">
    <div class="login-card">
      <h4 class="text-center mb-4">Login Perpustakaan</h4>
      <form method="post" action="/login/process">
        <div class="mb-3">
          <label class="form-label">Username</label>
          <input type="text" name="username" class="form-control" required autofocus>
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
      </form>

      <hr>

      <div class="text-center">
        <small>Belum punya akun?</small>
        <a href="/register" class="btn btn-outline-secondary btn-sm mt-2">Daftar Sekarang</a>
      </div>
    </div>
  </div>
</div>
