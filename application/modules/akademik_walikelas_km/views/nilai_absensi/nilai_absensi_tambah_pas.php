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
                        Walikelas : <?= $pegawai['nama_pegawai'] ?>
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
                            <a class="btn btn-warning mb-3" href="<?= base_url('akademik_walikelas_km/nilai_absensi'); ?>"><i class="fa fa-arrow-alt-circle-left"></i> Kembali</a>
                            <h3 class="btn btn-info mb-3">Form Absensi</h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Table row -->
                                    <div class="row">
                                        <div class="table-responsive">
                                            <div class="content">

                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th width="2%">No</th>
                                                            <!-- <th width="10%">Kelas</th> -->
                                                            <th width="30%">Nama</th>
                                                            <th width="20%">Sakit</th>
                                                            <th width="20%">Izin</th>
                                                            <th width="20%">Tanpa Keterangan</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <form action="<?= base_url('akademik_walikelas_km/nilai_absensi/absen_simpan_pas'); ?>" method="post">
                                                            <?php
                                                            $no = 1;
                                                            foreach ($siswa_kelas as $sk) : {
                                                                    (empty($sk['s'])) ? $s = 0 : $s = $sk['s'];
                                                                    (empty($sk['i'])) ? $i = 0 : $i = $sk['i'];
                                                                    (empty($sk['a'])) ? $a = 0 : $a = $sk['a'];
                                                            ?>
                                                                    <input type="hidden" name="tasm" value="<?= $tasm ?>">
                                                                    <tr>
                                                                        <td><?= $no; ?></td>
                                                                        <td> <input type="hidden" name="id_siswa[]" value="<?= $sk['nis'] ?>"><?= $sk['nama']; ?></td>
                                                                        <td>
                                                                            <input type="number" min="0" max="100" name="s[]" value="<?= $s ?>" class="form-control input-sm" required id="">
                                                                        </td>
                                                                        <td>
                                                                            <input type="number" min="0" max="100" name="i[]" value="<?= $i ?>" class="form-control input-sm" required id="">
                                                                        </td>
                                                                        <td>
                                                                            <input type="number" min="0" max="100" name="a[]" value="<?= $a ?>" class="form-control input-sm" required id="">
                                                                        </td>
                                                                    </tr>
                                                            <?php
                                                                    $no++;
                                                                }
                                                            endforeach
                                                            ?>
                                                    </tbody>
                                                </table>
                                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
                                                </form>
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