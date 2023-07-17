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
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <embed src="<?= base_url()?>panel/dist/upload/file_rpp/<?= $rpp['file_rpp']?>" type="application/pdf" width="100%" height="700px">
                        </div>
                        <!-- /.tab-content -->                        
                    </div><!-- /.card-body -->                    
                </div><!-- /.modal-content -->            
            </div><!-- /.modal-dialog -->
        </div>
    </div>
</div>