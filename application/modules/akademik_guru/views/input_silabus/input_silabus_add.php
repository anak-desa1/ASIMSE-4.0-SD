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
                            <div class="col-md-3">                                   
                                <label>Kelas : <?= $data['tingkat'] ?></label>                                   
                            </div>                                                                          
                        </div>
                  </div>
                  
                  <div class="card"> 
                        <form method="post" action="<?= base_url() . $this->uri->segment(1, 0). $this->uri->slash_segment(2, 'both') ?>/silabus_simpan" role="form" id="form-action" enctype="multipart/form-data">                       
                            <div class="card-body">  
                                <input type="hidden" name="id_guru" value="<?= $data['id_guru']?>">                                
                                <!-- <input type="hidden" name="tingkat" value="<?= $data['tingkat']?>">  -->
                                <input type="hidden" name="tasm" value="<?= $data['tasm']?>"> 
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label>Kelas</label>
                                        <div class="mb-3">
                                        <select class="form-control" aria-label="Default select example" name="tingkat" required>
                                        <option value="" disabled selected>Pilih Kelas</option>
                                        <?php foreach ($kelas as $kel) : ?>
                                            <option value="<?= $kel['tingkat'] ?>"><?= $kel['tingkat'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                        </div>            
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label>Tema</label>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="tema" name="tema" placeholder="Tema">
                                        </div>            
                                    </div>  
                                    <div class="col-md-4 mb-3">
                                        <label>Sub Tema</label>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="subtema" name="subtema" placeholder="Sub Tema">
                                        </div>            
                                    </div> 
                                </div>
                                <div class="mb-3">
                                    <label>File Silabus 'file max 2M dan .pdf saja'</label>
                                    <div class="mb-3">
                                        <input type="file" class="form-control" id="file_silabus" name="file_silabus" placeholder="Nama File">
                                    </div>            
                                </div>     
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Save</button>
                            </div>
                        </form>
                    </div>

              </div>
              <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
<?php endif ?>