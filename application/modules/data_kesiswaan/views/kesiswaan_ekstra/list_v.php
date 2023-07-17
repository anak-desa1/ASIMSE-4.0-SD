<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title; ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html"><?= $home; ?></a></li>
                <!-- <li class="breadcrumb-item"><?= $subtitle; ?></li> -->
                <li class="breadcrumb-item active"><?= $title; ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <!-- Main content -->
    <section class="section dashboard">
        <div class="row">

            <div class="col-12">
                <!-- Default box -->
                <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <?= $this->session->flashdata('message'); ?>
                <div class="card-toolbar">
                    <a href="" class="btn btn-primary font-weight-bolder font-size-sm mr-3" data-bs-toggle="modal" data-bs-target="#newRoleModal"> <span class="fa fa-plus"></span> Tambah Data</a>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $subtitle; ?></h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>Judul</th>
                                        <th>Deskripsi</th>
                                        <th>Gambar</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($foto as $sk) :
                                        $no++ ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $sk['judul'] ?></td>
                                            <td><?= $sk['text'] ?></td>
                                            <td>
                                                <?php if ($sk['gambar'] != '') { ?>
                                                    <img src="<?= base_url(); ?>panel/dist/upload/profil_ekstra/<?= $sk['gambar'] ?>" alt="..." style="width:100%;max-width:100px">
                                                <?php } else { ?>
                                                    <img src="<?= base_url(); ?>panel/dist/upload/profil_ekstra/200x200.png" alt="..." style="width:100%;max-width:100px">
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($sk['status'] == 1) { ?>
                                                    Aktif
                                                <?php } else { ?>
                                                    Tidak Aktif
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-warning" title="Edit" id="edit_osis" data-bs-toggle="modal" data-bs-target="#editModal" data-ekstra_id="<?= $sk['ekstra_id']; ?>" data-judul="<?= $sk['judul']; ?>" data-text="<?= $sk['text']; ?>" data-status="<?= $sk['status']; ?>" data-gambar="<?= $sk['gambar']; ?>"><i class="fa fa-edit"></i> </a>
                                                <a href="<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') ?>/deldata/<?= $sk['ekstra_id'] ?>" class="btn btn-sm btn-danger btn-hapus"><i class="fa fa-trash-alt"></i> </a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

        </div>
    </section>

</main>

<!--modal add--->
<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Profil Ekstrakurikuler</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="<?= base_url() . $this->uri->segment(1, 0), $this->uri->slash_segment(2, 'both') ?>/simpan_tambah" role="form" id="form-action" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nik">Judul</label>
                        <input type="text" class="form-control" name="judul" placeholder="Judul" autocomplete="off" required>
                        <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea type="text" name="text" class="form-control" placeholder="Deskripsi" required=""></textarea>
                        <?= form_error('text', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label>Upload gambar ukuran 200 x 200</label>
                        <div class="mb-3 text-center">
                            <img src="<?= base_url(); ?>/panel/dist/upload/profil_ekstra/200x200.png" alt="..." style="width:100%;max-width:100px">
                        </div>
                    </div>
                    <div class="mb-3">
                        <!-- <label>Foto</label> -->
                        <div class="mb-3 text-center">
                            <input type="file" class="form-control" id="gambar" name="gambar" placeholder="Gambar">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!--modal update--->
<div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Profil Ekstrakurikuler</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') ?>/simpan_edit" id="form" role="form" id="form-action" enctype="multipart/form-data">
                <!-- <form id="form" role="form" id="form-action" enctype="multipart/form-data"> -->
                <div class="card-body">
                    <div class="modal-body" id="modal-edit">
                        <input type="hidden" class="form-control" id="ekstra_id" name="ekstra_id">
                        <div class="mb-3">
                            <label for="nik">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul">
                        </div>
                        <div class="mb-3">
                            <label>Deskripsi</label>
                            <input type="text" class="form-control" id="text" name="text" placeholder="Deskripsi">
                        </div>
                        <div class="mb-3">
                            <div class="control-label">Status</div>
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="status" class="custom-switch-input" value='1' <?php if ("status" == 1) {
                                                                                                                echo "checked";
                                                                                                            } ?>>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description"> Pilih Status</span>
                            </label>
                        </div>
                        <div class="mb-3">
                            <label>Gambar</label>
                            <div class="mb-3 text-center">
                                <img src="" alt="..." style="width:100%;max-width:100px" id="pict">
                                <input type="hidden" name="old_image" id="gambar" name="gambar" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="file" class="form-control" id="gambar" name="gambar" placeholder="Gambar">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="editModal" value="simpan"><i class="bi bi-save"></i> Save</button>
                    </div>
                </div>
                <!-- /.card-body -->
            </form>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="<?= base_url() ?>panel/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
    $(document).on("click", "#edit_osis", function() {
        var ekstra_id = $(this).data('ekstra_id');
        var judul = $(this).data('judul');
        var text = $(this).data('text');
        var status = $(this).data('status');
        var gambar = $(this).data('gambar');
        $("#modal-edit #ekstra_id").val(ekstra_id);
        $("#modal-edit #judul").val(judul);
        $("#modal-edit #text").val(text);
        $("#modal-edit #status").val(status);
        $("#modal-edit #pict").attr("src", "<?= base_url(); ?>panel/dist/upload/profil_ekstra/" + gambar);
    })
</script>