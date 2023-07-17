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

        <?php foreach ($ekstra as $e) : ?>
          <div class="col-lg-6">
            <div class="card mb-3 member d-flex align-items-start" style="max-width: 540px;">
              <div class="row g-0">
                <div class="col-md-4">
                  <?php if ($e->gambar != '') { ?>
                    <img src="<?= base_url() ?>/panel/dist/upload/profil_ekstra/<?= $e->gambar ?>" class="img-fluid rounded-start" style="height: 200px; width: 200px;" alt="...">
                  <?php } else { ?>
                    <img src="<?= base_url() ?>/panel/dist/upload/profil_ekstra/200x200.png" class="img-fluid rounded-start" style="height: 200px; width: 200px;" alt="...">
                  <?php } ?>

                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h4 class="card-title"><?= $e->judul ?></h4>
                    <p class="card-text"><?= $e->text ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <?php endforeach ?>

      </div>

    </div>
  </section><!-- End Testimonials Section -->

</main><!-- End #main -->