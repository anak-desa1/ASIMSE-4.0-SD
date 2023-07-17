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
                            <h3 class="btn btn-danger mb-3">Hapus Nilai Sikap</h3>
                        </div>
                        <div class="tampil-modal"></div>
                        <div class="card-body">
                          
                            <div class="tab-content">
                                <div class="col-md-12">
                                    <div class="card">                                     
                                    <?php if (ucwords($this->uri->segment(6, 0)) == 1) {?>
                                        <p class="card-header p-2">Dimensi <i class="fa fa-chevron-right"></i> Beriman, bertakwa kepada Tuhan Yang Maha Esa </p>
                                    <?php } ?>
                                    <?php if (ucwords($this->uri->segment(6, 0)) == 2) {?>
                                        <p class="card-header p-2">Dimensi <i class="fa fa-chevron-right"></i> Mandiri</p>
                                    <?php } ?>
                                    <?php if (ucwords($this->uri->segment(6, 0)) == 3) {?>
                                        <p class="card-header p-2">Dimensi <i class="fa fa-chevron-right"></i> Bergotong royong</p>
                                    <?php } ?>
                                    <?php if (ucwords($this->uri->segment(6, 0)) == 4) {?>
                                        <p class="card-header p-2">Dimensi <i class="fa fa-chevron-right"></i> Kreatif</p>
                                    <?php } ?>
                                    <?php if (ucwords($this->uri->segment(6, 0)) == 5) {?>
                                        <p class="card-header p-2">Dimensi <i class="fa fa-chevron-right"></i> Bernalar Kritis</p>
                                    <?php } ?>
                                    <?php if (ucwords($this->uri->segment(6, 0)) == 6) {?>
                                        <p class="card-header p-2">Dimensi <i class="fa fa-chevron-right"></i> Berkebinekaan global</p>
                                    <?php } ?>
                                    </div><!-- /.card-header -->
                                    <form action="<?= base_url('akademik_walikelas/nilai_sikap/delete_sikap_data'); ?>" method="post">
                                    
                                        <div class="content">
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <div class="content">
                                                        <table class="table table-condensed table-bordered table-hover">
                                                           <thead>
                                                               <tr>
                                                                    <th width="5%">No</th>
                                                                    <th width="45%">Nama</th>                                                                   
                                                                    <th width="50%">Deskripsi Sikap</th>                                                              
                                                                </tr>
                                                            </thead>
                                                            <tbody>                                                       
                                                                <input type="hidden" name="id_kelas" value="<?= $kelas['rombel'] ?>">
                                                                <input type="hidden" name="tasm" value="<?= $tasm ?>">
                                                                <input type="hidden" name="dimensi" value="<?= ucwords($this->uri->segment(6, 0)) ?>">
                                                                <?php
                                                                $no = 1;
                                                                if (!empty($siswa_kelas)) {
                                                                    foreach ($siswa_kelas as $sk) 
                                                                        foreach ($tampil_sikap as $ts) 
                                                                            if ($ts['id_siswa'] == $sk['id_siswa'])
                                                                               if ($ts['dimensi'] == ucwords($this->uri->segment(6, 0))){ ?>   
                                                                        <tr>
                                                                            <td><?= $no; ?> <input type="hidden" name="id[]" value="<?= $sk['id'] ?>"> </td>
                                                                            <td> <input type="hidden" name="id_siswa[]" value="<?= $sk['nis']; ?>"><?= $sk['nama']; ?></td>                                                                 
                                                                            <td>
                                                                                <div class="form-group">
                                                                                   <textarea name="deskripsi[]" class="form-control" id="textarea" rows="3" cols="20" maxlength="100" readonly><?= $ts['deskripsi']; ?></textarea>
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
                                                    <button type="submit" class="btn btn-danger" id="tbsimpan"><i class="fa fa-check"></i> Hapus</button>
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