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
                                <div class="col-md-6">
                                    <h5 class="card-title">TUJUAN PEMBELAJARAN </h5>
                                        <form action="" id="FormSumatif">
                                            <div class="dropdown bootstrap-select">
                                                <select class="form-control select2" style="width: 100%;" name="data" id="data" required>
                                                    <option>-- Pilih Sumatif --</option>
                                                        <?php
                                                            foreach ($p_sumatif as $pg) {
                                                                echo "<option value=" . $pg['sumatif_id'] . ">" . $pg['no_sumatif'] . "</option>";
                                                            }
                                                        ?>
                                                </select>
                                            </div>
                                            <br>
                                            <button type="submit" class="btn btn-primary">Tampil Sumatif</button>
                                        <div class="col-md-4 mb-3"></div>
                                    </form>
                                </div>                            
                                                         
                                <form method="post" action="<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') . 'atp_simpan' ?>" role="form" id="form-action" enctype="multipart/form-data">            

                                          <!-- tampil data sumatif -->
                                          <div class="form-group">                               
                                            <div class="row">
                                            <div class="col-md-3">
                                <div class="form-group">
                                <h5 class="card-title">Semester :</h5>
                                              <?php if ($semester == 1) { ?>
                                                  <input type="hidden" class="form-control" name="semester" value="1">
                                                  <input type="text" placeholder="Semester : 1 (satu) " class="form-control" id="semester" readonly>
                                              <?php } else { ?>
                                                  <input type="hidden" class="form-control" name="semester" value="2">
                                                  <input type="text" placeholder="Semester : 2 (dua)" class="form-control" id="semester" readonly>
                                              <?php } ?>
                                          </div>
                                </div>          
                                                <div class="col-md-3">
                                                    <h5 class="card-title">FASE</h5>
                                                    <input type="text" class="form-control" name="fase" id="fase" placeholder="Fase">
                                                </div>
                                                <div class="col-md-6">                                                    
                                                    <h5 class="card-title">CAPAIAN PEMBELAJARAN</h5>
                                                    <div class="mb-3" id="sumatif">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="no_sumatif" id="no_sumatif" placeholder="No Sumatif">
                                                        </div>
                                                        <div class="form-group">
                                                            <textarea name="nama_sumatif" class="form-control" id="textarea" rows="3" cols="20" maxlength="100" placeholder="Nama Sumatif"></textarea>
                                                        </div>   
                                                    </div>                                                    
                                                </div>                                                                                     
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <h5 class="card-title">Tanggal</h5>
                                                    <input type="date" class="form-control" name="date" id="date" placeholder="date">
                                                </div>
                                                <div class="col-md-9">
                                                    <h5 class="card-title">ELEMEN</h5>
                                                    <div class="form-group">
                                                        <textarea name="elemen" class="form-control" id="textarea" rows="3" cols="20" maxlength="100"></textarea>
                                                        <div id="textarea_feedback"></div>
                                                    </div>   
                                                </div>          
                                                                                       
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <h5 class="card-title">KATA KUNCI </h5>
                                                    <div class="form-group">
                                                        <textarea name="kata_kunci" class="form-control" id="textarea" rows="3" cols="20" maxlength="100"></textarea>
                                                        <div id="textarea_feedback"></div>
                                                    </div>   
                                                </div>
                                                <div class="col-md-9">
                                                    <h5 class="card-title">TUJUAN PEMBELAJARAN</h5>
                                                    <div class="form-group">
                                                        <textarea name="tujuan_pembelajaran" class="form-control" id="textarea" rows="3" cols="20" maxlength="100"></textarea>
                                                        <div id="textarea_feedback"></div>
                                                    </div>   
                                                </div>       
                                                                                                                                         
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <h5 class="card-title">GLOSARIUM </h5>
                                                    <div class="form-group">
                                                        <textarea name="glorasium" class="form-control" id="textarea" rows="3" cols="20" maxlength="100"></textarea>
                                                        <div id="textarea_feedback"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <h5 class="card-title">PROFIL PELAJAR PANCASILA</h5>
                                                    <div class="form-group">
                                                        <textarea name="profil_pancasila" class="form-control" id="textarea" rows="3" cols="20" maxlength="100"></textarea>
                                                        <div id="textarea_feedback"></div>
                                                    </div>   
                                                </div> 
                                                <div class="col-md-3">
                                                    <h5 class="card-title">ALOKASI WAKTU </h5>
                                                    <div class="form-group">
                                                    <input type="text" class="form-control" name="alokasi_waktu" id="alokasi_waktu" placeholder="Alokasi Waktu">
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