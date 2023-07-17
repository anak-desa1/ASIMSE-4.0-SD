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
                            <!-- <hr>
                            <p class="text-muted">Campus :</p>
                            <p class="text-muted"><?= $data['nama_campus'] ?></p>
                            <hr>
                            <p class="text-muted">Sekolah :</p>
                            <p class="text-muted"><?= $data['nama_sekolah'] ?></p> -->
                            <hr>
                            <p class="text-muted">Kelas :</p>
                            <p class="text-muted"><?= $data['nama'] ?></p>
                            <hr>
                            <p class="text-muted">Tahun :</p>
                            <p class="text-muted"><?= $ta ?></p>
                            <hr>
                            <!-- <p class="text-muted">Wali Kelas :</p>
                            <p class="text-muted"><?= $data['nama_lengkap'] ?></p>
                            <hr> -->
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
                            <?php if ($cek_akses['role_id'] == 1) : ?>
                                <!-- <button type="button" class="btn btn-info mb-3 btn-action">
                                     <i class="fa fa-plus-circle"></i> Tambah Data
                                 </button> -->
                                <a class="btn btn-danger mb-3" href="<?= site_url('akademik_rombel/atur_kelas') ?>">
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
                                            <table class="table table-striped">

                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>NIS</th>
                                                        <th>Nama</th>
                                                        <th>Rombel</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 1;
                                                    $total = 0; ?>
                                                    <?php foreach ($siswa as $s) :
                                                        if ($s['ta'] == $ta) { ?>
                                                            <tr>
                                                                <td><?= $i; ?></td>
                                                                <td><?= $s['nis']; ?></td>
                                                                <td><?= $s['nama']; ?></td>
                                                                <td><?= $s['rombel']; ?></td>
                                                                <td>
                                                                    <form action="<?= base_url() ?>akademik_rombel/atur_kelas/del/<?= $s['id']; ?>" method="post" enctype="multipart/form-data">
                                                                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $s['id'] ?>">
                                                                        <input type="hidden" class="form-control" id="nis" name="nis" value="<?= $s['nis']; ?>">
                                                                        <input type="hidden" class="form-control" id="id_kelas" name="id_kelas" value="<?= $s['id_kelas'] ?>">
                                                                        <input type="hidden" name="ta" value="<?= $ta ?>">
                                                                        <button type="submit" id="hapus" class="btn btn-danger btn-sm"> <i class="fa fa-trash-alt"></i> Hapus</button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                            <?php $i++ ?>
                                                    <?php }
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