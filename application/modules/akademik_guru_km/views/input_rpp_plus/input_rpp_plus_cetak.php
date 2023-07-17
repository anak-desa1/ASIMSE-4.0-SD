<div class="modal fade modal-cetak" id="modal-lg">
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
                        <embed src="<?= base_url()?>panel/dist/upload/file_rpp_plus/<?= $rpp_plus['nama_rpp_plus']?>" type="application/pdf" width="100%" height="700px">
                    </div>
                    
              </div>
              <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>