<?php if ($pegawai['kd_sekolah'] == $pegawai['kd_sekolah']) : ?>

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

        <section class="content">
            <div class="container-fluid">
                <!-- About Me Box -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">About Me</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <p class="text-muted"><?= $data['rombel'] ?> | <?= $data['nama'] ?></p>
                        <p class="text-muted"><?= $data['mapel_id'] ?> | <?= $data['nama_lengkap'] ?></p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- /.col -->
                    <div class="col-md-12">
                        <div class="card">
                            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                            <?= $this->session->flashdata('message'); ?>
                            <div class="tampil-modal"></div>
                            <div class="card-header p-2">
                                <a class="btn btn-info mb-3" href="<?= site_url('akademik_guru_km/input_nilai_sumatif/nilai_sumatif/') ?><?= $data['mapel_id'] ?>"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="card card-warning">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Tambah Nilai</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label>Mata Pelajaran<span class="symbol required"> </span></label>
                                                            <input type="text" value="<?= $mapel['nama'] ?>" class="form-control" readonly>
                                                        </div>
                                                        <ul class="list-group">                                                           
                                                            <li class="list-group-item">
                                                                <div class="pull-right">
                                                                    <a>
                                                                        <form action="" id="FormSUMATIF">
                                                                            <input type="hidden" name="tingkat" id="tingkat" value="<?= $data['mapel_id'] ?>" class="form-control" data-live-search="true">
                                                                            <button type="submit" class="btn"><i class="fa fa-chevron-right text-primary"></i> <b class="text-primary">Asesmen Sumatif</b> </button>
                                                                        </form>
                                                                    </a>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="pull-right">
                                                                    <a>
                                                                        <form action="" id="FormPAS">
                                                                            <input type="hidden" name="tingkat" id="tingkat" value="<?= $data['mapel_id'] ?>" class="form-control" data-live-search="true">
                                                                            <button type="submit" class="btn"><i class="fa fa-chevron-right text-primary"></i> <b class="text-primary">Asesmen Sumatif AS</b> </button>
                                                                        </form>
                                                                    </a>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- About Me Box -->
                                                <div class="card card-info">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Penilaian</h3>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        <p class="text-muted">Kelas : <?= $data['rombel'] ?></p>
                                                        <hr>
                                                        <?php foreach ($siswa as $h) : ?>
                                                        <?php endforeach ?>
                                                        <ul class="list-group">
                                                            <?php if ($ta == 1) { ?>                                                                
                                                                <?php
                                                                if (!empty($nilai)) {
                                                                    foreach ($nilai as $a)
                                                                        if ($a['id_siswa'] == $h['id_siswa']) {
                                                                ?>
                                                                        <?php if ($a['jenis'] == 'SUMATIF'): ?>                                                                                 
                                                                            <li class="list-group-item">
                                                                                <div class="pull-right">
                                                                                    <a href="#">
                                                                                        <i class="fa fa-chevron-right"></i> <?= $a['jenis']; ?> - <?= $a['no_sumatif']; ?> 
                                                                                    </a>
                                                                                    <a class="btn btn-xs btn-warning" href="<?= site_url('akademik_guru_km/input_nilai_sumatif/edit_sumatif/') ?><?= $data['mapel_id'] ?>/<?= $a['sumatif_id']; ?>/<?= $a['penilaian'] ?>/<?= $a['jenis'] ?>"> <i class="fa fa-pen"></i></a>
                                                                                    <!--<a class="btn btn-xs btn-danger" href="<?= site_url('akademik_guru_km/input_nilai_sumatif/delete_sumatif/') ?><?= $data['mapel_id'] ?>/<?= $a['sumatif_id']; ?>/<?= $a['penilaian'] ?>/<?= $a['jenis'] ?>"> <i class="fa fa-trash-alt"></i></a>-->
                                                                                </div>
                                                                            </li>
                                                                        <?php endif ?>
                                                                        <?php if ($a['jenis'] == 'PAS'): ?>                                                                                 
                                                                            <li class="list-group-item">
                                                                                <div class="pull-right">
                                                                                    <a href="#">
                                                                                        <i class="fa fa-chevron-right"></i> SUMATIF - <?= $a['jenis']; ?>  
                                                                                    </a>
                                                                                    <a class="btn btn-xs btn-warning" href="<?= site_url('akademik_guru_km/input_nilai_sumatif/edit_sumatif/') ?><?= $data['mapel_id'] ?>/<?= $semester ?>/<?= $a['penilaian'] ?>/<?= $a['jenis'] ?>"> <i class="fa fa-pen"></i></a>
                                                                                    <!--<a class="btn btn-xs btn-danger" href="<?= site_url('akademik_guru_km/input_nilai_sumatif/delete_sumatif/') ?><?= $data['mapel_id'] ?>/<?= $semester ?>/<?= $a['penilaian'] ?>/<?= $a['jenis'] ?>"> <i class="fa fa-trash-alt"></i></a>-->
                                                                                </div>
                                                                            </li>
                                                                        <?php endif ?>
                                                                <?php
                                                                        }
                                                                } else {
                                                                    echo '';
                                                                }
                                                                ?>
                                                            <?php } ?> 
                                                            <?php if ($ta == 2) { ?>                                                                
                                                                <?php
                                                                if (!empty($nilai)) {
                                                                    foreach ($nilai as $a)
                                                                        if ($a['id_siswa'] == $h['id_siswa']) {
                                                                ?>
                                                                        <?php if ($a['jenis'] == 'SUMATIF'): ?>                                                                                 
                                                                            <li class="list-group-item">
                                                                                <div class="pull-right">
                                                                                    <a href="#">
                                                                                        <i class="fa fa-chevron-right"></i> <?= $a['jenis']; ?> - <?= $a['no_sumatif']; ?> 
                                                                                    </a>
                                                                                    <a class="btn btn-xs btn-warning" href="<?= site_url('akademik_guru_km/input_nilai_sumatif/edit_sumatif/') ?><?= $data['mapel_id'] ?>/<?= $a['sumatif_id']; ?>/<?= $a['penilaian'] ?>/<?= $a['jenis'] ?>"> <i class="fa fa-pen"></i></a>
                                                                                    <!--<a class="btn btn-xs btn-danger" href="<?= site_url('akademik_guru_km/input_nilai_sumatif/delete_sumatif/') ?><?= $data['mapel_id'] ?>/<?= $a['sumatif_id']; ?>/<?= $a['penilaian'] ?>/<?= $a['jenis'] ?>"> <i class="fa fa-trash-alt"></i></a>-->
                                                                                </div>
                                                                            </li>
                                                                        <?php endif ?>
                                                                        <?php if ($a['jenis'] == 'PAS'): ?>                                                                                 
                                                                            <li class="list-group-item">
                                                                                <div class="pull-right">
                                                                                    <a href="#">
                                                                                        <i class="fa fa-chevron-right"></i> SUMATIF - <?= $a['jenis']; ?>  
                                                                                    </a>
                                                                                    <a class="btn btn-xs btn-warning" href="<?= site_url('akademik_guru_km/input_nilai_sumatif/edit_sumatif/') ?><?= $data['mapel_id'] ?>/<?= $semester ?>/<?= $a['penilaian'] ?>/<?= $a['jenis'] ?>"> <i class="fa fa-pen"></i></a>
                                                                                    <!--<a class="btn btn-xs btn-danger" href="<?= site_url('akademik_guru_km/input_nilai_sumatif/delete_sumatif/') ?><?= $data['mapel_id'] ?>/<?= $semester ?>/<?= $a['penilaian'] ?>/<?= $a['jenis'] ?>"> <i class="fa fa-trash-alt"></i></a>-->
                                                                                </div>
                                                                            </li>
                                                                        <?php endif ?>
                                                                <?php
                                                                        }
                                                                } else {
                                                                    echo '';
                                                                }
                                                                ?>
                                                            <?php } ?>                                           
                                                        </ul>
                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                                <!-- /.card -->
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="card card-warning">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Informasi Sistem dan Input Nilai</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="table-responsive" id="mapel">

                                                                    <table class="table table-striped">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>                                                                                 
                                                                                    Asesmen Sumatif:<br>
                                                                                    <ul>
                                                                                        <li>1. klik Asesmen Sumatif </li>
                                                                                        <li>2. Pilih Sumatif</li>
                                                                                        <li>3. Klik Simpan </li>
                                                                                    </ul>                                                                                    
                                                                                </th>
                                                                                <th>                                                                                 
                                                                                    Asesmen PAS:<br>
                                                                                    <ul>
                                                                                        <li>1. klik Asesmen Sumatif PAS </li>  
                                                                                        <li>2. Input Nilai $sumatif_id PAS </li>                                                                                     
                                                                                        <li>3. Klik Simpan </li>
                                                                                    </ul>                                                                                    
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                    </table>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- </form> -->
                                            </div>
                                        </div>

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


<?php endif ?>