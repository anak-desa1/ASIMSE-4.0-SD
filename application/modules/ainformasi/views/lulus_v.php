<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?= base_url()?>panel/assets/vendor/countdowntime/flipclock.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?= base_url()?>panel/assets/css/util.css">
<link rel="stylesheet" type="text/css" href="<?= base_url()?>panel/assets/css/main.css">

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
        <h2>Informasi Data Kelulusan <span>Sekolah</span></h2>
      </div>

      <div class="row">
          <?php
            $akhir  = new DateTime($publish['tanggal_publis']); //Waktu awal
            $awal = new DateTime(); // Waktu sekarang atau akhir
            $diff  = $awal->diff($akhir);           
          ?>
         	<?php if ($awal >= $akhir) { ?>
					
            <div class="col-lg-8 mt-4 mt-lg-0">
            <div class="card bg-info">
              <div class="card-body">
                <h3 class="l1-txt2 p-b-45 respon2 respon4">
                  Sudah Dibuka
                </h3>
                <div class="card-responsive">
                  <form action="" id="form-lulus">
                    <div class="row">
                      <div class="col-lg-8 mt-4 mt-lg-0">
                        <div class="">
                          <input class="form-control" type="number" name="nisn" id="nisn" placeholder="Masukkan NISN">
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
                <p class="fst-italic text-danger"> * Untuk menampilkan Informasi Data Kelulusan -> masukkan NISN -> klik cari data.</p>
                <p class="fst-italic text-danger"> * Untuk mengatahui NISN -> klik <a target="_blank" class="btn btn-primary" href="https://nisn.data.kemdikbud.go.id/index.php/Cindex/formcaribynama">NISN</a> dan ikuti petunjuk yang diberikan. </p>
              </div>
            </div>
           
            <div class="col-md-4 form-group"><br></div>
            <div class="card" id="sertifikat"></div>

          </div>
					<?php } else { ?>
						<div class="col-lg-8 mt-4 mt-lg-0">
              <div class="card bg-info">
                    <div class="card-header">
                      <h3 class="l1-txt2 p-b-45 respon2 respon4">
                          DiBuka Dalam
                      </h3>
                    </div>
                <div class="card-body">
                  <div class="cd100"></div>
                </div>
              </div>
           </div>
					<?php } ?>          

        <div class="col-lg-4 mt-4 mt-lg-0">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Info Lebih Lanjut</h3>
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
<script src="<?= base_url()?>panel/assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="<?= base_url()?>panel/assets/vendor/countdowntime/flipclock.min.js"></script>
<script src="<?= base_url()?>panel/assets/vendor/countdowntime/moment.min.js"></script>
<script src="<?= base_url()?>panel/assets/vendor/countdowntime/moment-timezone.min.js"></script>
<script src="<?= base_url()?>panel/assets/vendor/countdowntime/moment-timezone-with-data.min.js"></script>
<script src="<?= base_url()?>panel/assets/vendor/countdowntime/countdowntime.js"></script>
<script src="<?= base_url()?>panel/assets/vendor/izitoast/js/iziToast.min.js"></script>
	<script>
		$('.cd100').countdown100({
			/*Set Endtime here*/
			/*Endtime must be > current time*/
			endtimeMonth: <?= $diff->m ?>,
			endtimeDate: <?= $diff->d ?>,
			endtimeHours: <?= $diff->h ?>,
			endtimeMinutes: <?= $diff->i ?>,
			endtimeSeconds: <?= $diff->s ?>,
			timeZone: ""
			// ex:  timeZone: "America/New_York"
			//go to " http://momentjs.com/timezone/ " to get timezone
		});
	</script>
	<!--===============================================================================================-->