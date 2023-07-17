<div class="modal fade modal-action" id="modal-lg">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-lg">
                <div class="card card-primary card-outline">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data kontak</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- /.card-header -->
                    <form method="post" action="<?= base_url() . $this->uri->segment(1, 0) ?>/simpan_tambah" role="form" id="form-action" enctype="multipart/form-data">
                        <div class="card-body">
                            <!-- <input type="hidden" name="kd_campus" value="<?= $pegawai['kd_campus'] ?>">
                            <input type="hidden" name="kd_sekolah" value="<?= $pegawai['kd_sekolah'] ?>"> -->
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Nama Kontak</label>
                                    <input type="text" name="nama" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label>No Whatsapp</label>
                                    <input type="number" name="nohp" class="form-control" required="">
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