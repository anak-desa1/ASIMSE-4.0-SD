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
                <br />
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $subtitle; ?></h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>Periode</th>
                                        <th>tgl_mulai</th>
                                        <th>tgl_selesai</th>
                                        <th>Tahun</th>
                                        <th>status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($periode as $periode) :
                                        $no++ ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $periode['periode'] ?></td>
                                            <td><?= $periode['tgl_mulai'] ?></td>
                                            <td><?= $periode['tgl_selesai'] ?></td>
                                            <td><?= $periode['tahun'] ?></td>
                                            <td>
                                                <?php if ($periode['status'] == 'Aktif') { ?>
                                                    <span class="badge bg-success">Aktif</span>
                                                <?php } else { ?>
                                                    <span class="badge bg-danger">Non Aktif</span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <a class="btn btn-sm btn-warning" title="Edit" id="edit_periode" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $periode['id']; ?>" data-periode="<?= $periode['periode']; ?>" data-tgl_mulai="<?= $periode['tgl_mulai']; ?>" data-tgl_selesai="<?= $periode['tgl_selesai']; ?>" data-tahun="<?= $periode['tahun']; ?>" data-status="<?= $periode['status']; ?>"><i class="bi bi-pencil-square"></i></a>
                                                <a href="<?= base_url() ?>ppdb_setting/deldata_periode/<?= $periode['id'] ?>" class="btn btn-sm btn-danger btn-hapus"><i class="bi bi-trash"></i></a>
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
                <h5 class="modal-title">Tambah Periode</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="<?= base_url() . $this->uri->segment(1, 0) ?>/simpan_tambah_periode" role="form" id="form-action" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Periode</label>
                        <input type="text" name="periode" class="form-control" required="">
                    </div>
                    <div class="mb-3">
                        <label>Tgl Mulai</label>
                        <input type="date" name="tgl_mulai" class="form-control" required="">
                    </div>
                    <div class="mb-3">
                        <label>Tgl Selesai</label>
                        <input type="date" name="tgl_selesai" class="form-control" required="">
                    </div>

                    <div class="mb-3">
                        <label>Tahun Pendaftaran</label>
                        <input type="text" name="tahun" class="form-control" required="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                <!-- /.card-body -->
            </form>
        </div>
    </div>
</div>

<!--modal update--->
<div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Periode</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="<?= base_url() . $this->uri->segment(1, 0) ?>/simpan_edit_periode" role="form" id="form-action" enctype="multipart/form-data">
                <div class="modal-body" id="modal-edit">
                    <input type="hidden" name="id" id="id" class="form-control" required="">
                    <div class="mb-3">
                        <label>Periode</label>
                        <input type="text" name="periode" id="periode" class="form-control" required="">
                    </div>
                    <div class="mb-3">
                        <label>TGL Mulai</label>
                        <input type="date" name="tgl_mulai" id="tgl_mulai" class="form-control" required="">
                    </div>
                    <div class="mb-3">
                        <label>TGL Selesai</label>
                        <input type="date" name="tgl_selesai" id="tgl_selesai" class="form-control" required="">
                    </div>
                    <div class="mb-3">
                        <label>Tahun Pendaftaran</label>
                        <input type="text" name="tahun" id="tahun" class="form-control" required="">
                    </div>
                    <div class="mb-3">
                        <div class="control-label">Status</div>
                        <label class="custom-switch mt-2">
                            <input type="checkbox" name="status" class="custom-switch-input" value='Aktif' <?php if ("status" == 'Aktif') {
                                                                                                                echo "checked";
                                                                                                            } ?>>
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description"> Pilih Status</span>
                        </label>
                    </div>
                    <div class="mb-3">
                        <div class="control-label">Tahun Aktif</div>
                        <label class="custom-switch mt-2">
                            <input type="checkbox" name="is_active" class="custom-switch-input" value='1' <?php if ("is_active" == 1) {
                                                                                                                echo "checked";
                                                                                                            } ?>>
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description"> Pilih Status</span>
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                <!-- /.card-body -->
            </form>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="<?= base_url() ?>panel/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
    $(document).on("click", "#edit_periode", function() {
        var id = $(this).data('id');
        var periode = $(this).data('periode');
        var tgl_mulai = $(this).data('tgl_mulai');
        var tgl_selesai = $(this).data('tgl_selesai');
        var tahun = $(this).data('tahun');
        var status = $(this).data('status');
        var is_active = $(this).data('is_active');
        $("#modal-edit #id").val(id);
        $("#modal-edit #periode").val(periode);
        $("#modal-edit #tgl_mulai").val(tgl_mulai);
        $("#modal-edit #tgl_selesai").val(tgl_selesai);
        $("#modal-edit #tahun").val(tahun);
        $("#modal-edit #status").val(status);
        $("#modal-edit #is_active").val(is_active);
    })
</script>