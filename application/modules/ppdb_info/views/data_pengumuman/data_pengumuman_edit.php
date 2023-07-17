 <div class="modal fade modal-edit" id="modal-lg">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-lg">
                 <div class="card card-primary card-outline">
                     <div class="modal-header">
                         <h5 class="modal-title"><?= ucwords($this->uri->segment(3, 0)) ?> Ubah Data Sekolah</h5>
                         <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <!-- /.card-header -->
                     <form method="post" action="<?= base_url() . $this->uri->segment(1, 0) ?>/simpan_edit_pengumuman" role="form" id="form-action" enctype="multipart/form-data">
                         <div class="card-body">

                             <div class="modal-body">
                                 <input type="hidden" value="<?= $pengumuman['id_pengumuman'] ?>" name="id_pengumuman" class="form-control" required="">
                                 <div class="mb-3">
                                     <label>Judul Pengumuman</label>
                                     <input type="text" name="judul" value="<?= $pengumuman['judul'] ?>" class="form-control" required="">
                                 </div>
                                 <div class="mb-3">
                                     <label class="form-label">Jenis Pengumuman</label>
                                     <div class="selectgroup w-100">
                                         <label class="selectgroup-item">
                                             <input type="radio" name="jenis" value="1" class="selectgroup-input" checked="">
                                             <span class="selectgroup-button">Internal</span>
                                         </label>
                                         <label class="selectgroup-item">
                                             <input type="radio" name="jenis" value="2" class="selectgroup-input">
                                             <span class="selectgroup-button">Eksternal</span>
                                         </label>

                                     </div>
                                 </div>
                                 <div class="mb-3">
                                     <label>Isi Pengumuman</label>
                                     <textarea name="pengumuman" id="ckeditor" class="summernote"><?= $pengumuman['pengumuman'] ?></textarea>
                                 </div>
                             </div>
                             <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 <button type="submit" class="btn btn-primary">Save</button>
                             </div>
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
 <script src="<?= base_url() ?>panel/plugins/ckeditor/ckeditor.js"></script>
 <script>
     CKEDITOR.replace('ckeditor');
 </script>