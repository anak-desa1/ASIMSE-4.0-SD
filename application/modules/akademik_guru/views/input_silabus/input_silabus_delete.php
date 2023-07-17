<div class="modal fade modal-delete" id="modal-lg">
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
                    <form method="post" action="<?= base_url() . $this->uri->segment(1, 0). $this->uri->slash_segment(2, 'both') ?>/del" role="form" id="form-action" enctype="multipart/form-data">                       
                        <div class="card-body">  
                            <input type="hidden" name="id_silabus" value="<?= $silabus['id_silabus']?>">
                            <input type="hidden" name="id_guru" value="<?= $data['id_guru']?>">                                
                            <input type="hidden" name="tingkat" value="<?= $data['tingkat']?>"> 
                            <input type="hidden" name="tasm" value="<?= $data['tasm']?>"> 
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label>Anda Sudah Yakin Untuk Menghapus Data !!!</label>                                                           
                                </div>
                            </div>
                            <div class="modal-footer text-center">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-danger"><i class="bi bi-save"></i> Yes</button>
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