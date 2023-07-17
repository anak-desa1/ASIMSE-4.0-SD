<?php
    echo '<div class="card-body">
            <p class="text-muted">' . $data['rombel'] . ' | ' . $data['nama_lengkap']. '</p>
            <hr style="border: solid 1px #000; margin-top: -10px">
            </div>';
                
    ?>
    <table id="leger" class="table table-striped table table-sm">
        <thead></thead>
        <tbody>
            <tr>
                <td colspan="3" class="ctr"><b>DATA SISWA</b></td>
                <?php foreach ($mapel as $m) : ?>
                    <td colspan="3" class="ctr"><?= $m['kd_singkat'] ?></td>
                <?php endforeach ?>
                <td rowspan="2" class="ctr">Jumlah</td>
                <td rowspan="2" class="ctr">Ranking</td>
                <td colspan="3" class="ctr">Kehadiran</td>
            </tr>
            <tr>
                <td class="ctr">NO</td>
                <td class="ctr">NIS</td>
                <td class="ctr">Nama Siswa</td>
                <!-- <td class="ctr">KKM</td> -->
                <?php foreach ($mapel as $m) : ?>
                    <td class="ctr">Nilai</td>
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
                   
                    <!-- <?php $rangking[] =  array('id_siswa' => $s['id_siswa'], 'total_r' => $total_r); ?>
                    <td class="ctr"><?= $total_r ?></td> -->

                </tr>

                <?php $no++ ?>

            <?php endforeach ?>


        </tbody>
    </table>
    <!-- <?php
    if ($total_r == 0) {
        //print_r($rangking);
        //echo "===========================";
        0;
        //print_r($rangking);
    } else {
        $keys = array_column($rangking, 'total_r');
        array_multisort($keys, SORT_DESC, $rangking);
    }
    ?> -->

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var table = document.getElementById("leger");
            var rangking = <?php echo json_encode($rangking); ?>;
            var siswa = <?php echo json_encode($siswa); ?>;
            var absen_siswa = <?php echo json_encode($absen_siswa); ?>;
            //console.log(siswa);
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

<!-- <table class="table table-striped projects">
     <thead>
         <tr>
             <th>#</th>            
             <th>Mata Pelajaran</th>
             <th>Tema / BAB</th>
             <th>Sub Tema / Sub BAB</th>
             <th>Pembelajaran</th>
             <th>Acion</th>
         </tr>
     </thead>
     <tbody>
         <?php $i = 1; ?>
         <?php foreach ($rpp as $t) : { ?>                 
                 <tr>
                     <td><?= $i ?></td>                  
                     <td><?= $t['mapel'] ?></td>
                     <td><?= $t['tema'] ?></td>
                     <td><?= $t['subtema'] ?></td>
                     <td><?= $t['pembelajaran'] ?></td>
                     <td>
                        <button type="button" class="btn btn-secondary mb-3 btn-cetak" data-id="<?= $t['id_silabus']; ?>">
                            <i class="fa fa-print"></i></a>
                        </button>
                     </td>
                 </tr>
                 <?php $i++; ?>
         <?php }
            endforeach; ?>
    </tbody>
</table> -->