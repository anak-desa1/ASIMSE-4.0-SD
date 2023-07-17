  <div class="col-12 col-sm-12 col-lg-12">
      <div class="card author-box card-primary">
          <div class="card-header">
              <div class="card-header-action text-rigth">
                  <?= $nama ?>
                  <!-- Button trigger modal -->
                  <span style="float: right">
                      <a target="_blank" href="<?= base_url() ?>ppdb_biaya/cetak_pembayaran/<?= $id_daftar ?>" class="btn btn-success mb-3"><i class="fas fa-print"></i> Cetak Kwitansi</a>
                  </span>
              </div>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-striped table-bordered table-sm ">
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
                            $no = 0;
                            $jum = 0;
                            foreach ($biaya as $bi) {
                                $no++;
                            ?>
                              <tr>
                                  <td class="f"><?= $no; ?></td>
                                  <td><?= $bi['nama_biaya'] ?></td>
                                  <td class="f"><?= $bi['periode'] ?></td>
                                  <td>
                                      <?php
                                        $a = $bi['jumlah'];
                                        echo "Rp " . number_format($a, 0, ",", ".");
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
                              <td> <?= "Rp " . number_format($total, 0, ",", ".")  ?></td>
                          </tr>
                      </tbody>
                  </table>
                  <br>
                  <table class="table table-striped table-bordered table-sm ">
                      <thead>
                          <tr>
                              <th class="text-center">
                                  #
                              </th>
                              <th>Kode Transaksi</th>
                              <th>Periode</th>
                              <th>Pembayaran</th>
                              <th>Jumlah Bayar</th>
                              <th>Tgl Bayar</th>
                              <th>Verifikasi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php

                            $no = 0;
                            foreach ($bayar as $b) {
                                $no++;
                            ?>
                              <tr>
                                  <td class="f"><?= $no; ?></td>
                                  <td class="f"><?= $b['id_bayar'] ?></td>
                                  <td class="f"><?= $b['periode'] ?></td>
                                  <td class="f"><?= $b['keterangan'] ?></td>
                                  <td><?= "Rp " . number_format($b['jumlah'], 0, ",", ".") ?></td>
                                  <td class="f"><?= $b['tgl_bayar'] ?></td>
                                  <td class="f">
                                      <?php if ($b['verifikasi'] == 1) { ?>
                                          <span class="badge badge-success">Pembayaran diterima</span>
                                      <?php } else { ?>
                                          <span class="badge badge-warning">Proses Cek</span>
                                      <?php } ?>
                                  </td>
                              </tr>
                          <?php }
                            ?>
                      </tbody>
                  </table>
                  <?php $sisa = ($total + $jum) - $total_bayar['total']; ?>
                  <br>
                  <table class="table table-striped table-bordered table-sm">
                      <tbody>
                          <tr>
                              <td class="f">TOTAL PEMBAYARAN</td>
                              <td class="f">
                                  <?= "Rp " . number_format($total_bayar['total'], 0, ",", ".") ?>
                              </td>
                          </tr>
                          <tr>
                              <td class="f"> SISA BAYAR</td>
                              <td class="f">
                                  <?= "Rp " . number_format($sisa, 0, ",", "."); ?>
                              </td>
                          </tr>
                          <tr>
                              <td class="f">STATUS</td>
                              <td class="f">
                                  <?php
                                    if ($sisa <= 0) { ?>
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