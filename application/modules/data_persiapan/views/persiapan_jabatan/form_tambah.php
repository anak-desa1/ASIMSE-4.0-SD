<div class="modal fade modal-action" id="form">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Jenis Jabatan</h4>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
            <form action="<?= base_url('data_persiapan/persiapan_jabatan'); ?>" method="post">
                <div class="modal-body">
                    <!-- form on -->
                    <div class="form-group">
                        <label>Departemen <span class="symbol required"> </span></label>
                        <div class="input-group mb-3">
                            <select class="form-control m-bot15" style="width: 100%" name="departemen_id">
                                <option value="">Select Menu</option>
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
                            <input type="text" autocomplete="off" name="jenis_jabatan" required class="form-control" placeholder="Jabatan">
                        </div>
                    </div>
                    <!-- form off -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" id="btn-tambah" onclick="tambahdata()" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>