<div class="card-header">
    <b class="text-muted"><?=$data['rombel']?>| <?= $data['nama_lengkap']?></b>
    <a target="_blank" class="btn btn-info btn-sm" style="float: right;" href="<?= base_url() ?>akademik_walikelas_km/cetak_leger/detail/<?= $data['rombel'] ?>"><i class="fa fa-print"></i> cetak</a>
</div>    
<table id="leger" class="table table-striped table table-sm">
    <thead></thead>
    <tbody>
        <tr>
            <td colspan="3" class="ctr"><b>DATA SISWA</b></td>
            <?php foreach ($mapel as $m) : ?>
                <td class="ctr"><?= $m['kd_singkat'] ?></td>
            <?php endforeach ?>
            <td rowspan="2" class="ctr">Jumlah</td>
            <td rowspan="2" class="ctr">Ranking</td>
            <td colspan="3" class="ctr">Kehadiran</td>
        </tr>
        <tr>
            <td class="ctr">NO</td>
            <td class="ctr">NIS</td>
            <td class="ctr">Nama Siswa</td>               
            <?php foreach ($mapel as $m) : ?>                                 
            <td class="r">R2</td>
            <?php endforeach ?>
            <td class="ctr">S</td>
            <td class="ctr">I</td>
            <td class="ctr">A</td>
        </tr>
        <?php
        $no = 1;
        $rangking = [];
        ?>
        <?php foreach ($siswa as $s) : ?>
        <tr>
            <td class="ctr"><?= $no; ?></td>
            <td class="ctr"><?= $s['nis']; ?></td>
            <td><?= $s['nama']; ?></td>
            <!-- hitung nilai -->
            <?php
            $total_r = 0;
            foreach ($mapel as $m) : ?>
            <!-- hitung nilai KI3-->
            <td class="ctr">
                <?php                           
                $total_all = 0;
                $total_na = 0;
                $total_all_n = 0;
                $akd = array();
                $all_kd = "";
                $jum_kd = 0;
                foreach ($nilai_p as $n) :
                    if ($n['tasm'] == $tasm)
                        if ($n['id_mapel'] == $m['id_mapel'])
                            if ($n['id_siswa'] == $s['id_siswa']) {
                                if (strpos($all_kd, $n['no_sumatif']) === false) {
                                    $all_kd = $all_kd . $n['no_sumatif'];
                                    array_push($akd, $n['no_sumatif']);
                                    $jum_kd++;
                                } else if ($all_kd == "") {
                                    $all_kd = $all_kd . $n['no_sumatif'];
                                    array_push($akd, $n['no_sumatif']);
                                    $jum_kd++;
                                }?>                            
                <?php } endforeach ?>          
                <?php
                    if (!empty($nilai_p)) {
                    $maxmin = [];
                    $desckd = [];
                        for ($i = 0; $i < $jum_kd; $i++) {
                        $total_n = 0;
                        $jum_n = 0;
                        $total_t = 0;
                        $jum_t = 0;
                        $total_p = 0;
                        $jum_p = 0;
                        if (!empty($nilai_p)) {
                            foreach ($nilai_p as $n) :
                                if ($n['tasm'] == $tasm)
                                    if ($n['id_mapel'] == $m['id_mapel'])
                                        if ($n['id_siswa'] == $s['id_siswa']) {
                                            if ($n['jenis'] == 'SUMATIF') {                                                           
                                                $jum_n++;
                                                $total_n = $total_n + $n['nilai'];                                                 
                                            }
                                        }
                                    endforeach;
                                $total_all_n = ($total_n != 0) ? (string)round($total_n / $jum_n, 0, PHP_ROUND_HALF_UP) * 1 : 0; 
                            }                           
                            if (!empty($nilai_pas)) {
                                foreach ($nilai_pas as $pas) :
                                    if ($pas['tasm'] == $tasm)
                                        if ($pas['id_mapel'] == $m['id_mapel'])
                                            if ($pas['id_siswa'] == $s['id_siswa']) {                                                       
                                                if ($pas['jenis'] == 'PAS') {                                                           
                                                    $total_p = $pas['nilai'];                                                 
                                                }                                                       
                                            }
                                endforeach;                                       
                            }
                            $total_na = $total_all_n + $total_p;                                   
                        }
                    }
                ?>                            
                <?php
                    $rerata = 0;
                    $rerata = ($total_na != 0 ) ? round(($total_na) / 2, 0, PHP_ROUND_HALF_UP) * 1 : 0;
                    $total_r += $rerata;
                ?>
                <?= $rerata ?>
            </td>                      
                <?php endforeach ?>
                <?php $rangking[] =  array('id_siswa' => $s['id_siswa'], 'total_r' => $total_r); ?>
            <td class="ctr"><?= $total_r ?></td>
        </tr>
            <?php $no++ ?>
        <?php endforeach ?>
    </tbody>
</table>
    <?php
    if ($total_r == 0) {
        //print_r($rangking);
        //echo "===========================";
        0;
        //print_r($rangking);
    } else {
        $keys = array_column($rangking, 'total_r');
        array_multisort($keys, SORT_DESC, $rangking);
    }
    ?>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var table = document.getElementById("leger");
            var rangking = <?php echo json_encode($rangking); ?>;
            var siswa = <?php echo json_encode($siswa); ?>;
            var absen_siswa = <?php echo json_encode($absen_siswa); ?>;
            console.log(siswa);
            var i = 0;
            for (i = 0; i < siswa.length; i++) {
                console.log(siswa[i].id_siswa);
                var j = 0;
                for (j = 0; j < rangking.length; j++) {
                    if (siswa[i].id_siswa == rangking[j].id_siswa) {
                        var x = table.rows[2 + i].insertCell(-1);
                        x.innerHTML = '<div style="text-align:center">' + String(j + 1) + '</div>';
                    }
                }
                var k = 0;
                for (k = 0; k < absen_siswa.length; k++) {
                    if (siswa[i].id_siswa == absen_siswa[k].id_siswa) {
                        var x = table.rows[2 + i].insertCell(-1);
                        x.innerHTML = '<div style="text-align:center">' + String(absen_siswa[k].s) + '</div>';
                        var x = table.rows[2 + i].insertCell(-1);
                        x.innerHTML = '<div style="text-align:center">' + String(absen_siswa[k].i) + '</div>';
                        var x = table.rows[2 + i].insertCell(-1);
                        x.innerHTML = '<div style="text-align:center">' + String(absen_siswa[k].a) + '</div>';
                    }
                }
            }
        });
    </script>