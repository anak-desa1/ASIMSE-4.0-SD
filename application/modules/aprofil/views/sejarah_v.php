<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
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
      <!-- 
      <div class="section-title" data-aos="fade-up">
        <h2><strong>Sejarah</strong></h2>
      </div> -->

      <div class="row skills-content">

        <div class="row">
          <div class="col-lg-12 details " data-aos="fade-up">
            <p><?= $sekolah['sejarah'] ?></p>
          </div>
          <!-- <div class="col-lg-4 text-center " data-aos="fade-up">
            <p><img src="<?= base_url() ?>dist/upload/logo/<?= $kepsek['foto'] ?>" class="img-profile" style="width: 20rem;" /></p>
            <p style="width: 20rem;"><?= $kepsek['nama_kepsek'] ?></p>
          </div> -->
        </div>

      </div>

    </div>
  </section><!-- End Our Skills Section -->


</main><!-- End #main -->