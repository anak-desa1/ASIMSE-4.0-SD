<style>
    td.details-control {
        background: url('<?= base_url() ?>assets/images/details_open.png') no-repeat center center;
        cursor: pointer;
    }

    tr.details td.details-control {
        background: url('<?= base_url() ?>assets/images/details_close.png') no-repeat center center;
    }
</style>
<div class="content-wrapper">
    <?php $this->load->view('layout/header-page') ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="tampil-modal"></div>
                    <div class="card-body">
                        <form action="<?= base_url('data_persiapan/persiapan_tempat_tugas/update'); ?>" method="post">
                            <input type="hidden" name="lokasi_id" value="<?= $lokasi['lokasi_id'] ?>">
                            <div class=" modal-body">
                                <div class="form-group">
                                    <select class="form-control m-bot15" style="width: 100%" id="jabatan_id" name="jabatan_id">
                                        <option value="<?= $lokasi['jabatan_id'] ?>"><?= $lokasi['jenis_jabatan'] ?></option>
                                        <?php foreach ($jabatan as $m) : ?>
                                            <option value="<?= $m['jabatan_id']; ?>"><?= $m['jenis_jabatan']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?= $lokasi['lokasi'] ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="kode_lokasi" name="kode_lokasi" value="<?= $lokasi['kode_lokasi'] ?>">
                                </div>
                            </div>
                            <div class=" modal-footer">
                                <a href="<?= base_url() ?>data_persiapan/persiapan_tempat_tugas" type="button" class="btn btn-secondary" data-dismiss="modal">Close</a>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- jQuery -->
<script src="<?= base_url() ?>plugins/jquery/jquery.min.js"></script>