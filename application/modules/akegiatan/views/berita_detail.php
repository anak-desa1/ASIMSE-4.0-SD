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

  <!-- ======= Blog Single Section ======= -->
  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

      <div class="row">

        <div class="col-lg-8 entries">

          <article class="entry entry-single">

            <div class="entry-img center">
              <img src="<?= base_url() ?>/panel/dist/upload/profil_berita/<?= $berita['gambar'] ?>" alt="" class="img-fluid">
            </div>
            <br>
            <h2 class="entry-title">
              <a href="#"><?= $berita['judul_artikel'] ?></a>
            </h2>

            <div class="entry-meta">
              <ul>
                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#"> <?= $berita['user_update'] ?></a></li>
                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="2020-01-01"> <?= $berita['tanggal_terbit'] ?></time></a></li>
                <!-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="#">12 Comments</a></li> -->
              </ul>
            </div>

            <div class="entry-content">
              <p><?= $berita['deskripsi'] ?></p>
            </div>

          </article><!-- End blog entry -->

        </div><!-- End blog entries list -->

        <div class="col-lg-4">
          <div class="sidebar">
            <h3 class="sidebar-title">Recent Posts</h3>
            <div class="sidebar-item recent-posts">
              <div class="card-body">
                <?php foreach ($sidebar as $e) : ?>
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
              </div><!-- End sidebar recent posts-->
            </div><!-- End sidebar -->
          </div><!-- End blog sidebar -->

        </div>

      </div>
  </section><!-- End Blog Single Section -->

</main><!-- End #main -->