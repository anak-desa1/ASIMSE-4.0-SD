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

  <!-- ======= Our Team Section ======= -->
  <section id="doctors" class="doctors section-bg">
    <div class="container">

      <!-- <div class="section-title" data-aos="fade-up">
        <h2><strong>Pendidik</strong></h2>
      </div> -->


      <div class="row">
        <?php foreach ($profil_guru as $guru) : ?>
          <div class="col-lg-6">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="<?= base_url() ?>panel/dist/upload/profil_guru/<?= $guru['gambar'] ?>" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4><?= $guru['nama_guru'] ?></h4>
                <span><?= $guru['mengajar'] ?></span>
                <!-- <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p> -->
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach ?>

      </div>

    </div>
  </section><!-- End Our Team Section -->

</main><!-- End #main -->