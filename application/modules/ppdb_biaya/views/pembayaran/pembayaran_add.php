 <div class="modal fade modal-action" id="modal-lg">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-lg">
                 <div class="card card-primary card-outline">
                     <div class="modal-header">
                         <h5 class="modal-title">Tambah Bayar</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <!-- /.card-header -->
                     <form method="post" action="<?= base_url() . $this->uri->segment(1, 0) ?>/pembayaran" role="form" id="form-action" enctype="multipart/form-data">
                         <div class="modal-body">
                             <input type="hidden" name="id_user" value="<?= $pegawai['nik'] ?>">
                             <div class="mb-3">
                                 <select class="form-control select2" style="width: 100%" name="id_daftar" id="id_daftar" required>
                                     <option value="">Cari Data Pendaftar</option>
                                     <?php
                                        foreach ($cari_siswa as $cs) {
                                            echo "<option value=" . $cs['id_daftar'] . ">" .  $cs['no_daftar'] . ' ' . $cs['nama'] . "</option>";
                                        }
                                        ?>
                                 </select>
                             </div>
                             <div class="mb-3">
                                 <select class="form-control" aria-label="Default select example" name="keterangan" id="keterangan" required>
                                     <option value="" disabled selected>Pilih Pembayaran</option>
                                     <?php foreach ($biaya as $biaya) : ?>
                                         <option value="<?= $biaya['nama_biaya'] ?>"><?= $biaya['nama_biaya'] ?></option>
                                     <?php endforeach ?>
                                 </select>
                             </div>
                             <div class="mb-3">
                                 <select class="form-control select2" style="width: 100%" name="periode" id="periode" required>
                                     <option value="">Pilih Periode</option>
                                     <?php
                                        foreach ($periode as $p) {
                                            echo "<option value=" . $p['periode'] . ">" .  $p['periode'] . "</option>";
                                        }
                                        ?>
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
                                 <label for="jumlah">Jumlah Pembayaran Rp. ( contoh : 200000 )</label>
                                 <input type="text" class="form-control uang" name="jumlah" id="jumlah" aria-describedby="helpjumlah" required>
                             </div>
                             <div class="mb-3">
                                 <label for="tgl">Tanggal Pembayaran</label>
                                 <input type="date" class="form-control datepicker" name="tgl" id="tgl" required>
                             </div>
                             <div class="mb-3">
                                 <label for="bukti">Bukti Pembayaran</label>
                                 <input type="file" name="bukti">
                                 <small class="form-text text-muted">Upload file JPG/PNG</small>
                             </div>
                         </div>
                         <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                             <button type="submit" class="btn btn-primary">Save</button>
                         </div>
                         <!-- /.card-body -->
                     </form>
                 </div>
                 <!-- /.card -->
             </div>
             <!-- form start -->
         </div>
         <!-- /.modal-content -->

     </div>
     <!-- /.modal-dialog -->
 </div>