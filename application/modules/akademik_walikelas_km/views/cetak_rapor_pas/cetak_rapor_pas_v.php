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
                        <i class="fas fa-print"></i>
                        <?= $subtitle ?>
                        <!-- <?= $sekolah['nama_sekolah'] ?> -->
                    </h3>
                </div>
                <!-- Default box -->
                <div class="card-body p-0" style="display: block;">
                    <div class="tampil-modal"></div>
                    <?= form_error('email', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                    <div class="flash-data" data-flashdata=""><?= $this->session->flashdata('message'); ?></div>
                    <div class="card-header">
                        <h3 class="card-title">
                          
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped projects table table-sm">
                                <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Nama Siswa
                                        </th>
                                        <th>
                                            Kelas
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($data as $t) :
                                        if ($t['id_guru'] == $pegawai['nik']) { ?>
                                            <tr>
                                                <td>
                                                    <a>
                                                        <?= $i ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a>
                                                        <?= $t['nama'] ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a>
                                                        <?= $t['rombel'] ?>
                                                    </a>
                                                </td>                                               
                                                <td class="project-actions">
                                                    <a target="_blank" class="btn btn-danger btn-sm" href="<?= base_url() ?>akademik_walikelas_km/cetak_rapor_pas/mpdf_kecil/<?= $t['rombel']; ?>/<?= $t['id_siswa']; ?>/<?= $tasm ?>">
                                                        <i class="fas fa-file">
                                                        </i>
                                                        PDF TTD
                                                    </a>
                                                     <a target="_blank" class="btn btn-dark btn-sm" href="<?= base_url() ?>akademik_walikelas_km/cetak_rapor_pas/mpdf_kecilqrcode/<?= $t['rombel']; ?>/<?= $t['id_siswa']; ?>/<?= $tasm ?>">
                                                        <i class="fas fa-file">
                                                        </i>
                                                        PDF QRCode 
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