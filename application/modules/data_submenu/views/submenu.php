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
                        <br>
                        <br>

                        <!-- Table Variants -->
                        <div class="table-responsive">
                            <table class="table" style="font-size: 14px">
                                <thead>
                                    <tr>
                                        <th width='5'>#</th>
                                        <th width='10'>Menu</th>
                                        <th width='10'>Title</th>
                                        <th width='10'>Url</th>
                                        <th width='10'>Icon</th>
                                        <!-- <th width='10'>Active</th>
                                        <th width='10'>Show</th>
                                        <th width='10'>Order ID</th> -->
                                        <th width='10'>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($sub_menu as $sm) : ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <td><?= $sm['nama_menu']; ?></td>
                                            <td><?= $sm['judul_menu']; ?></td>
                                            <td><?= $sm['url']; ?></td>
                                            <td><?= $sm['s_icon']; ?></td>
                                            <!-- <td><?= $sm['is_active']; ?></td>
                                            <td><?= $sm['hide']; ?></td>
                                            <td><?= $sm['order_id']; ?></td> -->
                                            <td>
                                                <!-- Button trigger modal -->
                                                <a type="button" class="btn btn-warning btn-sm" data-menu="<?= $sm['menu_id']; ?>" data-url="<?= $sm['url']; ?>" data-s_icon="<?= $sm['s_icon']; ?>" data-judul="<?= $sm['judul_menu']; ?>" data-active="<?= $sm['is_active']; ?>" data-hide="<?= $sm['hide']; ?>" data-order="<?= $sm['order_id']; ?>" data-id="<?= $sm['id']; ?>" data-bs-toggle="modal" data-bs-target="#editModal">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <a class="btn btn-icon btn-light btn-hover-primary btn-sm" href="<?= base_url('data_submenu/delsubmenu/') . $sm['id'] ?>" title="Delete">
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

<!--modal add--->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Submenu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('data_submenu'); ?>" method="post">
                <div class=" modal-body">
                    <div class="mb-3">
                        <select class="form-control m-bot15" style="width: 100%" id="menu_id" name="menu_id">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['nama_menu']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="title" name="judul_menu" placeholder="Submenu title">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control mb-5" id="s_icon" name="s_icon" placeholder="Submenu icon">
                        <span><a href="https://preview.keenthemes.com/metronic/demo1/features/icons/svg.html">Click this to view Icons</a> </span>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <input type="number" class="form-control  mb-5" value="1" id="order_id" name="order_id" placeholder="Order ID">
                            <span><a href="#">Order ID</a> </span>
                        </div>
                        <div class="form-group col">
                            <input type="number" class="form-control  mb-5" value="1" id="hide" name="hide" placeholder="Show">
                            <span><a href="#">Show</a> </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Active?
                            </label>
                        </div>
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
<!--end modal add--->

<!--modal edit--->
<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Submenu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('data_submenu/editsubmenu'); ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="ed_id" name="ed_id">
                    <div class="mb-3">
                        <select class="form-control m-bot15" style="width: 100%" id="ed_menu" name="ed_menu">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['nama_menu']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="ed_title" name="ed_title" placeholder="Submenu title">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="ed_url" name="ed_url" placeholder="Submenu url">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control mb-5" id="ed_s_icon" name="ed_s_icon" placeholder="Submenu icon">
                        <span><a href="https://preview.keenthemes.com/metronic/demo1/features/icons/svg.html">Click this to view Icons</a> </span>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <input type="number" class="form-control  mb-5" value="" id="ed_order_id" name="ed_order_id" placeholder="Order ID">
                            <span><a href="">Order ID</a> </span>
                        </div>
                        <div class="form-group col">
                            <input type="number" class="form-control  mb-5" value="1" id="ed_hide" name="ed_hide" placeholder="Show">
                            <span><a href="">Show</a> </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Active?
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end modal edit--->

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
        $('#editModal').on('show.bs.modal', function(e) {
            let btn = $(e.relatedTarget);
            let id = btn.data('id');
            let menu = btn.data('menu');
            let judul = btn.data('judul');
            let url = btn.data('url');
            let s_icon = btn.data('s_icon');
            let active = btn.data('active');
            let hide = btn.data('hide');
            let order = btn.data('order');
            $("#ed_id").val(id);
            $("#ed_menu").val(menu);
            $("#ed_title").val(judul);
            $("#ed_url").val(url);
            $("#ed_s_icon").val(s_icon);
            $("#ed_active").val(active);
            $("#ed_hide").val(hide);
            $("#ed_order_id").val(order);
        });
    });
</script>