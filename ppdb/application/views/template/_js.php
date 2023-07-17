  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3><?= $sekolah['nama_sekolah'] ?></h3>
      <p><?= $sekolah['alamat'] ?> <br>
      <?= $sekolah['kecamatan'] ?>, <?= $sekolah['kota'] ?> <?= $sekolah['kodepos'] ?><br>
      <?= $sekolah['provinsi'] ?> <br><br>
      <i class="bi bi-envelope"></i> <a href="mailto:<?= $sekolah['email'] ?>"><?= $sekolah['email'] ?></a><br>
      <i class="bi bi-phone"></i> <?= $sekolah['telp'] ?><br></p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
      <?= $sekolah['nama_sekolah'] ?> &copy; <strong><span>2022</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Page rendered in <strong>{elapsed_time}</strong> seconds. Developed by <a href="https://sistemanakdesa.my.id">Sistem Anak Desa</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url(); ?>assets/vendor/purecounter/purecounter.js"></script>
  <script src="<?= base_url(); ?>assets/vendor/aos/aos.js"></script>
  <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url(); ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= base_url(); ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url(); ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= base_url(); ?>assets/vendor/typed.js/typed.min.js"></script>
  <script src="<?= base_url(); ?>assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="<?= base_url(); ?>assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url(); ?>assets/js/main.js"></script>

</body>

</html>