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
                <div class="col-md-6">

                    <!-- About Me Box -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Mata Pelajaran</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <p class="text-muted">Kelas : <?= ucwords($this->uri->segment(4, 0)) ?></p>
                            <hr>
                            <ul class="list-group">
                                <?php
                                if (!empty($mapel)) {
                                    foreach ($mapel as $m) {
                                ?>
                                        <li class="list-group-item"><a href="<?= base_url('akademik_master/master_kd/detail/'); ?><?= ucwords($this->uri->segment(4, 0)) ?>/<?= $m['id'] ?>"><i class="fa fa-chevron-right"></i><button type="submit" class="btn"><?php echo $m['nama']; ?></button></a></li>
                                <?php
                                    }
                                } else {
                                    echo '<div class="alert alert-info">Belum ada KD diinputkan</div>';
                                }
                                ?>
                            </ul>
                        </div>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="card">
                        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="tampil-modal"></div>
                        <div class="card-header p-2">
                            <?php if ($pegawai['bagian_shift'] == 'ON') : ?>
                                <a class="btn btn-danger mb-3" href="<?= site_url('akademik_master/master_kd') ?>">
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
                                            <div class="">
                                                <ul>
                                                    <li>Proses Input Master KD :</li>
                                                    <li>1. Pilih Mapel</li>
                                                    <li>2. Pilih Tambah Data</li>
                                                </ul>
                                            </div>
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