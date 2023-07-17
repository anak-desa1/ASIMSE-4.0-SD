       <div class="modal fade modal-action" id="modal-lg">
           <div class="modal-dialog modal-lg">
               <div class="modal-content">
                   <div class="modal-header">
                       <h4 class="modal-title"><?= ucwords($this->uri->segment(4, 0)) ?> Data</h4>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                   </div>
                   <form method="post" action="<?= base_url() ?>akademik_master/master_kd/simpan_tambah" enctype="multipart/form-data">
                       <div class="modal-body">
                           <input type="hidden" name="id" value="<?= $des_kd['id'] ?>">
                           <input type="hidden" name="kd_sekolah" value="<?= $des_kd['kd_sekolah'] ?>">
                           <input type="hidden" name="kelas" value="<?= $des_kd['kelas'] ?>">
                           <input type="hidden" name="id_mapel" value="<?= $des_kd['id_mapel'] ?>">

                           <div class="form-group">
                               <label>Jenis Penilaian <span class="symbol required"> </span></label>
                               <div class="col-sm-3">
                                   <?php echo form_dropdown('jenis', $p_jenis, '', 'class="form-control" id="jenis" required'); ?>
                               </div>
                           </div>
                           <div class="form-group">
                               <label for="no_kd" class="col-sm-3 control-label">No KD <span class="symbol required"> </span></label>
                               <div class="col-sm-2">
                                   <input type="text" name="no_kd" class="form-control" id="no_kd" value="<?= $des_kd['no_kd'] ?>" required>
                               </div>
                           </div>
                           <div class="form-group">
                               <label for="deskripsi" class="col-sm-3 control-label">Deskripsi <span class="symbol required"> </span></label>
                               <div class="col-sm-12">
                                   <textarea name="deskripsi" class="form-control" id="deskripsi" rows="4" cols="50" required><?= $des_kd['deskripsi'] ?></textarea>
                               </div>
                           </div>
                       </div>
                       <div class="modal-footer justify-content-between">
                           <button type="submit" id="simpan" class="btn btn-primary">Simpan</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>