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
                        <h4 class="card-title">Walikelas</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?= base_url() ?>akademik_rombel/atur_walikelas/ubah_walikelas" enctype="multipart/form-data">
                            <input type="hidden" name="tasm" value="<?= $ta ?>">
                            <input type="hidden" name="wali_id" value="<?= $walikelas['wali_id'] ?>">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card ">
                                        <div class="form-group">
                                            <label>Campus <span class="symbol required"> </span></label>
                                            <select class="form-control select2" style="width: 100%;" id="campus" name="kd_campus">
                                                <option value="">Pilih Campus</option>
                                                <?php foreach ($campus as $cam) {
                                                    echo '<option value="' . $cam->kd_campus . '">' . $cam->nama_campus . '</option>';
                                                } ?>
                                            </select>
                                        </div>

                                        <div class="dropdown bootstrap-select">
                                            <div class="form-group">
                                                <label>Sekolah<span class="symbol required"> </span></label>
                                                <select name="kd_sekolah" id="sekolah" class="selectpicker form-control" data-live-search="true">
                                                    <option value="">Pilih Campus Dulu</option>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Guru Mapel<span class="symbol required"> </span></label>
                                                <select name="id_guru" id="guru" class="selectpicker form-control" data-live-search="true">
                                                    <option value="">Pilih Guru</option>

                                                </select>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Walikelas<span class="symbol required"> </span></label>
                                        <input type="text" class="form-control" name="" value="<?= $walikelas['nama_lengkap'] ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Rombel<span class="symbol required"> </span></label>
                                        <input type="text" class="form-control" name="id_kelas" value="<?= $walikelas['id_kelas'] ?>" readonly>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="submit" id="simpan" class="btn btn-primary"><i class="bi bi-save2"></i> Simpan</button>
                                    </div>
                                </div>
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