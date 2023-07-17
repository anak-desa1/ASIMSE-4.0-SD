<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title; ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><?= $home; ?></a></li>
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
                    <div class="info-box">
                        <h5 class="card-title">Daftar <span>| Sertifikat Vaksin</span></h5>
                    </div>
                    <?php if ($cek_akses['role_id'] == 1) : ?>
                        <button type="button" class="btn btn-primary mb-3 btn-action">
                            <span class="fa fa-plus"></span> Tambah Data
                        </button>
                    <?php endif ?>
                    <div class="table-responsive">
                        <table class="table datatable table-striped table-sm" style="font-size: 14px">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>NIK</th>
                                    <th>Nama Siswa</th>
                                    <th>Vaksin 1</th>
                                    <th>Vaksin 2</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                foreach ($vaksin as $sk) :
                                    $no++ ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $sk['nik'] ?></td>
                                        <td><?= $sk['nama_siswa'] ?></td>
                                        <td>
                                            <?php if ($sk['vaksin_1'] == '') { ?>
                                                Belum mengikuti vaksin 1
                                            <?php } else { ?>
                                                <img src="<?= base_url(); ?>panel/dist/upload/sertifikat_vaksin/<?= $sk['vaksin_1'] ?>" alt="..." style="width:100%;max-width:100px">
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($sk['vaksin_2'] == '') { ?>
                                                Belum mengikuti vaksin 2
                                            <?php } else { ?>
                                                <img src="<?= base_url(); ?>panel/dist/upload/sertifikat_vaksin/<?= $sk['vaksin_2'] ?>" alt="..." style="width:100%;max-width:100px">
                                            <?php } ?>
                                        </td>
                                        <td>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-sm btn-warning btn-edit" data-id="<?= $sk['id_vaksin'] ?>">
                                                <i class=" fas fa-edit"></i>
                                            </button>
                                            <a href="<?= base_url() . $this->uri->segment(1, 0) ?>/deldata/<?= $sk['id_vaksin'] ?>" class="btn btn-sm btn-danger btn-hapus"><i class="fa fa-trash-alt"></i></a>
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
    <br>
    <!-- /.content -->

</main>
<!-- /.content-wrapper -->