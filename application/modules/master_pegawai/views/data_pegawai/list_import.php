<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><?= $home; ?></a></li>
                        <li class="breadcrumb-item active"><?= $subtitle; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="col-12">
            <!-- Default box -->
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <div class="tampil-modal"></div>
            <?php if ($cek_akses['role_id'] == 1) : ?>
                <button type="button" class="btn btn-primary mb-3 btn-action">
                    <span class="fa fa-plus"></span> Tambah Data
                </button>
                <a class="btn btn-success mb-3" href="<?= site_url('master_data/master_pegawai/create') ?>"><i class="fa fa-upload"></i> Import Excel</a>
                <a class="btn btn-primary mb-3" href="<?= site_url('master_data/master_pegawai') ?>"><i class="fa fa-users"></i> Data Pegawai</a>
            <?php endif ?>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?= $subtitle; ?></h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Telp</th>
                                <th scope="col">Email</th>
                                <th scope="col">Tgl Masuk</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($tampil_data as $s) : ?>
                                <tr>
                                    <td scope="row"><?= ++$start; ?></td>
                                    <input type="hidden" value="<?= $s['data_id'] ?>">
                                    <td><?= $s['nik']; ?></td>
                                    <td><?= $s['nama_lengkap']; ?></td>
                                    <td><?= $s['telp']; ?></td>
                                    <td><?= $s['email']; ?></td>
                                    <td><?= $s['tgl_masuk']; ?></td>
                                    <td>
                                        <?php if ($cek_akses['role_id'] == 1) : ?>
                                            <a class="btn btn-icon btn-light btn-hover-primary btn-sm" href="<?= base_url() ?>master_data/master_pegawai/editdata/<?= $s['data_id']; ?>">
                                                <i class="fas fa-edit text-warning"> </i>
                                            </a>
                                        <?php endif ?>
                                        <a class="btn btn-icon btn-light btn-hover-primary btn-sm" href="<?= base_url('master_data/master_pegawai/delPegawai/') . $s['data_id']; ?>" title="Delete">
                                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                <i class="fa fa-trash-alt text-danger">
                                                    <span></span>
                                                </i>
                                            </span>
                                        </a>
                                    </td>
                                </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col">
                            <!--Tampilkan pagination-->
                            <?= $this->pagination->create_links(); ?>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- jQuery -->
<script src="<?= base_url() ?>plugins/jquery/jquery.min.js"></script>
<!-- Datepicker -->
<script src="<?= base_url() ?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>