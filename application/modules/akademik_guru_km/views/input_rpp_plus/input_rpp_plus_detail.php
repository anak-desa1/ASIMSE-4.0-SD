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
        <div class="col-md-12">
        <!-- About Me Box -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">About Me</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">      
                <p class="text-muted"><?= $data['id_kelas'] ?></p>        
                <p class="text-muted"><?= $data['nama'] ?></p>      
                <p class="text-muted"><?= $data['mapel_id'] ?> | <?= $data['nama_lengkap'] ?></p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>
        <div class="container-fluid">
            <div class="row">               
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="card">
                        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="tampil-modal"></div>
                        <div class="card-header p-2">                           
                            <a class="btn btn-primary mb-3" href="<?= site_url('akademik_guru_km/input_rpp_plus') ?>">
                                <i class="fa fa-arrow-circle-left"></i> Kembali
                            </a>                            
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Table row -->
                                    <div class="row">
                                        <div class="col-12 table-responsive">
                                            <table class="table table-striped table table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>                                                      
                                                        <th>No Sumatif</th>
                                                        <th>Deskripsi Sumatif</th>
                                                        <th>Semester</th>
                                                        <th>RPP+</th>
                                                        <th>Cetak</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 1;
                                                    ?>
                                                    <?php foreach ($sumatif as $s) :
                                                        if ($s['semester'] == $semester) { ?>                                                               
                                                            <tr>
                                                                <td><?= $i; ?></td>                                                                
                                                                <td width="5%"><?= $s['no_sumatif']; ?></td>
                                                                <td width="80%"><?= (str_word_count($s['nama_sumatif']) > 17 ? substr('<p class="alert alert-danger" role="alert">' . $s['nama_sumatif'] . '<p>', 0, 115) . " [...] !!! melebihi batas karakter" : $s['nama_sumatif'])  ?></td>
                                                                <td width="5%" class="text-center"><?= $s['semester']; ?></td>
                                                                <td width="5%">
                                                                    <button type="button" class="btn btn-warning mb-3 btn-action" data-id="<?= $s['sumatif_id']; ?>">
                                                                        <i class="fa fa-plus"></i></a>
                                                                    </button>
                                                                </td>                                    
                                                                <td width="5%">
                                                                    <button type="button" class="btn btn-secondary mb-3 btn-cetak" data-id="<?= $s['sumatif_id']; ?>">
                                                                        <i class="fa fa-print"></i></a>
                                                                    </button>         
                                                                </td>
                                                            </tr>
                                                            <?php $i++ ?>
                                                    <?php }
                                                    endforeach ?>
                                                </tbody>
                                            </table>
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