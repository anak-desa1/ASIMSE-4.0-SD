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
                        <form method="post" action="<?= base_url() . $this->uri->segment(1, 0). $this->uri->slash_segment(2, 'both') ?>/rpp_plus_simpan" role="form" id="form-action" enctype="multipart/form-data">                       
                            <div class="card-body"> 
                                <input type="hidden" name="id_rpp_plus" value="<?= $rpp_plus['id_rpp_plus']?>"> 
                                <input type="hidden" name="sumatif_id" value="<?= $sumatif['sumatif_id']?>">  
                                <input type="hidden" name="id_guru" value="<?= $sumatif['id_guru']?>">   
                                <input type="hidden" name="id_mapel" value="<?= $sumatif['id_mapel']?>"> 
                                <input type="hidden" name="tingkat" value="<?= $sumatif['tingkat']?>"> 
                                <input type="hidden" name="tasm" value="<?= $sumatif['tasm']?>">   
                                    <div class="mb-3">
                                        <label>File RPP + 'file max 2M dan .pdf saja'</label>
                                        <div class="mb-3">
                                            <input type="file" class="form-control" id="nama_rpp_plus" name="nama_rpp_plus" placeholder="Nama File">
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