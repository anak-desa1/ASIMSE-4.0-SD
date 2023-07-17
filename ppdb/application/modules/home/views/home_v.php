<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex flex-column justify-content-center">
    <div class="container" data-aos="zoom-in" data-aos-delay="100">
        <h1><?= $sekolah['nama_sekolah'] ?></h1>   
        <br>   
        <?php if ($periode['status'] == 'Aktif') { ?>   
            <h2>PPDB (<span class="typed" data-typed-items="Penerimaan Peserta Didik Baru"></span>) </h2>       
            <br>   
            <h2>TP. <?= $periode['tahun']?></h2>
            <br>   
            <h2>SUDAH DIBUKA, AYO SEGERA DAFTAR KUOTA TERBATAS !!! </h2>
            <P>
                <?= $periode['periode'] ?>,
                <?php echo format_indo(date($periode['tgl_mulai'])); ?> - <?php echo format_indo(date($periode['tgl_selesai'])); ?>
                <span class="badge bg-info text-dark"><?= $periode['status'] ?></span>
            </P>
            <?php } else { ?>
            <h2>PPDB (<span class="typed" data-typed-items="Penerimaan Peserta Didik Baru"></span>) </h2>       
            <br>   
            <h2>MASIH DI TUTUP !!! </h2>
            <?php } ?>
            
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </section><!-- End Hero -->