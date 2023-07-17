<script>
     $(document).ready(function() {
         var text_max = 500;
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
                    <div class="card-header p-2">
                        <div class="alert alert-warning" role="alert">                           
                            <div class="col-md-8">
                                <label>Nama : <?= $pegawai['nama_pegawai'] ?></label>
                            </div>
                            <div class="col-md-8">
                                <label>Mapel : <?= $data['nama'] ?></label>
                            </div>
                            <div class="col-md-3">                                   
                                <label>Kelas : <?= $data['tingkat'] ?></label>                                   
                            </div>                                                                          
                        </div>
                  </div>
                        
                    <div class="card">
                        
                        <div class="card-body"> 
                            <div class="col-md-12">
                                                         
                                <form method="post" action="<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') . 'sumatif_simpan' ?>" role="form" id="form-action" enctype="multipart/form-data">
                                          <div class="form-group">
                                              <label>Semester :<span class="symbol required"> </span></label>
                                              <?php if ($semester == 1) { ?>
                                                  <input type="hidden" class="form-control" name="semester" value="1">
                                                  <input type="text" placeholder="Semester : 1 (satu) " class="form-control" id="semester" readonly>
                                              <?php } else { ?>
                                                  <input type="hidden" class="form-control" name="semester" value="2">
                                                  <input type="text" placeholder="Semester : 2 (dua)" class="form-control" id="semester" readonly>
                                              <?php } ?>
                                          </div>                                          

                                          <!-- tampil data sumatif -->
                                          <div class="form-group" id="sumatif">
                                            <div class="col-md-3">
                                                <h3 class="card-title"><b>SUMATIF</b></h3>
                                            </div>                                           
                                            <div class="row">
                                                <input type="hidden" name="jenis" value="P">
                                                <div class="col-md-3">
                                                    <h5 class="card-title">No.Sumatif</h5>
                                                    <input type="text" class="form-control" name="no_sumatif" id="no_sumatif" placeholder="No Sumatif">
                                                </div>
                                                <div class="col-md-8">
                                                    <h5 class="card-title">Deskripsi.Sumatif</h5>
                                                    <div class="form-group">
                                                        <textarea name="nama_sumatif" class="form-control" id="textarea" rows="3" cols="20" maxlength="500"></textarea>
                                                        <div id="textarea_feedback"></div>
                                                    </div>   
                                                </div>                                              
                                            </div>

                                          <input type="hidden" name="id_guru" value="<?= $data['id_guru'] ?>">
                                          <input type="hidden" name="id_mapel" value="<?= $data['mapel_id'] ?>">
                                          <input type="hidden" name="mapel_id" value="<?= $data['mapel_id'] ?>">
                                          <input type="hidden" name="tingkat" value="<?= $data['id_kelas'] ?>">
                                          <input type="hidden" name="tasm" value="<?= $tasm ?>">
                                          <!-- end tampil data kd -->

                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="bi bi-arrow-counterclockwise"></i> Tutup</button>
                                            <button type="submit" id="simpan" class="btn btn-primary"><i class="bi bi-save2"></i> Simpan</button>
                                        </div>
                                      </form>        
                            </div>                          

                          
                      </div>
                  </div>
              </div>
              <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
  <?php endif ?>