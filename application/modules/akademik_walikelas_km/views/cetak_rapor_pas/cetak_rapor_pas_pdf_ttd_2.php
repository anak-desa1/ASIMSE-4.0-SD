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
    <br>
    <table class="table" style="border: solid 1px #000; padding: 20px 11px; width: 110%">
        <tr>
            <td class="e">No.</td>
            <td class="e">Ekstrakurikuler</td>
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
    <table class="table" style="border: solid 1px #000; padding: 20px 11px; width: 110%">
        <tr>
            <td class="e">No.</td>
            <td class="e">Prestasi Siswa</td>
            <td class="e">Keterangan</td>
        </tr>
        <?php $no = 1 ?>
        <?php foreach ($prestasi as $ek) : { ?>
                <tr>
                    <td width="5%" class="ctr"> <?= $no ?>.</td>
                    <td class="ctr"><?= $ek['jenis'] ?></td>
                    <td class="ctr"><?= $ek['keterangan'] ?></td>
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
    <div>
        <b>Catatan Wali Kelas</b>
    </div>
    <table class="table">
        <tr>
            <td width="20%" style="border: solid 1px #000; padding: 20px 11px; height: 50px; width: 100%">
                <?= $catatan['catatan_wali'] ?>
            </td>
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