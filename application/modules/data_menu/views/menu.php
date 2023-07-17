<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title; ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html"><?= $home; ?></a></li>
                <li class="breadcrumb-item"><?= $subtitle; ?></li>
                <li class="breadcrumb-item active"><?= $title; ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <!-- Main content -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="tampil-modal"></div>
                        <div class="info-box">
                            <h5 class="card-title"><?= $subtitle; ?></h5>
                        </div>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="bi bi-plus-square"></i> Tambah Data
                        </button>

                        <!-- Table Variants -->
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="text-left">
                                        <th scope="col">#</th>
                                        <th scope="col">Menu</th>
                                        <th scope="col">Url</th>
                                        <th scope="col">Icon</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($menu as $m) : ?>
                                        <tr>
                                            <td scope="row"><?= $i; ?></td>
                                            <td><?= $m['nama_menu']; ?></td>
                                            <td><?= $m['url']; ?></td>
                                            <td><?= $m['m_icon']; ?></td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <a type="button" class="btn btn-warning btn-sm" data-nama="<?= $m['nama_menu']; ?>" data-url="<?= $m['url'] ?>" data-m_icon="<?= $m['m_icon'] ?>" data-id="<?= $m['id']; ?>" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>

                                                <a class="btn btn-icon btn-light btn-hover-primary btn-sm" href="<?= base_url('data_menu/delmenu/') . $m['id'] ?>" title="Delete">
                                                    <button onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini ?')" class="btn btn-flat btn-sm btn-danger" title="Delete"><i class="bi bi-trash"></i></button>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- End Table Variants -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

<!--modal add-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('data_menu/create_menu'); ?>" method="post">
                <div class=" modal-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="menu" name="nama_menu" placeholder="Menu name">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Link Menu">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="m_icon" name="m_icon" placeholder="Icon">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end modal add-->
<!--modal edit-->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('data_menu/editmenu'); ?>" method="post">
                <div class=" modal-body">
                    <input type="hidden" class="form-control" id="ed_id" name="ed_id">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="ed_nama" name="ed_nama" placeholder="Menu name">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="ed_url" name="ed_url" placeholder="Link Menu">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="ed_m_icon" name="ed_m_icon" placeholder="Icon Menu">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end modal edit-->
<!-- jQuery -->
<script src="<?= base_url() ?>panel/plugins/jquery/jquery.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url() ?>panel/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- jquery-validation -->
<script src="<?= base_url() ?>panel/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>panel/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>panel/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>panel/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- Datepicker -->
<script src="<?= base_url() ?>panel/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<script>
    $(function() {
        $('#staticBackdrop').on('show.bs.modal', function(e) {
            let btn = $(e.relatedTarget);
            let id = btn.data('id');
            let nama = btn.data('nama');
            let url = btn.data('url');
            let m_icon = btn.data('m_icon');
            $("#ed_id").val(id);
            $("#ed_nama").val(nama);
            $("#ed_url").val(url);
            $("#ed_m_icon").val(m_icon);
        });
    });
</script>