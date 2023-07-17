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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- About Me Box -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <hr>
                            <p class="text-muted">Guru Mapel :</p>
                            <p class="text-muted"><?= $guru_aktif['nama_lengkap'] ?></p>
                            <hr>
                        </div>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="tampil-modal"></div>
                        <div class="card-header p-2">
                            <?php if ($pegawai['bagian_shift'] == 'ON') : ?>
                                <button type="button" class="btn btn-info mb-3 btn-action">
                                    <i class="fa fa-plus-circle"></i> Tambah Data
                                </button>
                                <a class="btn btn-danger mb-3" href="<?= site_url('akademik_rombel/atur_mapel') ?>">
                                    <i class="fa fa-arrow-circle-left"></i> Kembali
                                </a>
                            <?php endif ?>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Table row -->
                                    <div class="row">
                                        <div class="col-12 table-responsive">
                                            <table class="table table-striped" width="100%">

                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Rombel</th>
                                                        <th>KD Singkat </th>
                                                        <th>Nama Mapel</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 1;
                                                    ?>
                                                    <?php foreach ($mapel as $s) :
                                                        if ($s['tasm'] == $ta) {  ?>
                                                            <tr>
                                                                <td width="5%"><?= $i; ?></td>
                                                                <td width="5%"><?= $s['id_kelas']; ?></td>
                                                                <td width="15%"><?= $s['kd_singkat']; ?></td>
                                                                <td width="40%"><?= $s['nama']; ?></td>
                                                                <td width="5%">
                                                                    <?php if ($s['mapel_activate'] == 0) : ?>
                                                                        <form action="<?= base_url() ?>akademik_rombel/atur_mapel/del/<?= $s['mapel_id']; ?>" method="post" enctype="multipart/form-data">
                                                                            <input type="hidden" class="form-control" id="mapel_id" name="mapel_id" value="<?= $s['mapel_id'] ?>">
                                                                            <input type="hidden" class="form-control" id="id_guru" name="id_guru" value="<?= $s['id_guru'] ?>">
                                                                            <button type="submit" id="hapus" class="btn btn-danger btn-sm"> <i class="fa fa-trash-alt"></i> Hapus</button>
                                                                        </form>
                                                                    <?php endif ?>
                                                                    <?php if ($s['mapel_activate'] == 1) : ?>
                                                                        <div>Sudah isi KD</div>
                                                                    <?php endif ?>
                                                                </td>
                                                            </tr>
                                                            <?php $i++ ?> <?php }
                                                                    endforeach ?>
                                                </tbody>

                                            </table>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
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