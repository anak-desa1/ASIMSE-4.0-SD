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
        <h3>RAPOR<br>
            PESERTA DIDIK<br>
            SEKOLAH DASAR (SD)<br>
        </h3>
    </div>
    <br>
    <br>
    <br>
    <br>
    <table class="center">
        <tr>
            <td class="p" colspan="2">
                <p>Nama Sekolah</p>
            </td>
            <td> :</td>
            <td></td>
            <td class="p" colspan="4">
                <p> <?= $sekolah['nama_sekolah'] ?></p>
            </td>
        </tr>
        <tr>
            <td class="p" colspan="2">
                <p>NPSN</p>
            </td>
            <td> :</td>
            <td></td>
            <td class="p" colspan="4">
                <p> <?= $sekolah['npsn'] ?></p>
            </td>
        </tr>
        <tr>
            <td class="p" colspan="2">
                <p>NSS/NDS</p>
            </td>
            <td> :</td>
            <td></td>
            <td class="p" colspan="4">
                <p> <?= $sekolah['nss'] ?>/<?= $sekolah['nds'] ?></p>
            </td>
        </tr>
        <tr>
            <td class="p" colspan="2">
                <p>Alamat Sekolah</p>
            </td>
            <td> :</td>
            <td></td>
            <td class="p" colspan="4">
                <p> <?= $sekolah['alamat_s'] ?></p>
            </td>
        </tr>
        <tr>
            <td class="p" colspan="2">
                <p>Kode Pos</p>
            </td>
            <td> :</td>
            <td></td>
            <td class="p">
                <p> <?= $sekolah['kodepos'] ?></p>
            </td>
            <td class="p">
                <p>Telp.</p>
            </td>
            <td class="p">
                <p> : <?= $sekolah['telp'] ?></p>
            </td>
        </tr>
        <tr>
            <td class="p" colspan="2">
                <p>Kelurahan/Desa</p>
            </td>
            <td> :</td>
            <td></td>
            <td class="p" colspan="4">
                <p><?= $sekolah['desa'] ?></p>
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
                <p>Website</p>
            </td>
            <td> :</td>
            <td></td>
            <td class="p" colspan="4">
                <p> <?= $sekolah['web'] ?></p>
            </td>
        </tr>
        <tr>
            <td class="p" colspan="2">
                <p>E-mail</p>
            </td>
            <td> :</td>
            <td></td>
            <td class="p" colspan="4">
                <p> <?= $sekolah['email'] ?></p>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

</body>

</html>