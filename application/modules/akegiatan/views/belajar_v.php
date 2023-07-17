<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2><?= $title; ?></h2>
        <ol>
          <li><a href="<?= base_url('home') ?>">Home</a></li>
          <!-- <li><?= $home; ?></li> -->
          <li><?= $subtitle; ?></li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Testimonials Section ======= -->
  <section id="testimonials" class="testimonials">
    <div class="container">

      <!-- <div class="section-title" data-aos="fade-up">
        <h2><strong><?= $title; ?></strong></h2>
      </div> -->

      <div class="row">

        <?php foreach ($belajara as $o) : ?>
          <div class="col-lg-4 text-center" data-aos="fade-up" data-aos-delay="300">

            <div class="testimonial-item mt-4 btn btn-primary">
              <a target="_blank" href="<?= $o->link ?>">
                <img src="<?= base_url() ?>/panel/dist/upload/profil_belajar/<?= $o->gambar ?>" class="img-profile rounded-circle" style="width: 6rem;">
              </a>
              <br />
              <h3><?= $o->judul ?></h3>
              <p style="color: blue;">
                <!-- <i class="bx bxs-quote-alt-left quote-icon-left" ></i> -->
                <?= $o->text ?>
                <!-- <i class="bx bxs-quote-alt-right quote-icon-right" ></i> -->
              </p>
            </div>
          </div>
        <?php endforeach ?>

      </div>

    </div>
  </section><!-- End Testimonials Section -->

</main><!-- End #main -->