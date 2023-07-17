<section id="about" class="d-flex flex-column justify-content-center">
  <div class="container" data-aos="zoom-in" data-aos-delay="100">
      
        <div class="section-title">        
          <h2>INFORMASI PENDAFTARAN</h2>
          <p>PPDB(<span class="typed" data-typed-items="Penerimaan Peserta Didik Baru"></span>)</p>       
        </div>      
        <br>

      <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

      <div class="row mt-1">

          <div class="col-lg-8 mt-5 mt-lg-0">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">ADMNISTRASI PENDAFTARAN</h5>
              </div>
              <div class="card-body">
                <small style="font-size: 18px">
                  <?= htmlspecialchars_decode($sekolah['syarat']) ?>
                </small>          
              </div>   
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