<!DOCTYPE html>
<html>

<head>
    <title><?= $header['nama'] ?></title>
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
            font-size: 10pt;

        }

        .ctr_b {
            text-align: '';
            font-family: arial;
            font-size: 10pt;
        }

        .ctr {
            text-align: center;
            font-family: arial;
            font-size: 13pt;
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
            font-size: 8pt;
        }

        .d {
            color: white;
        }

        .e {
            background: #92a8d1;
            text-align: center;
            font-family: arial;
            font-size: 9pt;
            text-align: center;
            font-family: arial;
        }

        .f {
            padding: 5px 10px;
            border: 1px solid black;
        }
    </style>
</head>

<body>
       <table>
        <tr>
            <td colspan="4" class="p">* Keterangan Rapor</td>
        </tr>
        <tr>
            <td class="p">* KD</td>
            <td class="p">:</td>
            <td class="p">Kompetensi Dasar</td>
            <td class="p">* PH</td>
            <td class="p">:</td>
            <td class="p">Penilaian Harian</td>
            <td class="p">* PTS</td>
            <td class="p">:</td>
            <td class="p">Penilaian Tengah Semester</td>
        </tr>
        <tr>
            <td class="p">* Prak</td>
            <td class="p">:</td>
            <td class="p">Praktik</td>
            <td class="p">* Prod</td>
            <td class="p">:</td>
            <td class="p">Produk</td>
            <td class="p">* Proj</td>
            <td class="p">:</td>
            <td class="p">Projek</td>
            <td class="p">* Port</td>
            <td class="p">:</td>
            <td class="p">Portofolio</td>
        </tr>
    </table>
    <br>

    <b>KETIDAKHADIRAN</b>
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

    <b>CATATAN WALI KELAS</b>
    <br>
    <div style="border: solid 1px #000; padding: 20px 10px; width: 100%">
        <?= $catatan['catatan_wali'] ?>
    </div>
    <br>

    <b>TANGGAPAN ORANGTUA/WALI</b>
    <br>
    <div style="border: solid 1px #000; padding: 20px 10px; height: 40px; width: 100%">
    </div>
    <br />
    <table>
        <thead> </thead>
        <tbody>
            <tr>
                <td width="2%"></td>
                <td width="50%" align="center">
                    Mengetahui : <br>
                    Orang Tua/Wali, <br>
                    <br><br><br><br>
                    <u>...........................................</u>
                </td>
                <td width="2%"></td>
                <td width="20%"></td>
                <td width="5%"></td>
                <td width="60%" align="center">
                    <?= $kota['kota'] ?>, <span><?php echo format_indo(date($tahun['tgl_biodata'])); ?></span><br>
                    Guru Kelas, <br>
                    <br><br><br><br>
                    <u>
                        <p class="font-size: 50%;"><?= $footer_1['nama_lengkap'] ?></p>
                    </u>
                    <!-- NIP. -->
                </td>
            </tr>
        </tbody>
    </table>
    <br />
    <br />
    <table>
        <thead> </thead>
        <tbody>
            <tr>
                <td width="0"></td>
                <td width="18%"></td>
                <td width="21%"></td>
                <td width="60%" align="center">
                    Mengetahui, <br>
                    Kepala Sekolah <br>
                    <br><br><br><br>
                    <u> 
                    <p class="font-size: 50%;"><?= $tahun['nama_kepsek'] ?></p>
                    </u>
                </td>
               
            </tr>
        </tbody>
    </table>
</body>

</html>