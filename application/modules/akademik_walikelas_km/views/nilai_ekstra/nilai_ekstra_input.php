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

        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- About Me Box -->
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h4 class="title">EKSTRAKURIKULER</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <ul class="list-group">
                                    <?php
                                    if (!empty($list_kd)) {
                                        foreach ($list_kd as $lk) {
                                    ?>
                                            <li class="list-group-item"><a href="<?= base_url('akademik_walikelas_km/nilai_ekstra/input_ekskul/'); ?><?= $lk['id'] ?>"><i class="fa fa-chevron-right"></i><button type="submit" class="btn"><?php echo $lk['nama']; ?></button></a></li>
                                    <?php
                                        }
                                    } else {
                                        echo '<div class="alert alert-info">Belum ada KD diinputkan</div>';
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
                <div class="col-md-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="tampil-modal"></div>
                        <div class="card-header p-2">
                            <a class="btn btn-warning mb-3" href="<?= site_url('akademik_walikelas_km/nilai_ekstra/') ?>"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            <a class="btn btn-success mb-3" href="<?= base_url('akademik_walikelas_km/nilai_ekstra/cetak/'); ?><?= $lk['id'] ?>" target="_blank"><i class="fa fa-print"></i> Cetak</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="col-md-12">
                                    <p align="center">
                                        <b>NILAI EKSTRAKURIKULER</b>
                                        <br><?php echo "Kelas : " . $kelas['id_kelas'] . ", Nama Wali : " . $kelas['nama_lengkap']; ?>
                                    </p>
                                    <div class="card-body">
                                        <div class="content">
                                            <div class="table-responsive" id="mapel">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th width="5%" rowspan="2">No</th>
                                                            <th width="30%" rowspan="2">Nama</th>
                                                            <th width="20%" rowspan="2">Ekstrakurikuler</th>
                                                            <th width="50%" colspan="2">Nilai</th>
                                                            <th width="20%" rowspan="2">Action</th>
                                                        </tr>
                                                        <tr>
                                                            <th width="10%">Nilai</th>
                                                            <th width="40%">Deskripsi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $html = "";
                                                        $i = 1;
                                                        if (!empty($nilai)) {
                                                            foreach ($nilai as $n) { ?>
                                                                <tr>
                                                                    <td class="text-center"><?= $i ?></td>
                                                                    <td><?= $n['nmsiswa'] ?></td>
                                                                    <td><?= $n['nmeks'] ?></td>
                                                                    <td><?= $n['nilai'] ?></td>
                                                                    <td><?= $n['desk'] ?></td>
                                                                    <td><a href="<?= base_url() ?>akademik_walikelas_km/nilai_ekstra/del/<?= $n['id'] ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash-alt"></i> Delete</a></td>
                                                                </tr>
                                                                <?php $i++ ?>
                                                        <?php
                                                            }
                                                        } else {
                                                            $html .= '<tr><td colspan="5"><div class="alert alert-info">Belum ada Ekstrakurikuler diinputkan</div></td></tr>';
                                                        }
                                                        echo $html;
                                                        ?>
                                                    </tbody>
                                                </table>
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