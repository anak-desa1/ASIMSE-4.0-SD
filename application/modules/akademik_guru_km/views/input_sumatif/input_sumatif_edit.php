 <script>
     $(document).ready(function() {
         var text_max = 100;
         $('#textarea_feedback').html(text_max + ' characters remaining');

         $('#textarea').keyup(function() {
             var text_length = $('#textarea').val().length;
             var text_remaining = text_max - text_length;

             $('#textarea_feedback').html(text_remaining + ' characters remaining');
         });
     });
 </script>
 <?php if ($pegawai['kd_sekolah'] == $pegawai['kd_sekolah']) : ?>
     <div class="modal fade modal-action" id="modal-lg">
         <div class="modal-dialog modal-lg">
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title"><?= ucwords($this->uri->segment(4, 0)) ?> Data </h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="col-md-12">
                     <div class="card">
                         <div class="card-header card-header-rose card-header-icon">
                             <h4 class="card-title"><?= $pegawai['nama_pegawai'] ?></h4>
                         </div>
                         <div class="card-body">
                             <form method="post" action="<?= base_url() ?>akademik_guru_km/input_sumatif/sumatif_ubah" enctype="multipart/form-data">

                                 <input type="hidden" name="sumatif_id" value="<?= $sumatif['sumatif_id'] ?>">
                                 <input type="hidden" name="id_mapel" value="<?= $sumatif['id_mapel'] ?>">
                                 <input type="hidden" name="tingkat" value="<?= $sumatif['tingkat'] ?>">

                                 <div class="row">                                     
                                     <div class="col-md-2">
                                         <div class="form-group">
                                             <label>No Sumatif<span class="symbol required"> </span></label>
                                             <input type="text" name="no_sumatif" value="<?= $sumatif['no_sumatif'] ?>" class="form-control" readonly>
                                         </div>
                                     </div>
                                     <div class="col-md-2">
                                         <div class="form-group">
                                             <label>Semester<span class="symbol required"> </span></label>
                                             <input type="text" name="semester" value="<?= $sumatif['semester'] ?>" class="form-control" readonly>
                                         </div>
                                     </div>
                                     <div class="col-md-10">
                                         <div class="form-group">
                                             <label>Deskripsi<span class="symbol required"> </span></label>                                           
                                             <textarea name="nama_sumatif" class="form-control" id="textarea" rows="3" cols="20" maxlength="100"><?= $sumatif['nama_sumatif'] ?></textarea>
                                             <div id="textarea_feedback"></div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="modal-footer justify-content-between">
                                     <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                     <button type="submit" id="simpan" class="btn btn-primary">Simpan</button>
                                 </div>
                             </form>
                         </div>
                     </div>
                     <!-- /.modal-content -->
                 </div>
                 <!-- /.modal-dialog -->
             </div>
         <?php endif ?>