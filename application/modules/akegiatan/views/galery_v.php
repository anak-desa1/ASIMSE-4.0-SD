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
  <section id="gallery" class="gallery">
    <div class="container">

      <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($galery as $p) : ?>
          <div class="col">
            <div class="card h-100">
              <div class="gallery-item">
                <a href="<?= base_url() ?>/panel/dist/upload/profil_galery/<?= $p['gambar'] ?>" class="galelry-lightbox">
                  <img src="<?= base_url() ?>/panel/dist/upload/profil_galery/<?= $p['gambar'] ?>" alt="" class="card-img-top" style="height: 200px;">
                </a>
              </div>

              <div class="card-body">
                <h5 class="card-title"><?= $p['judul_galeri'] ?></h5>
                <a target="_blank" href="<?= base_url() ?>akegiatan/detail_galery/<?= $p['id_galeri'] ?>" class="card-link" title="More Details"><i class="bx bx-link"></i>Card link</a>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>

    </div>
  </section><!-- End Testimonials Section -->

</main><!-- End #main -->