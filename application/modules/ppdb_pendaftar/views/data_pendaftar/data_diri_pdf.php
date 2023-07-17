<!DOCTYPE html>
<html>

<head>
    <title><?= $siswa['nama'] ?></title>
    <link rel="shortcut icon" href="<?= base_url() ?>panel/dist/upload/logo/<?= $sekolah['logo'] ?>" />
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
    </style>
</head>

<body>
    <div style="text-align: right;">
        <h3> No REG . <?= $siswa['no_daftar'] ?> </h3>
    </div>
    <div id=halaman>
        <h5><?= $sekolah['nama_sekolah'] ?><br><?= $sekolah['alamat'] ?></h5>
        <hr>
        <div style="text-align: center;">
            <h3> FORMULIR PENDAFTARAN </h3>
        </div>

        <p>Periode : <?= $siswa['periode'] ?> </p>

        <div class="table-responsiv">
            <table style="font-size: 12px" class="table table-striped table-bordered table-sm ">
                <tbody>
                    <tr>
                        <th class="e" width="90">FOTO SISWA</th>
                        <td class="e" colspan="2"><b>DATA PRIBADI SISWA</b></td>
                    </tr>
                    <tr>
                        <td rowspan="4"><img src="<?= base_url() ?>panel/dist/upload/avatar/avatar-3.png" width="120" /></td>
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
            <table>
                <tr>
                    <td class="p">Kelas Masuk</td>
                    <td class="p">:</td>
                    <td class="p"><u><?= $siswa['kelas']  ?></u></td>
                    <td class="p"></td>
                    <td class="p">Ukuran Baju</td>
                    <td class="p">:</td>
                    <td class="p"><u><?= $siswa['baju']  ?></u></td>
                </tr>
                <tr>
                    <td class="p">No NIK</td>
                    <td class="p">:</td>
                    <td class="p"><u><?= $siswa['nik']  ?></u></td>
                    <td class="p"></td>
                    <td class="p">No. Kartu Keluarga</td>
                    <td class="p">:</td>
                    <td class="p"><u><?= $siswa['no_kk']  ?></u></td>
                </tr>
                <tr>
                    <td class="p">Agama</td>
                    <td class="p">:</td>
                    <td class="p"> <u><?= $siswa['agama'] ?></u> </td>
                    <td class="p"></td>
                    <td class="p">Anak Ke</td>
                    <td class="p">:</td>
                    <td class="p"><u><?= $siswa['anak_ke']  ?></u></td>
                </tr>
                <tr>
                    <td class="p">No Handphone</td>
                    <td class="p">:</td>
                    <td class="p"> <u><i class="fab fa-whatsapp text-success"></i> <?= $siswa['no_hp']  ?></u></td>
                    <td class="p"></td>
                    <td class="p">Saudara</td>
                    <td class="p">:</td>
                    <td class="p"><u><?= $siswa['saudara']  ?></u></td>
                </tr>
                <tr>
                    <td class="p">Asal Sekolah</td>
                    <td class="p">:</td>
                    <td class="p"><u><?= $siswa['asal_sekolah']  ?></u> </td>
                    <td class="p"></td>
                    <td class="p">Tinggi Badan (Cm)</td>
                    <td class="p">:</td>
                    <td class="p"><u><?= $siswa['tinggi']  ?></u></td>
                </tr>
                <tr>
                    <td class="p">Alamat Siswa</td>
                    <td class="p">:</td>
                    <td class="p"><u><?= $siswa['alamat']  ?></u> </td>
                    <td class="p"></td>
                    <td class="p">Berat Badan (Kg)</td>
                    <td class="p">:</td>
                    <td class="p"><u><?= $siswa['berat']  ?></u></td>
                </tr>
                <tr>
                    <td class="p">RT / RW</td>
                    <td class="p">:</td>
                    <td class="p"><u><?= $siswa['rt']  ?>, <?= $siswa['rw']  ?></u> </td>
                    <td class="p"></td>
                    <td class="p">Berat Badan (Kg)</td>
                    <td class="p">:</td>
                    <td class="p"><u><?= $siswa['berat']  ?></u></td>
                </tr>
                <tr>
                    <td class="p">Desa</td>
                    <td class="p">:</td>
                    <td class="p"><u><?= $siswa['desa']  ?></u> </td>
                    <td class="p"></td>
                    <td class="p">Status Dalam Keluarga</td>
                    <td class="p">:</td>
                    <td class="p"><u><?= $siswa['status_keluarga']  ?></u></td>
                </tr>
                <tr>
                    <td class="p">Kecamatan</td>
                    <td class="p">:</td>
                    <td class="p"><u><?= $siswa['kecamatan']  ?></u> </td>
                    <td class="p"></td>
                    <td class="p">Tinggal Bersama</td>
                    <td class="p">:</td>
                    <td class="p"><u><?= $siswa['tinggal']  ?></u></td>
                </tr>
                <tr>
                    <td class="p">Kota / Kabupaten</td>
                    <td class="p">:</td>
                    <td class="p"><u><?= $siswa['kota']  ?></u> </td>
                    <td class="p"></td>
                    <td class="p">Jarak KeSekolah (Meter)</td>
                    <td class="p">:</td>
                    <td class="p"><u><?= $siswa['jarak']  ?></u></td>
                </tr>
                <tr>
                    <td class="p">Provinsi</td>
                    <td class="p">:</td>
                    <td class="p"><u><?= $siswa['provinsi']  ?></u> </td>
                    <td class="p"></td>
                    <td class="p">Waktu Tempuh (Menit)</td>
                    <td class="p">:</td>
                    <td class="p"><u><?= $siswa['waktu']  ?></u></td>
                </tr>
                <tr>
                    <td class="p">Kode Pos</td>
                    <td class="p">:</td>
                    <td class="p"><u><?= $siswa['kode_pos']  ?></u></td>
                    <td class="p"></td>
                    <td class="p">No. KIP</td>
                    <td class="p">:</td>
                    <td class="p"><u><?= $siswa['no_kip']  ?></u></td>
                </tr>
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
        </div>
</body>

</html>