<div class="modal fade modal-action" id="modal-lg">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-lg">
                <div class="card card-primary card-outline">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Biaya</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <form method="post" action="<?= base_url() . $this->uri->segment(1, 0) ?>/simpan_tambah" role="form" id="form-action" enctype="multipart/form-data">
                        <div class="card-body">

                            <div class="modal-body">

                                <div class="form-group">
                                    <label>PERIODE*</label>
                                    <select class="form-control" aria-label="Default select example" name="periode" required>
                                        <option value="" disabled selected>Pilih Periode</option>
                                        <?php foreach ($periode as $periode) : ?>
                                            <option value="<?= $periode['periode'] ?>"><?= $periode['periode'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kode Biaya</label>
                                    <input type="text" name="id_biaya" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label>Nama Biaya</label>
                                    <input type="text" name="nama" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Rp</label>
                                    <input type="number" name="jumlah" value="" class="form-control" required="">
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