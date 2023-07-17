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
                            <!-- <a class="btn btn-info mb-3" href="<?= base_url('akademik_walikelas_km/nilai_absensi/tambah_pts/'); ?>"> <i class="fa fa-address-book"></i> Abasensi PTS</a> -->
                            <a class="btn btn-info mb-3" href="<?= base_url('akademik_walikelas_km/nilai_absensi/tambah_pas/'); ?>"> <i class="fa fa-address-book"></i> Abasensi</a>
                            <!-- <a class="btn btn-success mb-3" href="<?= base_url('akademik_walikelas_km/nilai_absensi/cetak_pts/'); ?>" target=" _blank"><i class="fa fa-print"></i> Cetak PTS</a>
                            <a class="btn btn-success mb-3" href="<?= base_url('akademik_walikelas_km/nilai_absensi/cetak_pas/'); ?>" target=" _blank"><i class="fa fa-print"></i> Cetak PAS</a> -->
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Table row -->
                                    <div class="row">
                                        <div class="table-responsive">
                                            <div class="content">
                                                <p align="center"><b>REKAP ABSENSI</b>
                                                    <br><?php echo "Kelas : " . $kelas['rombel'] . ", Nama Wali : " . $kelas['nama_lengkap']; ?>
                                                </p>
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center" colspan="2">Data Peserta</th>
                                                            <!-- <th class="text-center" colspan="3">PTS</th> -->
                                                            <th class="text-center" colspan="3">Absensi</th>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center" width="2%">No</th>
                                                            <!-- <th class="text-center" width="10%">Kelas</th> -->
                                                            <th class="text-center" width="30%">Nama</th>
                                                            <th class="text-center">Sakit</th>
                                                            <th class="text-center">Izin</th>
                                                            <th class="text-center">Tanpa Keterangan</th>
                                                            <!-- <th class="text-center">Sakit</th>
                                                            <th class="text-center">Izin</th>
                                                            <th class="text-center">Tanpa Keterangan</th> -->
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        if (!empty($siswa)) {
                                                            foreach ($siswa as $s) {
                                                        ?>
                                                                <tr>
                                                                    <td class="text-center"><?= $no; ?></td>
                                                                    <td><?= $s['nama']; ?></td>

                                                                    <!-- <td class="text-center">
                                                                        <?php
                                                                        foreach ($absen as $sk) :
                                                                            if ($sk['tasm'] == $tasm)
                                                                                if ($sk['id_siswa'] == $s['id_siswa'])
                                                                                    if ($sk['penilaian'] == 'PTS') {
                                                                                        echo ' <div>' . $sk['s'] . ' </div>';
                                                                                    }
                                                                        endforeach;
                                                                        ?>
                                                                    </td> -->
                                                                    <!-- <td class="text-center">
                                                                        <?php
                                                                        foreach ($absen as $sk) :
                                                                            if ($sk['tasm'] == $tasm)
                                                                                if ($sk['id_siswa'] == $s['id_siswa'])
                                                                                    if ($sk['penilaian'] == 'PTS') {
                                                                                        echo ' <div>' . $sk['i'] . ' </div>';
                                                                                    }
                                                                        endforeach;
                                                                        ?>
                                                                    </td> -->
                                                                    <!-- <td class="text-center">
                                                                        <?php
                                                                        foreach ($absen as $sk) :
                                                                            if ($sk['tasm'] == $tasm)
                                                                                if ($sk['id_siswa'] == $s['id_siswa'])
                                                                                    if ($sk['penilaian'] == 'PTS') {
                                                                                        echo ' <div>' . $sk['a'] . ' </div>';
                                                                                    }
                                                                        endforeach;
                                                                        ?>
                                                                    </td> -->
                                                                    <td class="text-center">
                                                                        <?php
                                                                        foreach ($absen as $sk) :
                                                                            if ($sk['tasm'] == $tasm)
                                                                                if ($sk['id_siswa'] == $s['id_siswa'])
                                                                                    if ($sk['penilaian'] == 'PAS') {
                                                                                        echo ' <div>' . $sk['s'] . ' </div>';
                                                                                    }
                                                                        endforeach;
                                                                        ?>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <?php
                                                                        foreach ($absen as $sk) :
                                                                            if ($sk['tasm'] == $tasm)
                                                                                if ($sk['id_siswa'] == $s['id_siswa'])
                                                                                    if ($sk['penilaian'] == 'PAS') {
                                                                                        echo ' <div>' . $sk['i'] . ' </div>';
                                                                                    }
                                                                        endforeach;
                                                                        ?>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <?php
                                                                        foreach ($absen as $sk) :
                                                                            if ($sk['tasm'] == $tasm)
                                                                                if ($sk['id_siswa'] == $s['id_siswa'])
                                                                                    if ($sk['penilaian'] == 'PAS') {
                                                                                        echo ' <div>' . $sk['a'] . ' </div>';
                                                                                    }
                                                                        endforeach;
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                        <?php
                                                                $no++;
                                                            }
                                                        } else {
                                                            echo '<tr><td colspan="5"><div class="alert alert-info">Belum ada absensi diinputkan</div></td></tr>';
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
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