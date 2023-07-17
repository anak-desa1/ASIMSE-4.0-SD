<!DOCTYPE html>
<html>

<head>
    <title><?= $siswa['nama'] ?></title>
    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/favicon_1.ico" />
    <style type="text/css">
        body {
            font-family: arial;
            font-size: 10pt;
            width: 100%
        }

        .table {
            border-collapse: collapse;
            border: solid 2px #999;
            width: 100%
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

        .ctr_a {
            text-align: center;
            font-family: arial;
            font-size: 9.5pt;

        }

        .ctr_b {
            text-align: '';
            font-family: arial;
            font-size: 10pt;
        }

        .ctr {
            text-align: center;
            font-family: arial;
            font-size: 10pt;
            width: "10%";
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
            font-size: 10pt;
        }

        .d {
            color: white;
        }

        .e {
            background: #92a8d1;
            text-align: center;
            font-family: arial;
            font-size: 9pt;
            /* text-align: center; */
            /* font-family: arial; */
        }

        .f {
            padding: 5px 10px;
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div style="border: solid 1px #000; padding: 11px 11px; width: 100%">
        <table class="body">
            <thead></thead>
            <tr>
                <td colspan="7"></td>
                <td>Nama Sekolah</td>
                <td>: <?= $sekolah['nama_sekolah'] ?></td>
                <td colspan="7"></td>
                <td colspan="7"></td>
                <td colspan="7"></td>
                <td colspan="7"></td>
                
                <td colspan="7"></td>
                <td colspan="7"></td>
                <td colspan="7"></td>
                <td>Kelas</td>
                <td>: <?= $kelas['rombel'] ?>
                <td></td>
            </tr>
            <tr>
                <td colspan="7"></td>
                <td>Alamat Sekolah</td>
                <td>: <?= $sekolah['alamat'] ?>
                <td colspan="7"></td>
                <td colspan="7"></td>
                <td colspan="7"></td>
                <td colspan="7"></td>
                
                <td colspan="7"></td>
                <td colspan="7"></td>
                <td colspan="7"></td>
                <td>Semester</td>
                <td>: <?php
                        $semester = $tahun['semester'];
                        echo $semester;
                        if ($semester == 1) {
                            echo " / Ganjil";
                        } else {
                            echo " / Genap";
                        }
                        ?></td>
            </tr>
            <tr>
                <td colspan="7"></td>
                <td>Nama Siswa</td>
                <td>: <?= $siswa['nama'] ?></td>
                <td colspan="7"></td>
                <td colspan="7"></td>
                <td colspan="7"></td>
                <td colspan="7"></td>
                
                <td colspan="7"></td>
                <td colspan="7"></td>
                <td colspan="7"></td>
                <td>Tahun Pelajaran</td>
                <td>: <?= $tahun['th_pelajaran'] ?></td>
            </tr>
            <tr>
                <td colspan="7"></td>
                <td>NIS / NISN</td>
                <td>: <?= $siswa['nis'] ?>/<?= $siswa['nisn'] ?></td>
                <td colspan="7"></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div>
        <br>
        <b>SIKAP</b>
    </div>
    <table class="table">
        <tr>
            <th colspan="3" width="60%" class="e"> Deskripsi</th>
        </tr>
        <tr>
            <td colspan="2" class="p">1. Sikap Spiritual </td>
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
                    <p style="font-size:13px">
                        <i> <?= $siswa['nama'] ?> <b>taat beribadah,</b> <?= $sp_text_selalu  ?> <b>dan sudah mampu meningkatkan sikap</b>
                        <?php endforeach ?>
                        <?php foreach ($mulai_meningkat_sp as $m) : ?>
                            <?= $m['nama_kd'] ?>.
                        </i>
                    </p>
                <?php endforeach ?>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="p">2. Sikap Sosial</td>
            <td>
                <?php foreach ($selalu_so as $so) :
                    $pc_selalu = explode(",", $so['selalu']);
                    $teks_selalu = array();
                    for ($i = 0; $i < sizeof($pc_selalu); $i++) {
                        $idx = $pc_selalu[$i];

                        $teks_selalu[] = $list_kd_so[$idx];
                    }

                    $text_selalu = implode(", ", $teks_selalu); ?>
                    <p style="font-size:13px">
                        <i><?= $siswa['nama'] ?> <b>sangat</b> <?= $text_selalu ?> <b>dan sudah mampu meningkatkan sikap</b>
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
        <b>PENGETAHUAN DAN KETERAMPILAN</b>
    </div>
    <table class="table" width="100%">
        <thead> </thead>
        <tbody>
            <!--nilai -->
            <?php foreach ($mapel as $m) : ?>
            <?php endforeach ?>
            <tr>
                <td rowspan="2" colspan="3" class="e"><b>MATA PELAJARAN</b></td>
                <td colspan="10" class="e"><b>KI-3 PENGETAHUAN</b></td>
                <td rowspan="2" colspan="8" class="e"><b>KI-4 KETERAMPILAN</b></td>
            </tr>
            <tr>
                <?php if (!empty($nilai_p)) { ?>
                    <?php foreach ($nilai_p as $p) : ?>
                    <?php endforeach ?>
                    <?php if ($ta == 1) { ?>
                        <td colspan="2" class="e">Tema-1</td>
                        <td colspan="2" class="e">Tema-2</td>
                        <td colspan="2" class="e">Tema-3</td>
                    <?php } ?>
                    <?php if ($ta == 2) { ?>
                        <td colspan="2" class="e">Tema-5</td>
                        <td colspan="2" class="e">Tema-6</td>
                        <td colspan="2" class="e">Tema-7</td>
                    <?php } ?>
                    <td colspan="2" class="e">Non Tematik</td>
                    <td colspan="2" class="e"><b>PTS</b></td>
            </tr>
            <tr>
                <td class="e">NO</td>
                <td class="e">Mata Pelajaran</td>
                <td class="e">KKM</td>
                <?php if ($ta == 1) { ?>
                    <td class="e">KD</td>
                    <td class="e">PH</td>
                    <td class="e">KD</td>
                    <td class="e">PH</td>
                    <td class="e">KD</td>
                    <td class="e">PH</td>
                <?php } ?>
                <?php if ($ta == 2) { ?>
                    <td class="e">KD</td>
                    <td class="e">PH</td>
                    <td class="e">KD</td>
                    <td class="e">PH</td>
                    <td class="e">KD</td>
                    <td class="e">PH</td>
                <?php } ?>
                <td class="e">KD</td>
                <td class="e">PH</td>
                <td class="e">KD</td>
                <td class="e">PTS</td>
            <?php } ?>
            <td class="e">KD</td>
            <td class="e">Prak</td>
            <td class="e">KD</td>
            <td class="e">Prod</td>
            <td class="e">KD</td>
            <td class="e">Proj</td>
            <td class="e">KD</td>
            <td class="e">Port</td>
            </tr>
            <tr>
                <td colspan="21">Kelompok (Umum)</td>
            </tr>
            <?php $no = 1; ?>
            <?php foreach ($mapel as $m) :
                if ($m['kelompok'] == 'A' || $m['kelompok'] == 'B') {
            ?>
                    <tr>
                        <td width="4%" class="ctr_a"><?= $no; ?></td>
                        <td width="23%" class="ctr_b"> <?= $m['nama']; ?> </td>
                        <td width="5%" class="ctr_a"><?= $m['kkm']; ?></td>
                        <!--nilai pengetahuan -->
                        <?php if ($ta == 1) { ?>
                            <td class="ctr_a">
                                <?php
                                foreach ($nilai_p as $p) :
                                    if ($p['tasm'] == $tasm)
                                        if ($p['id_mapel'] == $m['id_mapel']) {
                                            if ($p['tema'] == 1) {
                                                if (substr($p['jenis'], 0, 2) == 'PH') {
                                                    echo ' <div>' . $p['no_kd'] . ' </div>';
                                                }
                                            }
                                        }
                                endforeach;
                                ?>
                            </td>
                            <td class="ctr_a">
                                <?php
                                foreach ($nilai_p as $p) :
                                    if ($p['tasm'] == $tasm)
                                        if ($p['id_mapel'] == $m['id_mapel']) {
                                            if ($p['tema'] == 1) {
                                                if (substr($p['jenis'], 0, 2) == 'PH') {
                                                    echo ' <div>' . $p['nilai'] . ' </div>';
                                                }
                                            }
                                        }
                                endforeach;
                                ?>
                            </td>
                            <td class="ctr_a">
                                <?php
                                foreach ($nilai_p as $p) :
                                    if ($p['tasm'] == $tasm)
                                        if ($p['id_mapel'] == $m['id_mapel']) {
                                            if ($p['tema'] == 2) {
                                                if (substr($p['jenis'], 0, 2) == 'PH') {
                                                    echo ' <div>' . $p['no_kd'] . ' </div>';
                                                }
                                            }
                                        }
                                endforeach;
                                ?>
                            </td>
                            <td class="ctr_a">
                                <?php
                                foreach ($nilai_p as $p) :
                                    if ($p['tasm'] == $tasm)
                                        if ($p['id_mapel'] == $m['id_mapel']) {
                                            if ($p['tema'] == 2) {
                                                if (substr($p['jenis'], 0, 2) == 'PH') {
                                                    echo ' <div>' . $p['nilai'] . ' </div>';
                                                }
                                            }
                                        }
                                endforeach;
                                ?>
                            </td>
                            <td class="ctr_a">
                                <?php
                                foreach ($nilai_p as $p) :
                                    if ($p['tasm'] == $tasm)
                                        if ($p['id_mapel'] == $m['id_mapel']) {
                                            if ($p['tema'] == 3) {
                                                if (substr($p['jenis'], 0, 2) == 'PH') {
                                                    echo ' <div>' . $p['no_kd'] . ' </div>';
                                                }
                                            }
                                        }
                                endforeach;
                                ?>
                            </td>
                            <td class="ctr_a">
                                <?php
                                foreach ($nilai_p as $p) :
                                    if ($p['tasm'] == $tasm)
                                        if ($p['id_mapel'] == $m['id_mapel']) {
                                            if ($p['tema'] == 3) {
                                                if (substr($p['jenis'], 0, 2) == 'PH') {
                                                    echo ' <div>' . $p['nilai'] . ' </div>';
                                                }
                                            }
                                        }
                                endforeach;
                                ?>
                            </td>
                        <?php } ?>
                        <?php if ($ta == 2) { ?>
                            <td class="ctr_a">
                                <?php
                                foreach ($nilai_p as $p) :
                                    if ($p['tasm'] == $tasm)
                                        if ($p['id_mapel'] == $m['id_mapel']) {
                                            if ($p['tema'] == 5) {
                                                if (substr($p['jenis'], 0, 2) == 'PH') {
                                                    echo ' <div>' . $p['no_kd'] . ' </div>';
                                                }
                                            }
                                        }
                                endforeach;
                                ?>
                            </td>
                            <td class="ctr_a">
                                <?php
                                foreach ($nilai_p as $p) :
                                    if ($p['tasm'] == $tasm)
                                        if ($p['id_mapel'] == $m['id_mapel']) {
                                            if ($p['tema'] == 5) {
                                                if (substr($p['jenis'], 0, 2) == 'PH') {
                                                    echo ' <div>' . $p['nilai'] . ' </div>';
                                                }
                                            }
                                        }
                                endforeach;
                                ?>
                            </td>
                            <td class="ctr_a">
                                <?php
                                foreach ($nilai_p as $p) :
                                    if ($p['tasm'] == $tasm)
                                        if ($p['id_mapel'] == $m['id_mapel']) {
                                            if ($p['tema'] == 6) {
                                                if (substr($p['jenis'], 0, 2) == 'PH') {
                                                    echo ' <div>' . $p['no_kd'] . ' </div>';
                                                }
                                            }
                                        }
                                endforeach;
                                ?>
                            </td>
                            <td class="ctr_a">
                                <?php
                                foreach ($nilai_p as $p) :
                                    if ($p['tasm'] == $tasm)
                                        if ($p['id_mapel'] == $m['id_mapel']) {
                                            if ($p['tema'] == 6) {
                                                if (substr($p['jenis'], 0, 2) == 'PH') {
                                                    echo ' <div>' . $p['nilai'] . ' </div>';
                                                }
                                            }
                                        }
                                endforeach;
                                ?>
                            </td>
                            <td class="ctr_a">
                                <?php
                                foreach ($nilai_p as $p) :
                                    if ($p['tasm'] == $tasm)
                                        if ($p['id_mapel'] == $m['id_mapel']) {
                                            if ($p['tema'] == 7) {
                                                if (substr($p['jenis'], 0, 2) == 'PH') {
                                                    echo ' <div>' . $p['no_kd'] . ' </div>';
                                                }
                                            }
                                        }
                                endforeach;
                                ?>
                            </td>
                            <td class="ctr_a">
                                <?php
                                foreach ($nilai_p as $p) :
                                    if ($p['tasm'] == $tasm)
                                        if ($p['id_mapel'] == $m['id_mapel']) {
                                            if ($p['tema'] == 7) {
                                                if (substr($p['jenis'], 0, 2) == 'PH') {
                                                    echo ' <div>' . $p['nilai'] . ' </div>';
                                                }
                                            }
                                        }
                                endforeach;
                                ?>
                            </td>
                        <?php } ?>
                        <td class="ctr_a">
                            <?php
                            foreach ($nilai_p as $p) :
                                if ($p['tasm'] == $tasm)
                                    if ($p['id_mapel'] == $m['id_mapel']) {
                                        if ($p['tema'] == '-') {
                                            if (substr($p['jenis'], 0, 2) == 'PH') {
                                                echo ' <div>' . $p['no_kd'] . ' </div>';
                                            }
                                        }
                                    }
                            endforeach;
                            ?>
                        </td>
                        <td class="ctr_a">
                            <?php
                            foreach ($nilai_p as $p) :
                                if ($p['tasm'] == $tasm)
                                    if ($p['id_mapel'] == $m['id_mapel']) {
                                        if ($p['tema'] == '-') {
                                            if (substr($p['jenis'], 0, 2) == 'PH') {
                                                echo ' <div>' . $p['nilai'] . ' </div>';
                                            }
                                        }
                                    }
                            endforeach;
                            ?>
                        </td>
                        <!-- nilai PTS -->
                        <?php
                        $total_all_pts = 0;
                        $akd = array();
                        $all_kd = "";
                        $jum_kd = 0;
                        foreach ($nilai_p as $n) :
                            if ($n['tasm'] == $tasm)
                                if ($n['jenis'] == 'PTS') {
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
                                    }
                        ?>
                        <?php }
                        endforeach
                        ?>
                        <td class="ctr_a">
                            <?php
                            for ($i = 0; $i < $jum_kd; $i++) {
                                echo '<div>' . $akd[$i] . '</div>';
                            }
                            ?>
                        </td>
                        <td class="ctr_a">
                            <?php
                            if (!empty($nilai_pts)) {
                                for ($i = 0; $i < $jum_kd; $i++) {
                                    $total = 0;
                                    $jum_n = 0;
                                    foreach ($nilai_pts as $n) :
                                        if ($n['tasm'] == $tasm)
                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                if ($n['no_kd'] == $akd[$i]) {
                                                    $jum_n++;
                                                    $total =  $total + $n['nilai'];
                                                }
                                            }
                                    endforeach;
                                    $total_all_pts = (string)round($total / $jum_n, 0, PHP_ROUND_HALF_UP);
                                    echo '<div>' .  $total_all_pts . '</div>';
                                }
                            } else {
                                // echo $total_all_pts = 0;
                            }
                            ?>
                        </td>
                        <!-- end nilai PTS -->
                        <!-- end nilai pengetahuan -->
                        <!-- Praktik -->
                        <td class="ctr_a">
                            <?php
                            $kdprd = [];
                            foreach ($nilai_k as $n) :
                                if ($n['tasm'] == $tasm)
                                    if ($n['id_mapel'] == $m['id_mapel']) { ?>
                                    <?php if (substr($n['jenis'], 0, 7) == 'Praktik') : ?>
                                        <?php if (count($kdprd) == 0 || $kdprd[count($kdprd) - 1] != $n['no_kd']) {
                                                $kdprd[] = $n['no_kd'];
                                            } ?>
                                        <div><?= $n['no_kd']; ?></div>
                                    <?php endif ?>
                            <?php }
                            endforeach ?>
                        </td>
                        <td class="ctr_a">
                            <?php
                            $kp = 0;
                            for ($kp = 0; $kp < count($kdprd); $kp++) {
                                $max = [];
                                $maxall = [];
                                foreach ($nilai_k as $n) :
                                    if ($n['tasm'] == $tasm)
                                        if ($n['id_mapel'] == $m['id_mapel'] && $n['no_kd'] == $kdprd[$kp]) { ?>
                                        <?php if (substr($n['jenis'], 0, 7) == 'Praktik') : ?>
                                        <?php
                                                $maxall[] = round($n['nilai']);
                                            endif ?>
                            <?php }

                                endforeach;
                                echo '<div>' . max($maxall) . '</div>';
                            }
                            ?>
                        </td>
                        <!-- Praktik -->
                        <!-- Produk -->
                        <td class="ctr_a">
                            <?php
                            $kdprd = [];
                            foreach ($nilai_k as $n) :
                                if ($n['tasm'] == $tasm)
                                    if ($n['id_mapel'] == $m['id_mapel']) { ?>
                                    <?php if (substr($n['jenis'], 0, 6) == 'Produk') : ?>
                                        <?php if (count($kdprd) == 0 || $kdprd[count($kdprd) - 1] != $n['no_kd']) {
                                                $kdprd[] = $n['no_kd'];
                                            } ?>
                                        <div><?= $n['no_kd']; ?></div>
                                    <?php endif ?>
                            <?php }
                            endforeach ?>
                        </td>
                        <td class="ctr_a">
                            <?php
                            $kp = 0;
                            for ($kp = 0; $kp < count($kdprd); $kp++) {
                                $max = [];
                                $maxall = [];
                                foreach ($nilai_k as $n) :
                                    if ($n['tasm'] == $tasm)
                                        if ($n['id_mapel'] == $m['id_mapel'] && $n['no_kd'] == $kdprd[$kp]) { ?>
                                        <?php if (substr($n['jenis'], 0, 6) == 'Produk') : ?>
                                        <?php
                                                $maxall[] = round($n['nilai']);
                                            endif ?>
                            <?php }

                                endforeach;
                                echo '<div>' . max($maxall) . '</div>';
                            }
                            ?>
                        </td>
                        <!-- Produk -->
                        <!-- Projek -->
                        <td class="ctr_a">
                            <?php
                            $kdprd = [];
                            foreach ($nilai_k as $n) :
                                if ($n['tasm'] == $tasm)
                                    if ($n['id_mapel'] == $m['id_mapel']) { ?>
                                    <?php if (substr($n['jenis'], 0, 6) == 'Projek') : ?>
                                        <?php if (count($kdprd) == 0 || $kdprd[count($kdprd) - 1] != $n['no_kd']) {
                                                $kdprd[] = $n['no_kd'];
                                            } ?>
                                        <div><?= $n['no_kd']; ?></div>
                                    <?php endif ?>
                            <?php }
                            endforeach ?>
                        </td>
                        <td class="ctr_a">
                            <?php
                            $kp = 0;
                            for ($kp = 0; $kp < count($kdprd); $kp++) {
                                $max = [];
                                $maxall = [];
                                foreach ($nilai_k as $n) :
                                    if ($n['tasm'] == $tasm)
                                        if ($n['id_mapel'] == $m['id_mapel'] && $n['no_kd'] == $kdprd[$kp]) { ?>
                                        <?php if (substr($n['jenis'], 0, 6) == 'Projek') : ?>
                                        <?php
                                                $maxall[] = round($n['nilai']);
                                            endif ?>
                            <?php }

                                endforeach;
                                echo '<div>' . max($maxall) . '</div>';
                            }
                            ?>
                        </td>
                        <!-- Projek -->
                        <!-- Portofolio -->
                        <td class="ctr_a">
                            <?php
                            $kdprd = [];
                            foreach ($nilai_k as $n) :
                                if ($n['tasm'] == $tasm)
                                    if ($n['id_mapel'] == $m['id_mapel']) { ?>
                                    <?php if (substr($n['jenis'], 0, 10) == 'Portofolio') : ?>
                                        <?php if (count($kdprd) == 0 || $kdprd[count($kdprd) - 1] != $n['no_kd']) {
                                                $kdprd[] = $n['no_kd'];
                                            } ?>
                                        <div><?= $n['no_kd']; ?></div>
                                    <?php endif ?>
                            <?php }
                            endforeach ?>
                        </td>
                        <td class="ctr_a">
                            <?php
                            $kp = 0;
                            for ($kp = 0; $kp < count($kdprd); $kp++) {
                                $max = [];
                                $maxall = [];
                                foreach ($nilai_k as $n) :
                                    if ($n['tasm'] == $tasm)
                                        if ($n['id_mapel'] == $m['id_mapel'] && $n['no_kd'] == $kdprd[$kp]) { ?>
                                        <?php if (substr($n['jenis'], 0, 10) == 'Portofolio') : ?>
                                        <?php
                                                $maxall[] = round($n['nilai']);
                                            endif ?>
                            <?php }

                                endforeach;
                                echo '<div>' . max($maxall) . '</div>';
                            }
                            ?>
                        </td>
                        <!-- Portofolio -->
                        <!-- end nilai keterampilan -->

                    </tr>
                    <?php $no++ ?>
            <?php }
            endforeach ?>
               <tr>
                <td colspan="21">Kelompok (Muatan Lokal)</td>
            </tr>
            <?php $no = 1; ?>
            <?php foreach ($mapel as $m) :
                if ($m['kelompok'] == 'C' ) {
            ?>
                    <tr>
                        <td width="4%" class="ctr_a"><?= $no; ?></td>
                        <td width="23%" class="ctr_b"> <?= $m['nama']; ?> </td>
                        <td width="5%" class="ctr_a"><?= $m['kkm']; ?></td>
                        <!--nilai pengetahuan -->
                        <?php if ($ta == 1) { ?>
                            <td class="ctr_a">
                                <?php
                                foreach ($nilai_p as $p) :
                                    if ($p['tasm'] == $tasm)
                                        if ($p['id_mapel'] == $m['id_mapel']) {
                                            if ($p['tema'] == 1) {
                                                if (substr($p['jenis'], 0, 2) == 'PH') {
                                                    echo ' <div>' . $p['no_kd'] . ' </div>';
                                                }
                                            }
                                        }
                                endforeach;
                                ?>
                            </td>
                            <td class="ctr_a">
                                <?php
                                foreach ($nilai_p as $p) :
                                    if ($p['tasm'] == $tasm)
                                        if ($p['id_mapel'] == $m['id_mapel']) {
                                            if ($p['tema'] == 1) {
                                                if (substr($p['jenis'], 0, 2) == 'PH') {
                                                    echo ' <div>' . $p['nilai'] . ' </div>';
                                                }
                                            }
                                        }
                                endforeach;
                                ?>
                            </td>
                            <td class="ctr_a">
                                <?php
                                foreach ($nilai_p as $p) :
                                    if ($p['tasm'] == $tasm)
                                        if ($p['id_mapel'] == $m['id_mapel']) {
                                            if ($p['tema'] == 2) {
                                                if (substr($p['jenis'], 0, 2) == 'PH') {
                                                    echo ' <div>' . $p['no_kd'] . ' </div>';
                                                }
                                            }
                                        }
                                endforeach;
                                ?>
                            </td>
                            <td class="ctr_a">
                                <?php
                                foreach ($nilai_p as $p) :
                                    if ($p['tasm'] == $tasm)
                                        if ($p['id_mapel'] == $m['id_mapel']) {
                                            if ($p['tema'] == 2) {
                                                if (substr($p['jenis'], 0, 2) == 'PH') {
                                                    echo ' <div>' . $p['nilai'] . ' </div>';
                                                }
                                            }
                                        }
                                endforeach;
                                ?>
                            </td>
                            <td class="ctr_a">
                                <?php
                                foreach ($nilai_p as $p) :
                                    if ($p['tasm'] == $tasm)
                                        if ($p['id_mapel'] == $m['id_mapel']) {
                                            if ($p['tema'] == 3) {
                                                if (substr($p['jenis'], 0, 2) == 'PH') {
                                                    echo ' <div>' . $p['no_kd'] . ' </div>';
                                                }
                                            }
                                        }
                                endforeach;
                                ?>
                            </td>
                            <td class="ctr_a">
                                <?php
                                foreach ($nilai_p as $p) :
                                    if ($p['tasm'] == $tasm)
                                        if ($p['id_mapel'] == $m['id_mapel']) {
                                            if ($p['tema'] == 3) {
                                                if (substr($p['jenis'], 0, 2) == 'PH') {
                                                    echo ' <div>' . $p['nilai'] . ' </div>';
                                                }
                                            }
                                        }
                                endforeach;
                                ?>
                            </td>
                        <?php } ?>
                        <?php if ($ta == 2) { ?>
                            <td class="ctr_a">
                                <?php
                                foreach ($nilai_p as $p) :
                                    if ($p['tasm'] == $tasm)
                                        if ($p['id_mapel'] == $m['id_mapel']) {
                                            if ($p['tema'] == 5) {
                                                if (substr($p['jenis'], 0, 2) == 'PH') {
                                                    echo ' <div>' . $p['no_kd'] . ' </div>';
                                                }
                                            }
                                        }
                                endforeach;
                                ?>
                            </td>
                            <td class="ctr_a">
                                <?php
                                foreach ($nilai_p as $p) :
                                    if ($p['tasm'] == $tasm)
                                        if ($p['id_mapel'] == $m['id_mapel']) {
                                            if ($p['tema'] == 5) {
                                                if (substr($p['jenis'], 0, 2) == 'PH') {
                                                    echo ' <div>' . $p['nilai'] . ' </div>';
                                                }
                                            }
                                        }
                                endforeach;
                                ?>
                            </td>
                            <td class="ctr_a">
                                <?php
                                foreach ($nilai_p as $p) :
                                    if ($p['tasm'] == $tasm)
                                        if ($p['id_mapel'] == $m['id_mapel']) {
                                            if ($p['tema'] == 6) {
                                                if (substr($p['jenis'], 0, 2) == 'PH') {
                                                    echo ' <div>' . $p['no_kd'] . ' </div>';
                                                }
                                            }
                                        }
                                endforeach;
                                ?>
                            </td>
                            <td class="ctr_a">
                                <?php
                                foreach ($nilai_p as $p) :
                                    if ($p['tasm'] == $tasm)
                                        if ($p['id_mapel'] == $m['id_mapel']) {
                                            if ($p['tema'] == 6) {
                                                if (substr($p['jenis'], 0, 2) == 'PH') {
                                                    echo ' <div>' . $p['nilai'] . ' </div>';
                                                }
                                            }
                                        }
                                endforeach;
                                ?>
                            </td>
                            <td class="ctr_a">
                                <?php
                                foreach ($nilai_p as $p) :
                                    if ($p['tasm'] == $tasm)
                                        if ($p['id_mapel'] == $m['id_mapel']) {
                                            if ($p['tema'] == 7) {
                                                if (substr($p['jenis'], 0, 2) == 'PH') {
                                                    echo ' <div>' . $p['no_kd'] . ' </div>';
                                                }
                                            }
                                        }
                                endforeach;
                                ?>
                            </td>
                            <td class="ctr_a">
                                <?php
                                foreach ($nilai_p as $p) :
                                    if ($p['tasm'] == $tasm)
                                        if ($p['id_mapel'] == $m['id_mapel']) {
                                            if ($p['tema'] == 7) {
                                                if (substr($p['jenis'], 0, 2) == 'PH') {
                                                    echo ' <div>' . $p['nilai'] . ' </div>';
                                                }
                                            }
                                        }
                                endforeach;
                                ?>
                            </td>
                        <?php } ?>
                        <td class="ctr_a">
                            <?php
                            foreach ($nilai_p as $p) :
                                if ($p['tasm'] == $tasm)
                                    if ($p['id_mapel'] == $m['id_mapel']) {
                                        if ($p['tema'] == '-') {
                                            if (substr($p['jenis'], 0, 2) == 'PH') {
                                                echo ' <div>' . $p['no_kd'] . ' </div>';
                                            }
                                        }
                                    }
                            endforeach;
                            ?>
                        </td>
                        <td class="ctr_a">
                            <?php
                            foreach ($nilai_p as $p) :
                                if ($p['tasm'] == $tasm)
                                    if ($p['id_mapel'] == $m['id_mapel']) {
                                        if ($p['tema'] == '-') {
                                            if (substr($p['jenis'], 0, 2) == 'PH') {
                                                echo ' <div>' . $p['nilai'] . ' </div>';
                                            }
                                        }
                                    }
                            endforeach;
                            ?>
                        </td>
                        <!-- nilai PTS -->
                        <?php
                        $total_all_pts = 0;
                        $akd = array();
                        $all_kd = "";
                        $jum_kd = 0;
                        foreach ($nilai_p as $n) :
                            if ($n['tasm'] == $tasm)
                                if ($n['jenis'] == 'PTS') {
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
                                    }
                        ?>
                        <?php }
                        endforeach
                        ?>
                        <td class="ctr_a">
                            <?php
                            for ($i = 0; $i < $jum_kd; $i++) {
                                echo '<div>' . $akd[$i] . '</div>';
                            }
                            ?>
                        </td>
                        <td class="ctr_a">
                            <?php
                            if (!empty($nilai_pts)) {
                                for ($i = 0; $i < $jum_kd; $i++) {
                                    $total = 0;
                                    $jum_n = 0;
                                    foreach ($nilai_pts as $n) :
                                        if ($n['tasm'] == $tasm)
                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                if ($n['no_kd'] == $akd[$i]) {
                                                    $jum_n++;
                                                    $total =  $total + $n['nilai'];
                                                }
                                            }
                                    endforeach;
                                    $total_all_pts = (string)round($total / $jum_n, 0, PHP_ROUND_HALF_UP);
                                    echo '<div>' .  $total_all_pts . '</div>';
                                }
                            } else {
                                // echo $total_all_pts = 0;
                            }
                            ?>
                        </td>
                        <!-- end nilai PTS -->
                        <!-- end nilai pengetahuan -->
                        <!-- Praktik -->
                        <td class="ctr_a">
                            <?php
                            $kdprd = [];
                            foreach ($nilai_k as $n) :
                                if ($n['tasm'] == $tasm)
                                    if ($n['id_mapel'] == $m['id_mapel']) { ?>
                                    <?php if (substr($n['jenis'], 0, 7) == 'Praktik') : ?>
                                        <?php if (count($kdprd) == 0 || $kdprd[count($kdprd) - 1] != $n['no_kd']) {
                                                $kdprd[] = $n['no_kd'];
                                            } ?>
                                        <div><?= $n['no_kd']; ?></div>
                                    <?php endif ?>
                            <?php }
                            endforeach ?>
                        </td>
                        <td class="ctr_a">
                            <?php
                            $kp = 0;
                            for ($kp = 0; $kp < count($kdprd); $kp++) {
                                $max = [];
                                $maxall = [];
                                foreach ($nilai_k as $n) :
                                    if ($n['tasm'] == $tasm)
                                        if ($n['id_mapel'] == $m['id_mapel'] && $n['no_kd'] == $kdprd[$kp]) { ?>
                                        <?php if (substr($n['jenis'], 0, 7) == 'Praktik') : ?>
                                        <?php
                                                $maxall[] = round($n['nilai']);
                                            endif ?>
                            <?php }

                                endforeach;
                                echo '<div>' . max($maxall) . '</div>';
                            }
                            ?>
                        </td>
                        <!-- Praktik -->
                        <!-- Produk -->
                        <td class="ctr_a">
                            <?php
                            $kdprd = [];
                            foreach ($nilai_k as $n) :
                                if ($n['tasm'] == $tasm)
                                    if ($n['id_mapel'] == $m['id_mapel']) { ?>
                                    <?php if (substr($n['jenis'], 0, 6) == 'Produk') : ?>
                                        <?php if (count($kdprd) == 0 || $kdprd[count($kdprd) - 1] != $n['no_kd']) {
                                                $kdprd[] = $n['no_kd'];
                                            } ?>
                                        <div><?= $n['no_kd']; ?></div>
                                    <?php endif ?>
                            <?php }
                            endforeach ?>
                        </td>
                        <td class="ctr_a">
                            <?php
                            $kp = 0;
                            for ($kp = 0; $kp < count($kdprd); $kp++) {
                                $max = [];
                                $maxall = [];
                                foreach ($nilai_k as $n) :
                                    if ($n['tasm'] == $tasm)
                                        if ($n['id_mapel'] == $m['id_mapel'] && $n['no_kd'] == $kdprd[$kp]) { ?>
                                        <?php if (substr($n['jenis'], 0, 6) == 'Produk') : ?>
                                        <?php
                                                $maxall[] = round($n['nilai']);
                                            endif ?>
                            <?php }

                                endforeach;
                                echo '<div>' . max($maxall) . '</div>';
                            }
                            ?>
                        </td>
                        <!-- Produk -->
                        <!-- Projek -->
                        <td class="ctr_a">
                            <?php
                            $kdprd = [];
                            foreach ($nilai_k as $n) :
                                if ($n['tasm'] == $tasm)
                                    if ($n['id_mapel'] == $m['id_mapel']) { ?>
                                    <?php if (substr($n['jenis'], 0, 6) == 'Projek') : ?>
                                        <?php if (count($kdprd) == 0 || $kdprd[count($kdprd) - 1] != $n['no_kd']) {
                                                $kdprd[] = $n['no_kd'];
                                            } ?>
                                        <div><?= $n['no_kd']; ?></div>
                                    <?php endif ?>
                            <?php }
                            endforeach ?>
                        </td>
                        <td class="ctr_a">
                            <?php
                            $kp = 0;
                            for ($kp = 0; $kp < count($kdprd); $kp++) {
                                $max = [];
                                $maxall = [];
                                foreach ($nilai_k as $n) :
                                    if ($n['tasm'] == $tasm)
                                        if ($n['id_mapel'] == $m['id_mapel'] && $n['no_kd'] == $kdprd[$kp]) { ?>
                                        <?php if (substr($n['jenis'], 0, 6) == 'Projek') : ?>
                                        <?php
                                                $maxall[] = round($n['nilai']);
                                            endif ?>
                            <?php }

                                endforeach;
                                echo '<div>' . max($maxall) . '</div>';
                            }
                            ?>
                        </td>
                        <!-- Projek -->
                        <!-- Portofolio -->
                        <td class="ctr_a">
                            <?php
                            $kdprd = [];
                            foreach ($nilai_k as $n) :
                                if ($n['tasm'] == $tasm)
                                    if ($n['id_mapel'] == $m['id_mapel']) { ?>
                                    <?php if (substr($n['jenis'], 0, 10) == 'Portofolio') : ?>
                                        <?php if (count($kdprd) == 0 || $kdprd[count($kdprd) - 1] != $n['no_kd']) {
                                                $kdprd[] = $n['no_kd'];
                                            } ?>
                                        <div><?= $n['no_kd']; ?></div>
                                    <?php endif ?>
                            <?php }
                            endforeach ?>
                        </td>
                        <td class="ctr_a">
                            <?php
                            $kp = 0;
                            for ($kp = 0; $kp < count($kdprd); $kp++) {
                                $max = [];
                                $maxall = [];
                                foreach ($nilai_k as $n) :
                                    if ($n['tasm'] == $tasm)
                                        if ($n['id_mapel'] == $m['id_mapel'] && $n['no_kd'] == $kdprd[$kp]) { ?>
                                        <?php if (substr($n['jenis'], 0, 10) == 'Portofolio') : ?>
                                        <?php
                                                $maxall[] = round($n['nilai']);
                                            endif ?>
                            <?php }

                                endforeach;
                                echo '<div>' . max($maxall) . '</div>';
                            }
                            ?>
                        </td>
                        <!-- Portofolio -->
                        <!-- end nilai keterampilan -->

                    </tr>
                    <?php $no++ ?>
            <?php }
            endforeach ?>
            <!-- end nilai -->
        </tbody>
    </table>

</body>

</html>