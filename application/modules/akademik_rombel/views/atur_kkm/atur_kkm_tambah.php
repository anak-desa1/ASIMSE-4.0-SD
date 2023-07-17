<div class="modal fade modal-action" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?= ucwords($this->uri->segment(4, 0)) ?> Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                        <h4 class="card-title">KKM MAPEL</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="" role="form" id="form-action" enctype="multipart/form-data">
                            <input type="hidden" name="ta" value="<?= $ta ?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card ">                                     
                                        <div class="dropdown bootstrap-select">                                           
                                            <div class="form-group">
                                                <label>Mapel<span class="symbol required"> </span></label>
                                                <select name="id_mapel" id="id_mapel" class="selectpicker form-control" data-live-search="true">
                                                    <option value="">Pilih Mapel</option>
                                                    <?php foreach ($mapel as $ma) {
                                                    echo '<option value="' . $ma['id'] . '">' . $ma['nama'] . '</option>';
                                                     } ?>
                                                </select>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kelas<span class="symbol required"> </span></label>
                                        <input type="text" name="kelas" class="form-control" id="kelas" value="<?= ucwords($this->uri->segment(4, 0)) ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>KKM Mapel<span class="symbol required"> </span></label>
                                        <input type="number" name="kkm" class="form-control" id="kkm">
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button> -->
                                        <button type="submit" id="simpan" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
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