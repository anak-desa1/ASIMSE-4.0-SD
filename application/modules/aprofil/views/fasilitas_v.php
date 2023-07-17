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
        <h2><strong>Fasilitas</strong></h2>
      </div> -->

      <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($profil_fasilitas as $fa) : ?>
          <div class="col">
            <div class="card h-100">
              <img src="<?= base_url() ?>panel/dist/upload/profil_fasilitas/<?= $fa['gambar'] ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?= $fa['judul'] ?></h5>
                <p class="card-text"><?= $fa['text'] ?></p>
              </div>
              <div class="card-footer">
                <small class="text-muted">-</small>
              </div>
            </div>
          </div>
        <?php endforeach ?>
        <!-- <div class="col">
          <div class="card h-100">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Last updated 3 mins ago</small>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Last updated 3 mins ago</small>
            </div>
          </div>
        </div> -->
      </div>

    </div>
  </section><!-- End Our Skills Section -->


</main><!-- End #main -->