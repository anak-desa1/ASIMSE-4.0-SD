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
                            <a class="btn btn-info mb-3" href="<?= site_url('akademik_guru/capaian_kompetensi/') ?>"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            <?php if ($cek_akses['role_id'] == 1) : ?>
                            <?php endif ?>
                            &nbsp;
                            Tahun Aktif : <?= $tahun ?>
                            &nbsp;
                            Semester : <?= $semester ?>                
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
                                                    </tr>
                                                    <?php foreach ($siswa as $s) :
                                                    endforeach ?>
                                                    <tr>
                                                        <?php if (!empty($nilai)) { ?>
                                                            <?php foreach ($nilai as $n) : ?>
                                                            <?php endforeach ?>
                                                    </tr>
                                                    <tr>
                                                            <td class="text-center ">NO</td>
                                                            <td class="text-center ">NIS</td>
                                                            <td class="text-center ">Nama Siswa</td>
                                                            <td class="text-center ">KKM</td>                                                        
                                                        <?php } ?>   
                                                            <td class="text-center ">KOMPETENSI DASAR</td>                                                
                                                            <td class="text-center ">NILAI KD</td>                                                    
                                                            <td class="text-center ">CAPAIAN KOMPETENSI</td>                                                   
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
                                                                                    echo '<div>' . $n['no_kd_1'].'-'. $n['no_kd_2'] . ' </div>';
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
                                                                                    echo '<div>' . $n['nilai'] . ' </div>';
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
                                                                                        echo '<div>' . $n['no_kd_1'].'-'.$n['no_kd_2'] . ' </div>';
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
                                                                                    echo '<div>' . $n['nilai'] . ' </div>';
                                                                                }                                                                                
                                                                            }
                                                                        endforeach;
                                                                        ?>
                                                                    </td>                                                       
                                                                <?php } ?>                                                                                     
                                                                <td class="text-justify">
                                                                 <?php
                                                                        if (!empty($nilai)) {
                                                                            $maxmin = [];
                                                                            $desckd1 = [];
                                                                            $desckd2 = [];
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
                                                                                                        // $kd = $n['nama_kd_1'];
                                                                                                        //$desckd[] = $n['nama_kd'];
                                                                                                        if (count($desckd1) == 0 || $desckd1[count($desckd1) - 1] != $n['nama_kd_1'] || count($desckd2) == 0 || $desckd2[count($desckd2) - 1] != $n['nama_kd_2']) {
                                                                                                            $desckd1[] = $n['nama_kd_1'];
                                                                                                            $desckd2[] = $n['nama_kd_2'];
                                                                                                        }
                                                                                                    }                                                                                                    
                                                                                                }
                                                                                            }
                                                                                    endforeach;
                                                                                    $total_all_n = (string)round($total_n / $jum_n, 0, PHP_ROUND_HALF_UP);                                                                                  
                                                                                } else {
                                                                                    echo $total_all_n = 0;
                                                                                }                                                                      
                                                                                // echo $total_all_n;
                                                                                // $maxmin[] = $total_all_n; 
                                                                                $total_na += $total_all_n;                                                            
                                                                                $maxmin[] = $total_na;
                                                                                $total_peng =  round($total_na / count($akd), 0, PHP_ROUND_HALF_UP) ;                                                                               
                                                                            }
                                                                            $in_kkm = (string)round((100 - $s['kkm']) / 3, 0, PHP_ROUND_HALF_UP);
                                                                            $C = $s['kkm'];
                                                                            $B = $C + $in_kkm;
                                                                            $A = $B + $in_kkm;                                                                            
                                                                            if (empty($maxmin)) {
                                                                                echo 0;
                                                                            } else {
                                                                                if ($total_peng >= $A) {
                                                                                    if (min($maxmin) < $A) {                                                                                        
                                                                                        echo "<div> Menunjukkan kemampuan " . $desckd1[array_search(max($maxmin), $maxmin)] ." dan ". $desckd2[array_search(max($maxmin), $maxmin)] ."</div>";
                                                                                    } else {
                                                                                        echo "<div> Menunjukkan kemampuan " . $desckd1[array_search(max($maxmin), $maxmin)] ." dan ". $desckd2[array_search(max($maxmin), $maxmin)] ."<hr>"
                                                                                        ."Perlu bimbingan dalam ". $desckd1[array_search(min($maxmin), $maxmin)] ." dan ".$desckd2[array_search(min($maxmin), $maxmin)] . "</div>";
                                                                                    }
                                                                                } elseif ($total_peng >= $B) {
                                                                                    // echo "B";
                                                                                    echo "<div> Menunjukkan kemampuan " . $desckd1[array_search(max($maxmin), $maxmin)] ." dan ". $desckd2[array_search(max($maxmin), $maxmin)] ."<hr>"
                                                                                        ."Perlu bimbingan dalam ". $desckd1[array_search(min($maxmin), $maxmin)] ." dan ".$desckd2[array_search(min($maxmin), $maxmin)] . "</div>";
                                                                                } elseif ($total_peng >= $C) {
                                                                                    // echo "C";
                                                                                    echo "<div> Menunjukkan kemampuan " . $desckd1[array_search(max($maxmin), $maxmin)] ." dan ". $desckd2[array_search(max($maxmin), $maxmin)] ."<hr>"
                                                                                        ."Perlu bimbingan dalam ". $desckd1[array_search(min($maxmin), $maxmin)] ." dan ".$desckd2[array_search(min($maxmin), $maxmin)] . "</div>";
                                                                                } elseif ($total_peng <= $C) {
                                                                                    // echo "D";
                                                                                    echo "<div> Menunjukkan kemampuan " . $desckd1[array_search(max($maxmin), $maxmin)] ." dan ". $desckd2[array_search(max($maxmin), $maxmin)] ."<hr>"
                                                                                        ."Perlu bimbingan dalam ". $desckd1[array_search(min($maxmin), $maxmin)] ." dan ".$desckd2[array_search(min($maxmin), $maxmin)] . "</div>";
                                                                                }                                                                           
                                                                            }
                                                                        }
                                                                        ?>
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