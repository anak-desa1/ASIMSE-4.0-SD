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
            text-align: justify;
            /* text-align: right; */
            /* text-align: center; */
            font-family: arial;
            font-size: 10.69pt;
            width: 27%;
            border: solid 1px #000;
            padding: 30px 10px;
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
            <td rowspan="4" colspan="4" class="d"> oel </td>
            <td rowspan="4" colspan="4" class="d"> oel </td>
            <td rowspan="4" colspan="4" class="d"> oel </td>
            <td rowspan="4" colspan="4" class="d"> oel </td>
            <!-- <td rowspan="4" colspan="4" class="d"> oel </td> -->
            <td class="p">Nama Siswa</td>
            <td colspan="3" class="p">: <?= $siswa['nama'] ?></td>
            <td colspan="2" class="p">Kelas</td>
            <td colspan="2" class="p">: <?= $kelas['rombel'] ?>
        </tr>
        <tr>
            <td class="p">NIS / NISN</td>
            <td colspan="3" class="p">: <?= $siswa['nis'] ?>/<?= $siswa['nisn'] ?></td>
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
            <td class="p">Nama Sekolah</td>
            <td colspan="3" class="p">: <?= $sekolah['nama_sekolah'] ?></td>
            <td colspan="2" class="p">Tahun Pelajaran</td>
            <td colspan="2" class="p">: <?= $tahun['th_pelajaran'] ?></td>
        </tr>
        <tr>
            <td class="p">Alamat Sekolah</td>
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
            <th colspan="3" class="e"> Deskripsi</th>
        </tr>
        <tr>
            <td colspan="2" class="ctr_des">1. Sikap Spiritual </td>
            <td>
                <?php foreach ($selalu_sp as $sp) :
                    $sp_selalu = explode(",", $sp['selalu']);
                    $text_sp_selalu = array();
                    for ($i = 0; $i < sizeof($sp_selalu); $i++) {
                        $idx = $sp_selalu[$i];

                        $text_sp_selalu[] = $list_kd_sp[$idx];
                    }
                    $sp_text_selalu = implode(", ", $text_sp_selalu);
                ?>
                    <p style="font-size:14px ; text-align: justify">
                        <i> <?= $siswa['nama'] ?> taat beribadah, <?= $sp_text_selalu  ?> dan sudah mampu meningkatkan sikap
                        <?php endforeach ?>
                        <?php foreach ($mulai_meningkat_sp as $m) : ?>
                            <?= $m['nama_kd'] ?>.
                        </i>
                    </p>
                <?php endforeach ?>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="ctr_des">2. Sikap Sosial</td>
            <td>
                <?php foreach ($selalu_so as $so) :
                    $pc_selalu = explode(",", $so['selalu']);
                    $teks_selalu = array();
                    for ($i = 0; $i < sizeof($pc_selalu); $i++) {
                        $idx = $pc_selalu[$i];

                        $teks_selalu[] = $list_kd_so[$idx];
                    }
                    $text_selalu = implode(", ", $teks_selalu); ?>
                    <p style="font-size:14px ; text-align: justify">
                        <i><?= $siswa['nama'] ?> sangat <?= $text_selalu ?> dan sudah mampu meningkatkan sikap
                        <?php endforeach ?>
                        <?php foreach ($mulai_meningkat_so as $m) : ?>
                            <?= $m['nama_kd'] ?>.
                        </i>
                    </p>
                <?php endforeach ?>

            </td>
        </tr>
    </table>
    <div>
        <br>
        <b>B. Pengetahuan dan Keterampilan</b>
        <!-- <b>KKM Satuan Pendidikan : ...</b> -->
    </div>
    <table class="table">
        <tbody>
            <!--nilai -->
            <tr>
                <td colspan="8">KKM Satuan Pendidikan : <?= $kkm['kkm'] ?></td>
            </tr>
            <tr>
                <td rowspan="2" class="e">NO</td>
                <td rowspan="2" class="e">Muatan Pelajaran</td>
                <td colspan="3" class="e">Pengetahuan</td>
                <td colspan="3" class="e">Keterampilan</td>
            </tr>
            <tr>
                <td class="e">Nilai</td>
                <td class="e">Predikat</td>
                <td class="e">Deskripsi</td>
                <td class="e">Nilai</td>
                <td class="e">Predikat</td>
                <td class="e">Deskripsi</td>
            </tr>
            <tr>
                <td colspan="8">Kelompok (Umum)</td>
            </tr>
            <?php $no = 1; ?>
            <?php foreach ($mapel as $m) :
                if ($m['kelompok'] == 'A' || $m['kelompok'] == 'B') {
            ?>
                    <tr>
                        <td class="nilai"><?= $no; ?></td>
                        <td width="25%" class="align-middle"> <?= $m['nama']; ?> </td>
                        <!--nilai pengetahuan -->
                        <?php
                        $total_all_p = 0;
                        $total_na = 0;
                        $total_all_n = 0;
                        $total_all_pts = 0;
                        $total_all_pas = 0;
                        $akd = array();
                        $all_kd = "";
                        $jum_kd = 0;
                        foreach ($nilai_p as $n) :
                            if ($n['tasm'] == $tasm)
                                if ($n['id_mapel'] == $m['id_mapel']) {
                                    if (strpos($all_kd, $n['no_kd']) === false) {
                                        $all_kd = $all_kd . $n['no_kd'];
                                        array_push($akd, $n['no_kd']);
                                        $jum_kd++;
                                    } else if ($all_kd == "") {
                                        $all_kd = $all_kd . $n['no_kd'];
                                        array_push($akd, $n['no_kd']);
                                        $jum_kd++;
                                    }
                        ?>
                        <?php }
                        endforeach
                        ?>
                        <td class="nilai">
                            <?php
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
                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                if (substr($n['jenis'], 0, 2) == 'PH') {
                                                    if ($n['no_kd'] == $akd[$i]) {
                                                        $jum_n++;
                                                        $total_n = $total_n + $n['nilai'];
                                                    }
                                                }
                                            }
                                    endforeach;
                                    // $total_all_n = (string)round($total_n / $jum_n, 0, PHP_ROUND_HALF_UP) * 2;
                                    $total_all_n = ($total_n != 0) ? (string)round($total_n / $jum_n, 0, PHP_ROUND_HALF_UP) * 2 : 0;
                                } else {
                                    // echo $total_all_n = 0;
                                }
                                if (!empty($nilai_pts)) {
                                    foreach ($nilai_pts as $n) :
                                        if ($n['tasm'] == $tasm)
                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                if ($n['no_kd'] == $akd[$i]) {
                                                    $jum_t++;
                                                    $total_t =  $total_t + $n['nilai'];
                                                }
                                            }
                                    endforeach;
                                    $total_all_pts = ($total_t != 0) ? (string)round($total_t / $jum_t, 0, PHP_ROUND_HALF_UP) * 1 : 0;
                                    // $total_all_pts = (string)round($total_t / $jum_t, 0, PHP_ROUND_HALF_UP) * 1;
                                } else {
                                    // echo $total_all_pts = 0;
                                }
                                if (!empty($nilai_pas)) {
                                    foreach ($nilai_pas as $n) :
                                        if ($n['tasm'] == $tasm)
                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                if ($n['no_kd'] == $akd[$i]) {
                                                    $jum_p++;
                                                    $total_p =  $total_p + $n['nilai'];
                                                }
                                            }
                                    endforeach;
                                    $total_all_pas = ($total_p != 0) ? (string)round($total_p / $jum_p, 0, PHP_ROUND_HALF_UP) * 1 : 0;
                                    // $total_all_pas = (string)round($total_p / $jum_p, 0, PHP_ROUND_HALF_UP) * 1;
                                } else {
                                    // echo $total_all_pas = 0;
                                }

                                $total_na = $total_all_n +  $total_all_pts + $total_all_pas;

                                if ($total_all_pts > 1) {
                                    // echo '<div>' . (string)round($total_na / 4, 0, PHP_ROUND_HALF_UP) . '</div>';
                                    $total_all_p += (string)round($total_na / 4, 0, PHP_ROUND_HALF_UP);
                                } else {
                                    // echo '<div>' . (string)round($total_na / 3, 0, PHP_ROUND_HALF_UP) . '</div>';
                                    $total_all_p += (string)round($total_na / 3, 0, PHP_ROUND_HALF_UP);
                                }
                            }
                            ?>
                            <?php if (!empty($total_all_p)) { ?>
                                <?php $total_peng =  round($total_all_p / count($akd), 0, PHP_ROUND_HALF_UP) ?>
                                <?php echo '<div>' .  $total_peng . '</div>'; ?>

                            <?php
                            } else {
                                echo $total_peng = 0;
                            } ?>
                        </td>
                        <td class="nilai">
                            <?php if (!empty($total_peng)) {
                                $in_kkm = (string)round((100 - $kkm['kkm']) / 3, 0, PHP_ROUND_HALF_UP);
                                $C = $kkm['kkm'];
                                $B = $C + $in_kkm;
                                $A = $B + $in_kkm;
                                // echo $in_kkm;
                            ?>
                                <?php if ($total_peng >= $A) {
                                    echo "A";
                                } elseif ($total_peng >= $B) {
                                    echo "B";
                                } elseif ($total_peng >= $C) {
                                    echo "C";
                                } elseif ($total_peng <= $C) {
                                    echo "D";
                                } else {
                                    echo "Jangan menyerah, anda pasti bisa!  ";
                                } ?>
                            <?php
                            } else {
                                echo $total_peng = 0;
                            } ?>
                        </td>
                        <td class="ctr_des">
                            <?php
                            if (!empty($total_na)) {
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
                                                if ($n['id_mapel'] == $m['id_mapel']) {
                                                    if (substr($n['jenis'], 0, 2) == 'PH') {
                                                        if ($n['no_kd'] == $akd[$i]) {
                                                            $jum_n++;
                                                            $total_n = $total_n + $n['nilai'];
                                                            $kd = $n['nama_kd'];
                                                            //$desckd[] = $n['nama_kd'];
                                                            if (count($desckd) == 0 || $desckd[count($desckd) - 1] != $n['nama_kd']) {
                                                                $desckd[] = (str_word_count($n['nama_kd']) > 17 ? substr($n['nama_kd'], 0, 115) . "..." : $n['nama_kd']);
                                                            }
                                                        }
                                                    }
                                                }
                                        endforeach;
                                        $total_all_n = ($total_n != 0) ? (string)round($total_n / $jum_n, 0, PHP_ROUND_HALF_UP) * 2 : 0;
                                        // $total_all_n = (string)round($total_n / $jum_n, 0, PHP_ROUND_HALF_UP) * 2;
                                        // echo '<div>' .  $total_all_n . '</div>';
                                    } else {
                                        // echo $total_all_n = 0;
                                    }
                                    if (!empty($nilai_pts)) {
                                        foreach ($nilai_pts as $n) :
                                            if ($n['tasm'] == $tasm)
                                                if ($n['id_mapel'] == $m['id_mapel']) {
                                                    if ($n['no_kd'] == $akd[$i]) {
                                                        $jum_t++;
                                                        $total_t =  $total_t + $n['nilai'];
                                                    }
                                                }
                                        endforeach;
                                        // $total_all_pts = (string)round($total_t / $jum_t, 0, PHP_ROUND_HALF_UP) * 1;
                                        $total_all_pts = ($total_t != 0) ? (string)round($total_t / $jum_t, 0, PHP_ROUND_HALF_UP) * 1 : 0;
                                        // echo '<div>' .  $total_all_pts . '</div>';
                                    } else {
                                        // echo $total_all_pts = 0;
                                    }
                                    if (!empty($nilai_pas)) {
                                        foreach ($nilai_pas as $n) :
                                            if ($n['tasm'] == $tasm)
                                                if ($n['id_mapel'] == $m['id_mapel']) {
                                                    if ($n['no_kd'] == $akd[$i]) {
                                                        $jum_p++;
                                                        $total_p =  $total_p + $n['nilai'];
                                                    }
                                                }
                                        endforeach;
                                        $total_all_pas = ($total_p != 0) ? (string)round($total_p / $jum_p, 0, PHP_ROUND_HALF_UP) * 1 : 0;
                                        // $total_all_pas = (string)round($total_p / $jum_p, 0, PHP_ROUND_HALF_UP) * 1;
                                        // echo '<div>' .  $total_all_pas . '</div>';
                                    } else {
                                        // echo $total_all_pas = 0;
                                    }

                                    $total_na = $total_all_n +  $total_all_pts + $total_all_pas;
                                    // var_dump($nilai_rapor);
                                    // die;
                                    if ($total_all_pts >= 1) {
                                        $maxmin[] = (string)round($total_na / 4, 0, PHP_ROUND_HALF_UP);
                                    } else {
                                        $maxmin[] = (string)round($total_na / 3, 0, PHP_ROUND_HALF_UP);
                                    }
                                }
                                echo "<div>Ananda " . $n['nama'] . " sangat baik " . $desckd[array_search(max($maxmin), $maxmin)] . ", cukup " . $desckd[array_search(min($maxmin), $maxmin)]  . "</div>";
                            } else {
                                echo $total_na = 0;
                            }
                            ?>
                        </td>
                        <?php
                        $akd = array();
                        $all_kd = "";
                        $jum_kd = 0;
                        foreach ($nilai_k as $n) :
                            if ($n['tasm'] == $tasm)
                                if ($n['id_mapel'] == $m['id_mapel']) {
                                    if (strpos($all_kd, $n['no_kd']) === false) {
                                        $all_kd = $all_kd . $n['no_kd'];
                                        array_push($akd, $n['no_kd']);
                                        $jum_kd++;
                                    } else if ($all_kd == "") {
                                        $all_kd = $all_kd . $n['no_kd'];
                                        array_push($akd, $n['no_kd']);
                                        $jum_kd++;
                                    }
                        ?>
                        <?php }
                        endforeach
                        ?>
                        <td class="nilai">
                            <?php
                            $maxall = [];
                            $jum_n = 0;
                            $total_all_k = 0;
                            for ($i = 0; $i < $jum_kd; $i++) {
                                $maxprk = [];
                                $maxprj = [];
                                $maxprd = [];
                                $maxprt = [];
                                $nilai_tinggi = 0;
                                $num = 0;
                                foreach ($nilai_k as $n) :
                                    if ($n['tasm'] == $tasm)
                                        if ($n['id_mapel'] == $m['id_mapel'] && $n['no_kd'] == $akd[$i]) {
                                            if (substr($n['jenis'], 0, 6) == 'Produk') {
                                                $maxprd[] = round($n['nilai']);
                                            } else if (substr($n['jenis'], 0, 7) == 'Praktik') {
                                                $maxprk[] = round($n['nilai']);
                                            } else if (substr($n['jenis'], 0, 6) == 'Projek') {
                                                $maxprj[] = round($n['nilai']);
                                            } else if (substr($n['jenis'], 0, 10) == 'Portofolio') {
                                                $maxprt[] = round($n['nilai']);
                                            }
                                        }

                                endforeach;

                                if (count($maxprj) > 0) {
                                    $nilai_tinggi = $nilai_tinggi + max($maxprj);
                                    $num++;
                                }
                                if (count($maxprt) > 0) {
                                    $nilai_tinggi = $nilai_tinggi + max($maxprt);
                                    $num++;
                                }
                                if (count($maxprk) > 0) {
                                    $nilai_tinggi = $nilai_tinggi + max($maxprk);
                                    $num++;
                                }
                                if (count($maxprd) > 0) {
                                    $nilai_tinggi = $nilai_tinggi + max($maxprd);
                                    $num++;
                                }

                                // $nilai_tinggi = round($nilai_tinggi / $num, 0, PHP_ROUND_HALF_UP);
                                $nilai_tinggi = ($nilai_tinggi != 0) ? round($nilai_tinggi / $num, 0, PHP_ROUND_HALF_UP) : 0;
                                $total_all_k = $total_all_k + $nilai_tinggi;
                                // echo '<div>' .  $nilai_tinggi  . '</div>';
                            }
                            ?>
                            <?php if (!empty($total_all_k)) { ?>
                                <?php $total_ket = round($total_all_k / count($akd), 0, PHP_ROUND_HALF_UP) ?>
                                <?php echo '<div>' .   $total_ket  . '</div>'; ?>
                            <?php
                            } else {
                                echo  $total_ket = 0;
                            } ?>
                        </td>
                        <td class="nilai">
                            <?php if (!empty($total_ket)) {
                                $in_kkm = (string)round((100 - $kkm['kkm']) / 3, 0, PHP_ROUND_HALF_UP);
                                $C = $kkm['kkm'];
                                $B = $C + $in_kkm;
                                $A = $B + $in_kkm;
                            ?>
                                <?php if ($total_ket >= $A) {
                                    echo "A";
                                } elseif ($total_ket >= $B) {
                                    echo "B";
                                } elseif ($total_ket >= $C) {
                                    echo "C";
                                } elseif ($total_ket <= $C) {
                                    echo "D";
                                } else {
                                    echo "Jangan menyerah, anda pasti bisa!  ";
                                } ?>
                            <?php
                            } else {
                                echo $total_ket = 0;
                            } ?>
                        </td>
                        <td class="ctr_des">
                            <?php if (!empty($total_all_k)) {
                                $maxmin = [];
                                $desckd = [];
                                for ($i = 0; $i < $jum_kd; $i++) {
                                    $total = 0;
                                    $jum_n = 0;
                                    foreach ($nilai_k as $n) :
                                        if ($n['tasm'] == $tasm)
                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                if ($n['no_kd'] == $akd[$i]) {
                                                    $jum_n++;
                                                    $total = $total + $n['nilai'];
                                                    if (count($desckd) == 0 || $desckd[count($desckd) - 1] != $n['nama_kd']) {
                                                        $desckd[] = (str_word_count($n['nama_kd']) > 17 ? substr($n['nama_kd'], 0, 115) . "..." : $n['nama_kd']);
                                                    }
                                                }
                                            }
                                    endforeach;
                                    $total_all_k += round($total / $jum_n, 0, PHP_ROUND_HALF_UP);
                                    // echo '<div>' . $akd[$i] . ': ' . (string)round($total / $jum_n, 0, PHP_ROUND_HALF_UP) . '</div>';
                                    $maxmin[] = round($total / $jum_n, 0, PHP_ROUND_HALF_UP);
                                }
                                echo "<div>Ananda " . $n['nama'] . " sangat baik " . $desckd[array_search(max($maxmin), $maxmin)] . ", cukup " . $desckd[array_search(min($maxmin), $maxmin)] . "</div>";
                            } else {
                                echo $total_all_k = 0;
                            }
                            ?>
                        </td>
                        <!-- end nilai pengetahuan -->
                    </tr>
                    <?php $no++ ?>
            <?php  }
            endforeach ?>
            <tr>
                <td colspan="8">Kelompok (Muatan Lokal)</td>
            </tr>
            <?php $no = 1; ?>
            <?php foreach ($mapel as $m) :
                if ($m['kelompok'] == 'C') {
            ?>
                    <tr>
                        <td class="nilai"><?= $no; ?></td>
                        <td width="25%" class="align-middle"> <?= $m['nama']; ?> </td>
                        <!--nilai pengetahuan -->
                        <?php
                        $total_all_p = 0;
                        $total_na = 0;
                        $total_all_n = 0;
                        $total_all_pts = 0;
                        $total_all_pas = 0;
                        $akd = array();
                        $all_kd = "";
                        $jum_kd = 0;
                        foreach ($nilai_p as $n) :
                            if ($n['tasm'] == $tasm)
                                if ($n['id_mapel'] == $m['id_mapel']) {
                                    if (strpos($all_kd, $n['no_kd']) === false) {
                                        $all_kd = $all_kd . $n['no_kd'];
                                        array_push($akd, $n['no_kd']);
                                        $jum_kd++;
                                    } else if ($all_kd == "") {
                                        $all_kd = $all_kd . $n['no_kd'];
                                        array_push($akd, $n['no_kd']);
                                        $jum_kd++;
                                    }
                        ?>
                        <?php }
                        endforeach
                        ?>
                        <td class="nilai">
                            <?php
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
                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                if (substr($n['jenis'], 0, 2) == 'PH') {
                                                    if ($n['no_kd'] == $akd[$i]) {
                                                        $jum_n++;
                                                        $total_n = $total_n + $n['nilai'];
                                                    }
                                                }
                                            }
                                    endforeach;
                                    // $total_all_n = (string)round($total_n / $jum_n, 0, PHP_ROUND_HALF_UP) * 2;
                                    $total_all_n = ($total_n != 0) ? (string)round($total_n / $jum_n, 0, PHP_ROUND_HALF_UP) * 2 : 0;
                                } else {
                                    // echo $total_all_n = 0;
                                }
                                if (!empty($nilai_pts)) {
                                    foreach ($nilai_pts as $n) :
                                        if ($n['tasm'] == $tasm)
                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                if ($n['no_kd'] == $akd[$i]) {
                                                    $jum_t++;
                                                    $total_t =  $total_t + $n['nilai'];
                                                }
                                            }
                                    endforeach;
                                    $total_all_pts = ($total_t != 0) ? (string)round($total_t / $jum_t, 0, PHP_ROUND_HALF_UP) * 1 : 0;
                                    // $total_all_pts = (string)round($total_t / $jum_t, 0, PHP_ROUND_HALF_UP) * 1;
                                } else {
                                    // echo $total_all_pts = 0;
                                }
                                if (!empty($nilai_pas)) {
                                    foreach ($nilai_pas as $n) :
                                        if ($n['tasm'] == $tasm)
                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                if ($n['no_kd'] == $akd[$i]) {
                                                    $jum_p++;
                                                    $total_p =  $total_p + $n['nilai'];
                                                }
                                            }
                                    endforeach;
                                    $total_all_pas = ($total_p != 0) ? (string)round($total_p / $jum_p, 0, PHP_ROUND_HALF_UP) * 1 : 0;
                                    // $total_all_pas = (string)round($total_p / $jum_p, 0, PHP_ROUND_HALF_UP) * 1;
                                } else {
                                    // echo $total_all_pas = 0;
                                }

                                $total_na = $total_all_n +  $total_all_pts + $total_all_pas;

                                if ($total_all_pts > 1) {
                                    // echo '<div>' . (string)round($total_na / 4, 0, PHP_ROUND_HALF_UP) . '</div>';
                                    $total_all_p += (string)round($total_na / 4, 0, PHP_ROUND_HALF_UP);
                                } else {
                                    // echo '<div>' . (string)round($total_na / 3, 0, PHP_ROUND_HALF_UP) . '</div>';
                                    $total_all_p += (string)round($total_na / 3, 0, PHP_ROUND_HALF_UP);
                                }
                            }
                            ?>
                            <?php if (!empty($total_all_p)) { ?>
                                <?php $total_peng =  round($total_all_p / count($akd), 0, PHP_ROUND_HALF_UP) ?>
                                <?php echo '<div>' .  $total_peng . '</div>'; ?>

                            <?php
                            } else {
                                echo $total_peng = 0;
                            } ?>
                        </td>
                        <td class="nilai">
                            <?php if (!empty($total_peng)) {
                                $in_kkm = (string)round((100 - $kkm['kkm']) / 3, 0, PHP_ROUND_HALF_UP);
                                $C = $kkm['kkm'];
                                $B = $C + $in_kkm;
                                $A = $B + $in_kkm;
                                // echo $in_kkm;
                            ?>
                                <?php if ($total_peng >= $A) {
                                    echo "A";
                                } elseif ($total_peng >= $B) {
                                    echo "B";
                                } elseif ($total_peng >= $C) {
                                    echo "C";
                                } elseif ($total_peng <= $C) {
                                    echo "D";
                                } else {
                                    echo "Jangan menyerah, anda pasti bisa!  ";
                                } ?>
                            <?php
                            } else {
                                echo $total_peng = 0;
                            } ?>
                        </td>
                        <td class="ctr_des">
                            <?php
                            if (!empty($total_na)) {
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
                                                if ($n['id_mapel'] == $m['id_mapel']) {
                                                    if (substr($n['jenis'], 0, 2) == 'PH') {
                                                        if ($n['no_kd'] == $akd[$i]) {
                                                            $jum_n++;
                                                            $total_n = $total_n + $n['nilai'];
                                                            $kd = $n['nama_kd'];
                                                            //$desckd[] = $n['nama_kd'];
                                                            if (count($desckd) == 0 || $desckd[count($desckd) - 1] != $n['nama_kd']) {
                                                                // $desckd[] = $n['nama_kd'];
                                                                $desckd[] = (str_word_count($n['nama_kd']) > 17 ? substr($n['nama_kd'], 0, 115) . "..." : $n['nama_kd']);
                                                            }
                                                        }
                                                    }
                                                }
                                        endforeach;
                                        $total_all_n = ($total_n != 0) ? (string)round($total_n / $jum_n, 0, PHP_ROUND_HALF_UP) * 2 : 0;
                                        // $total_all_n = (string)round($total_n / $jum_n, 0, PHP_ROUND_HALF_UP) * 2;
                                        // echo '<div>' .  $total_all_n . '</div>';
                                    } else {
                                        // echo $total_all_n = 0;
                                    }
                                    if (!empty($nilai_pts)) {
                                        foreach ($nilai_pts as $n) :
                                            if ($n['tasm'] == $tasm)
                                                if ($n['id_mapel'] == $m['id_mapel']) {
                                                    if ($n['no_kd'] == $akd[$i]) {
                                                        $jum_t++;
                                                        $total_t =  $total_t + $n['nilai'];
                                                    }
                                                }
                                        endforeach;
                                        // $total_all_pts = (string)round($total_t / $jum_t, 0, PHP_ROUND_HALF_UP) * 1;
                                        $total_all_pts = ($total_t != 0) ? (string)round($total_t / $jum_t, 0, PHP_ROUND_HALF_UP) * 1 : 0;
                                        // echo '<div>' .  $total_all_pts . '</div>';
                                    } else {
                                        // echo $total_all_pts = 0;
                                    }
                                    if (!empty($nilai_pas)) {
                                        foreach ($nilai_pas as $n) :
                                            if ($n['tasm'] == $tasm)
                                                if ($n['id_mapel'] == $m['id_mapel']) {
                                                    if ($n['no_kd'] == $akd[$i]) {
                                                        $jum_p++;
                                                        $total_p =  $total_p + $n['nilai'];
                                                    }
                                                }
                                        endforeach;
                                        $total_all_pas = ($total_p != 0) ? (string)round($total_p / $jum_p, 0, PHP_ROUND_HALF_UP) * 1 : 0;
                                        // $total_all_pas = (string)round($total_p / $jum_p, 0, PHP_ROUND_HALF_UP) * 1;
                                        // echo '<div>' .  $total_all_pas . '</div>';
                                    } else {
                                        // echo $total_all_pas = 0;
                                    }

                                    $total_na = $total_all_n +  $total_all_pts + $total_all_pas;
                                    // var_dump($nilai_rapor);
                                    // die;
                                    if ($total_all_pts >= 1) {
                                        $maxmin[] = (string)round($total_na / 4, 0, PHP_ROUND_HALF_UP);
                                    } else {
                                        $maxmin[] = (string)round($total_na / 3, 0, PHP_ROUND_HALF_UP);
                                    }
                                }
                                echo "<div>Ananda " . $n['nama'] . " sangat baik " . $desckd[array_search(max($maxmin), $maxmin)] . ", cukup " . $desckd[array_search(min($maxmin), $maxmin)]  . "</div>";
                            } else {
                                echo $total_na = 0;
                            }
                            ?>
                        </td>
                        <?php
                        $akd = array();
                        $all_kd = "";
                        $jum_kd = 0;
                        foreach ($nilai_k as $n) :
                            if ($n['tasm'] == $tasm)
                                if ($n['id_mapel'] == $m['id_mapel']) {
                                    if (strpos($all_kd, $n['no_kd']) === false) {
                                        $all_kd = $all_kd . $n['no_kd'];
                                        array_push($akd, $n['no_kd']);
                                        $jum_kd++;
                                    } else if ($all_kd == "") {
                                        $all_kd = $all_kd . $n['no_kd'];
                                        array_push($akd, $n['no_kd']);
                                        $jum_kd++;
                                    }
                        ?>
                        <?php }
                        endforeach
                        ?>
                        <td class="nilai">
                            <?php
                            $maxall = [];
                            $jum_n = 0;
                            $total_all_k = 0;
                            for ($i = 0; $i < $jum_kd; $i++) {
                                $maxprk = [];
                                $maxprj = [];
                                $maxprd = [];
                                $maxprt = [];
                                $nilai_tinggi = 0;
                                $num = 0;
                                foreach ($nilai_k as $n) :
                                    if ($n['tasm'] == $tasm)
                                        if ($n['id_mapel'] == $m['id_mapel'] && $n['no_kd'] == $akd[$i]) {
                                            if (substr($n['jenis'], 0, 6) == 'Produk') {
                                                $maxprd[] = round($n['nilai']);
                                            } else if (substr($n['jenis'], 0, 7) == 'Praktik') {
                                                $maxprk[] = round($n['nilai']);
                                            } else if (substr($n['jenis'], 0, 6) == 'Projek') {
                                                $maxprj[] = round($n['nilai']);
                                            } else if (substr($n['jenis'], 0, 10) == 'Portofolio') {
                                                $maxprt[] = round($n['nilai']);
                                            }
                                        }

                                endforeach;

                                if (count($maxprj) > 0) {
                                    $nilai_tinggi = $nilai_tinggi + max($maxprj);
                                    $num++;
                                }
                                if (count($maxprt) > 0) {
                                    $nilai_tinggi = $nilai_tinggi + max($maxprt);
                                    $num++;
                                }
                                if (count($maxprk) > 0) {
                                    $nilai_tinggi = $nilai_tinggi + max($maxprk);
                                    $num++;
                                }
                                if (count($maxprd) > 0) {
                                    $nilai_tinggi = $nilai_tinggi + max($maxprd);
                                    $num++;
                                }

                                // $nilai_tinggi = round($nilai_tinggi / $num, 0, PHP_ROUND_HALF_UP);
                                $nilai_tinggi = ($nilai_tinggi != 0) ? round($nilai_tinggi / $num, 0, PHP_ROUND_HALF_UP) : 0;
                                $total_all_k = $total_all_k + $nilai_tinggi;
                                // echo '<div>' .  $nilai_tinggi  . '</div>';
                            }
                            ?>
                            <?php if (!empty($total_all_k)) { ?>
                                <?php $total_ket = round($total_all_k / count($akd), 0, PHP_ROUND_HALF_UP) ?>
                                <?php echo '<div>' .   $total_ket  . '</div>'; ?>
                            <?php
                            } else {
                                echo  $total_ket = 0;
                            } ?>
                        </td>
                        <td class="nilai">
                            <?php if (!empty($total_ket)) {
                                $in_kkm = (string)round((100 - $kkm['kkm']) / 3, 0, PHP_ROUND_HALF_UP);
                                $C = $kkm['kkm'];
                                $B = $C + $in_kkm;
                                $A = $B + $in_kkm;
                            ?>
                                <?php if ($total_ket >= $A) {
                                    echo "A";
                                } elseif ($total_ket >= $B) {
                                    echo "B";
                                } elseif ($total_ket >= $C) {
                                    echo "C";
                                } elseif ($total_ket <= $C) {
                                    echo "D";
                                } else {
                                    echo "Jangan menyerah, anda pasti bisa!  ";
                                } ?>
                            <?php
                            } else {
                                echo $total_ket = 0;
                            } ?>
                        </td>
                        <td class="ctr_des">
                            <?php if (!empty($total_all_k)) {
                                $maxmin = [];
                                $desckd = [];
                                for ($i = 0; $i < $jum_kd; $i++) {
                                    $total = 0;
                                    $jum_n = 0;
                                    foreach ($nilai_k as $n) :
                                        if ($n['tasm'] == $tasm)
                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                if ($n['no_kd'] == $akd[$i]) {
                                                    $jum_n++;
                                                    $total = $total + $n['nilai'];
                                                    if (count($desckd) == 0 || $desckd[count($desckd) - 1] != $n['nama_kd']) {
                                                        // $desckd[] = $n['nama_kd'];
                                                        $desckd[] = (str_word_count($n['nama_kd']) > 17 ? substr($n['nama_kd'], 0, 115) . "..." : $n['nama_kd']);
                                                    }
                                                }
                                            }
                                    endforeach;
                                    $total_all_k += round($total / $jum_n, 0, PHP_ROUND_HALF_UP);
                                    // echo '<div>' . $akd[$i] . ': ' . (string)round($total / $jum_n, 0, PHP_ROUND_HALF_UP) . '</div>';
                                    $maxmin[] = round($total / $jum_n, 0, PHP_ROUND_HALF_UP);
                                }
                                echo "<div>Ananda " . $n['nama'] . " sangat baik " . $desckd[array_search(max($maxmin), $maxmin)] . ", cukup " . $desckd[array_search(min($maxmin), $maxmin)] . "</div>";
                            } else {
                                echo $total_all_k = 0;
                            }
                            ?>
                        </td>
                        <!-- end nilai pengetahuan -->
                    </tr>
                    <?php $no++ ?>
            <?php  }
            endforeach ?>
            <!-- end nilai umum -->
        </tbody>
    </table>
    <br>
    <table class="table">
        <tr>
            <td class="e" colspan="5"> <b>Tabel Interval Predikat.</b></td>
        </tr>
        <tr>
            <td class="e">KKM</td>
            <td class="e">D (kurang)</td>
            <td class="e">C (cukup baik)</td>
            <td class="e">B (baik)</td>
            <td class="e">A (sangat baik)</td>
        </tr>
        <tr>
            <td class="nilai">
                <?php if (!empty($kkm)) {
                    // $in_kkm = (string)round((100 - $kkm['kkm']) / 3, 0, PHP_ROUND_HALF_UP);
                    echo $kkm['kkm'];
                ?>
                <?php
                } else {
                    echo $kkm = 0;
                } ?>
            </td>
            <td class="nilai">
                <?php if (!empty($kkm)) {
                    $in_kkm = (string)round((100 - $kkm['kkm']) / 3, 0, PHP_ROUND_HALF_UP);
                    echo '< ', $kkm['kkm'];
                ?>
                <?php
                } else {
                    echo $kkm = 0;
                } ?>
            </td>
            <td class="nilai">
                <?php if (!empty($kkm)) {
                    $in_kkm = (string)round((100 - $kkm['kkm']) / 3, 0, PHP_ROUND_HALF_UP);
                    $C = $kkm['kkm'];
                    $B = $C + $in_kkm;
                    // echo $in_kkm;
                    echo $C . ' &le; N &le; ' . ($B-1) ;
                ?>
                <?php
                } else {
                    echo $kkm = 0;
                } ?>
            </td>
            <td class="nilai">
                <?php if (!empty($kkm)) {
                    $in_kkm = (string)round((100 - $kkm['kkm']) / 3, 0, PHP_ROUND_HALF_UP);
                    $C = $kkm['kkm'];
                    $B = $C + $in_kkm;
                    $A = $B + $in_kkm;
                    echo $B . ' &le; N &le; ' . ($A-1);
                ?>
                <?php
                } else {
                    echo $kkm = 0;
                } ?>
            </td>
            <td class="nilai">
                <?php if (!empty($kkm)) {
                    $in_kkm = (string)round((100 - $kkm['kkm']) / 3, 0, PHP_ROUND_HALF_UP);
                    $C = $kkm['kkm'];
                    $B = $C + $in_kkm;
                    $A = $B + $in_kkm;
                    // echo $in_kkm;
                    echo $A . ' &le; N &le; ' . '100';
                ?>
                <?php
                } else {
                    echo $kkm = 0;
                } ?>
            </td>
        </tr>
    </table>
    <br>
    <div>
        <b>C. Ekstra Kurikuler</b>
    </div>
    <table class="table">
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
    <div>
        <b>D. Saran-saran</b>
    </div>
    <table class="table">
        <tr>
            <td width="20%" style="border: solid 1px #000; padding: 20px 11px; height: 80px; width: 100%">
                <?= $catatan['catatan_wali'] ?>
            </td>
        </tr>
    </table>
    <br>
    <div>
        <b>E. Tinggi dan Berat Badan</b>
    </div>
    <table class="table">
        <tr>
            <td rowspan="2" class="e">No.</td>
            <td rowspan="2" class="e">Aspek Yang Dinilai</td>
            <td colspan="2" class="e">Semester</td>
        </tr>
        <tr>
            <td class="e">1</td>
            <td class="e">2</td>
        </tr>
        <tr>
            <td width="5%" class="ctr">1.</td>
            <td class="ctr">Tinggi Badan</td>
            <td class="ctr"><?= $tinggi_berat_1['tinggi'] ?></td>
            <td class="ctr"><?= $tinggi_berat_2['tinggi'] ?></td>
        </tr>
        <tr>
            <td width="5%" class="ctr">2.</td>
            <td class="ctr">Berat Badan</td>
            <td class="ctr"><?= $tinggi_berat_1['berat'] ?></td>
            <td class="ctr"><?= $tinggi_berat_2['berat'] ?></td>
        </tr>
    </table>
    <br>
    <div>
        <b>F. Kondisi Kesehatan</b>
    </div>
    <table class="table">
        <tr>
            <td class="e">No.</td>
            <td class="e">Aspek Fisik</td>
            <td class="e">Keterangan</td>
        </tr>
        <?php $no = 1 ?>
        <?php foreach ($kesehatan as $kes) : {  ?>
                <tr>
                    <td width="5%" class="ctr"> <?= $no ?>.</td>
                    <td class="ctr"><?= $kes['aspek_fisik'] ?></td>
                    <td class="ctr"><?= $kes['keterangan'] ?></td>
                </tr>
                <?php $no++ ?>
        <?php }
        endforeach ?>
    </table>
    <br>
    <div>
        <b>G. Prestasi</b>
    </div>
    <table class="table">
        <tr>
            <td class="e">No.</td>
            <td class="e">Jenis Prestasi</td>
            <td class="e">Keterangan</td>
        </tr>
        <?php $no = 1 ?>
        <?php foreach ($prestasi as $pre) : { ?>
                <tr>
                    <td width="5%" class="ctr"> <?= $no ?>.</td>
                    <td class="ctr"><?= $pre['jenis'] ?></td>
                    <td class="ctr"><?= $pre['keterangan'] ?></td>
                </tr>
                <?php $no++ ?>
        <?php }
        endforeach ?>
    </table>
    <br>
    <div>
        <b>H. Ketidakhadiran</b>
    </div>
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
       <?php if ($naik_kelas['naik'] == 'L') {
        echo '                                              
            <div style="border: solid 1px #000; padding: 30px 10px; width: 100%"> 
                Keputusan: <br>
                Berdasarkan pencapaian seluruh kompetensi, peserta didik dinyatakan <br>
                Lulus *) 
            </div>
            ';
    } else {
        echo ' ';
    }
    ?>
    <?php if ($naik_kelas['naik'] == 'T') {
        echo ' 
         <div style="border: solid 1px #000; padding: 30px 10px; width: 100%"> 
                Keputusan: <br>
                Berdasarkan pencapaian seluruh kompetensi, peserta didik dinyatakan <br>
                Tidak Lulus*)
            </div>
            ';
    } else {
        echo ' ';
    }
    ?>
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
                <td width="20%">
                </td>
                <td width="7%"></td>
                <td width="65%">
                    <?= $footer_1['kota'] ?>, <span><?php echo format_indo(date($tahun['tgl_raport_kelas3'])); ?></span><br>
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
                <td width="0%"></td>
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