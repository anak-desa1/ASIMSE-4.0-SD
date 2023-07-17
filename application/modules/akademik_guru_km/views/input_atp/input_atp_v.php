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
                            <!-- <?php if ($cek_akses['role_id'] == 1) : ?>
                            <button type="button" class="btn btn-primary mb-3 btn-action">
                                <span class="fa fa-plus"></span> Tambah Data
                            </button>
                        <?php endif ?> -->
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
                                            Mapel
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
                                    <?php foreach ($tampil as $t) :
                                        if ($t['id_guru'] == $pegawai['nik']) { ?>
                                            <tr>
                                                <td>
                                                    <?= $i ?>
                                                </td>
                                                <td>
                                                    <a>
                                                        <?= $t['nama'] ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a>
                                                        <?= $t['id_kelas'] ?>
                                                    </a>
                                                </td>
                                                <td class="project-actions">
                                                    <a class="btn btn-info btn-sm" href="<?= base_url() ?>akademik_guru_km/input_atp/detail/<?= $t['mapel_id']; ?>/<?= $t['id_kelas']; ?>">
                                                        <i class="fas fa-folder">
                                                        </i>
                                                        ATP
                                                    </a>
                                                    <a class="btn btn-success btn-sm" href="<?= base_url() ?>akademik_guru_km/input_atp/cetak_atp/<?= $t['mapel_id']; ?>/<?= $t['id_kelas']; ?>" target="_blank">
                                                        <i class="fas fa-print">
                                                        </i>
                                                        CETAK ATP
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