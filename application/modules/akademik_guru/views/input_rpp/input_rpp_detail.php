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
                            <a class="btn btn-primary mb-3" href="<?= site_url('akademik_guru/input_rpp') ?>">
                                <i class="fa fa-arrow-circle-left"></i> Kembali
                            </a>    
                            <?php if ($cek_akses['role_id'] == 1) : ?>
                                <button type="button" class="btn btn-success mb-3 btn-action" data-id="<?= $silabus['id_silabus']; ?>">
                                    <i class="fa fa-plus-circle"></i> Tambah Data
                                </button>
                            <?php endif ?>                       
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
                                                        <th>Tema</th>
                                                        <th>Sub Tema</th>
                                                        <th>Pembelajaran</th>                                        
                                                        <th>Cetak</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 1;
                                                    ?>
                                                    <?php foreach ($rpp as $s) : { ?>                                                                                                                       
                                                            <tr>
                                                                <td><?= $i; ?></td>                                                                
                                                                <td>
                                                                <?php
                                                                    foreach ($silabus_data as $si) :
                                                                        if ($si['id_silabus'] == $s['id_silabus']) {
                                                                            {
                                                                                echo  $si['tema']; 
                                                                            }
                                                                        }
                                                                    endforeach;
                                                                ?>
                                                                </td>
                                                                <td>
                                                                <?php
                                                                    foreach ($silabus_data as $si) :
                                                                        if ($si['id_silabus'] == $s['id_silabus']) {
                                                                            {
                                                                                echo  $si['subtema']; 
                                                                            }
                                                                        }
                                                                    endforeach;
                                                                ?>                                            
                                                                </td>
                                                                <td><?= $s['pembelajaran']; ?></td>
                                                                <td class="project-actions">
                                                                    <button type="button" class="btn btn-warning mb-3 btn-edit" data-id="<?= $s['id_rpp']; ?>">
                                                                        <i class="fa fa-edit"></i></a>
                                                                    </button>
                                                                    <button type="button" class="btn btn-secondary mb-3 btn-cetak" data-id="<?= $s['id_rpp']; ?>">
                                                                        <i class="fa fa-print"></i></a>
                                                                    </button>     
                                                                    <button type="button" class="btn btn-danger mb-3 btn-delete" data-id="<?= $s['id_rpp']; ?>">
                                                                        <i class="fa fa-trash"></i></a>
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