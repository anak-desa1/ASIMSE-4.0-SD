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
    <div style="text-align: right;">
        <h3> No REG . <?= $siswa['no_daftar'] ?> </h3>
    </div>
    <div id=halaman>
        <h3 id=judul>SURAT PERNYATAAN ORANGTUA/WALI CALON SISWA</h3>
        <h3 id=judul><?= $sekolah['nama_sekolah'] ?></h3>
        <hr>

        <p>Yang bertanda tangan dibawah ini :</p>

        <table>
            <tr>
                <td style="width: 30%;" class="p1">Nama</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"> <u><?= $siswa['nama_ayah'] ?></u></td>
            </tr>
            <tr>
                <td style="width: 30%;" class="p1">No Telepon / HP</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"> <u><?= $siswa['no_hp_ayah'] ?></u></td>
            </tr>
            <tr>
                <td style="width: 30%;" class="p1">Alamat</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"> <u><?= $siswa['alamat'] ?></u> Kode Pos: <u><?= $siswa['kode_pos'] ?> </td>
            </tr>
            <tr>
                <td style="width: 30%;" class="p1">Pekerjaan</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"> <u><?= $siswa['pekerjaan_ayah']  ?></u></td>
            </tr>
        </table>
        <p>Selaku Orangtua / Wali dari Calon Siswa YPK ORA et LABORA, yang bernama:</p>
        <h3 id=judul><u><?= $siswa['nama'] ?></u></h3>

        <p>Apabila anak saya diterima sebagai siswa di Sekolah Kristen ORA et LABORA, maka dengan ini saya selaku Orangtua /
            Wali Siswa menyatakan hal-hal sebagai berikut:</p>
        <p class="p1">1. Sesuai dengan namanya sekolah asuhan YPK ORA et LABORA adalah sekolah Swasta Kristen, karena itu saya
            menyetujui dan tidak keberatan anak saya diberi pelajaran dan pendidikan Agama Kristen.</p>
        <p class="p1">2. Menjamin bahwa anak saya akan menaati setiap Peraturan dan Tata Tertib yang berlaku di sekolah tanpa
            pengecualian dan bersedia untuk menerima sanksi apabila anak saya tidak menaati dan melanggar peraturan sekolah
            maupun peraturan yang berlaku pada umumnya.</p>
        <table>
            <tr>
                <td colspan="4">3. Bersedia membayar biaya Pendidikan dengan rincian sebagai berikut:</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <p> a. Uang Pangkal Rp. _____________________________ </p>
                    <br>
                    <p> __ Cara Pembayaran :</p>
                    <br>
                    <p> _* <input type='checkbox' name='' /> Transfer </p>
                    <p> __ Rek. Bank Permata</p>
                    <p> __ An.Yayasan Pendidikan Kristen (YPK) ORA et LABORA </p>
                    <p> __ No. 0701706676 . </p>
                    <br>
                    <p> _* Kartu Kredit (0%) </p>
                    <p> __ <input type='checkbox' name='' /> Bank BCA : Tenor 3 & 6 bulan </p>
                    <p> __ <input type='checkbox' name='' /> Bank CIMBNIAGA : Tenor 12 bulan </p>
                    <p> __ <input type='checkbox' name='' /> Bank PERMATA : Tenor 6 bulan </p>
                    <p> __ Catatan : untuk pembayaran dengan <b><u>Kartu Kredit</u></b> dapat dilakukan di sekolah. </p>
                    <br>
                    <p> b. Uang Sekolah sebesar Rp. _________________________ / bulan selama 12 bulan setiap </p>
                    <p> __ Tahun Pelajaran ( Pembayaran dengan Virtual Account: <input type='checkbox' name='' /> Bank Permata, <input type='checkbox' name='' /> BCA ) </p>
                </td>
            </tr>
        </table>
        <p class="p1">4. Apabila saya tidak memenuhi persyaratan sebagaimana Ketentuan Penerimaan Siswa Baru, maka saya tidak akan
            menuntut pihak sekolah, apabila pendaftaran (penerimaan) diisi oleh calon siswa lain.</p>

        <p class="p1">5. Bahwa surat-surat dan dokumen yang saya serahkan adalah surat-surat dan dokumen yang sah dan benar, apabila
            dikemudian hari menurut keterangan pihak-pihak terkait, terbukti dokumen atau surat-surat tersebut dinyatakan
            tidak sah / palsu, maka saya bersedia menanggung resiko dan tidak keberatan anak saya dikeluarkan dari Sekolah.</p>

        <p class="p1">6. Apabila anak saya diterima sebagai siswa di Sekolah Kristen ORA et LABORA, saya menyatakan bahwa anak
            saya tidak akan pindah ke sekolah lain. Apabila ternyata anak saya tidak jadi masuk Sekolah Kristen ORA et
            Labora, maka segala akibatnya menjadi resiko dan tanggung jawab saya sendiri; (saya menyetujui bahwa semua
            pembayaran P3S yang telah dibayarkan kepada Sekolah Kristen ORA et LABORA, tidak akan saya minta
            kembali dengan alasan apapun).</p>

        <p class="p1">7. Apabila anak saya diluar sekolah sebagai pelaku / terlibat tidak kriminal yang dikuatkan oleh suatu keputusan
            Pengadilan, maka saya akan menanggung resiko apabila anak saya dikeluarkan oleh Pihak Sekolah.
        </p>

        <p class="p1">8. Menyetujui dan memberi ijin kepada Pimpinan Sekolah Kristen ORA et LABORA untuk sewaktu-waktu, tanpa
            pemberitahuan terlebih dahulu kepada saya, melakukan screening test (pemeriksaan laboratorium) dalam hal
            penyalahgunaan obat terlarang dan penggeledahan / razia terhadap anak saya. Apabilan ternyata anak saya terlibat
            baik langsung maupun tidak langsung dengan NARKOBA: Narkotika, Zat Adiktif dan Obat Terlarang, saya
            bersedia menerima sanksi yang dikeluarkan oleh Sekolah.</p>

        <p class="p1">9. Saya bersedia menanggung seluruh biaya pemeriksaan laboratorium atas anak saya yang dilakukan oleh Sekolah.</p>
        <br>



        <table style="width: 100%;">
            <tr>
                <td>
                    <!-- <br>
                    <br>
                    <div id=judul>MENGETAHUI<br>ORANG TUA/WALI
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div style="text-align: center;"><u><?= $siswa['nama_ayah'] ?></u></div> -->
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td style="width: 50%;">
                    <div style="text-align: center;">……………………, _______________ 20 ___</div>
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