<div class="modal fade modal-detail" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-lg">
                <div class="card card-primary card-outline">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Belajar</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Judul</label>
                                : <?= $berita['judul_artikel'] ?>
                            </div>
                            <div class="mb-3">
                                <img src="<?= base_url(); ?>panel/dist/upload/profil_berita/<?= $berita['gambar'] ?>" alt="..." style="width:100%;max-width:350px">
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <label>Tanggal Terbit</label>
                                        : <?= $berita['tanggal_terbit'] ?>
                                    </div>
                                    <div class="col">
                                        <label>User</label>
                                        : <?= $berita['user_update'] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label>Deskripsi</label>
                                <p><?= $berita['deskripsi'] ?></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- form start -->
        </div>
        <!-- /.modal-content -->

    </div>
    <!-- /.modal-dialog -->
</div>