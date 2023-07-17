<div class="modal fade modal-detail" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-lg">
                <div class="card card-primary card-outline">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Galery</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Judul</label>
                                : <?= $galery['judul_galeri'] ?>
                            </div>
                            <div class="mb-3">
                                <img src="<?= base_url(); ?>panel/dist/upload/profil_galery/<?= $galery['gambar'] ?>" alt="..." style="width:100%;max-width:350px">
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <label>User</label>
                                        : <?= $galery['user_update'] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label>Deskripsi</label>
                                <p><?= $galery['deskripsi'] ?></p>
                            </div>

                            <div class="row">
                                <?php
                                $no = 0;
                                foreach ($galery_plus as $sk) :
                                    $no++ ?>
                                    <div class="col-sm-6">
                                        <div class="card text-center">
                                            <div class="card-body">
                                                <h5 class="card-title "> <?= $no; ?></h5>
                                                <img src="<?= base_url(); ?>panel/dist/upload/profil_galery/<?= $sk['foto'] ?>" alt="..." width="250" height="150">
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>
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