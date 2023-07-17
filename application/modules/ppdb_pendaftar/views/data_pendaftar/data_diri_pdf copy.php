<!DOCTYPE html>
<html>

<head>
    <title><?= $siswa['nama'] ?></title>
    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/favicon_1.ico" />
    <style type="text/css">
        body {
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-size: 12pt;
            width: 100%;
        }

        .table {
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

        .e {
            background: #92a8d1;
            text-align: center;
            font-family: arial;
            font-size: 10pt;
        }

        .p {
            font-family: 'Times New Roman', Times, serif;
            font-size: 11pt;
        }

        .f {
            font-family: 'Times New Roman', Times, serif;
            font-size: 10pt;
        }
    </style>
</head>

<body>

    <h3><?= $sekolah['nama_sekolah'] ?><br><?= $sekolah['alamat'] ?></h3>
    <hr>
    <div style="text-align: center;">
        <h3> FORMULIR PENDAFTARAN </h3>
    </div>
    <p>No. Pendaftaran : <?= $siswa['no_daftar'] ?> <br>Periode : <?= $siswa['periode'] ?> </p>

    <div class="table-responsiv">
        <table style="font-size: 12px" class="table table-striped table-bordered table-sm ">
            <tbody>
                <tr>
                    <th class="e" width="90">FOTO SISWA</th>
                    <td class="e" colspan="2"><b>DATA PRIBADI SISWA</b></td>
                </tr>
                <tr>
                    <td rowspan="4"><img src="http://localhost/ppdb/assets/img/avatar/avatar-3.png" width="120" /></td>
                    <td class="p"><b>NISN</b></td>
                    <td class="p"> <?= $siswa['nisn'] ?></td>
                </tr>

                <tr>
                    <td class="p"><b>Nama Lengkap</b></td>
                    <td class="p"> <?= $siswa['nama'] ?></td>
                </tr>
                <tr>
                    <td class="p"><b>Tempat Tgl Lahir</b></td>
                    <td class="p"> <?= $siswa['tempat_lahir'] ?>, <?= $siswa['tgl_lahir'] ?></td>
                </tr>
                <tr>
                    <td class="p"><b>Jenis Kelamin</b></td>
                    <td class="p"> <?= ($siswa['jenkel'] == 'L') ? "Laki-Laki" : "Perempuan"; ?></td>
                </tr>

            </tbody>
        </table>
        <br>
        <table style="font-size: 12px" class="table table-striped table-bordered table-sm">
            <tbody>
                <tr>
                    <td class="f" style="width: 150px"><b>Kelas Masuk</b></td>
                    <td class="f"> <?= $siswa['kelas']  ?></td>
                    <td class="f"><b>Ukuran Baju</b></td>
                    <td class="f"> <?= $siswa['baju']  ?></td>
                </tr>
                <tr>
                    <td class="f" style="width: 150px"><b>No NIK</b></td>
                    <td class="f"> <?= $siswa['nik']  ?></td>
                    <td class="f"><b>No. Kartu Keluarga</b></td>
                    <td class="f"> <?= $siswa['no_kk']  ?></td>
                </tr>
                <tr>
                    <td class="f"><b>Agama</b></td>
                    <td class="f"> <?= $siswa['agama'] ?></td>
                    <td class="f"><b>Anak Ke</b></td>
                    <td class="f"> <?= $siswa['anak_ke']  ?></td>
                </tr>
                <tr>
                    <td class="f"><b>No Handphone</b></td>
                    <td class="f"> <i class="fab fa-whatsapp text-success"></i> <?= $siswa['no_hp']  ?></td>
                    <td class="f"><b>Saudara</b></td>
                    <td class="f"> <?= $siswa['saudara']  ?></td>
                </tr>
                <tr>
                    <td class="f"><b>Asal Sekolah</b></td>
                    <td class="f"> <?= $siswa['asal_sekolah']  ?></td>
                    <td class="f"><b>Tinggi Badan (Cm)</b></td>
                    <td class="f"> <?= $siswa['tinggi']  ?></td>
                </tr>
                <tr>
                    <td class="f"><b>Alamat Siswa</b></td>
                    <td class="f"> <?= $siswa['alamat']  ?></td>
                    <td class="f"><b>Berat Badan (Kg)</b></td>
                    <td class="f"> <?= $siswa['berat']  ?></td>
                </tr>
                <tr>
                    <td class="f"><b>RT / RW</b></td>
                    <td class="f"> <?= $siswa['rt']  ?>, <?= $siswa['rw']  ?></td>
                    <td class="f"><b>Berat Badan (Kg)</b></td>
                    <td class="f"> <?= $siswa['berat']  ?></td>
                </tr>
                <tr>
                    <td class="f"><b>Desa</b></td>
                    <td class="f"> <?= $siswa['desa']  ?></td>
                    <td class="f"><b>Status Dalam Keluarga</b></td>
                    <td class="f"> <?= $siswa['status_keluarga']  ?></td>
                </tr>
                <tr>
                    <td class="f"><b>Kecamatan</b></td>
                    <td class="f"> <?= $siswa['kecamatan']  ?></td>
                    <td class="f"><b>Tinggal Bersama</b></td>
                    <td class="f"> <?= $siswa['tinggal']  ?></td>
                </tr>
                <tr>
                    <td class="f"><b>Kota / Kabupaten</b></td>
                    <td class="f"> <?= $siswa['kota']  ?></td>
                    <td class="f"><b>Jarak KeSekolah (Meter)</b></td>
                    <td class="f"> <?= $siswa['jarak']  ?></td>
                </tr>
                <tr>
                    <td class="f"><b>Provinsi</b></td>
                    <td class="f"> <?= $siswa['provinsi']  ?></td>
                    <td class="f"><b>Waktu Tempuh (Menit)</b></td>
                    <td class="f"> <?= $siswa['waktu']  ?></td>
                </tr>
                <tr>
                    <td class="f"><b>Kode Pos</b></td>
                    <td class="f"> <?= $siswa['kode_pos']  ?></td>
                    <td class="f"><b>No. KIP</b></td>
                    <td class="f"> <?= $siswa['no_kip']  ?></td>
                </tr>

            </tbody>
        </table>
        <br>
        <table style="font-size: 12px" class="table table-bordered table-striped table-sm ">
            <tbody>
                <tr>
                    <td class="f" style="width: 150px"><i class="fas fa-user-friends"></i> <b>Data Orang Tua</b></td>
                    <td class="f"><i class="fas fa-user-friends"></i> <b>Data Ayah</b></td>
                    <td class="f"><i class="fas fa-user-friends"></i> <b>Data Ibu</b></td>
                    <td class="f"><i class="fas fa-user-friends"></i> <b>Data Wali</b></td>
                </tr>
                <tr>
                    <td class="f"><b>NIK</b></td>
                    <td class="f"> <i class="fas fa-id-card text-success"></i> <?= $siswa['nik_ayah'] ?></td>
                    <td class="f"> <i class="fas fa-id-card text-success"></i> <?= $siswa['nik_ibu'] ?></td>
                    <td class="f"> <i class="fas fa-id-card text-success"></i> <?= $siswa['nik_wali'] ?></td>
                </tr>
                <tr>
                    <td class="f"><b>Nama Lengkap</b></td>
                    <td class="f"> <?= $siswa['nama_ayah'] ?></td>
                    <td class="f"> <?= $siswa['nama_ibu'] ?></td>
                    <td class="f"> <?= $siswa['nama_wali'] ?></td>
                </tr>
                <tr>
                    <td class="f"><b>Tempat Tgl Lahir</b></td>
                    <td class="f"> <?= $siswa['tempat_ayah'] ?>, <?= $siswa['tgl_lahir_ayah'] ?></td>
                    <td class="f"> <?= $siswa['tempat_ibu'] ?>, <?= $siswa['tgl_lahir_ibu'] ?></td>
                    <td class="f"> <?= $siswa['tempat_wali'] ?>, <?= $siswa['tgl_lahir_wali'] ?></td>
                </tr>
                <tr>
                    <td class="f"><b>Pendidikan</b></td>
                    <td class="f"> <?= $siswa['pendidikan_ayah']  ?></td>
                    <td class="f"> <?= $siswa['pendidikan_ibu']  ?></td>
                    <td class="f"> <?= $siswa['pendidikan_wali']  ?></td>
                </tr>
                <tr>
                    <td class="f"><b>Pekerjaan</b></td>
                    <td class="f"> <?= $siswa['pekerjaan_ayah']  ?></td>
                    <td class="f"> <?= $siswa['pekerjaan_ibu']  ?></td>
                    <td class="f"> <?= $siswa['pekerjaan_wali']  ?></td>
                </tr>
                <tr>
                    <td class="f"><b>Penghasilan</b></td>
                    <td class="f"> <?= $siswa['penghasilan_ayah']  ?></td>
                    <td class="f"> <?= $siswa['penghasilan_ibu']  ?></td>
                    <td class="f"> <?= $siswa['penghasilan_wali']  ?></td>
                </tr>
                <tr>
                    <td class="f"><b>No Hp</b></td>
                    <td class="f"> <i class="fab fa-whatsapp text-success"></i> <?= $siswa['no_hp_ayah']  ?></td>
                    <td class="f"> <i class="fab fa-whatsapp text-success"></i> <?= $siswa['no_hp_ibu']  ?></td>
                    <td class="f"> <i class="fab fa-whatsapp text-success"></i> <?= $siswa['no_hp_wali']  ?></td>
                </tr>
            </tbody>
        </table>
</body>

</html>