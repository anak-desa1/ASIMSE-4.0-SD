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
                            <a class="btn btn-warning mb-3" href="<?= base_url('akademik_walikelas/biodata_rapor'); ?>"> <i class="fa fa-arrow-circle-left"></i> kembali</a>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="col-md-12">
                                    <div class="content">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="content">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <th colspan="2">PETUNJUK PENGISIAN RAPOR</th>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>Rapor Peserta Didik dipergunakan selama peserta didik yang bersangkutan
                                                                        mengikuti seluruh program pembelajaran di Sekolah Dasar tersebut;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>Identitas Sekolah diisi dengan data yang sesuai dengan keberadaan Sekolah
                                                                        Dasar;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>Daftar Peserta didik diisi oleh data peserta didik yang ada dalam Rapor
                                                                        Peserta Didik ini;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>Identitas Peserta didik diisi oleh data yang sesuai dengan keberadaan peserta
                                                                        didik;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>5</td>
                                                                    <td>Rapor Peserta Didik harus dilengkapi dengan pas foto berwarna (3 x 4) dan
                                                                        pengisiannya dilakukan oleh Guru Kelas;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>6</td>
                                                                    <td>Kompetensi inti 1 (KI-1) untuk sikap spiritual diambil dari KI-1 pada muatan
                                                                        pelajaran Pendidikan Agama dan Budi Pekerti dan PPKn;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>7</td>
                                                                    <td>Kompetensi inti 2 (KI-2) untuk sikap sosial diambil dari KI-2 pada muatan
                                                                        pelajaran Pendidikan Agama dan Budi Pekerti dan PPKn;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>8</td>
                                                                    <td>Kompetensi inti 3 dan 4 (KI-3 dan KI-4) diambil dari KI-3 dan KI-4 pada
                                                                        semua muatan pelajaran;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>9</td>
                                                                    <td>Hasil penilaian pengetahuan dan keterampilan dilaporkan dalam bentuk
                                                                        nilai, predikat dan deskripsi pencapaian kompetensi mata pelajaran;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>10</td>
                                                                    <td>Hasil penilaian sikap dilaporkan dalam bentuk predikat dan/atau deskripsi;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>11</td>
                                                                    <td>Predikat yang ditulis dalam Rapor Peserta Didik:
                                                                        <br>
                                                                        A : Sangat Baik <br>
                                                                        B : Baik <br>
                                                                        C : Cukup <br>
                                                                        D : Perlu Bimbingan <br>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>12</td>
                                                                    <td>Deskripsi pengetahuan dan keterampilan ditulis dengan kalimat positif
                                                                        sesuai dengan capaian KD tertinggi atau terendah dari masing-masing
                                                                        muatan pelajaran yang diperoleh peserta didik. Deskripsi berisi pengetahuan
                                                                        dan keterampilan yang sangat baik/dan atau baik yang dikuasai dan
                                                                        penguasaannya belum optimal. Apabila nilai capaian KD muatan pelajaran
                                                                        yang diperoleh dari suatu muatan pelajaran sama, kolom deskripsi ditulis
                                                                        sesuai dengan capaian untuk semua KD;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>13</td>
                                                                    <td>Laporan Ekstrakurikuler diisi dengan kegiatan ekstrakurikuler yang diikuti
                                                                        oleh peserta didik;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>14</td>
                                                                    <td>Saran–saran diisi tentang hal-hal yang perlu mendapatkan perhatian peserta
                                                                        didik, pendidik, dan orangtua/wali terutama untuk hal-hal yang tidak
                                                                        didapatkan dari sekolah;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>15</td>
                                                                    <td>Laporan tinggi dan berat badan peserta didik ditulis berdasarkan hasil
                                                                        pengukuran yang dilakukan pendidik;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>16</td>
                                                                    <td>Laporan kondisi kesehatan fisik diisi dengan deskripsi hasil pemeriksaan
                                                                        yang dilakukan pendidik, bekerjasama dengan tenaga kesehatan atau
                                                                        puskesmas terdekat;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>17</td>
                                                                    <td>Prestasi diisi dengan prestasi peserta didik yang menonjol;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>18</td>
                                                                    <td>Kolom ketidakhadiran ditulis dengan data akumulasi ketidakhadiran peserta
                                                                        didik karena sakit, izin, atau tanpa keterangan selama satu semester;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>19</td>
                                                                    <td>Apabila peserta didik pindah, maka dicatat di dalam kolom keterangan
                                                                        pindah.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>20</td>
                                                                    <td>Kolom pernyataan kenaikan kelas diisi keterangan naik atau tinggal kelas.
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
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

<script type="text/javascript">
    $(document).on("ready", function() {

        $("#<?php echo $url; ?>").on("submit", function() {

            var data = $(this).serialize();


            $.ajax({
                type: "POST",
                data: data,
                url: base_url + "<?php echo $url; ?>/simpan",
                beforeSend: function() {
                    $("#tbsimpan").attr("disabled", true);
                },
                success: function(r) {
                    $("#tbsimpan").attr("disabled", false);
                    if (r.status == "ok") {
                        noti("success", r.data);
                    } else {
                        noti("danger", r.data);
                    }
                }
            });

            return false;
        });
    });
</script>