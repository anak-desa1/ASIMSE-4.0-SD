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

  <!-- ======= Events Section ======= -->
  <section id="events" class="events">
    <div class="container">

      <div class="section-title">
        <h2>Sertifikat Vaksin <span>Sekolah</span></h2>
      </div>

      <div class="row">

        <div class="col-lg-8 mt-4 mt-lg-0">

          <div class="card">
            <div class="card-body">
              <div class="card-responsive">
                <form action="" id="form-vaksin">
                  <div class="row">
                    <div class="col-lg-8 mt-4 mt-lg-0">
                      <div class="">
                        <input class="form-control" type="number" name="nik" id="nik" placeholder="Masukkan NIK">
                      </div>
                    </div>
                    <div class="col-lg-4 mt-4 mt-lg-0">
                      <button type="submit" class="btn btn-primary">Cari Data</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <p class="fst-italic text-danger"> * Untuk menampilkan Sertifikat Vaksin -> masukkan NIK -> klik cari data</p>
            </div>
          </div>

          <div class="col-md-4 form-group"><br></div>
          <div class="card" id="sertifikat"></div>

        </div>

        <div class="col-lg-4 mt-4 mt-lg-0">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title">Info Lebih Lanjut<h6>
            </div>
            <div class="card-body">
              <?php foreach ($kontak as $k) : ?>
                <div class="icon-box text-dark bg-info badge rounded-pill bg-primary">
                  <div class="row">
                    <div class="col-lg-3">
                      <a target="_blank" href="https://api.whatsapp.com/send?phone=+62<?= $k['no_kontak'] ?>&text=<?= $sekolah['livechat'] ?>" class="alert-link">
                        <img class="img-profile rounded-circle" style="width: 2.7rem;" src="<?= base_url() ?>panel/dist/upload/avatar/WA_group.png">
                      </a>
                    </div>
                    <div class="col-lg-6">
                      <div>
                        <small style="font-size: 18px">
                          &nbsp<?= $k['nama_kontak'] ?><br>
                          &nbsp<a target="_blank" href="https://api.whatsapp.com/send?phone=+62<?= $k['no_kontak'] ?>&text=<?= $sekolah['livechat'] ?>" class="alert-link"><?= $k['no_kontak'] ?></a>
                        </small>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach ?>
            </div>

          </div>
        </div>

      </div>

    </div>
  </section><!-- End Events Section -->


</main><!-- End #main -->