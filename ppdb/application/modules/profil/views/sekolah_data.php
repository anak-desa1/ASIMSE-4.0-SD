  <?php foreach ($sekolah as $sekolah) : ?>
      <div class="card-header">
          <h5 class="card-title">PROFIL SEKOLAH </h5>
      </div>
      <div class="card-body">
          <div class="activities">


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
                          <!-- <div class="row">
                              <div class="col-4">Desa/Kelurahan</div>
                              <div class="col-8">: <?= $sekolah['desa'] ?></div>
                          </div> -->
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
                              <div class="col-7">: SWASTA</div>
                          </div>
                          <div class="row">
                              <div class="col-5">Waktu Penyelenggaraan </div>
                              <div class="col-7">: Sehari Penuh/5 hari </div>
                          </div>
                      </div>
                  </div>
              </div>
              
          </div>
      </div>
     
    <div class="card-header">
        <h5 class="card-title">AKREDITASI SEKOLAH </h5>
    </div>
    <div class="card-body">
        <div class="activities">

            <div class="activity">
                <div class="activity-detail">
                    <?php if ($sekolah['akreditasi'] == '') { ?>
                        <p class="text-center"> Tidak Ada Akreditasi </p>
                    <?php } else { ?>
                        <p class="text-center"><img src="<?= base_url('assets/'); ?>img/upload/logo/<?= $sekolah['akreditasi'] ?>" class="img-fluid" /></p>
                    <?php } ?>
                </div>
            </div>

        </div>
    </div>
  <?php endforeach ?>
  
   