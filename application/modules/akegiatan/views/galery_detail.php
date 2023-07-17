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
  <!-- ======= Portfolio Details Section ======= -->
  <section id="portfolio-details" class="portfolio-details">
    <div class="container" data-aos="fade-up">

      <div class="row gy-4">

      <div class="col-lg-8">
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($galery as $p) : ?>
          <div class="card">
            <div class="card-body">
              <div class="gallery-item">
                <a href="<?= base_url() ?>/panel/dist/upload/profil_galery/<?= $p['foto'] ?>" class="galelry-lightbox">
                  <img src="<?= base_url() ?>/panel/dist/upload/profil_galery/<?= $p['foto'] ?>" alt="" class="card-img-top" style="height: 200px;">
                </a>
              </div>             
            </div>
          </div>
        <?php endforeach ?>
      </div>
      </div>
      
      <div class="col-lg-4">
          <div class="portfolio-info">
            <h3><?= $data['judul_galeri'] ?></h3>
            <ul>
              <li><strong>Project date</strong>: <?= $data['datecreate'] ?></li>
            </ul>
            <p><?= $data['deskripsi'] ?></p>
          </div>
        </div>
      </div>

    </div>

    </div>
  </section><!-- End Portfolio Details Section -->

</main><!-- End #main -->