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
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">ID</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($role as $r) : ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <td><?= $r['id']; ?></td>
                                            <td><?= $r['role']; ?></td>
                                            <td>
                                                <a type="button" href="<?= base_url('data_role/roleaccess/') . $r['id']; ?>" class="badge bg-success">access</a>
                                                <a class="badge bg-warning text-dark" href="" data-name="<?= $r['role']; ?>" data-id="<?= $r['id']; ?>" data-bs-toggle="modal" data-bs-target="#editModal" title="Edit"><i class="bi bi-pencil-square"></i></a>
                                                <a href="<?= base_url('data_role/delrole/') . $r['id'] ?>" class="badge bg-danger"><i class="bi bi-x-circle-fill"></i></a>
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
                <h5 class="modal-title" id="exampleModalLabel">Add New Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('data_role'); ?>" method="post">
                <div class=" modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="role" name="role" placeholder="Role name">
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

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Edit Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('data_role/editrole'); ?>" method="post">
                <div class=" modal-body">
                    <input type="hidden" class="form-control" id="ed_id" name="ed_id">
                    <div class="form-group">
                        <input type="text" class="form-control" id="ed_role" name="ed_role" placeholder="Role name">
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

<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Access menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('data_role'); ?>" method="post">
                <div class=" modal-body">
                    <div class="col-lg-6">
                        <h5>Role: <a id="vwrole"></a></h5>
                        <table id="tabrole" class=" table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Access</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($menu as $m) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $m['nama_menu']; ?></td>
                                        <td><?= $m['id']; ?></td>
                                        <td>

                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="close" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="<?= base_url() ?>panel/plugins/jquery/jquery.min.js"></script>

<script>
    $(function() {
        $('#editModal').on('show.bs.modal', function(e) {
            let btn = $(e.relatedTarget);
            let id = btn.data('id');
            let name = btn.data('name');
            $("#ed_id").val(id);
            $("#ed_role").val(name);
        });
    })
</script>

<script>
    var role = "";
    $(function() {
        $('#viewModal').on('show.bs.modal', function(e) {
            let btn = $(e.relatedTarget);
            let id = btn.data('id');
            role = btn.data('role');
            $("#vwrole").text(role);
            var table = document.getElementById('tabrole');
            var parsed = "";
            for (var r = 0, n = table.rows.length; r < n; r++) {
                for (var c = 0, m = table.rows[r].cells.length; c < m; c++) {
                    if (r > 0 && c == 2) {
                        cellct = table.rows[r].cells[c].innerHTML;
                        $.ajax({
                            url: "<?= base_url('data_role/checkaccess') ?>",
                            type: 'post',
                            async: false,
                            data: {
                                role_id: id,
                                menu_id: parseInt(cellct)
                            },
                            success: function(data) {
                                var idcheck = "#check" + cellct;
                                if (data.length > 5) {
                                    $(idcheck).prop('checked', true);
                                } else {
                                    $(idcheck).prop('checked', false);
                                }
                            }
                        });
                    }
                }
            }


            $('.form-check-input').on('click', function() {
                const menuId = $(this).data('menu');
                const roleId = role;
                $.ajax({
                    url: "<?= base_url('admin/accesschange') ?>",
                    type: 'post',
                    data: {
                        menuId: menuId,
                        roleId: role
                    },
                    success: function() {
                        //document.location.href = "<?= base_url('data_role'); ?>" ;
                    }
                });
            });

            $('#close').on('click', function() {
                document.location.href = "<?= base_url('data_role'); ?>";
            });

        });

    });
</script>