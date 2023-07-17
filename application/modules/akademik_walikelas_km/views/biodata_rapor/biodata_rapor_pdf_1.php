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
            font-size: 10pt;
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
            SEKOLAH DASAR<br>
            (SD)
        </h3>
    </div>
    <br>
    <br>
    <div style="text-align: center;">
        <img src="<?= base_url(); ?>panel/dist/upload/logo/<?= $logo['logo'] ?>" style="display: block; margin-left: auto;margin-right: auto; width:30%">
    </div>
    <br>
    <br>
    <div style="text-align: center;">
        <p>Nama Peserta Didik:</p>
    </div>
    <div class="center" style="text-align: center; margin: auto; width: 60%; border: 2px solid #121212; padding: 5px;">
        <h3><?= $siswa['nama'] ?></h3>
    </div>
    <br>
    <div style="text-align: center;">
        <p>NISN/NIS</p>
    </div>
    <div class="center" style="text-align: center; margin: auto; width: 60%; border: 2px solid #121212; padding: 5px;">
        <h3><?= $siswa['nisn'] ?>/<?= $siswa['nis'] ?></h3>
    </div>
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
    <div style="text-align: center;">
        KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN<br>
        REPUBLIK INDONESIA
    </div>

</body>

</html>