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
        <div class="card-body">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        <?= $subtitle ?>
                        &nbsp;
                        Tahun Aktif : <?= $tahun ?>
                        &nbsp;
                        Semester : <?= $semester ?>
                    </h3>
                </div>
                <!-- Default box -->
                <div class="card-body p-0" style="display: block;">
                    <div class="tampil-modal"></div>
                    <?= form_error('email', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                    <div class="flash-data" data-flashdata=""><?= $this->session->flashdata('message'); ?></div>
                    <div class="card-header">
                        <h3 class="card-title">
                            <?php if ($cek_akses['role_id'] == 1) : ?>
                                <button type="button" class="btn btn-info mb-3 btn-action">
                                    <i class="fa fa-plus-circle"></i> Tambah Data
                                </button>
                            <?php endif ?>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped projects table table-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kelas</th>
                                        <th>Tema</th>
                                        <th>Subtema</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($tampil as $t) :
                                        if ($t['id_guru'] == $pegawai['nik']) { ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><a><?= $t['tingkat'] ?></a></td>
                                                <td><a><?= $t['tema'] ?></a></td>
                                                <td><a><?= $t['subtema'] ?></a></td>
                                                <td class="project-actions">
                                                    <button type="button" class="btn btn-warning mb-3 btn-edit" data-id="<?= $t['id_silabus']; ?>">
                                                        <i class="fa fa-edit"></i></a>
                                                    </button>
                                                    <button type="button" class="btn btn-secondary mb-3 btn-cetak" data-id="<?= $t['id_silabus']; ?>">
                                                        <i class="fa fa-print"></i></a>
                                                    </button>  
                                                    <button type="button" class="btn btn-danger mb-3 btn-delete" data-id="<?= $t['id_silabus']; ?>">
                                                        <i class="fa fa-trash"></i></a>
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                    <?php }
                                    endforeach ?>
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
    <!-- /.content -->

</main>