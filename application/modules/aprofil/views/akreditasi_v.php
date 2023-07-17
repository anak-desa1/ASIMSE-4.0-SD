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

      <!-- <div class="section-title" data-aos="fade-up">
        <h2><strong>Akreditasi</strong></h2>
      </div> -->

      <div class="row skills-content">

        <div class="row">
          <div class="col-lg-12 details order-2 order-lg-1" data-aos="fade-up">
            <div class="col-lg-12 text-center order-1 order-lg-2">
              <p class="text-center"><img src="<?= base_url() ?>panel/dist/upload/logo/<?= $sekolah['akreditasi'] ?>" alt="" class="img-fluid" /></p>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Our Skills Section -->


</main><!-- End #main -->