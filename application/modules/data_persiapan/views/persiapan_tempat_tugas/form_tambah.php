<div class="modal fade modal-action" id="form">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tempat Tugas</h4>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
            <form action="<?= base_url('data_persiapan/persiapan_tempat_tugas'); ?>" method="post">
                <div class=" modal-body">
                    <div class="form-group">
                        <select class="form-control m-bot15" style="width: 100%" id="jabatan_id" name="jabatan_id">
                            <option value="">Select Menu</option>
                            <?php foreach ($jabatan as $m) : ?>
                                <option value="<?= $m['jabatan_id']; ?>"><?= $m['jenis_jabatan']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Lokasi">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="kode_lokasi" name="kode_lokasi" placeholder="Kode Lokasi">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>