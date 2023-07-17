<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title; ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><?= $home; ?></a></li>
                <li class="breadcrumb-item"><?= $subtitle; ?></li>
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
                        <h5 class="card-title">Judul <span>| <?= $galery['judul_galeri'] ?></span></h5>
                    </div>
                    <?php if ($cek_akses['role_id'] == 1) : ?>
                        <a href="<?= base_url() . $this->uri->segment(1, 0) ?>/galery" class="btn mb-3 btn-sm btn-primary"><i class="bi bi-arrow-counterclockwise"></i> Kembali</a>
                        <button type="button" class="btn mb-3 btn-sm btn-success btn-plus" data-id="<?= $galery['id_galeri'] ?>">
                            <span class="fa fa-plus"></span> <i class="far fa-images"></i>
                        </button>
                    <?php endif ?>

                    <div class="table-responsive">
                        <table class="table table-striped table-sm" style="font-size: 14px">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Foto</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                foreach ($galery_plus as $sk) :
                                    $no++ ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><img src="<?= base_url(); ?>panel/dist/upload/profil_galery/<?= $sk['foto'] ?>" alt=" ..." style="width:100%;max-width:150px"></td>
                                        <td>
                                            <button type="button" class="btn mb-3 btn-sm btn-warning btn-editplus" data-id="<?= $sk['id_galeri_sub'] ?>"><i class="fas fa-edit"></i></button>
                                            <form method="post" action="<?= base_url() . $this->uri->segment(1, 0) ?>/delgaleryplus/<?= $sk['id_galeri_sub'] ?>">
                                                <input type="hidden" name="id_galeri" value="<?= $sk['id_galeri'] ?>">
                                                <button type="submit" class="btn mb-3 btn-sm btn-danger btn-hapus"><i class="fa fa-trash-alt"></i></button>
                                            </form>
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