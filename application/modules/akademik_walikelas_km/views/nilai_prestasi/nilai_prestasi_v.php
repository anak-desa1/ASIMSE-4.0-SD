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
            <div class="row">
                <!-- About Me Box -->
                <div class="col-md-5">
                    <div class="card card-info">
                        <div class="card-header">
                            <h4 class="title">DATA SISWA</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <ul class="list-group">
                                    <?php
                                    $no = 1;
                                    if (!empty($siswa)) {
                                        foreach ($siswa as $lk) {
                                    ?>
                                            <li class="list-group-item"><?= $no ?>
                                                <a href="<?= base_url('akademik_walikelas_km/nilai_prestasi/input_prestasi/'); ?><?= $lk['id_siswa'] ?>">
                                                    <i class="fa fa-chevron-right"></i>
                                                    <button type="submit" class="btn">
                                                        <?= $lk['nmsiswa']; ?>
                                                    </button>
                                                </a>
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
                        </div>
                    </div>
                </div>
                <!-- /.card -->
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                            <?= $this->session->flashdata('message'); ?>
                            <div class="tampil-modal"></div>
                            <a class="btn btn-success mb-3" href="<?= base_url('akademik_walikelas_km/nilai_prestasi/cetak/'); ?>" target="_blank"><i class="fa fa-print"></i> Cetak</a>
                            <div class="tab-content">
                                <div class="col-md-12">
                                    <p align="center">
                                        <b>PRESTASI SISWA</b>
                                        <br><?= "Kelas : " . $kelas['id_kelas'] . ", Nama Wali : " . $kelas['nama_lengkap']; ?>
                                    </p>
                                    <!-- <div class="card-body">

                                        <div class="content">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <div class="alert alert-warning">
                                                                    <p>Proses input Prestasi Siswa hanya dapat dilakukan oleh walikelas saja</p>
                                                                    <P>Untuk melihat Prestasi Siswa, silakan pilih data siswa di samping</P>
                                                                </div>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th width="5%" class="ctr">No</th>
                                                            <th width="35%">Nama</th>
                                                            <th width="15%" class="ctr">Jenis</th>
                                                            <th width="45%" class="ctr">Prestasi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $html = "";
                                                        $no = 0;
                                                        if (!empty($prestasi)) {
                                                            foreach ($prestasi as $p) {
                                                                $no++;
                                                                $html .= '<tr><td class="ctr">' . $no . '</td><td>' . $p['nmsiswa'] . '</td><td class="ctr">' . $p['jenis'] . '</td><td class="ctr">' . $p['keterangan'] . '</td></tr>';
                                                            }
                                                        } else {
                                                            $html .= '<tr><td colspan="5"><div class="alert alert-info">Belum ada prestasi diinputkan</div></td></tr>';
                                                        }
                                                        echo $html;
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div> -->
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