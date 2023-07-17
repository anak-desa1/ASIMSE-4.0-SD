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
                <div class="col-md-3">

                    <!-- About Me Box -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Ubah Nilai</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <p class="text-muted">Kelas : <?= $data['rombel'] ?></p>
                            <hr>
                            <?php foreach ($header as $h) : ?>
                            <?php endforeach ?>

                            <ul class="list-group">
                                <?php
                                if (!empty($nilai)) {
                                    foreach ($nilai as $c)
                                        if ($c['id_siswa'] == $h['id_siswa']) {
                                ?>
                                        <li class="list-group-item"><a href="#"><i class="fa fa-chevron-right"></i> <?= $c['jenis'] ?> - <?= $c['no_sumatif']; ?> </a></li>
                                <?php
                                        }
                                } else {
                                    echo '<div class="alert alert-info">Belum ada Mapel diinputkan</div>';
                                }
                                ?>
                            </ul>

                        </div>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="tampil-modal"></div>
                        <div class="card-header p-2">
                            <?php if ($pegawai['bagian_shift'] == '') : ?>
                                <a class="btn btn-info mb-3" href="<?= site_url('akademik_guru_km/input_nilai_sumatif/tambah_sumatif/') ?><?= $data['mapel_id'] ?>"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            <?php endif ?>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Table row -->
                                    <div class="row">
                                        <div class="table-responsive">
                                            <form method="post" action="<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') . 'update_sumatif_simpan' ?>" role="form" id="form-action" enctype="multipart/form-data">
                                                <table class="table table-striped table table-sm">
                                                    <thead></thead>
                                                    <tbody>
                                                        <?php $i = 1; ?>
                                                        <tr>
                                                            <td colspan="3" class="text-center"><b>DATA SISWA</b></td>
                                                            <td colspan="" class=""><b>ASESMEN</b></td>
                                                        </tr>
                                                        <?php foreach ($header as $h) : ?>
                                                        <?php endforeach ?>
                                                        <tr>
                                                            <td class="text-center">#</td>
                                                            <td class="text-center">NIS</td>
                                                            <td class="text-center">Nama Siswa</td>
                                                            <?php foreach ($nilai as $c) :
                                                                if ($c['id_siswa'] == $h['id_siswa']) { ?>
                                                                    <td class="">
                                                                        <?= $c['jenis'] ?> - <?= $c['no_sumatif']; ?>
                                                                    </td>
                                                            <?php }
                                                            endforeach ?>
                                                        </tr>
                                                        <?php foreach ($siswa as $s) : ?>
                                                            <tr>
                                                                <td class="text-center"><?= $i; ?></td>
                                                                <td class="text-center"><?= $s['nis']; ?></td>
                                                                <td class=""><?= $s['nama']; ?></td>
                                                                <?php foreach ($nilai as $n) :
                                                                    if ($n['id_siswa'] == $s['id_siswa']) { ?>
                                                                        <td class="text-center">
                                                                            <div class="input-group input-group-sm mb-0">
                                                                                <div class="text-center">
                                                                                    <input type="text" name="nilai[]" value="<?= $n['nilai'] ?>" class="text-center form-control form-control-sm">
                                                                                    <input type="hidden" name="id[]" value="<?= $n['id'] ?>">
                                                                                    <input type="hidden" name="mapel_id" value="<?= $data['mapel_id'] ?>"> 
                                                                                    <input type="hidden" name="sumatif_id" value="<?= $c['sumatif_id'] ?>">
                                                                                    <input type="hidden" name="penilaian" value="<?= $c['penilaian'] ?>">
                                                                                    <input type="hidden" name="jenis" value="<?= $c['jenis'] ?>">
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                <?php }
                                                                endforeach ?>
                                                            </tr>
                                                            <?php $i++ ?>
                                                        <?php endforeach ?>
                                                    </tbody>
                                                </table>
                                                <button type="submit" id="btn-update" class="btn btn-warning mb-3"><i class="bi bi-pencil-square"></i> Ubah Nilai</a></button>
                                            </form>
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