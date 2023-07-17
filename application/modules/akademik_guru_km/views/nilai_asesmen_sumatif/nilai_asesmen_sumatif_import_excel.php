<?php if ($pegawai['kd_sekolah'] == $pegawai['kd_sekolah']) : ?>

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

        <section class="content">
            <div class="container-fluid">
                <!-- About Me Box -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">About Me</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <p class="text-muted"><?= $data['rombel'] ?> | <?= $data['nama'] ?></p>
                        <p class="text-muted"><?= $data['mapel_id'] ?> | <?= $data['nama_lengkap'] ?></p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- /.col -->
                    <div class="col-md-12">
                        <div class="card">
                            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                            <?= $this->session->flashdata('message'); ?>
                            <div class="tampil-modal"></div>
                            <div class="card-header p-2">
                                <a class="btn btn-info mb-3" href="<?= site_url('akademik_guru_km/input_nilai_sumatif/nilai_sumatif/') ?><?= $data['mapel_id'] ?>"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                                <?php if ($cek_akses['role_id'] == 1) : ?>
                                <?php endif ?>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">

                                        <div class="row">                                            
                                            <div class="col-sm-8">
                                                <div class="card card-warning">
                                                    <div class="card-header">
                                                        <h3 class="card-title"> Upload File Excel</h3>
                                                    </div>
                                                    <form method="POST" action="<?= site_url('akademik_guru_km/input_nilai_sumatif/upload_excel_sumatif') ?>" enctype="multipart/form-data">
                                                        <input type="hidden" name="id_guru_mapel" value="<?= $mapel['mapel_id'] ?>">
                                                        <input type="hidden" name="mapel_id" value="<?= $mapel['mapel_id'] ?>">
                                                        <input type="hidden" name="tasm" value="<?= $tasm ?>">
                                                       
                                                        <div class="card-body">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <input type="file" class="form-control" name="file" accept=".xls, .xlsx" required>
                                                                    <div class="col-md-12 mt-1">
                                                                        <span class="text-secondary">File yang harus diupload : .xlsx</span>
                                                                    </div>
                                                                    <?= form_error('file', '<div class="text-danger">', '</div>') ?>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer">
                                                                <div class="form-group mb-0">
                                                                    <button type="submit" name="" class="btn btn-success"><i class="fas fa-upload mr-1"></i>Import Excel</button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->

    </main>

    <div class="modal fade modal-action" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= ucwords($this->uri->segment(4, 0)) ?> Data </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-rose card-header-icon">
                            <h4 class="card-title"><?= $pegawai['nama_pegawai'] ?></h4>
                        </div>
                        <div class="card-body">
                            <div class="row">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endif ?>

<!-- jQuery -->
<script src="<?= base_url() ?>plugins/jquery/jquery.min.js"></script>
<!-- Datepicker -->
<script src="<?= base_url() ?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>