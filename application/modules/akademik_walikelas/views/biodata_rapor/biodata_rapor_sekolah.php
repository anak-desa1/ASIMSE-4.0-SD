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
                    <p class="card-title">About Me</p>
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
                                    <div class="content">
                                        <!-- <div class="card">
                                            <div class="table-responsive">
                                                <table class="table table-striped projects table table-sm">
                                                    <tr>
                                                        <td colspan="4">
                                                            <h4>RAPOR</h4>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">
                                                            <h4>PESERTA DIDIK</h4>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">
                                                            <h4>SEKOLAH DASAR (SD)</h4>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p>Nama Sekolah</p>
                                                        </td>
                                                        <td colspan="3">
                                                            <p> : <?= $sekolah['nama_sekolah'] ?></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p>NPSN</p>
                                                        </td>
                                                        <td colspan="3">
                                                            <p> : <?= $sekolah['npsn'] ?></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p>NISN/NIS</p>
                                                        </td>
                                                        <td colspan="3">
                                                            <p> : <?= $sekolah['nisn'] ?>/<?= $sekolah['nis'] ?></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p>Alamat Sekolah</p>
                                                        </td>
                                                        <td colspan="3">
                                                            <p> : <?= $sekolah['alamat'] ?></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p>Kode Pos</p>
                                                        </td>
                                                        <td width="30%">
                                                            <p> : <?= $sekolah['kodepos'] ?></p>
                                                        </td>
                                                        <td width="20%">
                                                            <p>Telp.</p>
                                                        </td>
                                                        <td width="40%">
                                                            <p> : <?= $sekolah['telp'] ?></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p>Kelurahan/Desa</p>
                                                        </td>
                                                        <td colspan="3">
                                                            <p> : <?= $sekolah['desa'] ?></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p>Kecamatan</p>
                                                        </td>
                                                        <td colspan="3">
                                                            <p> : <?= $sekolah['kecamatan'] ?></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p>Kabupaten/Kota</p>
                                                        </td>
                                                        <td colspan="3">
                                                            <p> : <?= $sekolah['kota'] ?></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p>Provinsi</p>
                                                        </td>
                                                        <td colspan="3">
                                                            <p> : <?= $sekolah['provinsi'] ?></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p>Website</p>
                                                        </td>
                                                        <td colspan="3">
                                                            <p> : <?= $sekolah['web'] ?></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p>E-mail</p>
                                                        </td>
                                                        <td colspan="3">
                                                            <p> : <?= $sekolah['email'] ?></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">
                                                            <h4>KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN</h4>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">
                                                            <h4>REPUBLIK INDONESIA</h4>
                                                        </td>
                                                    </tr>

                                                </table>
                                            </div>
                                        </div> -->
                                        <div class="panel-body">
                                            <h4>RAPOR</h4>
                                            <h4>PESERTA DIDIK</h4>
                                            <h4>SEKOLAH DASAR (SD)</h4>
                                            <br>
                                            <br>
                                            <br>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <p>Nama Sekolah</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <p> : <?= $sekolah['nama_sekolah'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <p>NPSN</p>
                                                    </div>
                                                    <div class="col-4">
                                                        <p> : <?= $sekolah['npsn'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <p>NISN/NIS</p>
                                                    </div>
                                                    <div class="col-4">
                                                        <p> : <?= $sekolah['nisn'] ?>/<?= $sekolah['nis'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <p>Alamat Sekolah</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <p> : <?= $sekolah['alamat_s'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <p>Kode Pos</p>
                                                    </div>
                                                    <div class="col-2">
                                                        <p> : <?= $sekolah['kodepos'] ?></p>
                                                    </div>
                                                    <div class="col-1">
                                                        <p>Telp.</p>
                                                    </div>
                                                    <div class="col-4">
                                                        <p> : <?= $sekolah['telp'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <p>Kelurahan/Desa</p>
                                                    </div>
                                                    <div class="col-4">
                                                        <p> : <?= $sekolah['desa'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <p>Kecamatan</p>
                                                    </div>
                                                    <div class="col-4">
                                                        <p> : <?= $sekolah['kecamatan'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <p>Kabupaten/Kota</p>
                                                    </div>
                                                    <div class="col-4">
                                                        <p> : <?= $sekolah['kota'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <p>Provinsi</p>
                                                    </div>
                                                    <div class="col-4">
                                                        <p> : <?= $sekolah['provinsi'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <p>Website</p>
                                                    </div>
                                                    <div class="col-4">
                                                        <p> : <?= $sekolah['web'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <p>E-mail</p>
                                                    </div>
                                                    <div class="col-4">
                                                        <p> : <?= $sekolah['email'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <br>

                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <h4>KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN</h4>
                                            <h4>REPUBLIK INDONESIA</h4>
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
</div>
<!-- /.content-wrapper -->