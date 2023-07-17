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
    
    <table>
        <thead></thead>
        <tr>             
            <td class="p">Nama</td>
            <td colspan="3" class="p">: <?= $siswa['nama'] ?></td>
            <td colspan="4" class="p">&nbsp; </td>
            <td colspan="2" class="p">Kelas</td>
            <td colspan="2" class="p">: <?= $kelas['rombel'] ?>
        </tr>
        <tr>
            <td class="p">NIS/NISN</td>
            <td colspan="3" class="p">: <?= $siswa['nis'] ?>/<?= $siswa['nisn'] ?></td>
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
            <td class="p">Nama Sekolah</td>
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
    <hr>
    <div style="text-align: center;">
        <h3> LAPORAN HASIL BELAJAR SISWA </h3>
    </div>
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
                                                
                                                $jum_n++;
                                                $total_n = $total_n + $n['nilai'];
                                                $kd = $n['nama_sumatif'];
                                                //$desckd[] = $n['nama_kd'];
                                                if (count($desckd) == 0 || $desckd[count($desckd) - 1] != $n['nama_sumatif']) {
                                                $desckd[] = $n['nama_sumatif'];
                                                
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
                        <?php  $nilai_akhir_sumatif ; ?>
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
                            <?php if ($nilai_akhir_sumatif > "88") {
                                echo '<div>'.'Menunjukkan pemahaman terhadap'.'</div>';
                                foreach ($nilai_sumatif as $n) :
                                    if ($n['id_mapel'] == $m['id_mapel']) {                                                                               
                                        if ($n['jenis'] == 'SUMATIF') {
                                            if ($n['nilai'] >= $nilai_akhir_sumatif){
                                                $data_1 = $n['nama_sumatif'];                                                                               
                                                $cars = array($data_1);
                                                $arrlength = count($cars);                                                                                            
                                                for($x = 0; $x < $arrlength; $x++) {
                                                  echo $cars[$x].',';                                                                                           
                                                  echo "<br>";
                                                }                                                                                                                                                                                      
                                            }                                           
                                        }                                                                                                                        
                                    }
                                endforeach;
                            } elseif ($nilai_akhir_sumatif >= "85") {
                                echo '<div>'.'Menunjukkan pemahaman terhadap'.'</div>';
                                foreach ($nilai_sumatif as $n) :
                                    if ($n['id_mapel'] == $m['id_mapel']) {                                                                               
                                        if ($n['jenis'] == 'SUMATIF') {
                                            if ($n['nilai'] > $nilai_akhir_sumatif){
                                                $data_1 = $n['nama_sumatif'];                                                                               
                                                $cars = array($data_1);
                                                $arrlength = count($cars);                                                                                            
                                                for($x = 0; $x < $arrlength; $x++) {
                                                  echo $cars[$x].',';                                                                                           
                                                  echo "<br>";
                                                }                                                                                                                                                                                      
                                            }                                           
                                        }                                                                                                                        
                                    }
                                endforeach;
                                echo '<hr>';  
                                echo '<div>'.'Perlu bimbingan dalam'.'</div>';
                                foreach ($nilai_sumatif as $n) :
                                    if ($n['id_mapel'] == $m['id_mapel']) {                                                                               
                                        if ($n['jenis'] == 'SUMATIF') {
                                            if ($n['nilai'] < $nilai_akhir_sumatif){
                                                $data_1 = $n['nama_sumatif'];                                                                               
                                                $cars = array($data_1);
                                                $arrlength = count($cars);                                                                                            
                                                for($x = 0; $x < $arrlength; $x++) {
                                                  echo $cars[$x].',';                                                                                           
                                                  echo "<br>";
                                                }                                                                                                                                                                                      
                                            }                                           
                                        }                                                                                                                        
                                    }
                                endforeach;
                            } elseif ($nilai_akhir_sumatif <= "84" ) { 
                                echo '<div>'.'Menunjukkan penguasaan dalam'.'</div>';
                                foreach ($nilai_sumatif as $n) :
                                    if ($n['id_mapel'] == $m['id_mapel']) {                                                                               
                                        if ($n['jenis'] == 'SUMATIF') {
                                            if ($n['nilai'] > $nilai_akhir_sumatif){
                                                $data_1 = $n['nama_sumatif'];                                                                               
                                                $cars = array($data_1);
                                                $arrlength = count($cars);                                                                                            
                                                for($x = 0; $x < $arrlength; $x++) {
                                                  echo $cars[$x].',';                                                                                           
                                                  echo "<br>";
                                                }                                                                                                                                                                                      
                                            }                                           
                                        }                                                                                                                        
                                    }
                                endforeach;
                                echo '<hr>';                                                                           
                                echo '<div>'.'Perlu bantuan dalam'.'</div>';
                                foreach ($nilai_sumatif as $n) :
                                    if ($n['id_mapel'] == $m['id_mapel']) {                                                                               
                                        if ($n['jenis'] == 'SUMATIF') {
                                            if ($n['nilai'] < $nilai_akhir_sumatif){
                                                $data_1 = $n['nama_sumatif'];                                                                               
                                                $cars = array($data_1);
                                                $arrlength = count($cars);                                                                                            
                                                for($x = 0; $x < $arrlength; $x++) {
                                                  echo $cars[$x].',';                                                                                           
                                                  echo "<br>";
                                                }                                                                                                                                                                                      
                                            }                                           
                                        }                                                                                                                        
                                    }
                                endforeach;
                            }?>
                        <?php } ?>                
                    </td>                               
                </tr>
            <?php $no++ ?>
        <?php  }
        endforeach ?>
        <!-- end nilai umum -->
        </tbody>
    </table>   
</body>

</html>