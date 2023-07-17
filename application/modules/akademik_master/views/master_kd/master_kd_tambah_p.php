<div class="modal fade modal-action" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?= ucwords($this->uri->segment(4, 0)) ?> Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') ?>simpan_tambah" enctype="multipart/form-data">
                <div class="modal-body">
                    <!--<input type="hidden" name="kd_sekolah" value="<?= $tampil['kd_sekolah'] ?>">-->
                    <input type="hidden" name="kelas" value="<?= ucwords($this->uri->segment(4, 0)) ?>">
                    <input type="hidden" name="id_mapel" value="<?= ucwords($this->uri->segment(5, 0)) ?>">
                    <input type="hidden" name="jenis" value="P">

                    <!-- <div class="form-group">
                        <label for="no_kd" class="col-sm-3 control-label">No KD <span class="symbol required"> </span></label>
                        <div class="col-sm-2">
                            <input type="text" name="no_kd" class="form-control" id="no_kd" required>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <label>No KD <span class="symbol required"> </span></label>
                        <div class="col-sm-2">
                            <?php echo form_dropdown('no_kd', $p_no_kd, '', 'class="form-control" id="no_kd" required'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi" class="col-sm-3 control-label">Deskripsi <span class="symbol required"> </span></label>
                        <div class="col-sm-8">
                            <textarea name="deskripsi" class="form-control" id="deskripsi" style="height: 100px" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" id="simpan" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>