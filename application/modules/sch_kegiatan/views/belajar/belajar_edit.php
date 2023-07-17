<div class="modal fade modal-edit" id="modal-lg">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-lg">
                <div class="card card-primary card-outline">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Belajar</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- /.card-header -->
                    <form method="post" action="<?= base_url() . $this->uri->segment(1, 0) ?>/simpan_edit" role="form" id="form-action" enctype="multipart/form-data">
                        <div class="card-body">
                            <input type="hidden" name="belajar_id" value="<?= $belajar['belajar_id'] ?>">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label>Judul</label>
                                    <input type="text" name="judul" value="<?= $belajar['judul'] ?>" class="form-control" required="">
                                </div>
                                <div class="mb-3">
                                    <label>Deskripsi</label>
                                    <div class="mb-3 text-center">
                                        <textarea type="text" name="text" value="" class="form-control"><?= $belajar['text'] ?></textarea>

                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>Url</label>
                                    <div class="mb-3 text-center">
                                        <input type="text" name="link" value="<?= $belajar['link'] ?>" class="form-control" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>Gambar</label>
                                    <div class="mb-3 text-center">
                                        <img src="<?= base_url(); ?>panel/dist/upload/profil_belajar/<?= $belajar['gambar'] ?>" alt="..." style="width:100%;max-width:100px">
                                        <input type="hidden" name="old_image" value="<?= $belajar['gambar'] ?>" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <input type="file" class="form-control" id="gambar" name="gambar" placeholder="Gambar">
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