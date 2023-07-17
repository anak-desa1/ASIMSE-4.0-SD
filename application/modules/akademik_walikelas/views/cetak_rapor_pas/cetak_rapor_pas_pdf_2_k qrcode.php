<!DOCTYPE html>
<html>

<head>
    <title><?= $siswa['nama'] ?></title>
    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/favicon_1.ico" />
    <style type="text/css">
        body {
            font-family: arial;
            font-size: 10.69pt;
            width: 100%;
        }

        .table {
            /* border-collapse: collapse;
            border: solid 2px #999;
            width: 100%; */
            width: 100%;
            border-collapse: collapse;
        }

        .table tr td,
        .table tr th {
            border: solid 1px #000;
            padding: 2px;
        }

        .table tr th {
            font-weight: bold;
            /* text-align: center */
        }

        .rgt {
            text-align: right;
        }

        .ctr {
            /* text-align: justify; */
            /* text-align: right; */
            text-align: center;
            font-family: arial;
            font-size: 10.69pt;
            /* width: 50% */
        }

        .ctr_des {
            /* text-align: justify; */
            /* text-align: right; */
            /* text-align: center; */
            text-align: left;
            font-family: arial;
            font-size: 11pt;
            width: 29%;
            /* border: solid 1px #000;
            padding: 25px 75px; */
        }

        .tbl {
            font-weight: bold
        }

        table tr td {
            vertical-align: middle
        }

        .font_kecil {
            font-size: 18px
        }

        .p {
            font-size: 10.69pt;
        }

        .d {
            color: white;
        }

        .e {
            background: #92a8d1;
            text-align: center;
            font-family: arial;
            font-size: 10.69pt;
        }

        .f {
            padding: 5px 10.69px;
            border: 1px solid black;
        }

        .nilai {
            text-align: center;
            font-family: arial;
            font-size: 10.69pt;
        }
    </style>
</head>

<body>
    <div style="text-align: center;">
        <h3> LAPORAN HASIL BELAJAR SISWA </h3>
    </div>
    <table>
        <thead></thead>
        <tr>
             <!-- <td rowspan="4" colspan="4" class="d"> ASIMSE.4 </td>
            <td rowspan="4" colspan="4" class="d"> ASIMSE.4 </td>
            <td rowspan="4" colspan="4" class="d"> ASIMSE.4 </td>
            <td rowspan="4" colspan="4" class="d"> ASIMSE.4 </td> -->
            <!-- <td rowspan="4" colspan="4" class="d"> ASIMSE.4 </td> -->
            <td class="p">Nama</td>
            <td colspan="3" class="p">: <?= $siswa['nama'] ?></td>
            <td colspan="4" class="p">&nbsp; </td>
            <td colspan="2" class="p">Kelas</td>
            <td colspan="2" class="p">: <?= $kelas['rombel'] ?>
        </tr>
        <tr>
            <td class="p">NISN</td>
            <td colspan="3" class="p">: <?= $siswa['nisn'] ?></td>
            <td colspan="4" class="p"></td>
            <td colspan="2" class="p">Semester</td>
            <td colspan="2" class="p">: <?php
                                        $semester = $tahun['semester'];
                                        echo $semester;
                                        if ($semester == 1) {
                                            echo " (Ganjil)";
                                        } else {
                                            echo " (Genap)";
                                        }
                                        ?></td>
        </tr>
        <tr>
            <td class="p">Sekolah</td>
            <td colspan="3" class="p">: <?= $sekolah['nama_sekolah'] ?></td>
            <td colspan="4" class="p">&nbsp; &nbsp; &nbsp; &nbsp; </td>
            <td colspan="2" class="p">Tahun Pelajaran</td>
            <td colspan="2" class="p">: <?= $tahun['th_pelajaran'] ?></td>
        </tr>
        <tr>
            <td class="p">Alamat</td>
            <td colspan="3" class="p">: <?= $sekolah['alamat'] ?>
        </tr>
        </tbody>
    </table>
    <br>
    <div>
        <b>A. Sikap</b>
    </div>
    <table class="table">
        <tr>
            <th colspan="1" class="e"> Dimensi</th>
            <th colspan="8" class="e"> Deskripsi</th>
        </tr>
        <?php if (!empty($nilai_sikap)) {
              foreach ($nilai_sikap as $sikap) :
                 if ($sikap['tasm'] == $tasm)                                               
                    if ($sikap['id_siswa'] == $siswa['nis']){
                        if ($sikap['penilaian'] == 'sikap') {?>    
        <tr>       
            <td colspan="1" class="ctr_des"> 
            <?php if ($sikap['dimensi'] == 1) {?>
                <p> Beriman, bertakwa kepada Tuhan Yang Maha Esa <p>
            <?php } ?>
            <?php if ($sikap['dimensi'] == 2) {?>
                <p> Mandiri<p>
            <?php } ?>
            <?php if ($sikap['dimensi'] == 3) {?>
                <p> Bergotong royong<p>
            <?php } ?>
            <?php if ($sikap['dimensi'] == 4) {?>
                <p> Kreatif<p>
            <?php } ?>
            <?php if ($sikap['dimensi'] == 5) {?>
                <p> Bernalar Kritis<p>
            <?php } ?>
            <?php if ($sikap['dimensi'] == 6) {?>
                <p> Berkebinekaan global<p>
            <?php } ?>                         
            </td>
            <td colspan="8" class="ctr_des"> 
                <p><?= $sikap['deskripsi'] ?><p>
            </td>            
        </tr>
        <?php 
        }
            }
                endforeach;
            } 
        ?>
    </table>
    <div>
        <br>
        <b>B. Pengetahuan dan Keterampilan</b>
    </div>
    <table class="table">
        <tbody>            
            <tr>
                <td rowspan="1" class="e">NO</td>
                <td rowspan="1" class="e">Muatan Pelajaran</td>
                <td rowspan="1" colspan="3" class="e">Nilai Akhir</td>
                <td rowspan="1" colspan="3" class="e">Capaian Kompetensi</td>
            </tr>           
            <tr>
                <td colspan="8">Kelompok A (Umum)</td>
            </tr>
            <?php $no = 1; ?>
            <?php foreach ($mapel as $m) :
                if ($m['kelompok'] == 'A') {
            ?>
                    <tr>
                        <td class="nilai"><?= $no; ?></td>
                        <td width="25%" class="align-middle"> <?= $m['nama']; ?> </td>
                        <!--nilai pengetahuan -->
                        <?php
                        $total_all_p = 0;
                        $total_na = 0;
                        $total_all_n = 0;                       
                        $akd = array();
                        $all_kd = "";
                        $jum_kd = 0;
                        foreach ($nilai_pas as $n) :
                            if ($n['tasm'] == $tasm)
                                if ($n['id_mapel'] == $m['id_mapel']) {
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
                        <td colspan="3" class="nilai">
                            <?php
                            for ($i = 0; $i < $jum_kd; $i++) {
                                $total_n = 0;
                                $jum_n = 0;
                                $total_t = 0;
                                $jum_t = 0;
                                $total_p = 0;
                                $jum_p = 0;
                                if (!empty($nilai_pas)) {
                                    foreach ($nilai_pas as $n) :
                                        if ($n['tasm'] == $tasm)
                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                if ($n['jenis'] == 'PAS') {
                                                    if ($n['no_kd_1'] == $akd[$i]) {
                                                        $jum_n++;
                                                        $total_n = $total_n + $n['nilai'];
                                                    }
                                                }
                                            }
                                    endforeach;
                                    $total_all_n = ($total_n != 0) ? (string)round($total_n / $jum_n, 0, PHP_ROUND_HALF_UP) : 0;
                                } else {
                                    echo $total_all_n = 0;
                                }
                                $total_na += $total_all_n; 
                            }
                            ?>
                            <?php if (!empty($total_na)) { ?>
                                <?php $total_peng =  round($total_na / count($akd), 0, PHP_ROUND_HALF_UP) ?>
                                <?php echo '<div>' .  $total_peng . '</div>'; ?>
                            <?php
                            } else {
                                echo $total_peng = 0;
                            } ?>
                        </td>                        
                        <td  colspan="3" class="ctr_des">                
                        <?php
                            if (!empty($nilai_pas)) {
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
                                    if (!empty($nilai_pas)) {
                                        foreach ($nilai_pas as $n) :
                                            if ($n['tasm'] == $tasm)                                                
                                                if ($n['id_mapel'] == $m['id_mapel']){
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
                                        $total_all_n = ($total_n != 0) ? (string)round($total_n / $jum_n, 0, PHP_ROUND_HALF_UP) : 0;
                                        } else {
                                            echo $total_all_n = 0;
                                        }                                                                      
                                        $total_na += $total_all_n;                                                            
                                        $maxmin[] = $total_na;                                                                                                                       
                                    }                                   
                                    $in_kkm = (string)round((100 - $kkm['kkm']) / 3, 0, PHP_ROUND_HALF_UP);
                                    $C = $kkm['kkm'];
                                    $B = $C + $in_kkm;
                                    $A = $B + $in_kkm;                                                                            
                                    if (empty($maxmin)) {
                                        echo '-';
                                    } else {
                                        if ($total_peng >= $A) {
                                              if (min($maxmin) > $A) {                                                                                        
                                                echo "<div> Menunjukkan kemampuan " . $desckd1[array_search(max($maxmin), $maxmin)] ." dan ". $desckd2[array_search(max($maxmin), $maxmin)] ."</div>";
                                                } else {
                                                    // echo '<div>' .  $total_peng . '</div>';
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
                                        // if (empty($total_peng)) {
                                        //     echo "-";
                                        // } else {                        
                                        // echo "<p> Menunjukkan kemampuan " . $desckd1[array_search(max($maxmin), $maxmin)] ." dan ". $desckd2[array_search(max($maxmin), $maxmin)] ."<hr>"
                                        // ."Perlu bimbingan dalam ". $desckd1[array_search(min($maxmin), $maxmin)] ." dan ".$desckd2[array_search(min($maxmin), $maxmin)] . "</p>";
                                        // }                                                                          
                                    }
                                }
                            ?>                            
                        </td>                           
                    </tr>
                    <?php $no++ ?>
            <?php  }
            endforeach ?>
            <tr>
                <td colspan="8">Kelompok B (Umum)</td>
            </tr>
            <?php $no = 1; ?>
            <?php foreach ($mapel as $m) :
                if ($m['kelompok'] == 'B') {
            ?>
                    <tr>
                        <td class="nilai"><?= $no; ?></td>
                        <td width="25%" class="align-middle"> <?= $m['nama']; ?> </td>
                        <!--nilai pengetahuan -->
                        <?php
                        $total_all_p = 0;
                        $total_na = 0;
                        $total_all_n = 0;                       
                        $akd = array();
                        $all_kd = "";
                        $jum_kd = 0;
                        foreach ($nilai_pas as $n) :
                            if ($n['tasm'] == $tasm)
                                if ($n['id_mapel'] == $m['id_mapel']) {
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
                        <td colspan="3" class="nilai">
                            <?php
                            for ($i = 0; $i < $jum_kd; $i++) {
                                $total_n = 0;
                                $jum_n = 0;
                                $total_t = 0;
                                $jum_t = 0;
                                $total_p = 0;
                                $jum_p = 0;
                                if (!empty($nilai_pas)) {
                                    foreach ($nilai_pas as $n) :
                                        if ($n['tasm'] == $tasm)
                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                if ($n['jenis'] == 'PAS') {
                                                    if ($n['no_kd_1'] == $akd[$i]) {
                                                        $jum_n++;
                                                        $total_n = $total_n + $n['nilai'];
                                                    }
                                                }
                                            }
                                    endforeach;
                                    $total_all_n = ($total_n != 0) ? (string)round($total_n / $jum_n, 0, PHP_ROUND_HALF_UP) : 0;
                                } else {
                                    echo $total_all_n = 0;
                                }
                                $total_na += $total_all_n; 
                            }
                            ?>
                            <?php if (!empty($total_na)) { ?>
                                <?php $total_peng =  round($total_na / count($akd), 0, PHP_ROUND_HALF_UP) ?>
                                <?php echo '<div>' .  $total_peng . '</div>'; ?>
                            <?php
                            } else {
                                echo $total_peng = 0;
                            } ?>
                        </td>                        
                        <td  colspan="3" class="ctr_des">                
                        <?php
                            if (!empty($nilai_pas)) {
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
                                    if (!empty($nilai_pas)) {
                                        foreach ($nilai_pas as $n) :
                                            if ($n['tasm'] == $tasm)                                                
                                                if ($n['id_mapel'] == $m['id_mapel']){
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
                                        $total_all_n = ($total_n != 0) ? (string)round($total_n / $jum_n, 0, PHP_ROUND_HALF_UP) : 0;
                                        } else {
                                            echo $total_all_n = 0;
                                        }                                                                      
                                        $total_na += $total_all_n;                                                            
                                        $maxmin[] = $total_na;                                                                                                                       
                                    }                                   
                                    $in_kkm = (string)round((100 - $kkm['kkm']) / 3, 0, PHP_ROUND_HALF_UP);
                                    $C = $kkm['kkm'];
                                    $B = $C + $in_kkm;
                                    $A = $B + $in_kkm;                                                                            
                                    if (empty($maxmin)) {
                                        echo '-';
                                    } else {
                                        if ($total_peng >= $A) {
                                              if (min($maxmin) > $A) {                                                                                        
                                                echo "<div> Menunjukkan kemampuan " . $desckd1[array_search(max($maxmin), $maxmin)] ." dan ". $desckd2[array_search(max($maxmin), $maxmin)] ."</div>";
                                                } else {
                                                    // echo '<div>' .  $total_peng . '</div>';
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
                                        // if (empty($total_peng)) {
                                        //     echo "-";
                                        // } else {                        
                                        // echo "<p> Menunjukkan kemampuan " . $desckd1[array_search(max($maxmin), $maxmin)] ." dan ". $desckd2[array_search(max($maxmin), $maxmin)] ."<hr>"
                                        // ."Perlu bimbingan dalam ". $desckd1[array_search(min($maxmin), $maxmin)] ." dan ".$desckd2[array_search(min($maxmin), $maxmin)] . "</p>";
                                        // }                                                                          
                                    }
                                }
                            ?>                            
                        </td>            
                    </tr>
                    <?php $no++ ?>
            <?php  }
            endforeach ?>

            <!-- end nilai umum -->
        </tbody>
    </table>
    <br>
    <table class="table" style="border: solid 1px #000; padding: 20px 11px; width: 110%">
        <tr>
            <td class="e">No.</td>
            <td class="e">Kegiatan Ekstrakurikuler</td>
            <td class="e">Keterangan</td>
        </tr>
        <?php $no = 1 ?>
        <?php foreach ($ekskul as $ek) : { ?>
                <tr>
                    <td width="5%" class="ctr"> <?= $no ?>.</td>
                    <td class="ctr"><?= $ek['ekskul'] ?></td>
                    <td class="ctr"><?= $ek['desk'] ?></td>
                </tr>
                <?php $no++ ?>
        <?php }
        endforeach ?>
    </table>   
    <br>
    <table>
        <tr>
            <td class="f">Sakit</td>
            <td class="f">: <?= $absen_siswa['s']; ?> &nbsp; hari</td>
        </tr>
        <tr>
            <td class="f">Izin</td>
            <td class="f">: <?= $absen_siswa['i']; ?> &nbsp; hari</td>
        </tr>
        <tr>
            <td class="f">Tanpa Keterangan</td>
            <td class="f">: <?= $absen_siswa['a']; ?> &nbsp; hari</td>
        </tr>
    </table>
    <br>
    
    <br />
    <table>
        <thead> </thead>
        <tbody>
            <tr>
                <td width="2%"></td>
                <td width="50%">
                    Mengetahui : <br>
                    Orang Tua/Wali, <br>
                    <br><br><br><br>
                    <u>...........................................</u>
                </td>
                <td width="2%"></td>
                <td width="10%">
                </td>
                <td width="15%"></td>
                <td width="65%">
                    <?= $kota['kota'] ?>, <span><?= ($tahun['tgl_raport_pas'] != 0) ? format_indo_a(date($tahun['tgl_raport_pas'])): '';?></span><br>
                    Guru Kelas, <br>
                    <img style="width:150px;height:150px;" class="img-responsive" src="<?php echo base_url('panel/assets/img/qrcode/') . $footer_1['nip'] . 'code.png'; ?>" /><br>
                    <u>
                        <p class="font-size: 50%;"><?= $footer_1['nama_guru']?></p>
                    </u>
                    <!-- NIP. -->
                </td>
            </tr>
        </tbody>
    </table>
    <br />
    <table>
        <thead> </thead>
        <tbody>
            <tr>
                <td width="4%"></td>
                <td width="0%">
                <td width="25%"></td>
                <td width="50%" align="center">
                    Mengetahui : <br>
                     Kepala Sekolah <br>
                     <img style="width:150px;height:150px;" class="img-responsive" src="<?php echo base_url('panel/assets/img/qrcode/') . $tahun['nik'] . 'code.png'; ?>" /><br>
                    <u><?= $tahun['nama_kepsek'] ?></u>
                </td>
                <td width="2%"></td>
                <td width="36%">
            </tr>
        </tbody>
    </table>

</body>

</html>