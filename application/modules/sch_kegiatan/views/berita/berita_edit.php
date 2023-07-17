<div class="modal fade modal-edit" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-lg">
                <div class="card card-primary card-outline">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Berita</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- /.card-header -->
                    <form method="post" action="<?= base_url() . $this->uri->segment(1, 0) ?>/simpan_editberita" role="form" id="form-action" enctype="multipart/form-data">
                        <div class="card-body">
                            <input type="hidden" name="id_artikel" value="<?= $berita['id_artikel'] ?>">
                            <input type="hidden" name="user_update" value="<?= $pegawai['nama_pegawai'] ?>">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col">
                                            <label>Judul</label>
                                            <input type="text" name="judul_artikel" value="<?= $berita['judul_artikel'] ?>" class="form-control" required="">
                                        </div>
                                        <div class="col">
                                            <label>Tanggal Terbit</label>
                                            <input type="date" name="tanggal_terbit" value="<?= $berita['tanggal_terbit'] ?>" class="form-control" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>Deskripsi</label>
                                    <div class="mb-3 text-center">
                                        <textarea class="form-control" id="ckeditor" name="deskripsi" rows="3" data-form-field="deskripsi" placeholder="" autofocus="" style="display: none;"><?= $berita['deskripsi'] ?></textarea>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col">
                                            <label>Gambar</label>
                                            <div class="mb-3 text-center">
                                                <img src="<?= base_url(); ?>panel/dist/upload/profil_berita/<?= $berita['gambar'] ?>" alt="..." style="width:100%;max-width:100px">
                                                <input type="hidden" name="old_image" value="<?= $berita['gambar'] ?>" />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <input type="file" class="form-control" id="gambar" name="gambar" placeholder="Gambar">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col">
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

<script src="<?= base_url() ?>panel/plugins/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('ckeditor');
    var ck_ed = CKEDITOR.instances.ckeditor.getData();
</script>