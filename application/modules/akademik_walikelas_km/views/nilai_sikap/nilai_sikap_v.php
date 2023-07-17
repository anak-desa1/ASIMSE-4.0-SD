<style type="text/css">
    .ctr {
        text-align: center
    }
</style>
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
            <!-- About Me Box -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">About Me</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <p class="text-muted">
                        Walikelas : <?= $kelas['nama_lengkap'] ?>
                        Kelas : <?= $kelas['rombel'] ?>
                    </p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="tampil-modal"></div>
                        <div class="card-header p-2">                           
                            <a class="btn btn-info mb-3" href="<?= base_url('akademik_walikelas/nilai_sikap/add_sikap/'); ?>"> <i class="fa fa-address-book"></i> Tamabah Sikap</a>                         
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="col-md-12">
                                    <div class="content">
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                              
                                                <!-- About Me Box -->
                                                <div class="card card-info">                                                   
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                    <?php
                                    $no = 1;
                                    if (!empty($tampil_sikap)) {
                                        foreach ($tampil_sikap as $sikap) {?>
                                            <ul class="list-group">                                                                                                                                         
                                                <li class="list-group-item">
                                                    <div class="pull-right">
                                                        <?php if ($sikap['dimensi'] == 1) {?>
                                                            <a href="#"><i class="fa fa-chevron-right"></i> Beriman, bertakwa kepada Tuhan Yang Maha Esa </a>
                                                        <?php } ?>
                                                        <?php if ($sikap['dimensi'] == 2) {?>
                                                            <a href="#"><i class="fa fa-chevron-right"></i> Mandiri</a>
                                                        <?php } ?>
                                                        <?php if ($sikap['dimensi'] == 3) {?>
                                                            <a href="#"><i class="fa fa-chevron-right"></i> Bergotong royong</a>
                                                        <?php } ?>
                                                        <?php if ($sikap['dimensi'] == 4) {?>
                                                            <a href="#"><i class="fa fa-chevron-right"></i> Kreatif</a>
                                                        <?php } ?>
                                                        <?php if ($sikap['dimensi'] == 5) {?>
                                                            <a href="#"><i class="fa fa-chevron-right"></i> Bernalar Kritis</a>
                                                        <?php } ?>
                                                        <?php if ($sikap['dimensi'] == 6) {?>
                                                            <a href="#"><i class="fa fa-chevron-right"></i> Berkebinekaan global</a>
                                                        <?php } ?>
                                                        <a class="btn btn-xs btn-warning" href="<?= site_url('akademik_walikelas/nilai_sikap/edit_sikap/') ?><?= $sikap['id_kelas']; ?>/<?= $sikap['tasm']; ?>/<?= $sikap['dimensi']; ?>"> <i class="fa fa-pen"></i></a>
                                                        <a class="btn btn-xs btn-danger" href="<?= site_url('akademik_walikelas/nilai_sikap/delete_sikap/') ?><?= $sikap['id_kelas']; ?>/<?= $sikap['tasm']; ?>/<?= $sikap['dimensi']; ?>"> <i class="fa fa-trash-alt"></i></a>
                                                    </div>
                                                </li>                                                                       
                                            <?php
                                        $no++;
                                        }
                                    } else {
                                        echo '<div class="alert alert-success">Belum ada data siswa diinputkan</div>';
                                    }
                                    ?>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    <!-- /.card -->

                        </div>
                    </div>
                </div>
            </div>
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