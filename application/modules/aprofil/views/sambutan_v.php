<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2><?= $title; ?></h2>
        <ol>
          <li><a href="<?= base_url('home') ?>">Home</a></li>
          <li><?= $home; ?></li>
          <li><?= $subtitle; ?></li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Our Skills Section ======= -->
  <section id="skills" class="skills">
    <div class="container">

      <!-- <div class="section-title" data-aos="fade-up">
        <h2>Kata <strong>Sambutan</strong></h2>
      </div> -->

      <div class="row skills-content">

        <div class="row">
          <div class="col-lg-8 details " data-aos="fade-up">
            <h3>Sambutan Kepala Sekolah</h3>
            <p><?= $kepsek['kata_sambutan'] ?></p>
          </div>
          <div class="col-lg-4 text-center " data-aos="fade-up">
            <p><img src="<?= base_url() ?>panel/dist/upload/logo/<?= $kepsek['foto'] ?>" class="img-profile" style="width: 20rem;" /></p>
            <p style="width: 20rem;"><?= $kepsek['nama_kepsek'] ?></p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Our Skills Section -->


</main><!-- End #main -->