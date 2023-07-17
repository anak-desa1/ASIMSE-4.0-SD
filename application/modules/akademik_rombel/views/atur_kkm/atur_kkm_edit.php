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
                        <form method="post" action="<?= base_url() ?>akademik_rombel/Atur_kkm/ubah_kkm" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $kkm['id'] ?>">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Kelas<span class="symbol required"> </span></label>
                                        <input type="text" name="kelas" class="form-control" id="kelas" value="<?= $kkm['kelas'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>KD Singkat<span class="symbol required"> </span></label>
                                        <input type="text" name="kd_singkat" class="form-control" id="kd_singkat" value="<?= $kkm['kd_singkat'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>KKM Mapel<span class="symbol required"> </span></label>
                                        <input type="text" name="kkm" class="form-control" id="kkm" value="<?= $kkm['kkm'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label>Nama Mapel<span class="symbol required"> </span></label>
                                        <input type="text" name="nmmapel" class="form-control" id="nmmapel" value="<?= $kkm['nmmapel'] ?>" readonly>
                                    </div>
                                </div>
                            </div>
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