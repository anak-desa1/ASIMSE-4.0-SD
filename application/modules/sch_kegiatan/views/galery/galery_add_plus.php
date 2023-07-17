<div class="modal fade modal-plus" id="modal-lg">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-lg">
                <div class="card card-primary card-outline">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Galery Plus</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- /.card-header -->
                    <form method="post" action="<?= base_url() . $this->uri->segment(1, 0) ?>/simpan_galeryplus" role="form" id="form-action" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="modal-body">
                                <input type="hidden" name="id_galeri" value="<?= $galery['id_galeri'] ?>">
                                <div class="mb-3">
                                    <label>Upload gambar ukuran 700 x 500</label>
                                    <div class="mb-3 text-center">
                                        <img src="<?= base_url(); ?>panel/dist/upload/profil_galery/200x200.png" alt="..." style="width:100%;max-width:100px">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <!-- <label>Foto</label> -->
                                    <div class="mb-3 text-center">
                                        <input type="file" class="form-control" id="foto" name="foto" placeholder="Gambar">
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