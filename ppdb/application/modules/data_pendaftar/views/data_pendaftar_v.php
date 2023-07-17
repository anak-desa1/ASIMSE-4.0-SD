<br>
<br>
<main id="main">
  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact section-bg">
    <div class="container">

      <div class="section-title">
        <h2>DATA REGISTER</h2>
        <b class="text-primary">PENDAFTARAN SISWA BARU (PSB)</b>
        <p>Mendidik siswa menjadi manusia yang takut akan Tuhan, berguna bagi sesama dan berpengetahuan tinggi berdasarkan nilai-nilai Kristiani.</p>
      </div>

      <div class="row">

        <div class="col-lg-8 mt-4 mt-lg-0">
          <div class="card">
            <div class="tampil-modal"></div>
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
                                            <img class="img-profile rounded-circle" style="width: 3rem;" src="<?= base_url() ?>assets/img/avatar/WA_group.png">
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