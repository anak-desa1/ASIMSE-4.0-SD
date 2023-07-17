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
                <div class="col-md-4">
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
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="col-md-12">
                                    <!-- /.card-header -->
                                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                                    <?= $this->session->flashdata('message'); ?>
                                    <div class="tampil-modal"></div>
                                    <div class="card-header p-2">
                                        <button type="button" class="btn btn-info mb-3 btn-action">
                                            <i class="fa fa-plus-circle"></i> Tambah Data
                                        </button>
                                        <!-- <a class="btn btn-success mb-3" href="<?= base_url('akademik_walikelas_km/nilai_ekstra/cetak/'); ?>" target="_blank"><i class="fa fa-print"></i> Cetak</a> -->
                                    </div>
                                    <!-- /.card-header -->
                                    <p align="center">
                                        <b>NILAI EKSTRAKURIKULER</b>
                                        <br><?php echo "Kelas : " . $kelas['id_kelas'] . ", Nama Wali : " . $kelas['nama_lengkap']; ?>
                                    </p>
                                    <div class="card-body">
                                        <div class="content">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <div class="alert alert-warning">
                                                                    <p>Proses input Ekstrakurikuler hanya dapat dilakukan oleh walikelas saja</p>
                                                                    <P>Untuk melihat nilai sesuai Ekstrakurikuler, silakan pilih Ekstrakurikuler di samping</P>
                                                                </div>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                                <!-- <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th width="5%" rowspan="2">No</th>
                                                            <th width="30%" rowspan="2">Nama</th>
                                                            <th width="20%" rowspan="2">Ekstrakurikuler</th>
                                                            <th width="50%" colspan="2">Nilai</th>
                                                        </tr>
                                                        <tr>
                                                            <th width="10%">Nilai</th>
                                                            <th width="40%">Deskripsi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $html = "";
                                                        $no = 0;
                                                        if (!empty($nilai)) {
                                                            foreach ($nilai as $n) {
                                                                $no++;
                                                                $html .= '<tr><td class="ctr">' . $no . '</td><td>' . $n['nmsiswa'] . '</td><td class="ctr">' . $n['nmeks'] . '</td><td class="ctr">' . $n['nilai'] . '</td><td class="ctr">' . $n['desk'] . '</td></tr>';
                                                            }
                                                        } else {
                                                            $html .= '<tr><td colspan="5"><div class="alert alert-info">Belum ada Ekstrakurikuler diinputkan</div></td></tr>';
                                                        }
                                                        echo $html;
                                                        ?>
                                                    </tbody>
                                                </table> -->
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

