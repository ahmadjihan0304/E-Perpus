</div> <!-- End of main container -->

<footer class="bg-light mt-5 py-3 border-top shadow-sm">
  <div class="container text-center text-muted small">
    <p class="mb-0">
      &copy; <?= date('Y') ?> E-Perpustakaan UNP KEDIRI —
      <span class="text-primary fw-semibold">Darmo Wiyono</span>
    </p>
  </div>
</footer>

<!-- Bootstrap & SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Flashdata Alerts (SweetAlert) -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  <?php if (session()->getFlashdata('success')): ?>
    Swal.fire({
      icon: 'success',
      title: 'Berhasil!',
      text: '<?= session()->getFlashdata('success'); ?>',
      confirmButtonColor: '#0d6efd'
    });
  <?php elseif (session()->getFlashdata('error')): ?>
    Swal.fire({
      icon: 'error',
      title: 'Terjadi Kesalahan',
      text: '<?= session()->getFlashdata('error'); ?>',
      confirmButtonColor: '#dc3545'
    });
  <?php endif; ?>
});
</script>

</body>
</html>
