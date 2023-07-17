<div class="modal fade modal-edit" id="modal-lg">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-lg">
                <div class="card card-primary card-outline">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Sertifikat Vaksin</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- /.card-header -->
                    <form method="post" action="<?= base_url() . $this->uri->segment(1, 0) ?>/simpan_edit" role="form" id="form-action" enctype="multipart/form-data">
                        <div class="card-body">
                            <input type="hidden" name="id_vaksin" value="<?= $vaksin['id_vaksin'] ?>">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="nik">NIK* ( Nomor Induk Kependudukan )</label>
                                    <input type="text" minlength="16" maxlength="18" class="form-control" name="nik" value="<?= $vaksin['nik'] ?>" autocomplete="off" required>
                                    <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="mb-3">
                                    <label>Nama Siswa</label>
                                    <input type="text" name="nama_siswa" value="<?= $vaksin['nama_siswa'] ?>" class="form-control" required="">
                                </div>

                                <div class="mb-3">
                                    <label>Vaksin 1</label>
                                    <div class="mb-3 text-center">
                                        <img src="<?= base_url(); ?>panel/dist/upload/sertifikat_vaksin/<?= $vaksin['vaksin_1'] ?>" alt="..." style="width:100%;max-width:100px">
                                        <input type="hidden" name="old_image" value="<?= $vaksin['vaksin_1'] ?>" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <input type="file" class="form-control" id="vaksin_1" name="vaksin_1" placeholder="vaksin_1">
                                </div>

                                <div class="mb-3">
                                    <label>Vaksin 2</label>
                                    <div class="mb-3 text-center">
                                        <img src="<?= base_url(); ?>panel/dist/upload/sertifikat_vaksin/<?= $vaksin['vaksin_2'] ?>" alt="..." style="width:100%;max-width:100px">
                                        <input type="hidden" name="old_image" value="<?= $vaksin['vaksin_2'] ?>" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <input type="file" class="form-control" id="vaksin_2" name="vaksin_2" placeholder="vaksin_2">
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