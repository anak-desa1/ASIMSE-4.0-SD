<style type="text/css">
    .ctr {
        text-align: center
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
                        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="card-header p-2">
                            <a class="btn btn-info mb-3" href="<?= base_url('akademik_walikelas/nilai_sikap'); ?>"><i class="fa fa-arrow-alt-circle-left"></i> Kembali</a>
                            <h3 class="btn btn-success mb-3">Tambah Nilai Sikap</h3>
                        </div>
                        <div class="tampil-modal"></div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="col-md-12">
                                    <form action="<?= base_url('akademik_walikelas/nilai_sikap/save_sikap'); ?>" method="post">
                                    <div class="card">                                     
                                        <p class="card-header p-2"> Pilih Dimensi</p>
                                        <?php
                                            if (empty($sk['dimensi'])) {
                                                $sk = '1';
                                                } else {
                                                $sk = $sk['dimensi'];
                                                }
                                        echo form_dropdown('dimensi', $p_dimensi, $sk, 'class="form-control" required id="dimensi"'); 
                                        ?>
                                    </div><!-- /.card-header -->
                                        <div class="content">
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <div class="content">
                                                        <table class="table table-condensed table-bordered table-hover">
                                                           <thead>
                                                               <tr>
                                                                    <th width="5%">No</th>
                                                                    <th width="20%">Nama</th>                                                                   
                                                                    <th width="50%" colspan="2">Deskripsi Sikap</th>                                                              
                                                                </tr>
                                                            </thead>
                                                            <tbody>                                                           
                                                                <input type="hidden" name="id_kelas" value="<?= $kelas['rombel'] ?>">
                                                                <input type="hidden" name="tasm" value="<?= $tasm ?>">
                                                                <?php
                                                                $no = 1;
                                                                if (!empty($siswa_kelas)) {
                                                                    foreach ($siswa_kelas as $sk) { ?>   
                                                                        <tr>
                                                                            <td><?= $no; ?></td>
                                                                            <td> <input type="hidden" name="id_siswa[]" value="<?= $sk['nis']; ?>"><?= $sk['nama']; ?></td>                                                                 
                                                                            <td>
                                                                               <div class="form-group">
                                                                                   <textarea name="deskripsi[]" class="form-control" id="textarea" rows="3" cols="20" maxlength="100"></textarea>
                                                                                   <div id="textarea_feedback"></div>                                                    
                                                                                </div>   
                                                                            </td>
                                                                        </tr>
                                                                <?php
                                                                        $no++;
                                                                    }
                                                                } else {
                                                                    echo '<tr><td colspan="5">Belum ada data siswa</td></tr>';
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    <input type="hidden" name="jumlah" value="<?= $no; ?>">
                                                    <button type="submit" class="btn btn-success" id="tbsimpan"><i class="fa fa-check"></i> Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
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

<!-- jQuery -->
<script src="<?= base_url() ?>panel/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
    $(document).on("ready", function() {

        $("#<?= $nama_form; ?>").on("submit", function() {
            // console.log(<?= $nama_form; ?>);
            var data = $(this).serialize();
            var jml_data = <?= $no; ?>;
            var teks_error = "";

            for (var i = 1; i < jml_data; i++) {
                var ssp1 = $("#ssp1_" + i).val();
                var ssp2 = $("#ssp2_" + i).val();
                var ssp3 = $("#ssp3_" + i).val();
                if ((ssp1 == ssp2) || (ssp1 == ssp3) || (ssp2 == ssp3)) {
                    teks_error += 'Baris ' + i + ' ada isian sama<br>';
                }
            }
            if (teks_error != "") {
                noti("danger", teks_error);
            } else {
                $.ajax({
                    type: "POST",
                    data: data,
                    url: "<?= base_url() ?><?= $url; ?>simpan_nilai",
                    beforeSend: function() {
                        $("#tbsimpan").attr("disabled", true);
                    },
                    success: function(r) {
                        $("#tbsimpan").attr("disabled", false);
                        if (r.status == "ok") {
                            noti("success", r.data);
                        } else {
                            noti("danger", "Data gagal disimpan...");
                        }
                    }
                });
            }
            return false;
        });
    });
</script>