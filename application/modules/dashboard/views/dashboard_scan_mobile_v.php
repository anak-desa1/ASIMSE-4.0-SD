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
          <div class="col-xxl-4 col-xl-4">

            <div class="card info-card customers-card">

              <div class="card-body">
                <h5 class="card-title">Profil <span>| Sekolah</span></h5>

                   <div class="d-flex align-items-center">
                  <div class="container">
                    <div class="row">
                      <div class="col-6" style="font-size: 10px;">Nama</div>
                      <div class="col-6" style="font-size: 10px;">: <?= $sekolah['nama_sekolah'] ?></div>
                    </div>
                    <div class="row">
                      <div class="col-6" style="font-size: 10px;">NPSN</div>
                      <div class="col-6" style="font-size: 10px;">: <?= $sekolah['npsn'] ?></div>
                    </div>
                    <div class="row">
                      <div class="col-6" style="font-size: 10px;">Alamat</div>
                      <div class="col-6" style="font-size: 10px;">: <?= $sekolah['alamat'] ?></div>
                    </div>
                    <div class="row">
                      <div class="col-6" style="font-size: 10px;">Kode Pos</div>
                      <div class="col-6" style="font-size: 10px;">: <?= $sekolah['kodepos'] ?></div>
                    </div>
                    <div class="row">
                      <div class="col-6" style="font-size: 10px;">Kecamatan/Kota (LN)</div>
                      <div class="col-6" style="font-size: 10px;">: <?= $sekolah['kecamatan'] ?></div>
                    </div>
                    <div class="row">
                      <div class="col-6" style="font-size: 10px;">Kab.-Kota/Negara (LN)</div>
                      <div class="col-6" style="font-size: 10px;">: <?= $sekolah['kota'] ?></div>
                    </div>
                    <div class="row">
                      <div class="col-6" style="font-size: 10px;">Propinsi/Luar Negeri (LN)</div>
                      <div class="col-6" style="font-size: 10px;">: <?= $sekolah['provinsi'] ?></div>
                    </div>
                  </div>
                </div>

              </div>
            </div>

          </div><!-- End Customers Card -->

          <!-- Customers Card -->
          <div class="col-xxl-3 col-xl-3">

            <div class="card info-card customers-card">

              <div class="card-body">
                <h5 class="card-title">Scan <span>| QRCode</span></h5>
                <div class="d-flex align-items-center">

                    <div class='box-body'>
                                <div>
                                    <a class="btn btn-outline-primary" id="startButton">Start</a>
                                    <a class="btn btn-outline-secondary" id="resetButton">Reset</a>
                                </div>
                                <?php
                                if (function_exists('date_default_timezone_set'))
                                    date_default_timezone_set('Asia/Jakarta');
                                ?>
                                <?php
                                $attributes = array('id' => 'button');
                                echo form_open('siswa_qrcode/scan/cek_id', $attributes); ?>
                                <div id="sourceSelectPanel" style="display:none">
                                    <label for="sourceSelect">Change video source:</label>
                                    <select id="sourceSelect" style="max-width:400px"></select>
                                </div>
                                <div>
                                    <video id="video" width="100%" height="100%" style="border: 1px solid gray"></video>
                                </div>
                                <textarea hidden="" name="nik" id="result" readonly></textarea>
                                <span> <input type="submit" id="button" class="btn btn-success btn-md" value="Cek Kehadiran"></span>
                                <?php echo form_close(); ?>
                            </div>

                </div>
              </div>
            </div>

          </div><!-- End Customers Card -->

          <!-- Customers Card -->
          <div class="col-xxl-3 col-xl-3">

            <div class="col-xxl-3 col-xl-3">

            <div class="card info-card customers-card">

              <div class="card-body">
                <h5 class="card-title">Kepala <span>| Sekolah</span></h5>
                <div class="d-flex align-items-center">
                  <div class="row">
                    <img src="<?= base_url() ?>panel/dist/upload/logo/<?= $kepsek['foto'] ?>" class="img-profile" style="width: 8rem;" alt="">
                    <span class="" style="font-size: 12px;"><?= $kepsek['nama_kepsek'] ?> </span>
                    <p class="" style="font-size: 12px;">Kepala <?= $sekolah['nama_sekolah'] ?></p>
                  </div>
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

              <div class="card-body">
                <h5 class="card-title">Total <span>| Diterima</span></h5>

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

              <div class="card-body">
                <h5 class="card-title">Total <span>| Cadangan</span></h5>

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

              <div class="card-body">
                <h5 class="card-title">Total <span>| Pendaftar</span></h5>

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

              <div class="card-body">
                <h5 class="card-title">Kuota <span>| Pendaftaran</span></h5>

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

              <div class="card-body">
                <h5 class="card-title">Daftar <span>| Ulang</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <?php foreach ($diterima as $d1) { ?>
                      <h6><?= $d1['total'] ?></h6>
                    <?php } ?>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Diterima Card -->

          <!-- Cadangan Card -->
          <div class="col-xxl-3 col-md-3">
            <div class="card info-card customers-card">

              <div class="card-body">
                <h5 class="card-title">Data <span>| Transaksi</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-bookmark-star"></i>
                  </div>
                  <div class="ps-3">
                    <?php foreach ($transakasi as $t1) { ?>
                      <h6> <?= $t1['total'] ?></h6>
                    <?php } ?>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Cadangan Card -->

          <!-- Pendaftar Card -->
          <div class="col-xxl-3 col-md-3">
            <div class="card info-card revenue-card">

              <div class="card-body">
                <h5 class="card-title">Data <span>| Asal Sekolah</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-shop"></i>
                  </div>
                  <div class="ps-3">
                    <?php foreach ($jml_sekolah as $s1) { ?>
                      <h6> <?= $s1['total'] ?></h6>
                    <?php } ?>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Pendaftar Card -->

          <!-- Kuota Card -->
          <div class="col-xxl-3 col-md-3">
            <div class="card info-card revenue-card">

              <div class="card-body">
                <h5 class="card-title">Online <span>| Users</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person-lines-fill"></i>
                  </div>
                  <div class="ps-3">
                    <?php foreach ($online as $o1) { ?>
                      <h6> <?= $o1['total'] ?></h6>
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

<script type="text/javascript" src="<?php echo base_url() ?>panel/plugins/zxing/zxing.min.js"></script>
<script type="text/javascript">
  window.addEventListener('load', function() {
    let selectedDeviceId;
    let audio = new Audio("<?= base_url() ?>panel/assets/audio/beep.mp3");
    const codeReader = new ZXing.BrowserQRCodeReader()
    console.log('ZXing code reader initialized')
    codeReader.getVideoInputDevices()
      .then((videoInputDevices) => {
        const sourceSelect = document.getElementById('sourceSelect')
        selectedDeviceId = videoInputDevices[0].deviceId
        if (videoInputDevices.length >= 1) {
          videoInputDevices.forEach((element) => {
            const sourceOption = document.createElement('option')
            sourceOption.text = element.label
            sourceOption.value = element.deviceId
            sourceSelect.appendChild(sourceOption)
          })
          sourceSelect.onchange = () => {
            selectedDeviceId = sourceSelect.value;
          };
          const sourceSelectPanel = document.getElementById('sourceSelectPanel')
          sourceSelectPanel.style.display = 'block'
        }

        document.getElementById('startButton').addEventListener('click', () => {
          codeReader.decodeFromVideoDevice(selectedDeviceId, 'video', (result, err) => {
            if (result) {
              console.log(result)
              document.getElementById('result').textContent = result.text
              if (result != null) {
                audio.play();
              }
              $('#button').submit();
            }
            if (err && !(err instanceof ZXing.NotFoundException)) {
              console.error(err)
              document.getElementById('result').textContent = err
            }
          }).catch((err) => {
            console.error(err)
            document.getElementById('result').textContent = err
          })
          console.log(`Started continous decode from camera with id ${selectedDeviceId}`)
        })

        document.getElementById('resetButton').addEventListener('click', () => {
          codeReader.reset()
          document.getElementById('result').textContent = '';
          console.log('Reset.')
        })

      })
      .catch((err) => {
        console.error(err)
      })
  })
</script>