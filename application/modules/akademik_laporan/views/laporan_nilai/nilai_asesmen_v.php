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

    <section class="content">
        <div class="container-fluid">
            <!-- About Me Box -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">About Me</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <p class="text-muted"><?= $data['rombel'] ?> | <?= $data['nama'] ?></p>
                    <p class="text-muted"><?= $data['mapel_id'] ?> | <?= $data['nama_lengkap'] ?></p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="card">
                        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="tampil-modal"></div>
                        <div class="card-header p-2">
                            <!--<a class="btn btn-info mb-3" href="<?= site_url('akademik_laporan/laporan_nilai/') ?>"><i class="fa fa-arrow-circle-left"></i> Kembali</a>-->
                            <?php if ($cek_akses['role_id'] == 1) : ?>
                            <?php endif ?>
                            &nbsp;
                            Tahun Aktif : <?= $tahun ?>
                            &nbsp;
                            Semester : <?= $semester ?>
                            <!-- <div class="alert alert-danger" role="alert">
                            Proses Expor dan Impor Excel :<br>
                                <ul>
                                    <li>Klik Expor Excel "Untuk menarik data siswa dan nilai"</li>
                                    <li>Klik Impor Excel "Untuk memasukkan data siswa dan nilai"</li>
                                </ul>
                            </div> -->
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Table row -->
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="table table-striped table table-sm">
                                                <thead></thead>
                                                <tbody>
                                                    <tr>
                                                        <td rowspan="2" colspan="4" class="text-center align-middle"><b>DATA SISWA</b></td>
                                                        <td colspan="24" class="text-center"><b>HASIL ASESMEN</b></td>
                                                        <!-- <?php echo $ta ?> -->
                                                    </tr>
                                                    <?php foreach ($siswa as $s) :
                                                    endforeach ?>
                                                    <tr>
                                                        <?php if (!empty($nilai)) { ?>
                                                            <?php foreach ($nilai as $n) : ?>
                                                            <?php endforeach ?>                                                          
                                                            <td colspan="11" class="text-center">REKAP NILAI</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center align-middle">NO</td>
                                                        <td class="text-center align-middle">NIS</td>
                                                        <td class="text-center align-middle">Nama Siswa</td>
                                                        <td class="text-center align-middle">KKM</td>                                                        
                                                    <?php } ?>   
                                                    <td class="text-center align-middle">KD</td>                                                
                                                    <td class="text-center align-middle">NILAI KD</td>                                                    
                                                    <td class="text-center align-middle">NILAI AKHIR</td>
                                                    <td class="text-center align-middle">Predikat</td>
                                                    <td class="text-center align-middle">Ketuntasan</td>
                                                    </tr>
                                                    <?php $no = 1;  ?>
                                                    <?php if (!empty($nilai)) { ?>
                                                        <?php foreach ($siswa as $s) : ?>
                                                            <tr>
                                                                <td class="text-center"><?= $no; ?></td>
                                                                <td class="text-center"><?= $s['nis']; ?></td>
                                                                <td><?= $s['nama']; ?></td>
                                                                <td class="text-center"><?= $s['kkm']; ?></td>
                                                                <!-- hitung nilai -->
                                                                <?php
                                                                $total_all = 0;
                                                                $total_na = 0;
                                                                $total_all_n = 0;
                                                                $akd = array();
                                                                $all_kd = "";
                                                                $jum_kd = 0;
                                                                foreach ($nilai as $n) :
                                                                    if ($n['tasm'] == $tasm)
                                                                        if ($n['id_siswa'] == $s['id_siswa']) {                                                                            
                                                                                if (strpos($all_kd, $n['no_kd_1']) === false) {
                                                                                    $all_kd = $all_kd . $n['no_kd_1'];
                                                                                    array_push($akd, $n['no_kd_1']);
                                                                                    $jum_kd++;
                                                                                } else if ($all_kd == "") {
                                                                                    $all_kd = $all_kd . $n['no_kd_1'];
                                                                                    array_push($akd, $n['no_kd_1']);
                                                                                    $jum_kd++;
                                                                                }
                                                                ?>
                                                                <?php }
                                                                endforeach
                                                                ?>
                                                                <!-- end hitung nilai -->
                                                                <?php if ($ta == 1) { ?>
                                                                    <td class="text-center">
                                                                        <?php
                                                                        foreach ($nilai as $n) :
                                                                            if ($n['id_siswa'] == $s['id_siswa']) {                                                                               
                                                                                if ($n['jenis'] == 'PAS') {
                                                                                    echo ' <div>' . $n['no_kd_1'].'-'. $n['no_kd_2'] . ' </div>';
                                                                                }                                                                               
                                                                            }
                                                                        endforeach;
                                                                        ?>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <?php
                                                                        foreach ($nilai as $n) :
                                                                            if ($n['id_siswa'] == $s['id_siswa']) {                                                                               
                                                                                if ($n['jenis'] == 'PAS') {
                                                                                    echo ' <div>' . $n['nilai'] . ' </div>';
                                                                                }                                                                               
                                                                            }
                                                                        endforeach;
                                                                        ?>
                                                                    </td>                                                       
                                                                <?php } ?>
                                                                <?php if ($ta == 2) { ?>
                                                                    <td class="text-center">
                                                                        <?php
                                                                        foreach ($nilai as $n) :
                                                                            if ($n['id_siswa'] == $s['id_siswa']) {                                                                               
                                                                                    if ($n['jenis'] == 'PAS') {
                                                                                        echo ' <div>' . $n['no_kd_1'].'-'.$n['no_kd_2'] . ' </div>';
                                                                                    }
                                                                                }                                                                           
                                                                        endforeach;
                                                                        ?>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <?php
                                                                        foreach ($nilai as $n) :
                                                                            if ($n['id_siswa'] == $s['id_siswa']) {                                                                                
                                                                                if ($n['jenis'] == 'PAS') {
                                                                                    echo ' <div>' . $n['nilai'] . ' </div>';
                                                                                }                                                                                
                                                                            }
                                                                        endforeach;
                                                                        ?>
                                                                    </td>                                                       
                                                                <?php } ?>                                                               
                                                                <!-- <td class="text-center">
                                                                    <?php
                                                                    for ($i = 0; $i < $jum_kd; $i++) {
                                                                        echo '<div>' . $akd[$i] . '</div>';
                                                                    }
                                                                    ?>
                                                                </td> -->
                                                                <!-- <td class="text-center">
                                                                    <?php
                                                                    if (!empty($nilai)) {
                                                                        for ($i = 0; $i < $jum_kd; $i++) {
                                                                            $total = 0;
                                                                            $jum_n = 0;
                                                                            foreach ($nilai as $n) :
                                                                                if ($n['tasm'] == $tasm)
                                                                                    if ($n['id_siswa'] == $s['id_siswa']) {
                                                                                        if ($n['jenis'] == 'PAS') {
                                                                                            if ($n['no_kd_1'] == $akd[$i]) {
                                                                                                $jum_n++;
                                                                                                $total = $total + $n['nilai'];                                                                                                
                                                                                            }
                                                                                        }
                                                                                    }
                                                                            endforeach;
                                                                            $total_all_n = (string)round($total / $jum_n, 0, PHP_ROUND_HALF_UP);                                                                           
                                                                            echo '<div>' .  $total_all_n . '</div>';
                                                                        }
                                                                    }
                                                                    ?>
                                                                </td>                                                                -->
                                                                <!-- <td class="text-center">
                                                                    <?php
                                                                    $total_all_pas = 0;
                                                                    $akd = array();
                                                                    $all_kd = "";
                                                                    $jum_kd = 0;
                                                                    foreach ($nilai as $n) :
                                                                        if ($n['tasm'] == $tasm)
                                                                            if ($n['jenis'] == 'PAS') {
                                                                                if ($n['id_siswa'] == $s['id_siswa']) {
                                                                                    if (strpos($all_kd, $n['no_kd_1']) === false) {
                                                                                        $all_kd = $all_kd . $n['no_kd_1'];
                                                                                        array_push($akd, $n['no_kd_1']);
                                                                                        $jum_kd++;
                                                                                    } else if ($all_kd == "") {
                                                                                        $all_kd = $all_kd . $n['no_kd_1'];
                                                                                        array_push($akd, $n['no_kd_1']);
                                                                                        $jum_kd++;
                                                                                    }
                                                                                }
                                                                    ?>
                                                                    <?php }
                                                                    endforeach
                                                                    ?>
                                                                    <?php
                                                                    for ($i = 0; $i < $jum_kd; $i++) {
                                                                        echo '<div>' . $akd[$i] . '</div>';
                                                                    }
                                                                    ?>
                                                                </td> -->
                                                                <!-- <td class="text-center">
                                                                    <?php
                                                                    if (!empty($nilai_pas)) {
                                                                        for ($i = 0; $i < $jum_kd; $i++) {
                                                                            $total = 0;
                                                                            $jum_n = 0;
                                                                            foreach ($nilai_pas as $n) :
                                                                                if ($n['tasm'] == $tasm)
                                                                                    if ($n['id_siswa'] == $s['id_siswa']) {
                                                                                        if ($n['no_kd'] == $akd[$i]) {
                                                                                            $jum_n++;
                                                                                            $total = $total + $n['nilai'];
                                                                                        }
                                                                                    }
                                                                            endforeach;
                                                                            $total_all_pas = (string)round($total / $jum_n, 0, PHP_ROUND_HALF_UP);
                                                                            echo '<div>' . $total_all_pas . '</div>';
                                                                        }
                                                                    }
                                                                    ?>
                                                                </td> -->
                                                                <!-- <td class="text-center">
                                                                    <?php
                                                                    for ($i = 0; $i < $jum_kd; $i++) {
                                                                        echo '<div>' . $akd[$i] . '</div>';
                                                                    }
                                                                    ?>
                                                                </td> -->
                                                                <td class="text-center">
                                                                    <?php
                                                                    if (!empty($nilai)) {
                                                                        $maxmin = [];
                                                                        $desckd = [];
                                                                        for ($i = 0; $i < $jum_kd; $i++) {
                                                                            $total_n = 0;
                                                                            $jum_n = 0;
                                                                            $total_t = 0;
                                                                            $jum_t = 0;
                                                                            $total_p = 0;
                                                                            $jum_p = 0;
                                                                            if (!empty($nilai)) {
                                                                                foreach ($nilai as $n) :
                                                                                    if ($n['tasm'] == $tasm)
                                                                                        if ($n['id_siswa'] == $s['id_siswa']) {
                                                                                            if ($n['jenis'] == 'PAS') {
                                                                                                if ($n['no_kd_1'] == $akd[$i]) {
                                                                                                    $jum_n++;
                                                                                                    $total_n = $total_n + $n['nilai'];
                                                                                                    $kd = $n['nama_kd_1'];
                                                                                                    //$desckd[] = $n['nama_kd'];
                                                                                                    if (count($desckd) == 0 || $desckd[count($desckd) - 1] != $n['nama_kd_1']) {
                                                                                                        $desckd[] = $n['nama_kd_1'];
                                                                                                    }
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                endforeach;                                                                              
                                                                                $total_all_n = ($total_n != 0) ?  (string)round($total_n / $jum_n, 0, PHP_ROUND_HALF_UP) : 0;
                                                                                
                                                                            } else {
                                                                                echo $total_all_n = 0;
                                                                            }                                                                          
                                                                            $total_na += $total_all_n;                                                                            
                                                                        }
                                                                    }
                                                                    ?>
                                                                    <?php if (!empty($total_na)) { ?>
                                                                        <?php   $nilai_rapor =  round($total_na / count($akd), 0, PHP_ROUND_HALF_UP) ?>
                                                                        <?php echo '<div>' .  $nilai_rapor . '</div>'; ?>
                                                                    <?php
                                                                    } else {
                                                                        // echo $nilai_rapor = 0;
                                                                    } ?>
                                                                </td>                                                            
                                                                <td class="text-center">
                                                                    <?php if (!empty($total_na)) {
                                                                        $in_kkm = (string)round((100 - $s['kkm']) / 3, 0, PHP_ROUND_HALF_UP);
                                                                        $C = $s['kkm'];
                                                                        $B = $C + $in_kkm;
                                                                        $A = $B + $in_kkm;
                                                                        // echo $in_kkm;
                                                                    ?>
                                                                        <?php if ($nilai_rapor >= $A) {
                                                                            echo "A";
                                                                        } elseif ($nilai_rapor >= $B) {
                                                                            echo "B";
                                                                        } elseif ($nilai_rapor >= $C) {
                                                                            echo "C";
                                                                        } elseif ($nilai_rapor <= $C) {
                                                                            echo "D";
                                                                        } else {
                                                                            echo "Jangan menyerah, anda pasti bisa!  ";
                                                                        } ?>
                                                                    <?php
                                                                    } else {
                                                                        // echo $total_na = 0;
                                                                    } ?>
                                                                </td>
                                                                <td class="text-center">
                                                                    <?php if (!empty($total_na)) { ?>
                                                                        <?php if ($nilai_rapor >= $s['kkm']) { ?>
                                                                            <p>Tuntas</p>
                                                                        <?php
                                                                        } else {
                                                                            echo 'Belum Tuntas';
                                                                        }
                                                                        ?>
                                                                    <?php
                                                                    } else {
                                                                        // echo $total_nph = 0;
                                                                    } ?>
                                                                </td>
                                                            </tr>
                                                            <?php $no++ ?>
                                                        <?php endforeach ?>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- /.card-body -->
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