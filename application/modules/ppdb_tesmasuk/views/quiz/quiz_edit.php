 <div class="modal fade modal-edit" id="modal-lg">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-lg">
                 <div class="card card-primary card-outline">
                     <div class="modal-header">
                         <h5 class="modal-title">Ubah Penugasan</h5>
                         <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <!-- /.card-header -->
                     <form method="post" action="<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') ?>/simpan_edit_quiz" role="form" id="form-action" enctype="multipart/form-data">
                         <div class="modal-body">
                             <div class="modal-body">
                                 <input type="hidden" value="<?= $materi['id_materi'] ?>" name="id_materi" class="form-control" required="">
                                 <div class="form-group">
                                     <label>Mata Pelajaran</label>
                                     <input type="text" name="nama_mapel" value="<?= $materi['nama_mapel'] ?>" class="form-control" readonly>
                                 </div>
                                 <div class="form-group">
                                     <label>Kelas</label>
                                     <input type="text" name="kelas" value="<?= $materi['kelas'] ?>" class="form-control" readonly>
                                 </div>
                                 <div class="form-group">
                                     <div class="control-label">Status Penugasan</div>
                                     <label class="custom-switch mt-2">
                                         <input type="checkbox" name="status" class="custom-switch-input" value='1' <?php if ($materi['status'] == 1) {
                                                                                                                        echo "checked";
                                                                                                                    } ?>>
                                         <span class="custom-switch-indicator"></span>
                                         <span class="custom-switch-description"> Pilih Status</span>
                                     </label>
                                 </div>
                             </div>
                         </div>
                         <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                             <button id='btn-submit' class="btn btn-primary">Save changes</button>
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