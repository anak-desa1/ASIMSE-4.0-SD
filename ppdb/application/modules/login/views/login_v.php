<section id="about" class="d-flex flex-column justify-content-center">
  <div class="container" data-aos="zoom-in" data-aos-delay="100">

      <div class="section-title">
        <h2>FORM LOGIN</h2>
        <p>PPDB(<span class="typed" data-typed-items="Penerimaan Peserta Didik Baru"></span>)</p>       
      </div>

      <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

      <div class="row mt-1">

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
                    * Masukan sesuai username dan password yang sudah di buat pada saat pendaftaran, jika lupa password bisa menghubungi nomor di samping.
                  <!--&nbsp * Masukan sesuai username dan password yang diberikan<br>-->
                  <!--&nbsp * Jika belum dapat password silahkan hubungi panitia-->
                </div>

              </div>
              <div class="card-footer">
                <button id='btnsimpan' type="submit" class="btn btn-primary">LOGIN</button>
              </div>

            </form>
          </div>
        </div>

        <!-- Info Lebih Lanjut -->        
        <div class="col-lg-4">
            <div class="info">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">Info Lebih Lanjut</h5>
                </div>
              
                <div class="container" data-aos="fade-up">               
                    <div class="phone">
                    <?php foreach ($kontak as $k) :
                      $opsi = $this->db->get_where('m_sekolah')->row_array(); ?>
                      <i class=""><a target="_blank" href="https://api.whatsapp.com/send?phone=+62<?= $k['no_kontak'] ?>&text=Hello... , <?= $opsi['nama_sekolah'] ?> <?= $sekolah['livechat'] ?>" class="alert-link"><img class="img-profile rounded-circle" style="width: 3rem;" src="<?= base_url() ?>assets/img/avatar/WA_group.png"></a></i>
                      <h4>CONTACT:</h4>
                      <p>&nbsp<?= $opsi['nama_sekolah'] ?></b><br>
                            &nbsp<?= $k['nama_kontak'] ?><br>
                            &nbsp<a target="_blank" href="https://api.whatsapp.com/send?phone=+62<?= $k['no_kontak'] ?>&text=Hello... , <?= $opsi['nama_sekolah'] ?> <?= $sekolah['livechat'] ?>" class="alert-link"><?= $k['no_kontak'] ?></a></p>
                      <br>
                      <?php endforeach ?>     
                    </div>                                            
                </div> 

              </div>
            </div> 
          </div>
          <!-- End Info Lebih Lanjut -->

      </div>
      
      </div>
      </section>

      
    </div>
  </section>
  <!-- End Contact Section -->

</main><!-- End #main -->