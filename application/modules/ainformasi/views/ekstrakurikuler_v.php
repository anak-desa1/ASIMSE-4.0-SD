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
  <section id="testimonials" class="testimonials section-bg">
    <div class="container">

      <div class="section-title" data-aos="fade-up">
        <h2><strong><?= $title; ?></strong></h2>
      </div>

      <div class="row">

        <?php foreach ($ekstra as $e) : ?>
          <div class="col-lg-6" data-aos="fade-up">
            <div class="testimonial-item">
              <img src="<?= base_url() ?>/panel/dist/upload/profil_ekstra/<?= $e->gambar ?>" class="testimonial-img" alt="">
              <h3><?= $e->judul ?></h3>
              <h4></h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                <?= $e->text ?>
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div>
        <?php endforeach ?>

      </div>

    </div>
  </section><!-- End Testimonials Section -->

</main><!-- End #main -->