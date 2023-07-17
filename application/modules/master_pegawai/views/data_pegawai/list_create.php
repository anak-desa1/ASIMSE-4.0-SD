<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title; ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href=""><?= $home; ?></a></li>
                <!-- <li class="breadcrumb-item"><?= $subtitle; ?></li> -->
                <li class="breadcrumb-item active"><?= $title; ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

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
                <a class="btn btn-success mb-3" href="<?= site_url('master_pegawai/data_pegawai/create') ?>"><i class="fa fa-upload"></i> Import Excel</a>
                <a class="btn btn-primary mb-3" href="<?= site_url('master_pegawai/data_pegawai') ?>"><i class="fa fa-users"></i> Data Pegawai</a>
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
                    <div class="container mt-3">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        Upload File Excel
                                    </div>
                                    <form method="POST" action="<?= site_url('master_pegawai/data_pegawai/excel') ?>" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <input type="file" class="form-control" name="file" accept=".xls, .xlsx" required>
                                                <div class="col-md-12 mt-1">
                                                    <span class="text-secondary">File yang harus diupload : .xls, xlsx</span>
                                                </div>
                                                <?= form_error('file', '<div class="text-danger">', '</div>') ?>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-12 mt-1">
                                                    <span class="text-secondary"><i class="fas fa-download mr-1"></i><a href="<?php echo base_url() . 'master_pegawai/data_pegawai/lakukan_download' ?>">Download</a> Format file excel</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <div class="form-group mb-0">
                                                <button type="submit" name="master_data/master_pegawai" class="btn btn-primary"><i class="fas fa-upload mr-1"></i>Upload</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
    </section>
    <!-- /.content -->

</main>

<!-- jQuery -->
<script src="<?= base_url() ?>panel/plugins/jquery/jquery.min.js"></script>
<!-- Datepicker -->
<script src="<?= base_url() ?>panel/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>


