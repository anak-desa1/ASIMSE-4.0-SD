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
                    <div class="card-header">
                        <h3 class="card-title">
                            <?php if ($pegawai['bagian_shift'] == 'ON') : ?>
                                <button type="button" class="btn btn-info mb-3 btn-action">
                                    <i class="bi bi-plus-square"></i> Tambah Data
                                </button>
                            <?php endif ?>
                        </h3>
                    </div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped projects" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Rombel</th>
                                        <th>Walikelas</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($kelas as $t) :  { ?>                                      
                                            <tr>
                                                <td width="5%"><?= $i ?></td>
                                                <td width="10%"><a><?= $t['rombel'] ?></a></td>
                                                <td width="15%">
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item">
                                                            <?php foreach ($guru as $n) :
                                                                if ($n['tasm'] == $ta)
                                                                    if ($n['id_kelas'] == $t['rombel']) { ?>                                                                        
                                                                    <a href="#" title="<?= $n['nama_lengkap'] ?>"> <?= $n['nama_lengkap'] ?></a>
                                                            <?php }
                                                            endforeach ?>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td width="5%">
                                                    <?php if ($cek_akses['role_id'] == 1) : ?>
                                                        <?php foreach ($guru as $n) :
                                                            if ($n['tasm'] == $ta)
                                                                if ($n['id_kelas'] == $t['rombel']) { ?>                                                                     
                                                                <a class="btn btn-danger btn-xs" href="<?= base_url() ?>akademik_rombel/atur_walikelas/del/<?= $n['wali_id']; ?>">
                                                                    <i class="fa fa-trash-alt"></i>
                                                                </a>
                                                        <?php }
                                                        endforeach ?>
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
    </section>
    <!-- /.content -->

</main>