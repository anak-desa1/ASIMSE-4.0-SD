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
        <div class="card">
            <div class="card-body">
                <br>
                <div class="mb-3">
                    <form action="" id="FormBayar">
                        <div class="form-row">
                            <div class="col-md-6 col-xs-6">
                                <div class="mb-3">
                                    <select class="form-control select2" style="width: 100%" name="data" id="data" required>
                                        <option value="">Cari Data Pendaftar</option>
                                        <?php
                                        foreach ($cari_siswa as $cs) {
                                            echo "<option value=" . $cs['id_daftar'] . ">" .  $cs['no_daftar'] . ' ' . $cs['nama'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                &nbsp;<button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Cari</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="row" id="bayar">
                </div>

                Cari data untuk cetak Kwitansi Pembayaran.
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <?= $this->session->flashdata('message'); ?>
                <div class="card author-box card-warning">
                    <div class="tampil-modal"></div>
                    <div class="card-header">
                        <div class="card-header-action text-rigth">
                            <!-- Button trigger modal -->
                            <span style="float: right">
                                <button type="button" class="btn btn-primary mb-3 btn-action">
                                    <i class="fas fa-plus-circle"></i> Tambah Bayar
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table datatable table-striped table-sm" id="" style="font-size: 14px">
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

                                    $no = 0;
                                    foreach ($bayar as $bayar) {
                                        $no++;
                                    ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $bayar['id_bayar'] ?></td>
                                            <td><?= $bayar['nama'] ?></td>
                                            <td><?= "Rp " . number_format($bayar['jumlah'], 0, ",", ".") ?></td>
                                            <td><?= $bayar['tgl_bayar'] ?></td>
                                            <td><?php if ($user) {
                                                    echo $user['nama_pegawai'];
                                                } else {
                                                    echo "Online";
                                                } ?>
                                            </td>
                                            <td>
                                                <?php if ($bayar['verifikasi'] == 1) { ?>
                                                    <span class="badge badge-success">Sudah Dicek</span>
                                                <?php } else { ?>
                                                    <span class="badge badge-warning">Belum Dicek</span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a target="_blank" href="<?= base_url() ?>ppdb_biaya/print_kwitansi/<?= $bayar['id_bayar'] ?>" class="btn btn-primary btn-sm"><i class="fas fa-print"></i></a>
                                                <a href="<?= base_url() ?>ppdb_biaya/hapus_pembayaran/<?= $bayar['id_bayar'] ?>" class="hapus btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

</main>
<!-- /.content-wrapper -->