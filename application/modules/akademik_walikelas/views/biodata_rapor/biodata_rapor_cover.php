<style type="text/css">
    .ctr {
        text-align: center
    }

    h5 {
        text-align: right;
        font-size: 18px;
        text-align: center;
    }

    h4 {
        text-align: left;
        font-size: 18px;
        text-align: center;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?php $this->load->view('layout/header-page') ?>

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
                            <a class="btn btn-warning mb-3" href="<?= base_url('akademik_walikelas/biodata_rapor'); ?>"> <i class="fa fa-arrow-circle-left"></i> Kembali</a>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="col-md-12">
                                    <!-- <div class="content">
                                        <div class="card">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr>
                                                        <td>
                                                            <h4>RAPOR</h4>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h4>PESERTA DIDIK</h4>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h4>SEKOLAH DASAR</h4>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h4>(SD)</h4>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div><img src="<?= base_url(); ?>dist/upload/logo/logo.png" style="display: block; margin-left: auto;margin-right: auto; width:30%"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h5>Nama Peserta Didik:</h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h4><?= $siswa['nama'] ?></h4>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h5>NISN/NIS</h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h4><?= $siswa['nisn'] ?>/<?= $siswa['nis'] ?></h4>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h4>KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN</h4>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h4>REPUBLIK INDONESIA</h4>
                                                        </td>
                                                    </tr>

                                                </table>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="panel-body">
                                        <h4>RAPOR</h4>
                                        <h4>PESERTA DIDIK</h4>
                                        <h4>SEKOLAH DASAR</h4>
                                        <h4>(SD)</h4>
                                        <br>
                                        <br>
                                        <br>
                                        <div><img src="<?= base_url(); ?>dist/upload/logo/logo.png" style="display: block; margin-left: auto;margin-right: auto; width:30%"></div>
                                        <br>
                                        <br>
                                        <h5>Nama Peserta Didik:</h5>
                                        <div class="center" style="margin: auto; width: 60%; border: 3px solid #73AD21; padding: 10px;">
                                            <h4><?= $siswa['nama'] ?></h4>
                                        </div>
                                        <br>
                                        <h5>NISN/NIS</h5>
                                        <div class="center" style="margin: auto; width: 60%; border: 3px solid #73AD21; padding: 10px;">
                                            <h4><?= $siswa['nisn'] ?>/<?= $siswa['nis'] ?></h4>
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <h4>KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN</h4>
                                        <h4>REPUBLIK INDONESIA</h4>
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
</div>
<!-- /.content-wrapper -->