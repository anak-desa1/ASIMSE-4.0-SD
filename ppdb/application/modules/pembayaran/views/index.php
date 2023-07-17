<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>

<!-- Begin Page Content -->

<div class="content">

  <div class="row">

    <div class="col-md-12">

      <div class="card">



        <nav aria-label="breadcrumb" role="navigation">

          <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="#">Home</a></li>

            <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>

          </ol>

        </nav>



        <div class="row">

          <div class="col-md-12">



            <div class="card-header">

              <h5 class="title">Hai!, <?= $user['nama'] ?></h5>

              <p class="category">Informasi terbaru dari <a href=""><strong><?= $sekolah['nama_sekolah']; ?></strong></a></p>

            </div>



            <div class="card-body">

              <div class="content">



                <div class="row">

                  <div class="col-12">

                    <div class="card">

                      <div class="card-header">

                        <h4>Data biaya</h4>

                      </div>

                      <div class="card-body">

                        <div class="table-responsive">

                          <table class="" style="width:100%">

                            <thead>

                              <tr>

                                <th class="text-center"> # </th>

                                <th>Nama Biaya</th>

                                <th>Periode</th>

                                <th>Jumlah Biaya</th>

                              </tr>

                            </thead>

                            <tbody>

                              <?php

                              $jum = 0;

                              $no = 0;

                              foreach ($biaya as $bi)

                                if ($bi['jenis'] == $status) {

                                  $no++;

                              ?>

                                <tr>

                                  <td class="text-center"><?= $no; ?></td>

                                  <td><?= $bi['nama_biaya'] ?></td>

                                  <td><?= $bi['periode'] ?></td>

                                  <td>

                                    <?php

                                    $kd = $user['kd_sekolah'];

                                    $a = $bi['jumlah'] + $kd;

                                    echo "Rp " . number_format($a, 0, ",", ".");

                                    $jum = $kd * $no;

                                    ?>

                                  </td>

                                </tr>

                              <?php

                                }

                              ?>

                              <tr>

                                <td></td>

                                <td><b>Total Biaya</b></td>

                                <td></td>

                                <td> <?= "Rp " . number_format($total + $jum, 0, ",", ".")  ?></td>

                              </tr>

                            </tbody>

                          </table>

                        </div>

                      </div>

                    </div>

                  </div>

                </div>

                <div class="row">

                  <div class="col-12 col-sm-12 col-lg-12">

                    <div class="card author-box card-primary">

                      <div class="card-header">

                        <h4>DATA PEMBAYARAN</h4>

                        <div class="card-header-action">

                          <!-- Button trigger modal -->

                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modelId">

                            <i class="fas fa-info-circle"></i> Info Pembayaran

                          </button>



                          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahdata">

                            <i class="fas fa-plus-circle"></i> Tambah Bayar

                          </button>



                          <a target="_blank" href="<?= base_url() ?>pembayaran/cetak_pembayaran" class="btn btn-success btn-sm"><i class="fas fa-print"></i> Cetak</a>



                          <div class="col-lg-12">

                            <?php if ($this->session->flashdata()) : ?>

                              <div class="alert alert-warning alert-dismissible fade show" role="alert">

                                <strong><?= $this->session->flashdata('message'); ?>.</strong>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                                  <span aria-hidden="true">&times;</span>

                                </button>

                              </div>

                            <?php endif; ?>

                          </div>

                        </div>

                      </div>

                      <div class="tampil-modal"></div>

                      <div class="card-body">

                        <div class="table-responsive">

                          <table style="width:100%">

                            <thead>

                              <tr>

                                <th class="text-center">

                                  #

                                </th>

                                <th>Kode Transaksi</th>

                                <th>Nama Siswa</th>

                                <th>Jumlah Bayar</th>

                                <th>Tgl Bayar</th>

                                <th>verifikasi</th>

                                <th>Bukti</th>

                                <th>Action</th>

                              </tr>

                            </thead>

                            <tbody>

                              <?php

                              $no = 1;

                              foreach ($bayar as $br) {

                              ?>

                                <tr>

                                  <td><?= $no; ?></td>

                                  <td><?= $br['id_bayar'] ?></td>

                                  <td><?= $br['nama'] ?></td>

                                  <td><?= "Rp " . number_format($br['jumlah'], 0, ",", ".") ?></td>

                                  <td><?= $br['tgl_bayar'] ?></td>

                                  <td>

                                    <?php if ($br['verifikasi'] == 1) { ?>

                                      <span class="badge badge-success">Pembayaran diterima</span>

                                    <?php } else { ?>

                                      <span class="badge badge-warning">Proses Cek</span>

                                    <?php } ?>

                                  </td>

                                  <td>

                                    <?php if ($br['id_user'] == 0) { ?>

                                      <button type="button" class="btn btn-primary btn-sm btn-action" data-id="<?= $br['id_bayar'] ?>">

                                        <i class="fas fa-eye"></i> bukti

                                      </button>

                                    <?php } else {  ?>

                                      Sudah diterima oleh Admin

                                    <?php } ?>

                                  </td>

                                  <td>

                                    <?php if ($br['verifikasi'] == 0) { ?>

                                      <a class="hapus btn btn-danger btn-sm" href="<?= base_url() ?>pembayaran/hapus/<?= $br['id_bayar'] ?>" role="button"><i class="fas fa-trash"></i> Batal</a>

                                    <?php } else { ?>

                                      Terima Kasih

                                    <?php }

                                    ?>

                                  </td>

                                </tr>

                              <?php $no++;
                              }  ?>

                            </tbody>

                          </table>

                        </div>

                        <?php $sisa = ($total + $jum) - $total_bayar['total']; ?>

                        <table class="table table-sm table-striped mt-4" style="font-size:15px">

                          <tbody>

                            <tr>

                              <th scope="row" width="200">TOTAL PEMBAYARAN</th>

                              <td><?= "Rp " . number_format($total_bayar['total'], 0, ",", ".") ?></td>

                            </tr>

                            <tr>

                              <th scope="row">SISA BAYAR</th>

                              <td><?= "Rp " . number_format($sisa, 0, ",", ".") ?></td>

                            </tr>

                            <tr>

                              <th scope="row">STATUS</th>

                              <td>

                                <?php if ($sisa <= 0) { ?>

                                  <span class="badge badge-success">SUDAH LUNAS</span>

                                <?php } else { ?>

                                  <span class="badge badge-danger">BELUM LUNAS</span>

                                <?php } ?>

                              </td>

                            </tr>

                          </tbody>

                        </table>



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

  <!-- /.container-fluid -->



  <!-- Modal -->

  <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">

    <div class="modal-dialog" role="document">

      <div class="modal-content">

        <div class="modal-header">

          <h5 class="modal-title">Info Pembayaran</h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span>

          </button>

        </div>

        <div class="modal-body">

          <?= $sekolah['infobayar'] ?>

        </div>

        <div class="modal-footer">

          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>

      </div>

    </div>

  </div>



  <!-- Modal -->

  <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">

      <div class="modal-content">

        <div class="modal-header">

          <h5 class="modal-title">Tambah Pembayaran</h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span>

          </button>

        </div>

        <form action="<?= base_url() ?>pembayaran" method="post" enctype='multipart/form-data'>

          <div class="modal-body">

            <input type="hidden" name="id" value="<?= $siswa['id_daftar'] ?>">

            <input type="hidden" name="periode" value="<?= $siswa['periode'] ?>">

            <div class="form-group">

              <label for="bukti">Pembayaran</label>

              <select class="form-control form-control-lg" name="keterangan" id="keterangan" required>

                <option value="" disabled selected>Pilih Pembayaran</option>

                <?php foreach ($biaya as $biaya) : ?>

                  <option value="<?= $biaya['nama_biaya'] ?>"><?= $biaya['nama_biaya'] ?></option>

                <?php endforeach ?>

              </select>

            </div>

            <div class="form-group">

              <label for="bukti">Metode Pembayaran</label>

              <select class="form-control form-control-lg" name="bank" id="bank" required>

                <option value="">Pilih Metode Pembayaran</option>

                <?php foreach ($bank as $b) : ?>

                  <option value="<?= $b['nama_bank'] ?>"><?= $b['nama_bank'] ?></option>

                <?php endforeach ?>

              </select>

            </div>

            <div class="form-group">

              <label for="jumlah">

                Jumlah pembayaran harus sesuai dengan yang tertera di Data biaya ! <br><br>

                contoh pembayaran : <br>

                Biaya Formulir Rp.100.000,

                Menjadi 100000 <br>

                untuk input biaya tidak perlu menggunakan titik (.) atau koma (,)</label>

              <input type="text" class="form-control uang" name="jumlah" id="jumlah" aria-describedby="helpjumlah" required>

            </div>

            <div class="form-group">

              <label for="tgl">Tanggal Pembayaran</label>

              <input type="date" class="form-control datepicker" name="tgl" id="tgl" required>

            </div>

            <div class="form-group">

              <label for="bukti">Bukti Pembayaran</label>

              <div class="custom-file">

                <input type="file" class="form-control custom-file-input" id="bukti" name="bukti">

                <label class="custom-file-label" for="bukti">Choose file</label>

              </div>

              <small class="form-text text-muted">Upload file JPG/PNG</small>

            </div>

          </div>

          <div class="modal-footer">

            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            <button type="submit" class="btn btn-primary">Save</button>

          </div>

        </form>

      </div>

    </div>

  </div>