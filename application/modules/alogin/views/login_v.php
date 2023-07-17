<br>
<br>
<main id="main">
  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact section-bg">
    <div class="container">

      <div class="section-title">
        <h2>LOGIN PPDB</h2>
        <b class="text-primary">PENDAFTRAN PESERTA DIDIDK BARU (PPDB)</b>
        <!-- <p>Mendidik siswa menjadi manusia yang takut akan Tuhan, berguna bagi sesama dan berpengetahuan tinggi berdasarkan nilai-nilai Kristiani.</p> -->
      </div>

      <div class="row">

        <div class="col-lg-8 mt-4 mt-lg-0">
          <div class="card">
            <div class="card-header">
              <h5>FORM LOGIN PPDB</h5>
            </div>
            <?= $this->session->flashdata('message'); ?>
            <form method="post" action="<?= base_url('login'); ?>">
              <div class="card-body">

                <div class="form-group col-lg-6">
                  <label for="username">Masukan No Pendaftaran</label>
                  <input type="text" class="form-control form-control-user" id="no_daftar" name="no_daftar" placeholder="No Pendaftaran" value="<?= set_value('no_daftar'); ?>">
                  <?= form_error('no_daftar', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group col-lg-6">
                  <label for="inputPassword4">Masukan Password</label>
                  <input type="password" placeholder="Password" class="form-control" id="password" name="password" />
                  <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="card-body text-danger">
                  &nbsp * Masukan sesuai username dan password yang diberikan<br>
                  &nbsp * Jika belum dapat password silahkan hubungi panitia
                </div>

              </div>
              <div class="card-footer">
                <button id='btnsimpan' type="submit" class="btn btn-primary">LOGIN</button>
              </div>

            </form>
          </div>
        </div>

        <div class="col-lg-4 mt-4 mt-lg-0">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Info Lebih Lanjut</h5>
            </div>
            <section id="features" class="features">
              <div class="container">
                <?php foreach ($kontak as $k) :?>               
                  <div class="icon-box">
                    <img class="img-profile rounded-circle" style="width: 3rem;" src="<?= base_url() ?>assets/img/avatar/avatar-1.png">
                    <div>
                      <small style="font-size: 11px">
                        &nbsp<?= $k['nama_kontak'] ?><br>
                        &nbsp<a target="_blank" href="https://api.whatsapp.com/send?phone=+62<?= $k['no_kontak'] ?>&text=<?= $sekolah['livechat'] ?>" class="alert-link"><?= $k['no_kontak'] ?></a>
                      </small>
                    </div>
                  </div>
                <?php endforeach ?>
              </div>
            </section>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- End Contact Section -->

</main><!-- End #main -->