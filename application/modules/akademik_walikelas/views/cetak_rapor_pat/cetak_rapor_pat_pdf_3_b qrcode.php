<!DOCTYPE html>
<html>

<head>
    <title><?= $header['nama'] ?></title>
    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/favicon_1.ico" />
    <style type="text/css">
        body {
            font-family: arial;
            font-size: 11pt;
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

        .ctr {
            /* text-align: justify; */
            /* text-align: right; */
            text-align: center;
            font-family: arial;
            font-size: 11pt;
            /* width: 50% */
        }

        .ctr_des {
            /* text-align: justify; */
            /* text-align: right; */
            text-align: center;
            font-family: arial;
            font-size: 11pt;
            width: 27%;
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
            font-size: 11pt;
        }

        .d {
            color: white;
        }

        .e {
            background: #92a8d1;
            text-align: center;
            font-family: arial;
            font-size: 11pt;
        }

        .f {
            padding: 5px 11px;
            border: 1px solid black;
        }

        .nilai {
            text-align: center;
            font-family: arial;
            font-size: 11pt;
        }
    </style>
</head>

<body>
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
    <?php if ($naik_kelas['naik'] == 'Y') {
        echo '                                              
            <div style="border: solid 1px #000; padding: 20px 10px; height: 50px; width: 100%"> 
                Keputusan: <br>
                Berdasarkan pencapaian seluruh kompetensi, peserta didik dinyatakan <br>
                Naik Kelas ' . $naik_kelas['kelas'] . ' *) 
            </div>
            ';
    } else {
        echo ' ';
    }
    ?>
    <?php if ($naik_kelas['naik'] == 'N') {
        echo ' 
         <div style="border: solid 1px #000; padding: 10px 10px; height: 40px; width: 100%"> 
                Keputusan: <br>
                Berdasarkan pencapaian seluruh kompetensi, peserta didik dinyatakan <br>
                Tetap di Kelas ' . $naik_kelas['kelas'] . ' *) 
            </div>
            ';
    } else {
        echo ' ';
    }
    ?>
    <?php if ($naik_kelas['naik'] == 'L') {
        echo ' 
         <div style="border: solid 1px #000; padding: 30px 10px; width: 100%"> 
                Keputusan: <br>
                Berdasarkan pencapaian seluruh kompetensi, peserta didik dinyatakan <br>
                Lulus*)
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
                    <br><br><br><br><br><br><br><br><br><br>
                    <u>...........................................</u>
                </td>
                <td width="2%"></td>
                <td width="10%">
                </td>
                <td width="7%"></td>
                <td width="65%">
                    <?= $kota['kota'] ?>, <span><?php echo format_indo(date($tahun['tgl_raport_pas_pat'])); ?></span><br>
                    Guru Kelas, <br>
                    <img style="width:150px;height:150px;" class="img-responsive" src="<?php echo base_url('assets/img/qrcode/') . $footer_1['nip'] . 'code.png'; ?>" /><br>
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
                    <img style="width:150px;height:150px;" class="img-responsive" src="<?php echo base_url('assets/img/qrcode/') . $tahun['nik'] . 'code.png'; ?>" /><br>
                    <u><?= $tahun['nama_kepsek'] ?></u>
                </td>
                <td width="2%"></td>
                <td width="36%">
            </tr>
        </tbody>
    </table>

</body>

</html>