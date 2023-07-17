
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
                            <a class="btn btn-warning mb-3" href="<?= base_url('akademik_walikelas_km/nilai_catatan'); ?>"> <i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            <h3 class="btn btn-info mb-3">Form Catatan</h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="col-md-12">
                                    <div class="content">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <h4>
                                                        <b>CATATAN WALIKELAS</b>
                                                        <br><?php echo "Kelas : " . $kelas['rombel'] . ", Nama Wali : " . $kelas['nama_lengkap']; ?>
                                                    </h4>
                                                </div>
                                                <div class="col-md-3 ">
                                                    <br>
                                                    <h5 class="title">Deskripsi untuk Catatan guru</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="content">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th width="5%">No</th>
                                                                        <th width="15%">NIS</th>
                                                                        <th width="15%">Nama</th>
                                                                        <th width="40%">Catatan</th>
                                                                    </tr>
                                                                </thead>

                                                                <tbody>
                                                                    <form action="<?= base_url('akademik_walikelas_km/nilai_catatan/simpan_pas'); ?>" method="post">
                                                                        <?php
                                                                        $no = 1;
                                                                        if (!empty($siswa_kelas)) {
                                                                            foreach ($siswa_kelas as $sk) {
                                                                                echo '<input type="hidden" name="id_siswa_' . $no . '" value="' . $sk['nis'] . '">';
                                                                                echo '<input type="hidden" name="tasm" value="' . $tasm . '">';
                                                                        ?>
                                                                                <tr>
                                                                                    <td><?php echo $no; ?></td>
                                                                                    <td><?php echo $sk['nis']; ?></td>
                                                                                    <td><?php echo $sk['nama']; ?></td>
                                                                                    <td>
                                                                                        <?php if ($sk['tasm'] == $tasm && $sk['penilaian'] == 'PAS') { ?>
                                                                                            <textarea rows="3" class="form-control input-sm" id="catatan_<?php echo $no; ?>" name="catatan_<?php echo $no; ?>"><?php echo $sk['catatan_wali']; ?></textarea>
                                                                                        <?php } else { ?>
                                                                                            <textarea rows="3" class="form-control input-sm" id="catatan_<?php echo $no; ?>" name="catatan_<?php echo $no; ?>"></textarea>
                                                                                        <?php } ?>

                                                                                    </td>
                                                                                </tr>
                                                                        <?php
                                                                                $no++;
                                                                            }
                                                                        } else {
                                                                            echo '<tr><td colspan="4">Belum ada data siswa</td></tr>';
                                                                        }
                                                                        ?>

                                                                </tbody>

                                                            </table>
                                                            <input type="hidden" name="jumlah" value="<?php echo $no; ?>">
                                                            <button type="submit" class="btn btn-success" id="tbsimpan"><i class="fa fa-check"></i> Simpan</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="card">
                                                        <div class="content">
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <th>No.</th>
                                                                    <th>Catatan</th>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>Karakteristik siswa dalam menggali memahami pengetahuan masih memerlukan peningkatan konsentrasi dan motivasi sehingga masih diperlukan bimbingan dari orang tua untuk meningkakan motivasi,</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>Potensi untuk meningkatkan keterampilan sangat potensial mengingat peserta didik ini, mudah mencerna dan mendapatkan pengetahuan,</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>Sikap sosial dan spiritual telah mengalami perkembangan ke arah positif secara signifikan, interaksi, dan keteladanan untuk mempengaruhi teman bersikap positif perlu ditumbuhkan</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>Motivasi belajar siswa telah tumbuh dengan pesat, bimbingan dan fasilitasi kelengkapan belajar yang disediakan oleh orang tua akan dapat meningkatkan kembali presasi siswa,</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>5</td>
                                                                    <td>Perlu peningkatan dalam berkomunikasi dan unjuk kemampuan melalui motivasi menjadi petugas, presentasi dan aktivitas unjuk kerja,</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>6</td>
                                                                    <td>Kegiatan eksploratif dan pengembangan potensi melalui ekstrakurikuler perlu ditingkatkan</td>
                                                                </tr>

                                                            </table>
                                                        </div>
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

</main>

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
