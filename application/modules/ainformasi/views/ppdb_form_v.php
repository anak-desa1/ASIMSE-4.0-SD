<!-- iCheck -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">

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

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">

      <div class="section-title">
        <h2>FORM REGISTRASI (ISI DENGAN BENAR)</h2>
        <b class="text-primary">PENDAFTARAN PESERTA DIDIK BARU (PPDB)</b>
      </div>

      <div class="row">

        <div class="col-lg-8 mt-4 mt-lg-0">
          <div class="card">
            <div class="card-header">
              <h3>---</h3>
            </div>
            <?php if ($periode_aktif['status'] == 'Aktif') { ?>
              <div class="card-body">
                <div class="activities">

                  <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Form Registrasi</button>
                      <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Data Register</button>
                      <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Info PPDB</button>
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
                              <form action="<?= base_url() ?>ainformasi/ppdb" method="post">
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
                                    <input type="text" minlength="10" maxlength="18" class="form-control" name="no_hp" placeholder="No HP Whatsapp">
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

                                <img class="p-b-5" id="captcha" src="<?= base_url() ?>website/securimage/securimage_show.php" alt="CAPTCHA Image" style="height:70px" /><br>
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

                </div>
              </div>
            <?php } else { ?>
              <div class="card">
                <div class="card-body">
                <h1>
                  PENDAFTARAN <br>
                  SISWA BARU (PSB) <br>
                  MASIH DI TUTUP !!!
                </h1>
                </div>
              </div>
              
            <?php } ?>

          </div>
        </div>

        <!-- Info Lebih Lanjut -->
        <div class="col-lg-4 mt-4 mt-lg-0">

          <div class="card">
            <div class="card-header">
              <h5>LOGIN PPDB</h5>
            </div>
            <!-- <?= $this->session->flashdata('message'); ?> -->
            <form method="post" action="<?= base_url('alogin'); ?>">
              <div class="card-body">

                <div class="form-group col-lg-12">
                  <label for="username">Masukan No Pendaftaran</label>
                  <input type="text" class="form-control form-control-user" id="no_daftar" name="no_daftar" placeholder="No Pendaftaran" value="<?= set_value('no_daftar'); ?>">
                  <?= form_error('no_daftar', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group col-lg-12">
                  <label for="inputPassword4">Masukan Password</label>
                  <input type="password" placeholder="Password" class="form-control" id="password" name="password" />
                  <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

              </div>
              <div class="card-footer">
                <button id='btnsimpan' type="submit" class="btn btn-primary">LOGIN</button>
              </div>

            </form>
          </div>
          <br>

          <div class="card">
            <div class="card-header">
              <h6 class="card-title">Info Lebih Lanjut<h6>
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
        <!-- End Info Lebih Lanjut -->

      </div>


    </div>
  </section>
  <!-- End Contact Section -->

</main><!-- End #main -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<!-- SweetAlert2 -->
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
  //set default swal sweet alert..
  $(document).ready(function() {
    $('#example').DataTable();
  });
</script>