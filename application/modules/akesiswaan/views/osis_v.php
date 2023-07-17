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

  <!-- ======= Testimonials Section ======= -->
  <section id="doctors" class="doctors">
    <div class="container">

      <!-- <div class="section-title" data-aos="fade-up">
        <h2><strong><?= $title; ?></strong></h2>
      </div> -->

      <div class="row">
        <?php foreach ($osis as $o) : ?>
          <div class="col-lg-6">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="<?= base_url() ?>/panel/dist/upload/profil_osis/<?= $o->gambar ?>" class="img-fluid" alt=""></div>
              <div class="member-info">
                <!-- <h4>Walter White</h4> -->
                <span><?= $o->judul ?></span>
                <p> <?= $o->text ?></p>
                <!-- <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div> -->
              </div>
            </div>
          </div>
        <?php endforeach ?>

      </div>

    </div>
  </section><!-- End Testimonials Section -->

</main><!-- End #main -->