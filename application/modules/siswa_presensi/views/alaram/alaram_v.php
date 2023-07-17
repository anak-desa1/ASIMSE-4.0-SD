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
        <div class="col-12">          
            <div class="card">
                <div class="tampil-modal"></div>
                <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <?= $this->session->flashdata('message'); ?>
                <div class="card-body">
                    <div class="info-box">
                        <h5 class="card-title">Daftar <span>| <?= $title; ?></span></h5>
                    </div>
                    <button type="button" class="btn btn-primary mb-3 btn-action">
                        <span class="fa fa-plus"></span> Tambah Data
                    </button>                       
                    <div class="table-responsive">
                        <table id="myTable" class="table-sm" style="font-size: 14px">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>No</th>
                                    <th>Waktu Alaram</th>                                    
                                    <th>Keterangan</th>
                                    <th>Suara</th>                                   
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                            </tbody>
                        </table>
                    </div>

                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <br>
    <!-- /.content -->

</main>
<!-- /.content-wrapper -->