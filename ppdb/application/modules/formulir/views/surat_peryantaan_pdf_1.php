<!DOCTYPE html>

<head>
    <title><?= $siswa['nama'] ?></title>
    <meta charset="utf-8">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
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

        #judul {
            text-align: center;
            font-size: 14px;
        }

        #halaman {
            width: auto;
            height: auto;
            /* position: absolute; */
            border: 1px solid;
            padding-top: 30px;
            padding-left: 30px;
            padding-right: 30px;
            padding-bottom: 10px;
        }

        .p1 {
            font-family: "Times New Roman", Times, serif;
            text-align: justify;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div id=halaman>
        <h3 id=judul>SURAT PERNYATAAN SISWA/SISWI</h3>
        <h3 id=judul><u><?= $sekolah['nama_sekolah'] ?></u></h3>

        <p>Yang bertanda tangan dibawah ini :</p>

        <table>
            <tr>
                <td style="width: 30%;" class="p1">NAMA LENGKAP</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"><u><?= $siswa['nama'] ?></u></td>
            </tr>
            <tr>
                <td style="width: 30%;" class="p1">TEMPAT / TGL LAHIR</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"><u><?= $siswa['tempat_lahir'] ?>, <?= $siswa['tgl_lahir'] ?></u></td>
            </tr>
            <tr>
                <td style="width: 30%;" class="p1">JENIS KELAMIN</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"><u><?= ($siswa['jenkel'] == 'L') ? "Laki-Laki" : "Perempuan"; ?></u></td>
            </tr>
            <tr>
                <td style="width: 30%;" class="p1">AGAMA</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"><u><?= $siswa['agama'] ?></u></td>
            </tr>
            <tr>
                <td style="width: 30%;" class="p1">NOMOR PENDAFTARAN</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"><u><?= $siswa['no_daftar'] ?></u></td>
            </tr>
            <tr>
                <td style="width: 30%;" class="p1">NAMA ORANG TUA</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"><u><?= $siswa['nama_ayah'] ?></u></td>
            </tr>
            <tr>
                <td style="width: 30%;" class="p1">PEKERJAAN ORANG TUA</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"><u><?= $siswa['pekerjaan_ayah']  ?></u></td>
            </tr>
            <!-- <tr>
                <td style="width: 30%;">AGAMA ORANG TUA</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">_________________________________________</td>
            </tr> -->
        </table>

        <p>Dengan sungguh – sungguh dan penuh kesadaran:</p>

        <h3 id=judul>MENYATAKAN</h3>

        <p class="p1">Selama menjadi siswa/Siswi <?= $sekolah['nama_sekolah'] ?>, saya berjanji :</p>
        <p class="p1">Sanggup menaati dan mematuhi peraturan tata tertib pelajar <?= $sekolah['nama_sekolah'] ?>.</p>
        <!--<p class="p1">2. Apabila terbukti hamil atau menghamili (Bukan Korban Paksaan) maka, saya bersedia dikembalikan Kepada orang tua saya.</p>-->
        <p class="p1">Demikian Surat Pernyataan ini saya buat dengan sebenar-benarnya dan dengan penuh tanggung jawab serta diketahui orang tua / wali *) saya.</p>
        <br>
        <table style="width: 100%;">
            <tr>
                <td>
                    <br>
                    <!--<br>-->
                    <div id=judul>MENGETAHUI<br>ORANG TUA/WALI
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div style="text-align: center;"><u><?= $siswa['nama_ayah'] ?></u></div>
                    <!--<div style="text-align: center;">Nama Jelas</div>-->
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td style="width: 50%;">
                    <div style="text-align: center;">........, ......................<p><?= substr($tahun['tahun'],0,-5) ?></p></div>
                    <br>
                    <div id=judul>YANG MEMBUAT<br>PERNYATAAN</div>
                    <br>
                    <br>
                    <div style="text-align: center;">Materai 10000</div>
                    <br>
                    <br>
                    <div style="text-align: center;"><u><?= $siswa['nama'] ?></u></div>
                    <!--<div style="text-align: center;">Nama Jelas</div>-->
                </td>
            </tr>
        </table>

    </div>
</body>

</html>