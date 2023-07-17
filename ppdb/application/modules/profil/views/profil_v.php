<br>
<br>
<main id="main">
  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact section-bg">
    <div class="container">

      <div class="section-title">
        <h2>PROFIL YAYASAN/SEKOLAH </h2>
        <p>Mendidik siswa menjadi manusia yang takut akan Tuhan, berguna bagi sesama dan berpengetahuan tinggi berdasarkan nilai-nilai Kristiani.</p>
      </div>

      <div class="row">

        <div class="col-lg-8 mt-4 mt-lg-0">

          <div class="card">
            <div class="card-body">
              <div class="card-responsive">
                <form action="" id="form-sekolah">
                  <div class="row">
                    <div class="col-lg-8 mt-4 mt-lg-0">
                      <div class="dropdown bootstrap-select">
                        <select class="form-control select2" style="width: 100%;" name="sekolah_id" id="sekolah_id" required>
                          <option>-- Pilih Sekolah--</option>
                          <?php
                          foreach ($sekolah as $sekolah) {
                            echo "<option value=" . $sekolah['sekolah_id'] . ">" . $sekolah['nama_sekolah'] . "</option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-4 mt-4 mt-lg-0">
                      <button type="submit" class="btn btn-primary">Tampil Profil Sekolah</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <p class="fst-italic text-red" style="color:red">* Untuk menampilkan profil sekolah -> Pilih Sekolah -> Klik Tampil Profil Sekolah</p>
            </div>
          </div>

          <div class="col-md-4 form-group"><br></div>
          <div class="card" id="sekolah">

            <div class="card-header">
              <h5 class="card-title">PROFIL YAYASAN </h5>
            </div>
            <div class="card-body">
              <div class="activities">

                <div class="activity">
                  <div class="activity-detail">
                    <div class="container">
                      <div class="row">
                        <div class="col-6">Nama</div>
                        <div class="col-6">: <?= $yayasan['nama_yayasan'] ?> </div>
                      </div>
                      <div class="row">
                        <div class="col-6">NPYP/NPSN</div>
                        <div class="col-6">: <?= $yayasan['npyp'] ?> </div>
                      </div>
                      <div class="row">
                        <div class="col-6">Alamat</div>
                        <div class="col-6">: <?= $yayasan['alamat'] ?> </div>
                      </div>
                      <div class="row">
                        <div class="col-6">Kode Pos</div>
                        <div class="col-6">: <?= $yayasan['kodepos'] ?> </div>
                      </div>
                      <div class="row">
                        <div class="col-6">Kecamatan/Kota (LN)</div>
                        <div class="col-6">: <?= $yayasan['kecamatan'] ?> </div>
                      </div>
                      <div class="row">
                        <div class="col-6">Kab.-Kota/Negara (LN)</div>
                        <div class="col-6">: <?= $yayasan['kota'] ?> </div>
                      </div>
                      <div class="row">
                        <div class="col-6">Propinsi/Luar Negeri (LN)</div>
                        <div class="col-6">: <?= $yayasan['provinsi'] ?> </div>
                      </div>
                      <div class="row">
                        <div class="col-6">No. Pendirian Yayasan</div>
                        <div class="col-6">: <?= $yayasan['no_pendirian'] ?> </div>
                      </div>
                      <div class="row">
                        <div class="col-6">Tgl Pendirian Yayasan</div>
                        <div class="col-6">: <?= $yayasan['tgl_pendirian'] ?> </div>
                      </div>
                      <div class="row">
                        <div class="col-6">No. Pengesahan PN LN</div>
                        <div class="col-6">: <?= $yayasan['no_pengesahan'] ?></div>
                      </div>
                      <div class="row">
                        <div class="col-6">No. SK Pengesahan Badan Hukum Menkumham</div>
                        <div class="col-6">: <?= $yayasan['no_sk_pengesahan'] ?></div>
                      </div>
                      <div class="row">
                        <div class="col-6">Tgl SK Pengesahan Badan Hukum Menkumham</div>
                        <div class="col-6">: <?= $yayasan['tgl_sk_pengesahan'] ?> </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="card-header">
              <h5 class="card-title">VISI MISI </h5>
            </div>
            <div class="card-body">
              <div class="activities">

                <div class="activity">
                  <div class="activity-detail">
                    <div class="container">
                      <div class="col-12">
                        <p><?= $yayasan['visi_misi'] ?></p>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="card-header">
              <h5 class="card-title">MARS </h5>
            </div>
            <div class="card-body">
              <div class="activities">

                <div class="activity">
                  <div class="activity-detail">
                    <div class="container">
                      <div class="col-12">
                        <p><?= $yayasan['mars'] ?></p>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="card-header">
              <h5 class="card-title">LOGO </h5>
            </div>
            <div class="card-body">
              <div class="activities">
                <div class="activity">
                  <div class="activity-detail">
                    <!-- <img class="img-profile rounded-circle" style="width: 3rem;" src="<?= base_url() ?>assets/img/avatar/avatar-1.png"> -->
                    <p class="text-center"><img src="assets/img/upload/logo/<?= $yayasan['logo'] ?>" class="img-profile" style="width: 15rem;" /></p>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

        <!-- Info Lebih Lanjut -->
        <div class="col-lg-4 mt-4 mt-lg-0">
           <div class="card">
            <div class="card-header">
              <h5 class="card-title">Info Lebih Lanjut</h5>
            </div>
            <section id="features" class="features">
              <br>
              <div class="container">
                <?php foreach ($kontak as $k) :
                  $opsi = $this->db->get_where('l_sekolah', ['kd_sekolah' => $k['kd_sekolah']])->row_array(); ?>
                  <div class="icon-box text-dark bg-info badge rounded-pill bg-primary">
                      <a target="_blank" href="https://api.whatsapp.com/send?phone=+62<?= $k['no_kontak'] ?>&text=Hello... , <?= $opsi['nama_sekolah'] ?> <?= $sekolah['livechat'] ?>" class="alert-link"> <img class="img-profile rounded-circle" style="width: 3rem;" src="<?= base_url() ?>assets/img/avatar/WA_group.png"></a>
                    <div>
                      <small style="font-size: 11px">
                        <b>&nbsp<?= $opsi['nama_sekolah'] ?></b><br>
                        &nbsp<?= $k['nama_kontak'] ?><br>
                        &nbsp<a target="_blank" href="https://api.whatsapp.com/send?phone=+62<?= $k['no_kontak'] ?>&text=Hello... , <?= $opsi['nama_sekolah'] ?> <?= $sekolah['livechat'] ?>" class="alert-link"><?= $k['no_kontak'] ?></a>
                      </small>
                    </div>
                  </div>
                  <br>
                <?php endforeach ?>
              </div>
            </section>
          </div>
        </div>
        <!-- End Info Lebih Lanjut -->

      </div>
    </div>
  </section>
  <!-- End Contact Section -->

</main><!-- End #main -->