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
                            <h4 class="title">DATA SISWA</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <ul class="list-group">
                                    <li class="list-group-item"><a href=""><i class="fa fa-chevron-right"></i></a> <?= $siswa['nmsiswa']; ?></li>
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
                            <a class="btn btn-warning mb-3" href="<?= site_url('akademik_walikelas/nilai_kesehatan/') ?>"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            <button type="button" class="btn btn-info mb-3 btn-action">
                                <i class="fa fa-plus-circle"></i> Tambah Data
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="col-md-12">
                                    <p align="center">
                                        <b>kesehatan SISWA</b>
                                        <br><?php echo "Kelas : " . $kelas['id_kelas'] . ", Nama Wali : " . $kelas['nama_lengkap']; ?>
                                    </p>
                                    <div class="card-body">
                                        <div class="content">
                                            <div class="table-responsive" id="mapel">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th width="5%" class="ctr">No</th>
                                                            <th width="35%">Nama</th>
                                                            <th width="15%" class="ctr">Aspek Fisik</th>
                                                            <th width="45%" class="ctr">Keterangan</th>
                                                            <th class="ctr">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $html = "";
                                                        $no = 0;
                                                        if (!empty($kesehatan)) {
                                                            foreach ($kesehatan as $p) {
                                                                $no++;
                                                                $html .= '<tr><td class="ctr">' . $no . '</td><td>' . $p['nmsiswa'] . '</td><td class="ctr">' . $p['aspek_fisik'] . '</td><td class="ctr">' . $p['keterangan'] . '</td><td class="ctr"><a href="' . base_url() . 'akademik_walikelas/nilai_kesehatan/del/' . $p['id'] . '" class="btn btn-xs btn-danger"><i class="fa fa-trash-alt"></i> Delete</a></td></tr>';
                                                            }
                                                        } else {
                                                            $html .= '<tr><td colspan="5"><div class="alert alert-info">Belum ada kesehatan diinputkan</div></td></tr>';
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