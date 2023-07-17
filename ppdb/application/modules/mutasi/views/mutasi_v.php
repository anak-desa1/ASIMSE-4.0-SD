<br>
<br>
<main id="main">
  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact section-bg">
    <div class="container">

      <div class="section-title">
        <h2>FORM MUTASI (ISI DENGAN BENAR)</h2>
        <b class="text-primary">PENDAFTRAN SISWA MUTASI</b>
        <p>Mendidik siswa menjadi manusia yang takut akan Tuhan, berguna bagi sesama dan berpengetahuan tinggi berdasarkan nilai-nilai Kristiani.</p>
      </div>

      <div class="row">

        <div class="col-lg-8 mt-4 mt-lg-0">
          <div class="card">
            <?= $this->session->flashdata('message'); ?>
            <div class="card-header">
              <h5>FORM SISWA MUTASI</h5>
            </div>

            <div class="card-body">
              <small class="text-muted">
                <form action="<?= base_url() ?>mutasi" method="post">
                  <input type="hidden" name="status_siswa" id="" value="mutasi">
                  <input type="hidden" name="jenis" value="Siswa Mutasi">
                  <input type="hidden" name="periode" value="Siswa Mutasi">
                  <div class="row">
                    <div class="custom-control custom-checkbox col-lg-6 mt-3 mt-md-3">
                      <label for="exampleFormControlInput1" class="fst-italic text-red" style="color:red">KAMPUS/CABANG YANG DI TUJU*</label>
                      <select class="form-select" aria-label="Default select example" name="kd_campus" id="kampus" required>
                        <option value="" disabled selected>Pilih Kampus/Cabang</option>
                        <?php foreach ($kampus as $kam) : ?>
                          <option value="<?= $kam['kd_campus'] ?>"><?= $kam['nama_campus'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="custom-control custom-checkbox col-lg-6 mt-3 mt-md-3">
                      <label for="exampleFormControlInput1" class="fst-italic text-red" style="color:red">SEKOLAH YANG DI TUJU*</label>
                      <select class="form-select" aria-label="Default select example" name="kd_sekolah" id="sekolah" required>
                        <option value="">Pilih Kampus Dulu</option>

                      </select>
                    </div>
                  </div>

                  <div class="row">
                    <!-- <div class="custom-control custom-checkbox col-lg-6 mt-3 mt-md-3">
              <label for="exampleFormControlInput1" class="fst-italic text-red" style="color:red">JENIS PENDAFTARAN*</label>
              <select class="form-select" aria-label="Default select example" name="jenis" required>
                <option value="" disabled selected>Jenis Pendaftaran</option>
                <?php foreach ($jenis as $jenis) : ?>
                  <option value="<?= $jenis['nama_jenis'] ?>"><?= $jenis['nama_jenis'] ?></option>
                <?php endforeach ?>
              </select>
            </div> -->
                    <div class="custom-control custom-checkbox col-lg-6 mt-3 mt-md-3">
                      <label for="exampleFormControlInput1" class="fst-italic text-red" style="color:red">NIK* ( Nomor Induk Kependudukan Calon Siswa)</label>
                      <input type="text" minlength="16" maxlength="18" class="form-control" name="nik" placeholder="NIK" autocomplete="off" required>
                      <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group mt-3 mt-md-0">
                    <label for="exampleFormControlInput1" class="fst-italic text-red" style="color:red">NAMA LENGKAP CALON SISWA*</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" autocomplete="off" required>
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>

                  <div class="row">
                    <div class="custom-control custom-checkbox col-lg-4 mt-3 mt-md-3">
                      <label for="exampleFormControlInput1" class="fst-italic text-red" style="color:red">KELAS MASUK*</label>
                      <select class="form-select" aria-label="Default select example" name="kelas" id="kelas" required>
                        <option value="">Pilih Sekolah Dulu</option>

                      </select>
                    </div>
                    <div class="custom-control custom-checkbox col-lg-8 mt-3 mt-md-3">
                      <label for="exampleFormControlInput1" class="fst-italic text-red" style="color:red">NO HANDPHONE* (diisi untuk info dan konfirmasi)</label>
                      <input type="text" minlength="10" maxlength="18" class="form-control" name="no_hp" placeholder="No HP Whatsapp" required>
                      <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="custom-control custom-checkbox col-lg-6 mt-3 mt-md-3">
                      <label for="exampleFormControlInput1" class="fst-italic text-red" style="color:red">ASAL SEKOLAH*</label>
                      <input type="text" class="form-control" name="asal_sekolah" placeholder="ketikan (siswa baru) untuk yang baru masuk sekolah" required>
                    </div>
                    <div class="custom-control custom-checkbox col-lg-6 mt-3 mt-md-3">
                      <label for="exampleFormControlInput1">ASAL GEREJA</label>
                      <input type="text" class="form-control" name="asal_gereja" placeholder="beri tanda (-) untuk yang non kristen">
                      </select>
                    </div>
                  </div>

                  <div class="row">
                    <div class="custom-control custom-checkbox col-lg-6 mt-3 mt-md-3">
                      <label for="exampleFormControlInput1" class="fst-italic text-red" style="color:red">TEMPAT LAHIR*</label>
                      <input type="text" class="form-control" name="tempat_lahir" required>
                      <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-3">
                      <label for="tgl_lahir" class="fst-italic text-red" style="color:red">TANGGAL LAHIR*</label>
                      <input type="date" class="form-control datepicker" name="tgl_lahir" required>
                    </div>
                  </div>

                  <div class="col-md-6 form-group mt-3 mt-md-3">
                    <label for="exampleFormControlInput1" class="fst-italic text-red" style="color:red">PASSWORD* (Mohon Diingat!)</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>

                  <a href="#" onclick="document.getElementById('captcha').src = 'securimage/securimage_show.php?' + Math.random(); return false">Refresh Kode</a>

                  <img class="p-b-5" id="captcha" src="securimage/securimage_show.php" alt="CAPTCHA Image" style="height:70px" /><br>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <input class="form-control" type="text" name="kodepengaman" placeholder="masukan kode" required>
                    </div>
                  </div>

                  <div class="card-body">
                    <small class="text-danger">
                      * HARAP ISIKAN DATA DENGAN BENAR<br>
                      * PASSWORD DIGUNAKAN UNTUK LOGIN
                    </small>
                  </div>

                  <br>
                  <div class="text-center"><button type="submit" class="btn btn-outline-primary">Simpan data</button></div>

                </form>
              </small>

            </div>
          </div>
        </div>

        <!-- Info Lebih Lanjut -->
        <div class="col-lg-4 mt-4 mt-lg-0">

          <div class="card">
            <div class="card-header">
              <h5>FORM LOGIN PSB</h5>
            </div>

            <form method="post" action="<?= base_url('login'); ?>">
              <div class="card-body">

                <div class="form-group col-lg-12">
                  <label for="username" class="fst-italic text-red" style="color:red">Masukan No Pendaftaran</label>
                  <input type="text" class="form-control form-control-user" id="no_daftar" name="no_daftar" placeholder="No Pendaftaran" value="<?= set_value('no_daftar'); ?>">
                  <?= form_error('no_daftar', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group col-lg-12">
                  <label for="inputPassword4" class="fst-italic text-red" style="color:red">Masukan Password</label>
                  <input type="password" placeholder="Password" class="form-control" id="password" name="password" />
                  <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <!-- <div class="card-body text-danger">
                  <p style="font-size: 0.70em;"> &nbsp * Masukan sesuai username dan password yang diberikan</p>
                  <br>
                  &nbsp * Jika belum dapat password silahkan hubungi panitia
                </div> -->

              </div>
              <div class="card-footer">
                <button id='btnsimpan' type="submit" class="btn btn-primary">LOGIN</button>
              </div>

            </form>
          </div>

          <br>

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
                      <a target="_blank" href="https://api.whatsapp.com/send?phone=+62<?= $k['no_kontak'] ?>&text=<?= $sekolah['livechat'] ?>" class="alert-link"><img class="img-profile rounded-circle" style="width: 3rem;" src="<?= base_url() ?>assets/img/avatar/WA_group.png"></a>
                    <div>
                      <small style="font-size: 11px">
                        <b>&nbsp<?= $opsi['nama_sekolah'] ?></b><br>
                        &nbsp<?= $k['nama_kontak'] ?><br>
                        &nbsp<a target="_blank" href="https://api.whatsapp.com/send?phone=+62<?= $k['no_kontak'] ?>&text=<?= $sekolah['livechat'] ?>" class="alert-link"><?= $k['no_kontak'] ?></a>
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