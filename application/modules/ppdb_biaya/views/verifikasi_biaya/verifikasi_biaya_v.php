<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title; ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html"><?= $home; ?></a></li>
                <!-- <li class="breadcrumb-item"><?= $subtitle; ?></li> -->
                <li class="breadcrumb-item active"><?= $title; ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <!-- Main content -->
    <section class="content">
        <div class="col-12">

            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="tampil-modal"></div>
                <div class="card-body">
                    <br>
                    <h4>Data Belum Verifikasi</h4>
                    <div class="card-header-action">
                        <a class="btn btn-success mb-3 btn-action" href="mod_bayar/export_bayar.php" role="button"> <span class="fa fa-download"></span> Download Excel</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table datatable table-striped table-sm" id="" style="font-size: 16px">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Kode Transaksi</th>
                                    <th>Nama Siswa</th>
                                    <th>Jumlah Bayar</th>
                                    <th>Tgl Bayar</th>
                                    <th>Penerima</th>
                                    <th>verifikasi</th>
                                    <th>Bukti</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;
                                foreach ($belum_bayar as $bb) :
                                    $no++ ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $bb['id_bayar'] ?></td>
                                        <td><?= $bb['nama'] ?></td>
                                        <td><?= "Rp " . number_format($bb['jumlah'], 0, ",", ".") ?></td>
                                        <td><?= $bb['tgl_bayar'] ?></td>
                                        <td>
                                            <?php if ($user) {
                                                echo $user['nama_pegawai'];
                                            } else {
                                                echo "Online";
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if ($bb['verifikasi'] == 1) { ?>
                                                <span class="badge bg-success">Sudah Dicek</span>
                                            <?php } else { ?>
                                                <span class="badge bg-warning">Belum Dicek</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($bb['id_user'] == 0) { ?>
                                                <button data-id="<?= $bb['id_bayar'] ?>" class="cek btn btn-primary btn-sm btn-detail_2"><i class="fas fa-eye"></i></button>
                                            <?php } else {  ?>
                                                <button data-id="<?= $bb['id_bayar'] ?>" class="cek btn btn-primary btn-sm btn-detail_1"><i class="fas fa-eye"></i></button>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url() ?>ppdb_biaya/cek_verifikasi_biaya/<?= $bb['id_bayar'] ?>" class="btn btn-sm  btn-success btn-chek"><i class="fas fa-check-circle"></i> </a>
                                            <a href="<?= base_url() ?>ppdb_biaya/deldata_verifikasi_biaya/<?= $bb['id_bayar'] ?>" class="btn btn-sm btn-danger btn-delete"><i class="fa fa-trash-alt"></i> </a>

                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <br>
                    <h4>Data Sudah Verifikasi</h4>
                    <div class="table-responsive">
                        <table class="table datatable table-striped table-sm" id="" style="font-size: 16px">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Kode Transaksi</th>
                                    <th>Nama Siswa</th>
                                    <th>Jumlah Bayar</th>
                                    <th>Tgl Bayar</th>
                                    <th>Penerima</th>
                                    <th>verifikasi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($sudah_bayar))
                                    $no = 0;
                                foreach ($sudah_bayar as $sb) :
                                    $no++ ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $sb['id_bayar'] ?></td>
                                        <td><?= $sb['nama'] ?></td>
                                        <td><?= "Rp " . number_format($sb['jumlah'], 0, ",", ".") ?></td>
                                        <td><?= $sb['tgl_bayar'] ?></td>
                                        <td>
                                            <?php if ($user) {
                                                echo $user['nama_pegawai'];
                                            } else {
                                                echo "Online";
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if ($sb['verifikasi'] == 1) { ?>
                                                <span class="badge bg-success">Sudah Dicek</span>
                                            <?php } else { ?>
                                                <span class="badge bg-warning">Belum Dicek</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url() ?>ppdb_biaya/uncek_verifikasi_biaya/<?= $sb['id_bayar'] ?>" class="btn btn-sm  btn-danger btn-chek"><i class="fas fa-times-circle"></i> </a>
                                            <a target="_blank" href="<?= base_url() ?>ppdb_biaya/print_kwitansi/<?= $sb['id_bayar'] ?>" class="btn btn-primary btn-sm"><i class="fas fa-print"></i></a>
                                            <!-- <a href="<?= base_url() ?>ppdb_biaya/deldata_verifikasi_biaya/<?= $sb['id_bayar'] ?>" class="btn btn-sm btn-danger btn-delete"><i class="fa fa-trash-alt"></i> </a> -->
                                        </td>
                                    </tr>
                                <?php endforeach ?>
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
    <!-- /.content -->

</main>
<!-- /.content-wrapper -->