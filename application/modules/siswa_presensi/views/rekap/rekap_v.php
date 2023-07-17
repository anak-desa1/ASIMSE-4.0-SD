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
            <div class="card" style="border-top: 8px solid #035AA6;border-bottom: 8px solid #035AA6;border-right: 4px solid #035AA6;border-top-left-radius: 16px;border-bottom-left-radius: 16px;box-shadow: 0px 3px 6px 0px #222;">
                <div class="tampil-modal"></div>
                <?= form_error('email', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <div class="flash-data" data-flashdata=""><?= $this->session->flashdata('message'); ?></div>
                <div class="card-body">
                    <br>
                    <div class="card">
                        <div class="card-body">
                            <div class="card-responsive">
                                <form action="" id="form-data">
                                    <div class="row">
                                        <div class="col-lg-3 mt-4 mt-lg-0">
                                            <input type="date" class="form-control" id="tgl_awal" name="tgl_awal">
                                        </div>
                                        <div class="col-lg-3 mt-4 mt-lg-0">
                                            <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir">
                                        </div>
                                        <div class="col-lg-3 mt-4 mt-lg-0">
                                            <div class="dropdown bootstrap-select">
                                                <select class="form-control" style="width: 100%;" name="tingkat" id="tingkat" required>
                                                    <option>-- Pilih Kelas--</option>
                                                    <?php foreach ($kelas as $kls) {
                                                        echo '<option value="' . $kls['rombel'] . '">' . $kls['rombel'] . '</option>';
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mt-4 mt-lg-0">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">DAFTAR HADIR / PRESENSI BULANAN</h5>
                        </div>
                        <!-- data presensi -->
                        <div class="card-body">
                            <div class="activities" id="FormDate">

                            </div>
                        </div>
                        <!--End data presensi -->
                    </div>

                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->

</main>