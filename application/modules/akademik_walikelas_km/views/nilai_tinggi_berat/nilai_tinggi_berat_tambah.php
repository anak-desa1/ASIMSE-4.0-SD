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
                            <a class="btn btn-warning mb-3" href="<?= base_url('akademik_walikelas/nilai_tinggi_berat'); ?>"><i class="fa fa-arrow-alt-circle-left"></i> Kembali</a>
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
                                                            <th width="30%">Nama</th>
                                                            <th width="20%">Tinggi Badan</th>
                                                            <th width="20%">Berat Badan</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <form action="<?= base_url('akademik_walikelas/nilai_tinggi_berat/tinggi_berat_simpan'); ?>" method="post">
                                                            <?php if ($semester == 1) { ?>
                                                                <?php
                                                                $no = 1;
                                                                foreach ($siswa_kelas as $sk) : {
                                                                        (empty($sk['tinggi'])) ? $tinggi = 0 : $tinggi = $sk['tinggi'];
                                                                        (empty($sk['berat'])) ? $berat = 0 : $berat = $sk['berat'];
                                                                ?>
                                                                        <input type="hidden" name="tasm" value="<?= $tasm ?>">
                                                                        <input type="hidden" name="semester" value="<?= $semester ?>">
                                                                        <tr>
                                                                            <td><?= $no; ?></td>
                                                                            <td> <input type="hidden" name="id_siswa[]" value="<?= $sk['nis'] ?>"><?= $sk['nama']; ?></td>
                                                                            <td>
                                                                                <input type="text" min="0" max="100" name="tinggi[]" value="<?= $tinggi ?>" class="form-control input-sm" required id="">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" min="0" max="100" name="berat[]" value="<?= $berat ?>" class="form-control input-sm" required id="">
                                                                            </td>
                                                                        </tr>
                                                                <?php
                                                                        $no++;
                                                                    }
                                                                endforeach
                                                                ?>
                                                            <?php } else { ?>
                                                                <?php
                                                                $no = 1;
                                                                foreach ($siswa_kelas as $sk) : {
                                                                        (empty($sk['tinggi'])) ? $tinggi = 0 : $tinggi = $sk['tinggi'];
                                                                        (empty($sk['berat'])) ? $berat = 0 : $berat = $sk['berat'];
                                                                ?>
                                                                        <input type="hidden" name="tasm" value="<?= $tasm ?>">
                                                                        <input type="hidden" name="semester" value="<?= $semester ?>">
                                                                        <tr>
                                                                            <td><?= $no; ?></td>
                                                                            <td> <input type="hidden" name="id_siswa[]" value="<?= $sk['nis'] ?>"><?= $sk['nama']; ?></td>
                                                                            <td>
                                                                                <input type="text" min="0" max="100" name="tinggi[]" value="<?= $tinggi ?>" class="form-control input-sm" required id="">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" min="0" max="100" name="berat[]" value="<?= $berat ?>" class="form-control input-sm" required id="">
                                                                            </td>
                                                                        </tr>
                                                                <?php
                                                                        $no++;
                                                                    }
                                                                endforeach
                                                                ?>

                                                            <?php } ?>

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