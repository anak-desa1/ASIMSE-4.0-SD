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
                        <form action="<?= base_url('data_persiapan/persiapan_jabatan/update'); ?>" method="post">
                            <input type="hidden" name="jabatan_id" value="<?= $jabatan['jabatan_id'] ?>">
                            <div class="modal-body">
                                <!-- form on -->
                                <div class="form-group">
                                    <label>Departemen <span class="symbol required"> </span></label>
                                    <div class="input-group mb-3">
                                        <select class="form-control m-bot15" style="width: 100%" name="departemen_id">
                                            <option value="<?= $jabatan['departemen_id'] ?>"><?= $jabatan['departemen'] ?></option>
                                            <?php foreach ($departemen as $m) : ?>
                                                <option value="<?= $m['departemen_id']; ?>"><?= $m['departemen']; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Jabatan <span class="symbol required"> </span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" autocomplete="off" name="jenis_jabatan" required class="form-control" value="<?= $jabatan['jenis_jabatan'] ?>">
                                    </div>
                                </div>
                                <!-- form off -->
                            </div>
                            <div class="modal-footer justify-content-between">
                                <a href="<?= base_url() ?>data_persiapan/persiapan_jabatan" type="button" class="btn btn-default">Tutup</a>
                                <button type="submit" id="btn-tambah" onclick="tambahdata()" class="btn btn-primary">Simpan</button>
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