<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>

    <title>Bukti_<?= $siswa['nama'] ?></title>

    <!-- General CSS Files -->
    <style type="text/css">
        body {
            font-family: arial;
            font-size: 11pt;
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
            /* text-align: justify; */
            /* text-align: right; */
            text-align: center;
            font-family: arial;
            font-size: 11pt;
            /* width: 50% */
        }

        .ctr_des {
            /* text-align: justify; */
            /* text-align: right; */
            text-align: center;
            font-family: arial;
            font-size: 11pt;
            width: 27%
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
            text-align: center;
            font-family: arial;
            font-size: 11pt;
        }

        .e {
            background: #92a8d1;
            text-align: center;
            font-family: arial;
            font-size: 11pt;
        }
    </style>


</head>

<body>
    <h3><?= $sekolah['nama_sekolah'] ?></h3>
    <p><small> <?= $sekolah['alamat'] ?></small></p>
    <hr>

    <div>
        <h3><u>BUKTI PEMBAYARAN PSB</u></h3>
        <p>
            NO TRANSAKSI : <?= $siswa['id_bayar'] ?><br>
            NAMA SISWA : <?= $siswa['nama'] ?>
        </p>
    </div>
    <!-- <h5>Telah Terima dari :</h5> -->
    <table class="table table-sm">
        <thead>
            <tr class="e">
                <th>No</th>
                <th>Periode</th>
                <th>Pembayaran</th>
                <th>Jumlah Bayar</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0;
            foreach ($bayar as $bayar) :
                $no++ ?>
                <tr>
                    <td class="p"><?= $no ?></td>
                    <td class="p"><?= $bayar['periode'] ?></td>
                    <td class="p"><?= $bayar['keterangan'] ?></td>
                    <td class="p"><?= "Rp " . number_format($bayar['jumlah'], 2, ",", ".") ?></td>
                    <td class="p"><?= $bayar['tgl_bayar'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <div class="row">
        <div>
            <h4>Terbilang : <?= terbilang($bayar['jumlah'], 2) ?></h4>
            <small>Print Date : <?= date('Y-m-d H:i:s') ?></small>
        </div>
        <!-- <div style="text-align: right">
            <img src="<?= $tempdir . $id_bayar . '.png' ?>" />
        </div> -->
    </div>
</body>

</html>