<style media="screen">
  .btn-md {
    padding: 1rem 2.4rem;
    font-size: .94rem;
    display: none;
  }

  .swal2-popup {
    font-family: inherit;
    font-size: 1.2rem;
  }
</style>

<main id="main" class="main">

  <div class="pagetitle">
    <h1><?= $title; ?></h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html"><?= $home; ?></a></li>
        <li class="breadcrumb-item"><?= $subtitle; ?></li>
        <li class="breadcrumb-item active"><?= $title; ?></li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <!-- Main content -->
  <section class="section dashboard">

    <div class="row">

      <!-- Profil Sekolah -->
      <div class="col-lg-12">
        <div class="row">

          <!-- Customers Card -->
          <div class="col-xxl-7 col-xl-7">
            <div class="card info-card customers-card">

              <div class="info-box">
                <h5 class="card-title center">Profil <span>| Sekolah</span></h5>
              </div>

              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="container">
                    <div class="row">
                      <div class="col-5" style="font-size: 16px;">Nama</div>
                      <div class="col-7" style="font-size: 16px;">: <?= $sekolah['nama_sekolah'] ?></div>
                    </div>
                    <div class="row">
                      <div class="col-5" style="font-size: 16px;">NPSN</div>
                      <div class="col-7" style="font-size: 16px;">: <?= $sekolah['npsn'] ?></div>
                    </div>
                    <div class="row">
                      <div class="col-5" style="font-size: 16px;">Alamat</div>
                      <div class="col-7" style="font-size: 16px;">: <?= $sekolah['alamat'] ?></div>
                    </div>
                    <div class="row">
                      <div class="col-5" style="font-size: 16px;">Kode Pos</div>
                      <div class="col-7" style="font-size: 16px;">: <?= $sekolah['kodepos'] ?></div>
                    </div>
                    <div class="row">
                      <div class="col-5" style="font-size: 16px;">Kecamatan/Kota (LN)</div>
                      <div class="col-7" style="font-size: 16px;">: <?= $sekolah['kecamatan'] ?></div>
                    </div>
                    <div class="row">
                      <div class="col-5" style="font-size: 16px;">Kab.-Kota/Negara (LN)</div>
                      <div class="col-7" style="font-size: 16px;">: <?= $sekolah['kota'] ?></div>
                    </div>
                    <div class="row">
                      <div class="col-5" style="font-size: 16px;">Propinsi/Luar Negeri (LN)</div>
                      <div class="col-7" style="font-size: 16px;">: <?= $sekolah['provinsi'] ?></div>
                    </div>
                  </div>
                </div>

              </div>

            </div>
          </div>
          <!-- End Customers Card -->

          <!-- Customers Card -->
          <div class="col-xxl-5 col-xl-5">
            <div class="card info-card customers-card">

              <div class="info-box">
                <h5 class="card-title">Kepala <span>| Sekolah</span></h5>
              </div>

              <div class="card-body profile-card pt-2 d-flex flex-column align-items-center">
                <img src="<?= base_url() ?>panel/dist/upload/logo/<?= $kepsek['foto'] ?>" alt="Profile" class="rounded-circle img-thumbnail" height="150" width="150">
                <div class="card-title" style="font-size: 14px;">
                  <?= $kepsek['nama_kepsek'] ?> <br>
                  <?= $sekolah['nama_sekolah'] ?>
                </div>                              
              </div>

            </div>

          </div><!-- End Customers Card -->
        </div>

      </div>
      <!-- End Profil Sekolah -->

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          <!-- Diterima Card -->
          <div class="col-xxl-3 col-md-3">
            <div class="card info-card sales-card">

              <div class="info-box">
                <h5 class="card-title">Total <span>| Diterima</span></h5>
              </div>

              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <?php foreach ($diterima as $d1) { ?>
                      <h6> <?= $d1['total'] ?></h6>
                    <?php } ?>
                  </div>
                </div>

              </div>

            </div>
          </div><!-- End Diterima Card -->

          <!-- Cadangan Card -->
          <div class="col-xxl-3 col-md-3">
            <div class="card info-card customers-card">

              <div class="info-box">
                <h5 class="card-title">Total <span>| Cadangan</span></h5>
              </div>

              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person-bounding-box"></i>
                  </div>
                  <div class="ps-3">
                    <?php foreach ($cadangan as $c1) { ?>
                      <h6><?= $c1['total'] ?></h6>
                    <?php } ?>
                  </div>
                </div>

              </div>

            </div>
          </div><!-- End Cadangan Card -->

          <!-- Pendaftar Card -->
          <div class="col-xxl-3 col-md-3">
            <div class="card info-card revenue-card">

              <div class="info-box">
                <h5 class="card-title">Total <span>| Pendaftar</span></h5>
              </div>

              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person-check-fill"></i>
                  </div>
                  <div class="ps-3">
                    <?php foreach ($registrasi as $g1) { ?>
                      <h6><?= $g1['total'] ?></h6>
                    <?php } ?>
                  </div>
                </div>

              </div>

            </div>
          </div><!-- End Pendaftar Card -->

          <!-- Kuota Card -->
          <div class="col-xxl-3 col-md-3">
            <div class="card info-card revenue-card">

              <div class="info-box">
                <h5 class="card-title">Kuota <span>| Pendaftaran</span></h5>
              </div>

              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person-badge"></i>
                  </div>
                  <div class="ps-3">
                    <?php foreach ($kuota as $k1) { ?>
                      <h6><?= $k1['total'] ?></h6>
                    <?php } ?>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Kuota Card -->


        </div>
      </div>

      <!-- Left side columns -->
       <div class="col-lg-12">
        <div class="row">

          <!-- Diterima Card -->
          <div class="col-xxl-3 col-md-3">
            <div class="card info-card sales-card">

              <div class="info-box">
                <h5 class="card-title">Total <span>| Guru/Karyawan</span></h5>
              </div>

              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <?php foreach ($guru as $d1) { ?>
                      <h6><?= $d1['total_guru'] ?></h6>
                    <?php } ?>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Diterima Card -->

          <!-- Cadangan Card -->
          <div class="col-xxl-3 col-md-3">
            <div class="card info-card customers-card">

              <div class="info-box">
                <h5 class="card-title">Total <span>| Siswa</span></h5>
              </div>

              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-bookmark-star"></i>
                  </div>
                  <div class="ps-3">
                    <?php foreach ($siswa as $t1) { ?>
                      <h6> <?= $t1['total_siswa'] ?></h6>
                    <?php } ?>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Cadangan Card -->

          <!-- Pendaftar Card -->
          <div class="col-xxl-3 col-md-3">
            <div class="card info-card revenue-card">

              <div class="info-box">
                <h5 class="card-title">Total <span>| Buku</span></h5>
              </div>

              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-shop"></i>
                  </div>
                  <div class="ps-3">
                    <?php foreach ($buku as $s1) { ?>
                      <h6> <?= $s1['total_buku'] ?></h6>
                    <?php } ?>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Pendaftar Card -->

          <!-- Kuota Card -->
          <div class="col-xxl-3 col-md-3">
            <div class="card info-card revenue-card">

              <div class="info-box">
                <h5 class="card-title">Online <span>| Users</span></h5>
              </div>

              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person-lines-fill"></i>
                  </div>
                  <div class="ps-3">
                    <?php foreach ($online as $o1) { ?>
                      <h6> <?= $o1['total_online'] ?></h6>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End Kuota Card -->

        </div>
      </div>

    </div>
  </section>

</main>
