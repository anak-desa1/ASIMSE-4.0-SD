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
                            <a class="btn btn-info mb-3" href="<?= base_url('akademik_walikelas/nilai_sikap_so/tambah_pts/'); ?>"> <i class="fa fa-address-book"></i> Nilai SO PTS</a>
                            <a class="btn btn-info mb-3" href="<?= base_url('akademik_walikelas/nilai_sikap_so/tambah_pas/'); ?>"> <i class="fa fa-address-book"></i> Nilai SO PAS</a>
                            <a class="btn btn-success mb-3" href="<?= base_url('akademik_walikelas/nilai_sikap_so/cetak_pts/'); ?>" target="_blank"><i class="fa fa-print"></i> Cetak PTS</a>
                            <a class="btn btn-success mb-3" href="<?= base_url('akademik_walikelas/nilai_sikap_so/cetak_pas/'); ?>" target="_blank"><i class="fa fa-print"></i> Cetak PAS</a>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="col-md-12">
                                    <div class="content">
                                        <p align="center"><b>REKAP NILAI SIKAP SOSIAL PTS</b>
                                            <br><?php echo "Kelas : " .  $kelas['rombel'] . ", Nama Wali : " . $kelas['nama_lengkap']; ?>
                                        </p>
                                        <table class="table table-condensed table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th width="3%">No</th>
                                                    <th width="20%">Nama</th>
                                                    <th width="10%">Predikat</th>
                                                    <th width="30%">Memiliki sikap</th>
                                                    <th width="15%">Mulai Meningkat</th>
                                                    <th width="32%">Deskripsi</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $html = "";
                                                if (!empty($data_nilai_pts)) {
                                                    $no = 0;
                                                    foreach ($data_nilai_pts as $d)
                                                        if ($d['tasm'] == $tasm) {
                                                            $no++;

                                                            $pc_selalu = explode(",", $d['selalu']);
                                                            $mulai_meningkat = $d['mulai_meningkat'];

                                                            $html .= '<tr><td class="ctr">' . $no . '</td><td>' . $d['nama'] . '</td>';
                                                            $html .= '<td>' . $d['predikat'] . '</td>';
                                                            $teks_selalu = array();
                                                            for ($i = 0; $i < sizeof($pc_selalu); $i++) {
                                                                $idx = $pc_selalu[$i];

                                                                $teks_selalu[] = $list_kd[$idx];
                                                            }

                                                            $text_selalu = implode(", ", $teks_selalu);

                                                            $idx22 = $list_kd[$mulai_meningkat];

                                                            $html .= '<td>' . $text_selalu . '</td><td>' . $idx22 . '</td><td>' . $d['nama'] . ' ' . '<b>sangat</b>' . ' ' . $text_selalu . ' ' . ', <b> dan sudah mampu meningkatkan
                                                            sikap</b>' . ' ' . $idx22 . ' </td></tr>';
                                                        }
                                                } else {
                                                    $html .= '<tr><td colspan="6"><div class="alert alert-info">Belum ada nilai sikap sosial diinputkan</div></td></tr>';
                                                }
                                                echo $html;
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="col-md-12">
                                    <div class="content">
                                        <p align="center"><b>REKAP NILAI SIKAP SOSIAL PAS</b>
                                            <br><?php echo "Kelas : " .  $kelas['rombel'] . ", Nama Wali : " . $kelas['nama_lengkap']; ?>
                                        </p>
                                        <table class="table table-condensed table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th width="3%">No</th>
                                                    <th width="20%">Nama</th>
                                                    <th width="10%">Predikat</th>
                                                    <th width="30%">Memiliki sikap</th>
                                                    <th width="15%">Mulai Meningkat</th>
                                                    <th width="32%">Deskripsi</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $html = "";
                                                if (!empty($data_nilai_pas)) {
                                                    $no = 0;
                                                    foreach ($data_nilai_pas as $d)
                                                        if ($d['tasm'] == $tasm) {
                                                            $no++;

                                                            $pc_selalu = explode(",", $d['selalu']);
                                                            $mulai_meningkat = $d['mulai_meningkat'];

                                                            $html .= '<tr><td class="ctr">' . $no . '</td><td>' . $d['nama'] . '</td>';
                                                            $html .= '<td>' . $d['predikat'] . '</td>';
                                                            $teks_selalu = array();
                                                            for ($i = 0; $i < sizeof($pc_selalu); $i++) {
                                                                $idx = $pc_selalu[$i];

                                                                $teks_selalu[] = $list_kd[$idx];
                                                            }

                                                            $text_selalu = implode(", ", $teks_selalu);

                                                            $idx22 = $list_kd[$mulai_meningkat];

                                                            $html .= '<td>' . $text_selalu . '</td><td>' . $idx22 . '</td><td>' . $d['nama'] . ' ' . '<b>sangat</b>' . ' ' . $text_selalu . ' ' . ', <b> dan sudah mampu meningkatkan
                                                            sikap</b>' . ' ' . $idx22 . ' </td></tr>';
                                                        }
                                                } else {
                                                    $html .= '<tr><td colspan="6"><div class="alert alert-info">Belum ada nilai sikap sosial diinputkan</div></td></tr>';
                                                }
                                                echo $html;
                                                ?>
                                            </tbody>
                                        </table>
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