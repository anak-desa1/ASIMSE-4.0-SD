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
            padding-top: 10px;
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
    <div style="text-align: right;">
        <h3> No REG . <?= $siswa['no_daftar'] ?> </h3>
    </div>
    <div id=halaman>
        <div style="text-align: justify;">
            <ol>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li>
                    Bahwa surat-surat dan dokumen yang saya serahkan adalah surat-surat dan dokumen yang sah dan benar, apabila
                    dikemudian hari menurut keterangan pihak-pihak terkait, terbukti dokumen atau surat-surat tersebut dinyatakan
                    tidak sah / palsu, maka saya bersedia menanggung resiko dan tidak keberatan anak saya dikeluarkan dari Sekolah.
                </li>
                <li>
                    Apabila anak saya diterima sebagai siswa di Sekolah Kristen ORA et LABORA, saya menyatakan bahwa anak
                    saya tidak akan pindah ke sekolah lain. Apabila ternyata anak saya tidak jadi masuk Sekolah Kristen ORA et
                    Labora, maka segala akibatnya menjadi resiko dan tanggung jawab saya sendiri; (saya menyetujui bahwa semua
                    pembayaran P3S yang telah dibayarkan kepada Sekolah Kristen ORA et LABORA, tidak akan saya minta
                    kembali dengan alasan apapun).
                </li>
                <li>
                    Apabila anak saya diluar sekolah sebagai pelaku / terlibat tidak kriminal yang dikuatkan oleh suatu keputusan
                    Pengadilan, maka saya akan menanggung resiko apabila anak saya dikeluarkan oleh Pihak Sekolah.
                </li>
                <li>
                    Menyetujui dan memberi ijin kepada Pimpinan Sekolah Kristen ORA et LABORA untuk sewaktu-waktu, tanpa
                    pemberitahuan terlebih dahulu kepada saya, melakukan screening test (pemeriksaan laboratorium) dalam hal
                    penyalahgunaan obat terlarang dan penggeledahan / razia terhadap anak saya. Apabilan ternyata anak saya terlibat
                    baik langsung maupun tidak langsung dengan NARKOBA: Narkotika, Zat Adiktif dan Obat Terlarang, saya
                    bersedia menerima sanksi yang dikeluarkan oleh Sekolah.
                </li>
                <li>
                    Saya bersedia menanggung seluruh biaya pemeriksaan laboratorium atas anak saya yang dilakukan oleh Sekolah.
                </li>
            </ol>
        </div>
        <table style="width: 100%;">
            <tr>
                <td>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td style="width: 50%;">
                    <div style="text-align: center;">……………………, __________________ 20 ______</div>
                    <br>
                    <div id=judul>Yang menyatakan,</div>
                    <br>
                    <br>
                    <div style="text-align: center;">Meterai<br>Rp.10.000,-</div>
                    <br>
                    <br>
                    <div style="text-align: center;"><u><?= $siswa['nama_ayah'] ?></u></div>
                    <div style="text-align: center;">Nama Jelas Orangtua/Wali</div>
                </td>
            </tr>
        </table>

    </div>
</body>

</html>