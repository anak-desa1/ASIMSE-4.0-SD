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
        <h2><strong>Data Sekolah</strong></h2>
      </div> -->

      <div class="row skills-content">

        <div class="row">
          <div class="col-lg-9 details order-2 order-lg-1" data-aos="fade-up">
            <div class="activity">
              <div class="activity-detail">
                <div class="container">
                  <div class="row">
                    <div class="col-5">Nama</div>
                    <div class="col-7">: <?= $sekolah['nama_sekolah'] ?></div>
                  </div>
                  <div class="row">
                    <div class="col-5">NPSN</div>
                    <div class="col-7">: <?= $sekolah['npsn'] ?></div>
                  </div>
                  <div class="row">
                    <div class="col-5">Alamat</div>
                    <div class="col-7">: <?= $sekolah['alamat'] ?></div>
                  </div>
                  <div class="row">
                    <div class="col-5">Kode Pos</div>
                    <div class="col-7">: <?= $sekolah['kodepos'] ?></div>
                  </div>
                  <div class="row">
                    <div class="col-5">Kecamatan/Kota (LN)</div>
                    <div class="col-7">: <?= $sekolah['kecamatan'] ?></div>
                  </div>
                  <div class="row">
                    <div class="col-5">Kab.-Kota/Negara (LN)</div>
                    <div class="col-7">: <?= $sekolah['kota'] ?></div>
                  </div>
                  <div class="row">
                    <div class="col-5">Propinsi/Luar Negeri (LN)</div>
                    <div class="col-7">: <?= $sekolah['provinsi'] ?></div>
                  </div>
                  <div class="row">
                    <div class="col-5">Status Sekolah</div>
                    <div class="col-7">: Swasta</div>
                  </div>
                  <div class="row">
                    <div class="col-5">Waktu Penyelenggaraan </div>
                    <div class="col-7">: Pagi / 6 hari </div>
                  </div>
                  <div class="row">
                    <div class="col-5">Jenjang Pendidikan </div>
                    <div class="col-7">: SD </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-2 text-center order-1 order-lg-2" data-aos="fade-up">
            <p class="text-center"><img src="<?= base_url() ?>panel/dist/upload/logo/<?= $sekolah['logo'] ?>" class="img-profile" style="width: 15rem;" /></p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Our Skills Section -->


</main><!-- End #main -->