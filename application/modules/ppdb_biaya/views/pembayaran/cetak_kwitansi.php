<!DOCTYPE html>
<html>

<head>
    <title><?= $siswa['nama'] ?></title>
    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/favicon_1.ico" />
    <style type="text/css">
        body {
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-size: 11pt;
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
            text-align: center;
        }
    </style>
</head>

<body>

    <h3><?= $sekolah['nama_sekolah'] ?><br><?= $sekolah['alamat'] ?></h3>
    <hr>
    <div style="text-align: center;">
        <h3><u>BUKTI PEMBAYARAN PPDB</u></h3>
    </div>
    <p>No. Pendaftaran : <?= $siswa['no_daftar'] ?> <br>Periode : <?= $siswa['periode'] ?> </p>

    <div class="table-responsiv">
        <table class="table table-striped table-bordered table-sm ">
            <tbody>
                <tr>
                    <th class="e" width="90">FOTO SISWA</th>
                    <td class="e" colspan="2"><b>DATA PRIBADI SISWA</b></td>
                </tr>
                <tr>
                    <td rowspan="4"><img src="<?php base_url() ?>panel/assets/img/avatar/avatar-3.png" width="120" /></td>
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
        <table class="table table-striped table-bordered table-sm ">
            <thead>
                <tr>
                    <th class="text-center"> # </th>
                    <th>Nama Biaya</th>
                    <th>Periode</th>
                    <th>Jumlah Biaya</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $jum = 0;
                $no = 0;
                foreach ($biaya as $bi) {
                    $no++;
                ?>
                    <tr>
                        <td class="f"><?= $no; ?></td>
                        <td><?= $bi['nama_biaya'] ?></td>
                        <td class="f"><?= $bi['periode'] ?></td>
                        <td>
                            <?php
                            $a = $bi['jumlah'];
                            echo "Rp " . number_format($a, 0, ",", ".");
                            ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
                <tr>
                    <td></td>
                    <td><b>Total Biaya</b></td>
                    <td></td>
                    <td> <?= "Rp " . number_format($total, 0, ",", ".")  ?></td>
                </tr>
            </tbody>
        </table>
        <br>
        <table class="table table-striped table-bordered table-sm ">
            <thead>
                <tr>
                    <th class="text-center">
                        #
                    </th>
                    <th>Kode Transaksi</th>
                    <th>Periode</th>
                    <th>Pembayaran</th>
                    <th>Jumlah Bayar</th>
                    <th>Tgl Bayar</th>
                    <th>Verifikasi</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $no = 0;
                foreach ($bayar as $b) {
                    $no++;
                ?>
                    <tr>
                        <td class="f"><?= $no; ?></td>
                        <td class="f"><?= $b['id_bayar'] ?></td>
                        <td class="f"><?= $b['periode'] ?></td>
                        <td class="f"><?= $b['keterangan'] ?></td>
                        <!-- <td scope="row" width="200"><?= $b['nama'] ?></td> -->
                        <td><?= "Rp " . number_format($b['jumlah'], 0, ",", ".") ?></td>
                        <td class="f"><?= $b['tgl_bayar'] ?></td>
                        <td class="f">
                            <?php if ($b['verifikasi'] == 1) { ?>
                                <span class="badge badge-success">Pembayaran diterima</span>
                            <?php } else { ?>
                                <span class="badge badge-warning">Proses Cek</span>
                            <?php } ?>
                        </td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>

        <?php
        $sisa = ($total + $jum) - $total_bayar['total'];
        ?>
        <br>
        <table class="table table-striped table-bordered table-sm">
            <tbody>
                <tr>
                    <td class="f">TOTAL PEMBAYARAN</td>
                    <td class="f"><?= "Rp " . number_format($total_bayar['total'], 0, ",", ".") ?></td>
                </tr>
                <tr>
                    <td class="f"> SISA BAYAR</td>
                    <td class="f"><?= "Rp " . number_format($sisa, 0, ",", ".") ?></td>
                </tr>
                <tr>
                    <td class="f">STATUS</td>
                    <td class="f">
                        <?php if ($sisa <= 0) { ?>
                            <span class="badge badge-success">SUDAH LUNAS</span>
                        <?php } else { ?>
                            <span class="badge badge-danger">BELUM LUNAS</span>
                        <?php } ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>