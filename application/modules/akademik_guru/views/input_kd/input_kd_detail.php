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
                            <button type="button" class="btn btn-info mb-3 btn-action">
                                <i class="fa fa-plus-circle"></i> Tambah Data
                            </button>
                            <a class="btn btn-danger mb-3" href="<?= site_url('akademik_guru/input_kd') ?>">
                                <i class="fa fa-arrow-circle-left"></i> Kembali
                            </a>
                            <!-- <div class="alert alert-warning" role="alert">
                                *Pastikan Saat Hapus KD " Nilai Belum Terisi ", bila KD sudah terisi nilai !!! 'sebaiknya nilai dihapus terlebih dahulu', baru hapus KD (supaya tidak terjadi error)
                            </div> -->
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Table row -->
                                    <div class="row">
                                        <div class="col-12 table-responsive">
                                            <table class="table table-striped table table-sm">
                                                <div class="card-header">
                                                    <h3 class="card-title"><b>KI-3 PENGETAHUAN</b></h3>
                                                </div>
                                                <thead>
                                                    <tr>
                                                        <th>#</th>                                                      
                                                        <th>KD</th>
                                                        <th>Deskripsi KD</th>
                                                        <th>Semester</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 1;
                                                    ?>
                                                    <?php foreach ($kd as $s) :
                                                        if ($s['semester'] == $semester) { ?>                                                               
                                                            <tr>
                                                                <td><?= $i; ?></td>                                                                
                                                                <td width="5%"><?= $s['no_kd_1']; ?></td>
                                                                <td width="80%"><?= (str_word_count($s['nama_kd_1']) > 17 ? substr('<p class="alert alert-danger" role="alert">' . $s['nama_kd_1'] . '<p>', 0, 115) . " [...] !!! melebihi batas karakter" : $s['nama_kd_1'])  ?></td>
                                                                <td width="5%" class="text-center"><?= $s['semester']; ?></td>
                                                                <td width="5%">
                                                                    <button type="button" class="btn btn-xs btn-warning btn-action-2" data-id="<?= $s['kd_id']; ?>">
                                                                        <i class="fa fa-edit"></i> Ubah</a>
                                                                    </button>
                                                                </td>
                                                                <!-- <td width="5%">
                                                                      <?php if ($s['kd_activate'] == 0) : ?>
                                                                          <form action="<?= base_url() ?>akademik_guru/input_kd/del/<?= $s['kd_id']; ?>" method="post" enctype="multipart/form-data">
                                                                              <input type="hidden" class="form-control" id="kd_id" name="kd_id" value="<?= $s['kd_id'] ?>">
                                                                              <input type="hidden" class="form-control" id="mapel_id" name="mapel_id" value="<?= $data['mapel_id'] ?>">
                                                                              <input type="hidden" class="form-control" id="id_kelas" name="id_kelas" value="<?= $data['id_kelas'] ?>">
                                                                              <button type="submit" id="hapus" class="btn btn-danger btn-xs"><i class="fa fa-trash-alt"></i> Hapus</button>
                                                                          </form>
                                                                      <?php endif ?>
                                                                  </td> -->
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
                                    <!-- Table row -->
                                    <div class="row">
                                        <div class="col-12 table-responsive">
                                            <table class="table table-striped table table-sm">
                                                <div class="card-header">
                                                    <h3 class="card-title"><b>KI-4 KETERAMPILAN</b></h3>
                                                </div>
                                                <thead>
                                                    <tr>
                                                        <th>#</th>                                                        
                                                        <th>KD</th>
                                                        <th>Deskripsi KD</th>
                                                        <th>Semester</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 1;
                                                    ?>
                                                    <?php foreach ($kd as $s) :
                                                        if ($s['semester'] == $semester){ ?>                                                             
                                                            <tr>
                                                                <td><?= $i; ?></td>                                                              
                                                                <td width="5%"><?= $s['no_kd_2']; ?></td>
                                                                <td width="80%"><?= (str_word_count($s['nama_kd_2']) > 17 ? substr('<p class="alert alert-danger" role="alert">' . $s['nama_kd_2'] . '<p>', 0, 115) . " [...] !!! melebihi batas karakter" : $s['nama_kd_2'])  ?></td>
                                                                <td width="5%" class="text-center"><?= $s['semester']; ?></td>
                                                                <td width="5%">
                                                                    <button type="button" class="btn btn-xs btn-warning btn-action-3" data-id="<?= $s['kd_id']; ?>">
                                                                        <i class="fa fa-edit"></i> Ubah</a>
                                                                    </button>
                                                                </td>
                                                                <!-- <td width="5%">
                                                                      <?php if ($s['kd_activate'] == 0) : ?>
                                                                          <form action="<?= base_url() ?>akademik_guru/input_kd/del/<?= $s['kd_id']; ?>" method="post" enctype="multipart/form-data">
                                                                              <input type="hidden" class="form-control" id="kd_id" name="kd_id" value="<?= $s['kd_id'] ?>">
                                                                              <input type="hidden" class="form-control" id="mapel_id" name="mapel_id" value="<?= $data['mapel_id'] ?>">
                                                                              <input type="hidden" class="form-control" id="id_kelas" name="id_kelas" value="<?= $data['id_kelas'] ?>">
                                                                              <button type="submit" id="hapus" class="btn btn-danger btn-xs"><i class="fa fa-trash-alt"></i> Hapus</button>
                                                                          </form>
                                                                      <?php endif ?>
                                                                  </td> -->
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