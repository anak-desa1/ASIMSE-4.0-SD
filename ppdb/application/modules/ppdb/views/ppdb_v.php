<section id="about" class="d-flex flex-column justify-content-center">
  <div class="container" data-aos="zoom-in" data-aos-delay="100"> 

      <div class="section-title">        
        <h2>FORM REGISTRASI (ISI DENGAN BENAR)</h2>
        <p>PPDB(<span class="typed" data-typed-items="Penerimaan Peserta Didik Baru"></span>)</p>       
      </div>      

      <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">
        
        <div class="row mt-1">             
          <div class="col-lg-8 mt-5 mt-lg-0">
              <?php if ($periode_aktif['status'] == 'Aktif') { ?>
              <div class="card">
                <div class="card-body">
                  <div class="card-responsive">  
                  <div class="col-md-12 form-group"><br></div>
                  <div class="card-body">
                <div class="activities">

                  <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Form Registrasi</button>
                      <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Data Register</button>
                      <!-- <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Info PPDB</button> -->
                    </div>
                  </nav>

                  <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                      <div class="col-lg-12 mt-4 mt-lg-0">
                        <br>
                        <div class="row">
                          <div class="col-lg-12">
                            <?= $this->session->flashdata('message'); ?>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-body">

                            <small class="text-muted">
                              <form action="<?= base_url() ?>ppdb" method="post">
                                <div class="row">
                                  <div class="custom-control custom-checkbox col-lg-6 mt-3 mt-md-3">
                                    <label for="exampleFormControlInput1">JENIS PENDAFTARAN*</label>
                                    <select class="form-select" aria-label="Default select example" name="jenis" required>
                                      <option value="" disabled selected>Jenis Pendaftaran</option>
                                      <?php foreach ($jenis as $jenis) : ?>
                                        <option value="<?= $jenis['nama_jenis'] ?>"><?= $jenis['nama_jenis'] ?></option>
                                      <?php endforeach ?>
                                    </select>
                                  </div>
                                  <div class="custom-control custom-checkbox col-lg-6 mt-3 mt-md-3">
                                    <label for="exampleFormControlInput1">NIK* ( Nomor Induk Kependudukan )</label>
                                    <input type="text" minlength="16" maxlength="18" class="form-control" name="nik" placeholder="NIK" autocomplete="off" required>
                                    <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                                  </div>
                                </div>

                                <div class="form-group mt-3 mt-md-0">
                                  <label for="exampleFormControlInput1">NAMA LENGKAP*</label>
                                  <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" autocomplete="off" required>
                                  <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="row">
                                  <div class="custom-control custom-checkbox col-lg-4 mt-3 mt-md-3">
                                    <label for="exampleFormControlInput1">PERIODE*</label>
                                    <select class="form-select" aria-label="Default select example" name="periode" required>
                                      <option value="" disabled selected>Pilih Periode</option>
                                      <?php foreach ($periode as $periode) : ?>
                                        <option value="<?= $periode['periode'] ?>"><?= $periode['periode'] ?></option>
                                      <?php endforeach ?>
                                    </select>
                                  </div>
                                  <div class="custom-control custom-checkbox col-lg-8 mt-3 mt-md-3">
                                    <label for="exampleFormControlInput1">NO HANDPHONE* (diisi untuk info dan konfirmasi)</label>
                                    <input type="text" class="form-control" minlength="10" maxlength="18" name="no_hp" placeholder="No HP Whatsapp" required>
                                    <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="custom-control custom-checkbox col-lg-4 mt-3 mt-md-3">
                                    <label for="exampleFormControlInput1">KELAS MASUK*</label>
                                    <select class="form-select" aria-label="Default select example" name="kelas" id="kelas" required>
                                      <option value="">Pilih Kelas</option>
                                      <?php foreach ($kelas as $ke) : ?>
                                        <option value="<?= $ke['kelas'] ?>"><?= $ke['kelas'] ?></option>
                                      <?php endforeach ?>
                                    </select>
                                  </div>
                                  <div class="custom-control custom-checkbox col-lg-8 mt-3 mt-md-3">
                                    <label for="exampleFormControlInput1">ASAL SEKOLAH*</label>
                                    <select class="form-select" aria-label="Default select example" name="npsn" required>
                                      <option value="" disabled selected>Pilih Asal Sekolah</option>
                                      <?php foreach ($asal_sekolah as $se) : ?>
                                        <option value="<?= $se['npsn'] ?>"><?= $se['nama_sekolah'] ?></option>
                                      <?php endforeach ?>
                                      <!-- <option value="Lainnya">Lainnya</option> -->
                                    </select>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="custom-control custom-checkbox col-lg-6 mt-3 mt-md-3">
                                    <label for="exampleFormControlInput1">TEMPAT LAHIR*</label>
                                    <input type="text" class="form-control" name="tempat_lahir" required>
                                    <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                  </div>
                                  <div class="col-md-6 form-group mt-3 mt-md-3">
                                    <label for="tgl_lahir">TANGGAL LAHIR*</label>
                                    <input type="date" class="form-control datepicker" name="tgl_lahir" required>
                                  </div>
                                </div>

                                <div class="col-md-6 form-group mt-3 mt-md-3">
                                  <label for="exampleFormControlInput1">PASSWORD* (Mohon Diingat!)</label>
                                  <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                  <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <a href="#" onclick="document.getElementById('captcha').src = 'securimage/securimage_show.php?' + Math.random(); return false">Refresh Kode</a>

                                <img class="p-b-5" id="captcha" src="<?= base_url() ?>assets/securimage/securimage_show.php" alt="CAPTCHA Image" style="height:70px" /><br>
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

                    </div>

                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                      <div class="col-lg-12 mt-4 mt-lg-0">
                        <div class="card">
                          <div class="card-body">

                            <div class="table-responsive">
                              <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>NO REG</th>
                                    <th>Nama Lengkap</th>
                                    <th>Asal Sekolah</th>
                                    <th>Status</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $no = 1;

                                  foreach ($pendaftar as $p) : ?>
                                    <tr>
                                      <td><?= $no; ?></td>
                                      <td><?= $p['no_daftar'] ?></td>
                                      <td><?= $p['nama'] ?></td>
                                      <td><?= $p['asal_sekolah'] ?></td>
                                      <td>
                                        <?php if ($p['status'] == 1) { ?>
                                          <span class="text-success">Sudah Diterima</span>
                                        <?php } elseif ($p['status'] == 2) { ?>
                                          <span class="text-danger">Cadang </span>
                                        <?php } else { ?>
                                          <span class="text-warning">Belum Daftar Ulang</span>
                                        <?php } ?>
                                      </td>
                                    </tr>
                                  <?php
                                    $no++;
                                  endforeach ?>
                                </tbody>
                                <tfoot>
                                  <tr>
                                    <th>#</th>
                                    <th>NO REG</th>
                                    <th>Nama Lengkap</th>
                                    <th>Asal Sekolah</th>
                                    <th>Status</th>
                                  </tr>
                                </tfoot>
                              </table>
                            </div>

                          </div>
                          <!-- /.card-body -->
                        </div>

                      </div>

                    </div>

                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                      <div class="card">
                        <div class="card-body">
                          <div class="activities">

                            <div class="activity">
                              <div class="activity-detail">
                               
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>

                  </div>

                </div>
              </div>                      
              </div>
              </div>
              </div>           
              <?php } else { ?>
              <div class="card">
                <div class="card-body">
                <h2>PPDB (Penerimaan Peserta Didik Baru) </h2>       
                <br>   
                <h2>MASIH DI TUTUP !!! </h2>
                </div>
              </div>
              <?php } ?>              
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
      <br>
      <!-- INFO KUOTA -->
      <?php if ($periode_aktif['status'] == 'Aktif') { ?>
      <div class="col-lg-12 mt-2 mt-lg-0">     
        <div class="card-header">
          <h5 class="card-title">INFO KUOTA</h5>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="card-responsive">
              <div class="row">
                <table class="table">
                  <thead>
                    <tr>
                      <!-- <th>Nama Sekolah</th> -->
                      <th>Kuota</th>
                      <th>Pendaftar</th>
                      <th>Sisa Kuota</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sisa_kuota = 0;
                    foreach ($jml_kuota as $ku) 
                    foreach ($jml_pend as $pen){
                      $sisa_kuota = $ku['total_kuota'] - $pen['total'];
                    ?>
                      <tr>
                        <td><?= $ku['total_kuota'] ?></td>
                        <td><?= $pen['total'] ?></td>
                        <td>
                          <?php if ($ku['total_kuota'] >= $pen['total']) { ?>
                            <?= $sisa_kuota ?>
                          <?php } else { ?>
                            Sudah Penuh
                          <?php } ?>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>   
      <?php } else { ?>
      <div class="card">
        <div class="card-body">
          <h2>PPDB (Penerimaan Peserta Didik Baru) </h2>       
          <br>   
          <h2>MASIH DI TUTUP !!! </h2>
        </div>
      </div>
      <?php } ?>                 
      <!-- End INFO KUOTA -->
      <br>
      <!-- Pengumuman -->
      <div class="col-lg-12 mt-2 mt-lg-0">
      <div class="card-header">
        <h5 class="card-title">Pengumuman</h5>
      </div>
      <div class="card">        
        <div class="card-body">
          <div class="activities">
            <div class="activity">
              <div class="activity-detail">
              <?php foreach ($pengumuman as $p) : ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                &nbsp<strong><?= $p['judul'] ?></strong>
                &nbsp<i class="fas fa-bullhorn"></i> <?= $p['tgl'] ?>
                &nbsp<p><?= $p['pengumuman'] ?></p>
              </div>
              <?php endforeach ?>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>      
      <!--End Pengumuman -->
      <br> 

    </div>
  </section>