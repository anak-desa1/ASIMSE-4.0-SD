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
            <td colspan="2" class="p">Fase</td>
            <td colspan="2" class="p">:
             <!--<?= substr($kelas['rombel'],0,1)?> -->
                <?php if (substr($kelas['rombel'],0,1) == 'I') 
                {echo " A "; }
                ?>  
                <?php if (substr($kelas['rombel'],0,2) == 'II') 
                {echo " A "; }
                ?>
                <?php if (substr($kelas['rombel'],0,2) == 'III') 
                {echo " B "; }
                ?>
                <?php if (substr($kelas['rombel'],0,2) == 'IV') 
                {echo " B "; }
                ?>
                <?php if (substr($kelas['rombel'],0,2) == 'V') 
                {echo " C "; }
                ?>
                <?php if (substr($kelas['rombel'],0,2) == 'VI') 
                {echo " C "; }
                ?>     
                </td>
        </tr>
        <tr>
            <td class="p">Sekolah</td>
            <td colspan="3" class="p">: <?= $sekolah['nama_sekolah'] ?></td>
            <td colspan="4" class="p">&nbsp; &nbsp; &nbsp; &nbsp; </td>
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
            <td class="p">Alamat</td>
            <td colspan="3" class="p">: <?= $sekolah['alamat'] ?>
            <td colspan="4" class="p">&nbsp; &nbsp; &nbsp; &nbsp; </td>
            <td colspan="2" class="p">Tahun Pelajaran</td>
            <td colspan="2" class="p">: <?= $tahun['th_pelajaran'] ?></td>
        </tr>
        </tbody>
    </table>
    <br>
    <table class="table">
        <tbody>            
            <tr>
                <td rowspan="1" class="e">NO</td>
                <td rowspan="1" class="e">Muatan Pelajaran</td>
                <td rowspan="1" colspan="3" class="e">Nilai Akhir</td>
                <td rowspan="1" colspan="3" class="e">Capaian Kompetensi</td>
            </tr>    
            <?php $no = 1; ?>
            <?php foreach ($mapel as $m) : { ?>             
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
                        foreach ($nilai_sumatif as $n) :
                            if ($n['tasm'] == $tasm)
                                if ($n['id_mapel'] == $m['id_mapel']) {
                                    if (strpos($all_kd, $n['no_sumatif']) === false) {
                                        $all_kd = $all_kd . $n['no_sumatif'];
                                        array_push($akd, $n['no_sumatif']);
                                        $jum_kd++;
                                    } else if ($all_kd == "") {
                                        $all_kd = $all_kd . $n['no_sumatif'];
                                        array_push($akd, $n['no_sumatif']);
                                        $jum_kd++;
                                    }
                        ?>
                        <?php }
                        endforeach
                        ?>
                          <td colspan="3" class="nilai">
                            <?php
                                if (!empty($nilai_sumatif)) {
                                $maxmin = [];
                                $desckd = [];
                                for ($i = 0; $i < $jum_kd; $i++) {
                                    $total_n = 0;
                                    $jum_n = 0;
                                    $total_t = 0;
                                    $jum_t = 0;
                                    $total_p = 0;
                                    $jum_p = 0;
                                    if (!empty($nilai_sumatif)) {
                                        foreach ($nilai_sumatif as $n) :
                                        if ($n['tasm'] == $tasm)
                                        if ($n['id_mapel'] == $m['id_mapel']) {
                                        if ($n['jenis'] == 'SUMATIF') {
                                        if ($n['no_sumatif'] == $akd[$i]) {
                                        $jum_n++;
                                        $total_n = $total_n + $n['nilai'];
                                        $kd = $n['nama_sumatif'];
                                        //$desckd[] = $n['nama_kd'];
                                        if (count($desckd) == 0 || $desckd[count($desckd) - 1] != $n['nama_sumatif']) {
                                        $desckd[] = $n['nama_sumatif'];
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
            <?php   $nilai_akhir_sumatif =  round($total_na / count($akd), 0, PHP_ROUND_HALF_UP) ?>
            <!-- <?php echo '<div>' .  $nilai_akhir_sumatif . '</div>'; ?> -->
            <?php
            } else {
            // echo $nilai_rapor = 0;
            } ?>
             <?php
                foreach ($nilai_pas as $n) :
                     if ($n['id_mapel'] == $m['id_mapel']) {                                                                               
                     if ($n['jenis'] == 'PAS') {
                    //  echo ' <div>' . $n['nilai'] . ' </div>';
                    $nilai_sas =  $n['nilai'];
                    }                                                                               
                }
                endforeach;
                ?>
                <?php if (!empty($total_na)) { ?>
                <?php $nilai_total = $nilai_sas + $nilai_akhir_sumatif ?>
                <?php $nilai_rapor =  round($nilai_total / 2, 0, PHP_ROUND_HALF_UP) ?>
                <?= '<div>' .   $nilai_rapor . '</div>'; ?>
                <?php  } else {
                // echo $nilai_rapor = 0;
                } ?>       
                        </td>                         
                        <td  colspan="3" class="ctr_des">
                        <?php if (!empty($total_na)) { ?>
                            <?php echo '<div>'.'Menunjukkan penguasaan yang baik dalam'.'</div>';?>
                            <?php
                                foreach ($nilai_sumatif as $n) :
                                    if ($n['id_mapel'] == $m['id_mapel']) {                                                                               
                                        if ($n['jenis'] == 'SUMATIF') {
                                            if ($n['nilai'] > $nilai_akhir_sumatif){
                                            // echo "<div> Menunjukkan kemampuan " . $desckd[array_search(max($maxmin), $maxmin)] ." dan ". $desckd[array_search(max($maxmin), $maxmin)] ."</div>"            
                                            echo '<div>'.$n['nama_sumatif'].','.'</div>';
                                            // echo '<div>' .$nilai_sumatif.'-'. $n['nilai'] .''.$n['nama_sumatif']. ' </div>';
                                            }                                          
                                        }                                                                                                                        
                                    }
                                endforeach;
                            ?>
                            <hr>
                            <?php echo '<div>'.'Perlu bimbingan dalam'.'</div>';?>
                            <?php
                                foreach ($nilai_sumatif as $n) :
                                    if ($n['id_mapel'] == $m['id_mapel']) {                                                                               
                                        if ($n['jenis'] == 'SUMATIF') {
                                            if ($n['nilai'] < $nilai_akhir_sumatif){
                                            echo '<div>'.$n['nama_sumatif'].','.'</div>';
                                            // echo '<div>' .$nilai_sumatif.'-'. $n['nilai'] .''.$n['nama_sumatif']. ' </div>';
                                                }                                          
                                            }                                                                                                                        
                                        }
                                    endforeach;
                            ?>
                             <?php  } else {
                            // echo $nilai_rapor = 0;
                            } ?>
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
                    <br><br><br><br>
                    <u>
                        <p class="font-size: 50%;"><?= $footer_1['nama_guru'] ?></p>
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
                    <br><br><br><br>
                    <u><?= $tahun['nama_kepsek'] ?></u>
                </td>
                <td width="2%"></td>
                <td width="36%">
            </tr>
        </tbody>
    </table>

</body>

</html>