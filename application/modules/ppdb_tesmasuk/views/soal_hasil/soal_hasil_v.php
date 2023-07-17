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
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-users"></i>
                    DAFTAR NILAI
                </h3>
                <div class="card-tools">
                    <a class="btn btn-secondary btn-sm" href="<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') ?>">Back</a>
                    <a href="<?= base_url('Kursus/export_nilai/') . $id_materi ?>" class="btn btn-success btn-sm"><i class="fas fa-file-excel"></i> Export</a>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-valign-middle table-striped table-sm" style="font-size: 14px"">
                    <thead>
                        <tr>
                            <th width='10'>No</th>
                            <th>Nama Siswa</th>
                            <th>Periode</th>
                            <th>Salah</th>
                            <th>Benar</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($nilai as $nilai) {
                            $siswa = $this->db->get_where('ppdb_daftar', ['no_daftar' => $nilai['id_siswa']])->row_array();
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $siswa['nama'] ?></td>
                                <td><?= $siswa['periode'] ?></td>
                                <td><?= $nilai['salah'] ?></td>
                                <td><?= $nilai['benar'] ?></td>
                                <td><?= $nilai['nilai'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card -->
        </div>
    </section>
    <!-- /.content -->

</main>
<!-- /.content-wrapper -->