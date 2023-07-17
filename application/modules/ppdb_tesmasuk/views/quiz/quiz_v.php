<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title; ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><?= $home; ?></a></li>
                <!-- <li class="breadcrumb-item"><?= $subtitle; ?></li> -->
                <li class="breadcrumb-item active"><?= $title; ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <!-- Main content -->
    <section class="content">

        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= $this->session->flashdata('message'); ?>

        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card author-box card-warning">
                    <div class="tampil-modal"></div>
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-file-archive"></i> <?= $title; ?></h3>
                        <div class="card-header-action text-rigth">
                            <!-- Button trigger modal -->
                            <span style="float: right">
                                <button type="button" class="btn btn-primary mb-3 btn-action">
                                    <i class="fas fa-plus-circle"></i> Tambah Kuis
                                </button>
                            </span>
                        </div>
                    </div>
                    <br>
                    <div class="card-body">
                        <div class="row" id="tablemateri">

                            <?php
                            $warna = ['danger', 'warning', 'success', 'primary', 'purple', 'gray', 'navy'];
                            foreach ($materi as $materi) : ?>
                                <div class="col-md-4">
                                    <!-- Widget: user widget style 2 -->
                                    <div class="card" style="width: 18rem;">
                                        <!-- Add the bg color to the header using any of the bg-* classes -->
                                        <div class="widget-user-header bg-<?= $warna[array_rand($warna)]  ?>">
                                            <!-- <div class="widget-user-image">
                                                <img class="img-circle elevation-2" src="<?= base_url() ?>panel/dist/img/materi.png" alt="User Avatar">
                                            </div> -->
                                            <!-- /.widget-user-image -->
                                            <div class="card-body">
                                                <a href="#">
                                                    <div class="info-box">
                                                        <h3 class="card-title">
                                                            <?php if (strlen($materi['nama_mapel']) > 20) {
                                                                echo substr($materi['nama_mapel'], 0, 20) . ' ...';
                                                            } else {
                                                                echo $materi['nama_mapel'];
                                                            }
                                                            ?>
                                                        </h3>
                                                    </div>
                                                    <h5 class="card-title">
                                                        <?= $materi['kelas'] ?>
                                                    </h5>
                                                    <button data-id="<?= $materi['id_materi'] ?>" class="btn-delete float-right btn btn-danger bt-sm"><i class="fa fa-trash-alt"></i></button>
                                                    <button data-id="<?= $materi['id_materi'] ?>" class="btn-edit float-right btn btn-warning bt-sm"><i class=" fas fa-edit"></i></button>

                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <a href="<?= base_url('ppdb_tesmasuk/quiz/soal/') . $materi['id_materi'] ?>" class="card-link">Soal</a>
                                            <a href="<?= base_url('ppdb_tesmasuk/quiz/hasil/') . $materi['id_materi'] ?>" class="card-link">Hasil</a>
                                            <a href="" class="card-link float-right">
                                                <?php if ($materi['status'] == 1) : ?>
                                                    <span class="badge bg-primary">Aktif</span>
                                                <?php else : ?>
                                                    <span class="badge bg-danger">Tidak Aktif</span>
                                                <?php endif; ?>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- /.widget-user -->
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</main>
<!-- /.content-wrapper -->