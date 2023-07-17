<div class="modal fade modal-edit" id="modal-lg">
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
                            <label>Kelas : <?= $rpp['tingkat'] ?></label>                                   
                        </div>                                                                          
                    </div>
                </div>
                        
                <div class="card"> 
                    <form method="post" action="<?= base_url() . $this->uri->segment(1, 0). $this->uri->slash_segment(2, 'both') ?>/rpp_ubah" role="form" id="form-action" enctype="multipart/form-data">                       
                        <div class="card-body">  
                            <input type="hidden" name="id_rpp" value="<?= $rpp['id_rpp']?>">
                            <input type="hidden" name="id_silabus" value="<?= $silabus['id_silabus']?>">
                            <input type="hidden" name="id_guru" value="<?= $rpp['id_guru']?>">                     
                            <input type="hidden" name="tingkat" value="<?= $rpp['tingkat']?>"> 
                            <input type="hidden" name="tasm" value="<?= $rpp['tasm']?>">  
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label>Tema</label>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" value="<?= $silabus['tema']?>" readonly>
                                        </div>            
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label>Sub Tema</label>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" value="<?= $silabus['subtema']?>" readonly>
                                        </div>            
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label>Pembelajaran</label>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="pembelajaran" name="pembelajaran" value="<?= $rpp['pembelajaran']?>" required>
                                        </div>            
                                    </div>
                                </div> 
                                    
                                <div class="mb-3">
                                    <label>File RPP 'file max 2M dan .pdf saja'</label>
                                    <input type="hidden" name="old_image" value="<?= $rpp['file_rpp']?>" />
                                    <div class="mb-3">
                                        <input type="file" class="form-control" id="file_rpp" name="file_rpp" placeholder="Nama File">
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
    </div>
</div>