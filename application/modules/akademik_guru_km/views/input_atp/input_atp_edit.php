 <!-- <script>
     $(document).ready(function() {
         var text_max = 100;
         $('#textarea_feedback').html(text_max + ' characters remaining');

         $('#textarea').keyup(function() {
             var text_length = $('#textarea').val().length;
             var text_remaining = text_max - text_length;

             $('#textarea_feedback').html(text_remaining + ' characters remaining');
         });
     });
 </script> -->
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
                             <form method="post" action="<?= base_url() ?>akademik_guru_km/input_atp/atp_ubah" enctype="multipart/form-data">

                                 <input type="hidden" name="atp_id" value="<?= $atp['atp_id'] ?>">
                                 <input type="hidden" name="id_mapel" value="<?= $atp['id_mapel'] ?>">
                                 <input type="hidden" name="tingkat" value="<?= $atp['tingkat'] ?>">

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
                                                    <input type="text" class="form-control" name="fase" id="fase" value="<?= $atp['fase']?>">
                                                </div>
                                                <div class="col-md-6">                                                    
                                                    <h5 class="card-title">CAPAIAN PEMBELAJARAN </h5>
                                                    <div class="mb-3" id="sumatif">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="no_sumatif" id="no_sumatif" value="<?= $atp['no_sumatif']?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <textarea name="nama_sumatif" class="form-control" id="textarea" rows="3" cols="20" maxlength="100" readonly><?= $atp['nama_sumatif']?></textarea>
                                                        </div>   
                                                    </div>                                                    
                                                </div>                                                                                     
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <h5 class="card-title">Tanggal</h5>
                                                    <input type="date" class="form-control" name="date" id="date" value="<?= $atp['date']?>">
                                                </div>
                                                <div class="col-md-9">
                                                    <h5 class="card-title">ELEMEN</h5>
                                                    <div class="form-group">
                                                        <textarea name="elemen" class="form-control" id="textarea" rows="3" cols="20" maxlength="100"><?= $atp['elemen']?></textarea>
                                                        <div id="textarea_feedback"></div>
                                                    </div>   
                                                </div>          
                                                                                       
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <h5 class="card-title">KATA KUNCI </h5>
                                                    <div class="form-group">
                                                        <textarea name="kata_kunci" class="form-control" id="textarea" rows="3" cols="20" maxlength="100"><?= $atp['kata_kunci']?></textarea>
                                                        <div id="textarea_feedback"></div>
                                                    </div>   
                                                </div>
                                                <div class="col-md-9">
                                                    <h5 class="card-title">TUJUAN PEMBELAJARAN </h5>
                                                    <div class="form-group">
                                                        <textarea name="tujuan_pembelajaran" class="form-control" id="textarea" rows="3" cols="20" maxlength="100"><?= $atp['tujuan_pembelajaran']?></textarea>
                                                        <div id="textarea_feedback"></div>
                                                    </div>   
                                                </div>       
                                                                                                                                         
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <h5 class="card-title">GLOSARIUM </h5>
                                                    <div class="form-group">
                                                        <textarea name="glorasium" class="form-control" id="textarea" rows="3" cols="20" maxlength="100"><?= $atp['glorasium']?></textarea>
                                                        <div id="textarea_feedback"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <h5 class="card-title">PROFIL PELAJAR PANCASILA</h5>
                                                    <div class="form-group">
                                                        <textarea name="profil_pancasila" class="form-control" id="textarea" rows="3" cols="20" maxlength="100"><?= $atp['profil_pancasila']?></textarea>
                                                        <div id="textarea_feedback"></div>
                                                    </div>   
                                                </div> 
                                                <div class="col-md-3">
                                                    <h5 class="card-title">ALOKASI WAKTU </h5>
                                                    <div class="form-group">
                                                    <input type="text" class="form-control" name="alokasi_waktu" id="alokasi_waktu" value="<?= $atp['alokasi_waktu']?>">
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