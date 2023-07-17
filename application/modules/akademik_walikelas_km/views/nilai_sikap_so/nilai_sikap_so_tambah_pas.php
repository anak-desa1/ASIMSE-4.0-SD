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
                    <div class="card">
                        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="tampil-modal"></div>
                        <div class="card-header p-2">
                            <a class="btn btn-warning mb-3" href="<?= base_url('akademik_walikelas/nilai_sikap_so'); ?>"><i class="fa fa-arrow-alt-circle-left"></i> Kembali</a>
                            <h3 class="btn btn-info mb-3">Form Awal Tambah Nilai Sikap Sosial</h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="col-md-12">
                                    <div class="content">
                                        <table class="table table-condensed table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th width="5%" rowspan="2">No</th>
                                                    <th width="35%" rowspan="2">Nama</th>
                                                    <th width="35%" rowspan="2">Predikat</th>
                                                    <th width="40%" colspan="<?php echo $jmlh_kd; ?>">Memiliki Sikap</th>
                                                    <th width="20%" rowspan="2">Mulai Meningkat</th>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    if (!empty($list_kd)) {
                                                        foreach ($list_kd as $k) {
                                                            echo '<th>' . $k['nama_kd'] . '</th>';
                                                        }
                                                    }
                                                    ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <form action="<?= base_url('akademik_walikelas/nilai_sikap_so/simpan_nilai_pas'); ?>" method="post" id="">
                                                    <input type="hidden" name="id_guru_mapel" value="<?php echo $this->uri->segment(3); ?>">
                                                    <input type="hidden" name="tasm" value="<?= $tasm ?>">
                                                    <input type="hidden" name="id_kelas" value="<?= $kelas['rombel'] ?>">
                                                    <input type="hidden" name="mode_form" value="">
                                                    <?php
                                                    $no = 1;
                                                    foreach ($siswa_kelas as $sk) : {
                                                            $pc_selalu = explode(",", $sk['selalu']);
                                                            $mulai_meningkat = $sk['mulai_meningkat'];

                                                    ?>
                                                            <tr>
                                                                <td><?php echo $no; ?></td>
                                                                <td><?php echo $sk['nama']; ?></td>
                                                                <input type="hidden" name="id_siswa_<?php echo $no; ?>" value="<?php echo $sk['nis']; ?>">
                                                                <td>
                                                                    <?php
                                                                    if (empty($sk['predikat'])) {
                                                                        $sk = '4';
                                                                    } else {
                                                                        $sk = $sk['predikat'];
                                                                    }
                                                                    echo form_dropdown('predikat_' . $no, $p_predikat, $sk, 'class="form-control" required id="predikat"'); ?>
                                                                </td>
                                                                <?php
                                                                if (!empty($list_kd)) {
                                                                    foreach ($list_kd as $k) {
                                                                        if (in_array($k['kd_id'], $pc_selalu)) {
                                                                            echo '<td class="text-center"><label class="nso"><input type="checkbox" name="selalu_' . $no . '[]" value="' . $k['kd_id'] . '" checked></label></td>';
                                                                        } else {
                                                                            if ($k['kd_id'] == '1' || $k['kd_id'] == '2' || $k['kd_id'] == '3') {
                                                                                $ck = "checked";
                                                                            } else {
                                                                                $ck = "";
                                                                            }
                                                                            echo '<td class="text-center"><label class="nso"><input type="checkbox" name="selalu_' . $no . '[]" value="' . $k['kd_id'] . '"' . $ck . '></label></td>';
                                                                        }
                                                                    }
                                                                }
                                                                ?>
                                                                <td>
                                                                    <?php
                                                                    if (empty($mulai_meningkat)) {
                                                                        $sk = '4';
                                                                    } else {
                                                                        $sk = $mulai_meningkat;
                                                                    }
                                                                    echo form_dropdown('meningkat_' . $no, $dropdown_kd, $sk, 'class="form-control" required id="meningkat"'); ?>
                                                                </td>
                                                            </tr>
                                                    <?php
                                                            $no++;
                                                        }
                                                    endforeach
                                                    ?>
                                            </tbody>

                                        </table>
                                        <input type="hidden" name="jumlah" value="<?php echo $no; ?>">
                                        <button type="submit" class="btn btn-success" id="tbsimpan"><i class="fa fa-check"></i> Simpan</button>
                                        </form>
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

        $("#<?php echo $nama_form; ?>").on("submit", function() {

            var data = $(this).serialize();
            $.ajax({
                type: "POST",
                data: data,
                url: base_url + "<?php echo $url; ?>/simpan_nilai",
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