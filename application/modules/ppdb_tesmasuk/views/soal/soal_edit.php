 <div class="modal fade modal-edit" id="modal-lg">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-lg">
                 <div class="card card-primary card-outline">
                     <div class="modal-header">
                         <h5 class="modal-title">Ubah Penugasan - <?= $this->uri->segment(4, 0)  ?></h5>
                         <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <!-- /.card-header -->
                     <form method="post" action="<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') ?>/simpan_edit_tugas" role="form" id="form-action" enctype="multipart/form-data">
                         <div class="modal-body">
                             <div class="alert alert-danger" style="display:none">
                             </div>
                             <input type="hidden" name="id_tugas" id="" value="<?= $tugas['id_tugas'] ?>" class="form-control" placeholder="">
                             <input type="hidden" name="kd_campus" id="kd_campus" value="<?= $pegawai['kd_campus'] ?>" class="form-control" placeholder="">
                             <input type="hidden" name="kd_sekolah" id="kd_sekolah" value="<?= $pegawai['kd_sekolah'] ?>" class="form-control" placeholder="">
                             <input type="hidden" name="id_kursus" id="" value="<?= $tugas['id_kursus'] ?>" class="form-control" placeholder="">
                             <div class="form-group">
                                 <label for="tugas">Judul Tugas</label>
                                 <input type="text" name="judul" id="judul" value="<?= $tugas['judul'] ?>" class="form-control" placeholder="">
                                 <small id="helptugas" class="text-danger"></small>
                             </div>

                             <div class="form-group">
                                 <label for="tugas">Deskripsi Tugas</label>
                                 <textarea id="summernote" class="form-control" name="tugas"><?= $tugas['tugas'] ?></textarea>
                             </div>
                             <div class="row">

                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label for="buka">Tgl Dibuka</label>
                                         <input type="text" name="bukatugas" value="<?= $tugas['tgl_buka'] ?>" class="tanggalwaktu form-control" placeholder="" autocomplete="off">
                                         <small id="helpbuka" class="text-danger"></small>
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label for="tutup">Tgl Ditutup</label>
                                         <input type="text" name="tutuptugas" value="<?= $tugas['tgl_tutup'] ?>" class="tanggalwaktu form-control" placeholder="" autocomplete="off">
                                         <small id="helptutup" class="text-danger"></small>
                                     </div>

                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label for="komentar">Komentar</label>
                                         <label class="custom-switch mt-2">
                                             <input type="checkbox" name="komentartugas" class="custom-switch-input" value='1' <?php if ($tugas['komentar'] == 1) {
                                                                                                                                    echo "checked";
                                                                                                                                } ?>>
                                             <span class="custom-switch-indicator"></span>
                                             <span class="custom-switch-description"> Pilih Status</span>
                                         </label>
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label for="Guru">Guru</label>
                                         <select class="form-control" name="gurutugas">
                                             <?php foreach ($guru as $guru) { ?>
                                                 <option value="<?= $guru['nik'] ?>"><?= $guru['nama_pegawai'] ?></option>
                                             <?php } ?>
                                         </select>
                                     </div>
                                 </div>
                             </div>

                         </div>
                         <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                             <!-- <button id='btn-submit2' class="btn btn-primary">Save changes</button> -->
                             <button id='btn-edit2' class="btn btn-primary" display='none'>Ubah Data</button>
                         </div>
                     </form>
                     <!-- /.card-body -->
                 </div>
                 <!-- /.card -->
             </div>
             <!-- form start -->
         </div>
         <!-- /.modal-content -->

     </div>
     <!-- /.modal-dialog -->
 </div>