<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>

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
    <section class="content">
        <div class="col-12">

            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <div class="tampil-modal"></div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                         <a class="btn btn-primary mb-3" href="<?= site_url('master_siswa/data_siswa') ?>"><i class="fa fa-users"></i> Data Siswa</a>
                         <?= $subtitle; ?>
                    </h3>
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

                                    <form method="POST" action="<?= site_url('master_siswa/data_siswa/excel') ?>" enctype="multipart/form-data">

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Diterima di kelas<span class="symbol required"> </span></label>
                                                    <select name="tingkat" id="kelas" class="selectpicker form-control" data-live-search="true">
                                                        <option value="">Pilih Kelas</option>
                                                        <?php foreach ($kelas as $cam) {
                                                            echo '<option value="' . $cam->tingkat . '">' . $cam->kelas . '</option>';
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

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
                                                    <span class="text-secondary"><i class="fas fa-download mr-1"></i><a href="<?php echo base_url() . 'master_siswa/data_siswa/download' ?>">Download</a> Format file excel</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-footer text-right">
                                            <div class="form-group mb-0">
                                                <button type="submit" name="master_siswa/data_siswa" class="btn btn-primary"><i class="fas fa-upload mr-1"></i>Upload</button>
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
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</main>
<!-- /.content-wrapper -->

<!-- /.content-wrapper -->


<!-- jQuery -->
<script src="<?= base_url() ?>plugins/jquery/jquery.min.js"></script>
<!-- Datepicker -->
<script src="<?= base_url() ?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>