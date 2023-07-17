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
        <div class="col-12">
            <div class="card">
                <div class="tampil-modal"></div>
                <?= form_error('email', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <div class="flash-data" data-flashdata=""><?= $this->session->flashdata('message'); ?></div>
                <div class="card-body">
                    <div class="content">
                        <div class="panel">
                            <div class="panel-body">
                                <button type="button" class="btn btn-primary mb-3 btn-action">
                                    <span class="fa fa-plus"></span> Tambah Data
                                </button>
                                <a class="btn btn-success mb-3" href="<?= site_url('master_siswa/data_siswa/create') ?>"><i class="fa fa-upload"></i> Import Excel</a>
                                <!--<a class="btn btn-primary mb-3" href="<?= site_url('master_siswa/data_siswa') ?>"><i class="fa fa-users"></i> Data Siswa</a>-->
                                <!-- <?php if ($pegawai['bagian_shift'] == 'ON') : ?>
                                  
                                <?php endif ?> -->
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-sm" id="example1" style="font-size: 14px">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>NIS</th>
                                            <th>NISN</th>
                                            <th>Nama</th>
                                            <th>JK</th>
                                            <th>TGL Lahir</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
    </section>
    <!-- /.content -->

</main>
