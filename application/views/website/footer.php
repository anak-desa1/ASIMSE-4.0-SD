<!-- ======= Footer ======= -->
<footer id="footer" class="bg-dark">

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-newsletter">
                    <img src="<?= base_url() ?>panel/dist/upload/logo/<?= $sekolah['logo'] ?>" alt="..." style="width:100%;max-width:200px">
                </div>

                <div class="col-lg-4 col-md-6 footer-contact text-dark">
                    <h4><?= $sekolah['nama_sekolah'] ?></h4>
                    <p class="text-dark">
                        <?= $sekolah['alamat'] ?> <br>
                        <?= $sekolah['kecamatan'] ?>, <?= $sekolah['kota'] ?> <?= $sekolah['kodepos'] ?><br>
                        <?= $sekolah['provinsi'] ?> <br><br>
                        <i class="bi bi-envelope"></i> <a href="mailto:<?= $sekolah['email'] ?>"><?= $sekolah['email'] ?></a><br>
                        <i class="bi bi-phone"></i> <?= $sekolah['telp'] ?><br>
                    </p>
                </div>

                <div class="col-lg-2 col-md-6 footer-links text-dark">
                    <h4>Menu Singkat</h4>
                    <ul class="text-dark">
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Profil</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Kesiswaan</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Informasi</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Belajar</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Berita</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Galery</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Contact</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Media sosial</h4>
                    <!--<p>Media Sosial</p>-->
                    <div class="social-links mt-3">
                        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                    </div>

                    <br>
                    <div class="card text-dark bg-white mb-3" style="max-width: 18rem;">
                        <div class="card-body">
                            <h4 class="text-dark">Statistik Pengunjung</h4>
                            <table id="foot-table-list">
                                <tr>
                                    <td>Hari ini</td>
                                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                    <td><?php echo $pengunjunghariini ?> orang</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                    <td><?php echo $totalpengunjung ?> orang</td>
                                </tr>
                                <tr>
                                    <td>Online</td>
                                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                    <td><?php echo $pengunjungonline ?> orang</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container d-md-flex py-4 text-light">

        <div class="me-md-auto text-center text-md-start">
            <div class="copyright text-light">
                &copy; Copyright <strong><span>2022</span></strong>. All Rights Reserved
            </div>
            <div class="credits text-light">
                Developed by <a href="https://sistemanakdesa.my.id/">SistemAnakDesa</a>
            </div>
        </div>
        <nav>
            <div class="text-light text-center">
                Page rendered in <strong>{elapsed_time}</strong> seconds.
            </div>
        </nav>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?= base_url() ?>website/assets/vendor/aos/aos.js"></script>
<script src="<?= base_url() ?>website/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>website/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?= base_url() ?>website/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?= base_url() ?>website/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?= base_url() ?>website/assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="<?= base_url() ?>website/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="<?= base_url() ?>website/assets/js/main.js"></script>

</body>

</html>