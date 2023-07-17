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
                                foreach ($biaya as $bi) {
                                  $no++;
                                ?>
                                 <tr>
                                   <td class="text-center"><?= $no; ?></td>
                                   <td><?= $bi['nama_biaya'] ?></td>
                                   <td><?= $bi['periode'] ?></td>
                                   <td>
                                     <?php
                                      $kd = $user['kd_sekolah'];
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

                           <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahdata">
                             <i class="fas fa-plus-circle"></i> Tambah Bayar
                           </button>

                           <a target="_blank" href="<?= base_url() ?>apembayaran/cetak_pembayaran" class="btn btn-success btn-sm"><i class="fas fa-print"></i> Cetak</a>

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
                       <div class="card-body">
                         <!-- Modal -->
                         <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                           <div class="modal-dialog" role="document">
                             <div class="modal-content">
                               <div class="modal-header">
                                 <h5 class="modal-title">Tambah Pembayaran</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                                 </button>
                               </div>
                               <form action="<?= base_url() ?>apembayaran" method="post" enctype='multipart/form-data'>
                                 <div class="modal-body">
                                   <input type="hidden" name="id" value="<?= $siswa['id_daftar'] ?>">
                                   <input type="hidden" name="periode" value="<?= $siswa['periode'] ?>">
                                   <div class="mb-3">
                                     <label for="bukti">Pembayaran</label>
                                     <select class="form-control select2" aria-label="Default select example" name="keterangan" id="keterangan" required>
                                       <option value="" disabled selected>Pilih Pembayaran</option>
                                       <?php foreach ($biaya as $biaya) : ?>
                                         <option value="<?= $biaya['nama_biaya'] ?>"><?= $biaya['nama_biaya'] ?></option>
                                       <?php endforeach ?>
                                     </select>
                                   </div>
                                   <div class="mb-3">
                                     <label for="bukti">Metode Pembayaran</label>
                                     <select class="form-control select2" style="width: 100%" name="bank" id="bank" required>
                                       <option value="">Pilih Metode Pembayaran</option>
                                       <?php foreach ($bank as $b) : ?>
                                         <option value="<?= $b['nama_bank'] ?>"><?= $b['nama_bank'] ?></option>
                                       <?php endforeach ?>
                                     </select>
                                   </div>
                                   <div class="mb-3">
                                     <label for="jumlah">Jumlah Pembayaran dan Tidabah Kode Belakang Rp. ( contoh : 200000 )</label>
                                     <input type="text" class="form-control uang" name="jumlah" id="jumlah" aria-describedby="helpjumlah" required>
                                   </div>
                                   <div class="mb-3">
                                     <label for="tgl">Tanggal Pembayaran</label>
                                     <input type="date" class="form-control datepicker" name="tgl" id="tgl" required>
                                   </div>
                                   <div class="mb-3">
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

                         <div class="table-responsive">
                           <table id="example" class="table table-striped table-bordered" style="width:100%">
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

                                $no = 0;
                                foreach ($bayar as $b) {
                                  $no++;
                                ?>
                                 <tr>
                                   <td><?= $no; ?></td>
                                   <td><?= $b['id_bayar'] ?></td>
                                   <td><?= $b['nama'] ?></td>
                                   <td><?= "Rp " . number_format($b['jumlah'], 0, ",", ".") ?></td>
                                   <td><?= $b['tgl_bayar'] ?></td>
                                   <td>
                                     <?php if ($b['verifikasi'] == 1) { ?>
                                       <span class="badge badge-success">Pembayaran diterima</span>
                                     <?php } else { ?>
                                       <span class="badge badge-warning">Proses Cek</span>
                                     <?php } ?>
                                   </td>
                                   <td>
                                     <?php if ($b['id_user'] == 0) { ?>
                                       <!-- Trigger the modal with a button -->
                                       <button type="button" data-id="<?= $b['id_bayar'] ?>" class="btn btn-info btn-sm btn-lg" data-toggle="modal" data-target="#myModal"><i class="fas fa-eye"></i></button>
                                     <?php } else {  ?>
                                       Sudah diterima oleh Admin
                                     <?php } ?>
                                   </td>
                                   <td>
                                     <?php if ($b['verifikasi'] == 0) { ?>
                                       <a class="hapus btn btn-danger btn-sm" href="<?= base_url() ?>_pembayaran/hapus/<?= $b['id_bayar'] ?>" role="button"><i class="fas fa-trash"></i> Batal</a>
                                       <!-- <button data-id="<?= $b['id_bayar'] ?>" class="hapus btn btn-danger btn-sm"><i class="fas fa-trash"></i> Batal</button> -->
                                     <?php } else { ?>
                                       Terima Kasih
                                     <?php } ?>
                                   </td>
                                 </tr>
                               <?php }
                                ?>
                             </tbody>
                           </table>

                         </div>
                         <?php
                          $sisa = ($total) - $total_bayar['total'];
                          ?>
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

             <!-- Modal -->
             <div class="modal fade" id="myModal" role="dialog">
               <div class="modal-dialog">

                 <!-- Modal content-->
                 <div class="modal-content">
                   <div class="modal-header">
                     <h4 class="modal-title">Bukti Bayar</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                   </div>
                   <!-- /.card-header -->
                   <div class="modal-body">
                     <div class="mb-3">
                       <div class="row">
                         <div class="col-md-4">Kode Transaksi</div>
                         <div class="col-md-6">: <?= $b['id_bayar'] ?></div>
                       </div>

                       <div class="row">
                         <div class="col-md-4">Nama Siswa</div>
                         <div class="col-md-6">: <?= $b['nama'] ?></div>
                       </div>

                       <div class="row">
                         <div class="col-md-4">Jumlah Bayar</div>
                         <div class="col-md-6">: <?= $b['jumlah'] ?></div>
                       </div>

                       <div class="row">
                         <div class="col-md-4">Tanggal Bayar</div>
                         <div class="col-md-6">: <?= $b['tgl_bayar'] ?></div>
                       </div>
                     </div>
                     <div class="mb-3">
                       <img src="<?= base_url() ?>website/bukti_transaksi/<?= $b['bukti'] ?>" class="img-fluid" alt="Responsive image">
                     </div>
                     <div>

                       <div class="modal-footer">
                         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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