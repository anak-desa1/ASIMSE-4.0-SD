<div class="modal fade modal-edit" id="modal-lg">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-lg">
                <div class="card card-primary card-outline">
                    <div class="modal-header">
                        <h5 class="modal-title"><?= ucwords($this->uri->segment(3, 0)) ?> Ubah Data Sekolah</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- /.card-header -->
                    <form method="post" action="<?= base_url() . $this->uri->segment(1, 0) ?>/simpan_edit" role="form" id="form-action" enctype="multipart/form-data">
                        <div class="card-body">

                            <div class="modal-body">
                                <input type="hidden" name="id_kontak" value="<?= $kontak['id_kontak'] ?>" class="form-control" required="">
                                <div class="form-group">
                                    <label>Nama kontak</label>
                                    <input type="text" name="nama" value="<?= $kontak['nama_kontak'] ?>" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label>No kontak</label>
                                    <input type="text" name="nohp" value="<?= $kontak['no_kontak'] ?>" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <div class="control-label">Status kontak</div>
                                    <label class="custom-switch mt-2">
                                        <input type="checkbox" name="status" class="custom-switch-input" value='1' <?php if ($kontak['status'] == 1) {
                                                                                                                        echo "checked";
                                                                                                                    } ?>>
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description"> Pilih Status</span>
                                    </label>
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