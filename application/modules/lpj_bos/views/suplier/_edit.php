<div class="modal fade modal-edit" id="modal-lg">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-lg">
                <div class="card card-primary card-outline">
                    <div class="modal-header">
                        <h5 class="modal-title"><?= ucwords($this->uri->segment(3, 0)) ?> Ubah Suplier</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <form method="post" action="<?= base_url() . $this->uri->segment(1, 0) ?>/simpan_edit_suplier" role="form" id="form-action" enctype="multipart/form-data">
                        <div class="card-body">

                            <div class="modal-body">
                                <input type="hidden" value="<?= $suplier['suplier_id'] ?>" name="suplier_id" class="form-control" required="">
                                <div class="form-group">
                                    <label>Nama Suplier</label>
                                    <input type="text" name="suplier_nama" value="<?= $suplier['suplier_nama'] ?>" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" name="suplier_alamat" value="<?= $suplier['suplier_alamat'] ?>" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label>No Telp/ HP</label>
                                    <input type="text" name="suplier_notelp" value="<?= $suplier['suplier_notelp'] ?>" class="form-control" required="">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!-- form start -->
        </div>
        <!-- /.modal-content -->

    </div>
    <!-- /.modal-dialog -->
</div>