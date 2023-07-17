<div class="modal fade modal-edit" id="modal-lg">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-lg">
                <div class="card card-primary card-outline">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Beasiswa</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- /.card-header -->
                    <form method="post" action="<?= base_url() . $this->uri->segment(1, 0) ?>/simpan_editbeasiswa" role="form" id="form-action" enctype="multipart/form-data">
                        <div class="card-body">
                            <input type="hidden" name="beasiswa_id" value="<?= $beasiswa['beasiswa_id'] ?>">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="nik">NIS* ( Nomor Induk Siswa )</label>
                                    <input type="text" minlength="5" maxlength="18" class="form-control" name="nis" value="<?= $beasiswa['nis'] ?>" autocomplete="off" required>
                                    <?= form_error('nis', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="mb-3">
                                    <label>Nama Siswa</label>
                                    <input type="text" name="nama_siswa" value="<?= $beasiswa['nama_siswa'] ?>" class="form-control" required="">
                                </div>

                                <div class="mb-3">
                                    <label>Tahun Pelajaran</label>
                                    <div class="mb-3 text-center">
                                        <input type="text" name="th_pelajaran" value="<?= $beasiswa['th_pelajaran'] ?>" class="form-control" />
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label>Keterangan</label>
                                    <div class="mb-3 text-center">
                                        <input type="text" name="keterangan" value="<?= $beasiswa['keterangan'] ?>" class="form-control" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status" value="1" class="selectgroup-input" checked="">
                                            <span class="selectgroup-button">Aktif</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="status" value="2" class="selectgroup-input">
                                            <span class="selectgroup-button">Tidak Aktif</span>
                                        </label>

                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Save</button>
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