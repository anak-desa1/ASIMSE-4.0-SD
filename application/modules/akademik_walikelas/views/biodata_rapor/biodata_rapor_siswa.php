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
                                        <div class="table-responsive">
                                            <table class="table table-striped projects table table-sm">
                                                <tr>
                                                    <td colspan="4">
                                                        <h4>IDENTITAS PESERTA DIDIK</h4>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <p>Nama Peserta Didik</p>
                                                    </td>
                                                    <td colspan="2">
                                                        <p> : <?= $sekolah['nama'] ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <p>NISN/NIS</p>
                                                    </td>
                                                    <td colspan="2">
                                                        <p> : <?= $sekolah['nisn'] ?>/<?= $sekolah['nis'] ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <p>Tempat, Tanggal Lahir</p>
                                                    </td>
                                                    <td colspan="2">
                                                        <p> : <?= $sekolah['tmp_lahir'] ?> <?= $sekolah['tgl_lahir'] ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <p>Jenis Kelamin</p>
                                                    </td>
                                                    <td colspan="2">
                                                        <p> : <?php if ($sekolah['jk'] == "P") {
                                                                    echo "Perempuan";
                                                                } else {
                                                                    echo 'Laki-Laki';
                                                                } ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <p>Agama</p>
                                                    </td>
                                                    <td colspan="2">
                                                        <p> : <?= $sekolah['agama'] ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <p>Pendidikan sebelumnya</p>
                                                    </td>
                                                    <td colspan="2">
                                                        <p> : <?= $sekolah['sek_asal'] ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <p>Alamat Peserta Didik</p>
                                                    </td>
                                                    <td colspan="2">
                                                        <p> : <?= $sekolah['alamat_si'] ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <p>Nama Orangtua</p>
                                                    </td>
                                                    <td colspan="2">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <p>Ayah</p>
                                                    </td>
                                                    <td colspan="2">
                                                        <p> : <?= $sekolah['ortu_ayah'] ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <p>Ibu</p>
                                                    </td>
                                                    <td colspan="2">
                                                        <p> : <?= $sekolah['ortu_ibu'] ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <p>Pekerjaan Orangtua</p>
                                                    </td>
                                                    <td colspan="2">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <p>Ayah</p>
                                                    </td>
                                                    <td colspan="2">
                                                        <p> : <?= $sekolah['ortu_ayah_pkj'] ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <p>Ibu</p>
                                                    </td>
                                                    <td colspan="2">
                                                        <p> : <?= $sekolah['ortu_ibu_pkj'] ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <p>Alamat Orangtua</p>
                                                    </td>
                                                    <td colspan="2">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <p>Jalan</p>
                                                    </td>
                                                    <td colspan="2">
                                                        <p> : <?= $sekolah['ortu_alamat'] ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <p>Kelurahan/Desa</p>
                                                    </td>
                                                    <td colspan="2">
                                                        <p> : <?= $sekolah['desa'] ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <p>Kecamatan</p>
                                                    </td>
                                                    <td colspan="2">
                                                        <p> : <?= $sekolah['kecamatan'] ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <p>Kabupaten/Kota</p>
                                                    </td>
                                                    <td colspan="2">
                                                        <p> : <?= $sekolah['kota'] ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <p>Provinsi</p>
                                                    </td>
                                                    <td colspan="2">
                                                        <p> : <?= $sekolah['provinsi'] ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <p>Wali Peserta Didik</p>
                                                    </td>
                                                    <td colspan="2">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <p>Nama</p>
                                                    </td>
                                                    <td colspan="2">
                                                        <p> : <?= $sekolah['wali'] ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <p>Pekerjaan</p>
                                                    </td>
                                                    <td colspan="2">
                                                        <p> : <?= $sekolah['wali_pkj'] ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <p>Alamat</p>
                                                    </td>
                                                    <td colspan="2">
                                                        <p> : <?= $sekolah['wali_alamat'] ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td rowspan="4" colspan="">
                                                        <p>Pas Foto
                                                            Ukuran
                                                            3 X 4</p>
                                                    </td>
                                                    <td></td>
                                                    <td colspan="2">
                                                        <p><?= $sekolah['kota'] ?>, <?php echo format_indo(date($tahun['tgl_raport'])); ?></p>
                                                        <p>Kepala Sekolah,</p>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <u>
                                                            <p><?= $sekolah['sebutan_kepala'] ?></p>
                                                        </u>
                                                        <p>NIP.</p>
                                                    </td>
                                                    <td colspan="2">

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