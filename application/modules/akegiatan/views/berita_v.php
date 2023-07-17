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

  <!-- ======= Blog Section ======= -->
  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

      <div class="row">

        <div class="col-lg-8">
          <div class="card">

            <div class="card-body">
              <div class="card-header">
                Berita Seputar Sekolah
              </div>
            </div>

            <div class="card-body">
              <?php foreach ($berita as $e) : ?>
                <div class="card mb-3">
                  <div class="row g-0">
                    <div class="col-md-4">
                      <img src="<?= base_url() ?>/panel/dist/upload/profil_berita/<?= $e->gambar ?>" style="height: 200px; width: 200px;" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">

                        <h5 class="card-title"><?= $e->judul_artikel ?></h5>
                        <p class="card-text"><?= (str_word_count($e->deskripsi) > 60 ? substr("$e->deskripsi", 0, 200) . "[...]" : "$e->deskripsi")  ?></p>

                        <div class="row">
                          <div class="col-md-6">
                            <p class="card-text"><small class="text-muted">Last updated <time datetime="2020-01-01"><?= $e->tanggal_terbit ?></time> </small></p>
                          </div>
                          <div class="col-md-6">
                            <a href="<?= base_url() ?>akegiatan/detail_berita/<?= $e->id_artikel ?>" class="card-link">(Baca Selengkapnya)</a>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach ?>
            </div>

          </div>
        </div>

        <div class="col-lg-4 ">
          <div class="card">

            <div class="card-body">
              <div class="card-header">
                <h5>Recent Posts</h5>
              </div>
            </div>

            <div class="card-body">
              <?php foreach ($berita as $e) : ?>
                <div class="card-header">
                  <div class="row">
                    <div class="col-lg-4">
                      <img src="<?= base_url() ?>/panel/dist/upload/profil_berita/<?= $e->gambar ?>" style="height: 100px; width: 100px;" alt="">
                    </div>
                    <div class="col-lg-8">
                      <h7><a href="<?= base_url() ?>akegiatan/detail_berita/<?= $e->id_artikel ?>"><?= $e->judul_artikel ?></a></h7>
                      <time datetime="2020-01-01"><?= $e->tanggal_terbit ?></time>
                    </div>
                  </div>
                </div>
              <?php endforeach ?>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section><!-- End Blog Section -->

</main><!-- End #main -->