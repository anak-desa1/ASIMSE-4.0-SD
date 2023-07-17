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
                    </h3>
                </div>
                <!-- Default box -->
                <div class="card-body p-0" style="display: block;">
                    <div class="tampil-modal"></div>
                    <?= form_error('email', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                    <div class="flash-data" data-flashdata=""><?= $this->session->flashdata('message'); ?></div>
                    <!-- <div class="card-header">
                    <h3 class="card-title">
                        <?php if ($pegawai['bagian_shift'] == 'ON') : ?>
                            <button type="button" class="btn btn-info mb-3 btn-action">
                                <span class="fa fa-plus"></span> Tambah Data
                            </button>
                        <?php endif ?>
                    </h3>
                </div> -->

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped projects">
                                <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <!-- <th>
                                            Sekolah
                                        </th> -->
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
                                    <?php foreach ($kelas as $t) :
                                        // if ($t['tasm'] == $ta)
                                        // if ($t['kd_sekolah'] == $pegawai['kd_sekolah']) 
                                        { ?>
                                            <tr>
                                                <td>
                                                    <?= $i ?>
                                                </td>
                                                <!-- <td>
                                                    <?= $t['nama_sekolah'] ?>
                                                </td> -->
                                                <td>
                                                    <?= $t['nama'] ?>
                                                </td>
                                                <td class="project-actions">
                                                    <?php if ($cek_akses['role_id'] == 1) : ?>
                                                        <a class="btn btn-info btn-sm" href="<?= base_url() ?>akademik_master/master_kd/input_kd/<?= $t['tingkat'] ?>">
                                                            <i class="fas fa-folder">
                                                            </i>
                                                            KD
                                                        </a>
                                                    <?php endif ?>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                    <?php }
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->

</main>