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

        .ctr {
            text-align: center;
            font-family: arial;
            font-size: 10pt;
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
            font-size: 12pt;
        }

        .d {
            color: white;
        }

        .e {
            background: #92a8d1;
            text-align: center;
            font-family: arial;
            font-size: 10pt;
        }

        .f {
            padding: 5px 10px;
            border: 1px solid black;
        }
    </style>
</head>

<body>

    <div style="text-align: center;">
        <br>
        <br>
        <h3>IDENTITAS PESERTA DIDIK</h3>
    </div>
    <br>
    <br>
    <table class="center">
        <tr>
            <td class="p" colspan="2">
                <p>Nama Peserta Didik</p>
            </td>
            <td> :</td>
            <td></td>
            <td class="p" colspan="4">
                <p> <?= $siswa['nama'] ?></p>
            </td>
        </tr>
        <tr>
            <td class="p" colspan="2">
                <p>NISN/NIS</p>
            </td>
            <td> :</td>
            <td></td>
            <td class="p" colspan="4">
                <p> <?= $siswa['nisn'] ?>/<?= $siswa['nis'] ?></p>
            </td>
        </tr>
        <tr>
            <td class="p" colspan="2">
                <p>Tempat, Tanggal Lahir</p>
            </td>
            <td> :</td>
            <td></td>
            <td class="p" colspan="4">
                <p> <?= $siswa['tmp_lahir'] ?>, <?php echo ($siswa['tgl_lahir'] != 0) ? format_indo_a(date($siswa['tgl_lahir'])) : ''; ?> </p>
            </td>
        </tr>
        <tr>
            <td class="p" colspan="2">
                <p>Jenis Kelamin</p>
            </td>
            <td> :</td>
            <td></td>
            <td class="p" colspan="4">
                <p> <?php if ($siswa['jk'] == "P") {
                        echo "Perempuan";
                    } else {
                        echo 'Laki-Laki';
                    } ?></p>
            </td>
        </tr>
        <tr>
            <td class="p" colspan="2">
                <p>Agama</p>
            </td>
            <td> :</td>
            <td></td>
            <td class="p">
                <p> <?= $siswa['agama'] ?></p>
            </td>
        </tr>
        <tr>
            <td class="p" colspan="2">
                <p>Pendidikan sebelumnya</p>
            </td>
            <td> :</td>
            <td></td>
            <td class="p" colspan="4">
                <p> <?= $siswa['sek_asal'] ?></p>
            </td>
        </tr>
        <tr>
            <td class="p" colspan="2">
                <p>Alamat Peserta Didik</p>
            </td>
            <td> :</td>
            <td></td>
            <td class="p" colspan="4">
                <p> <?= $siswa['alamat'] ?></p>
            </td>
        </tr>
        <tr>
            <td class="p" colspan="2">
                <p>Nama Orangtua</p>
            </td>
            <td></td>
            <td></td>
            <td class="p" colspan="4"></td>
        </tr>
        <tr>
            <td class="p" colspan="2">
                <p>Ayah</p>
            </td>
            <td> :</td>
            <td></td>
            <td class="p" colspan="4">
                <p> <?= $siswa['ortu_ayah'] ?></p>
            </td>
        </tr>
        <tr>
            <td class="p" colspan="2">
                <p>Ibu</p>
            </td>
            <td> :</td>
            <td></td>
            <td class="p" colspan="4">
                <p> <?= $siswa['ortu_ibu'] ?></p>
            </td>
        </tr>
        <tr>
            <td class="p" colspan="2">
                <p>Pekerjaan Orangtua</p>
            </td>
            <td></td>
            <td></td>
            <td class="p" colspan="4"></td>
        </tr>
        <tr>
            <td class="p" colspan="2">
                <p>Ayah</p>
            </td>
            <td> :</td>
            <td></td>
            <td class="p" colspan="4">
                <p> <?= $siswa['ortu_ayah_pkj'] ?></p>
            </td>
        </tr>
        <tr>
            <td class="p" colspan="2">
                <p>Ibu</p>
            </td>
            <td> :</td>
            <td></td>
            <td class="p" colspan="4">
                <p> <?= $siswa['ortu_ibu_pkj'] ?></p>
            </td>
        </tr>
        <tr>
            <td class="p" colspan="2">
                <p>Alamat Orangtua</p>
            </td>
            <td></td>
            <td></td>
            <td class="p" colspan="4"></td>
        </tr>
        <tr>
            <td class="p" colspan="2">
                <p>Jalan</p>
            </td>
            <td> :</td>
            <td></td>
            <td class="p" colspan="4">
                <p> <?= $siswa['ortu_alamat'] ?></p>
            </td>
        </tr>
        <tr>
            <td class="p" colspan="2">
                <p>Kelurahan/Desa</p>
            </td>
            <td> :</td>
            <td></td>
            <td class="p" colspan="4">
                <p> <?= $sekolah['desa'] ?></p>
            </td>
        </tr>
        <tr>
            <td class="p" colspan="2">
                <p>Kecamatan</p>
            </td>
            <td> :</td>
            <td></td>
            <td class="p" colspan="4">
                <p> <?= $sekolah['kecamatan'] ?></p>
            </td>
        </tr>
        <tr>
            <td class="p" colspan="2">
                <p>Kabupaten/Kota</p>
            </td>
            <td> :</td>
            <td></td>
            <td class="p" colspan="4">
                <p> <?= $sekolah['kota'] ?></p>
            </td>
        </tr>
        <tr>
            <td class="p" colspan="2">
                <p>Provinsi</p>
            </td>
            <td> :</td>
            <td></td>
            <td class="p" colspan="4">
                <p> <?= $sekolah['provinsi'] ?></p>
            </td>
        </tr>
        <tr>
            <td class="p" colspan="2">
                <p>Wali Peserta Didik</p>
            </td>
            <td></td>
            <td></td>
            <td class="p" colspan="4"></td>
        </tr>
        <tr>
            <td class="p" colspan="2">
                <p>Nama</p>
            </td>
            <td> :</td>
            <td></td>
            <td class="p" colspan="4">
                <p> <?= $siswa['wali'] ?></p>
            </td>
        </tr>
        <tr>
            <td class="p" colspan="2">
                <p>Pekerjaan</p>
            </td>
            <td> :</td>
            <td></td>
            <td class="p" colspan="4">
                <p> <?= $siswa['wali_pkj'] ?></p>
            </td>
        </tr>
        <tr>
            <td class="p" colspan="2" style="width: 35%">
                <p>Alamat</p>
            </td>
            <td> :</td>
            <td></td>
            <td class="p" colspan="4">
                <p> <?= $siswa['wali_alamat'] ?></p>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <table>
        <tr>
            <td></td>
            <td colspan="3" style="text-align: center; margin: auto; height: 20%; width: 15%; border: 2px solid #121212; padding: 5px;">
                <p>Pas Foto Ukuran 3 X 4</p>
            </td>
            <td></td>
            <td></td>
            <td colspan="4">
                <p><?= $sekolah['kota'] ?>, <?= ($tahun['tgl_biodata'] != 0) ? format_indo_a(date($tahun['tgl_biodata'])): '';?></p>
                <p>Kepala Sekolah,</p>
                <br>
                <br>
                <br>
                <br>
                <u>
                    <p><?= $sekolah['sebutan_kepala'] ?></p>
                </u>
                <p>NIP.</p>
            </td>

        </tr>
    </table>

    <br>
    <br>
    <br>
    <br>
   
</body>

</html>