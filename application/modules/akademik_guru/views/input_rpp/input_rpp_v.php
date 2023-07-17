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
                    <!-- <div class="tampil-modal"></div>
                    <?= form_error('email', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                    <div class="flash-data" data-flashdata=""><?= $this->session->flashdata('message'); ?></div> -->
                    <!-- <div class="card-header">
                        <h3 class="card-title">
                            
                        </h3>
                    </div> -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped projects table table-sm">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Kelas </th>
                                        <th> Tema </th>
                                        <th> Sub Tema </th>                                        
                                        <th> Action </th>
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
                                                    <a class="btn btn-info btn-sm" href="<?= base_url() ?>akademik_guru/input_rpp/detail/<?= $t['id_silabus']; ?>/<?= $t['tingkat'] ?>">
                                                        <i class="fas fa-folder">
                                                        </i>
                                                        RPP
                                                    </a>
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