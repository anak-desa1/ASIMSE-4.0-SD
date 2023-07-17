<!DOCTYPE html>
<html>

<head>
    <title>SURAT PESANAN</title>
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
    <br>
    <br>
    <br>
    <br>
    <br>
    <div style="text-align: center;">
        <h3><u>SURAT PESANAN</u></h3>
    </div>
    <table class="center">
        <tbody>
            <tr>
                <td width="72%">
                    <span></span><br>
                    <p class="p">Nomor : <?= $pesan['pesan_nofak'] ?></p>
                    <p class="p">Lampiran : <?= $pesan['pesan_lampiran'] ?></p>
                    <p class="p">Perihal : <?= $pesan['pesan_perihal'] ?></p>
                </td>
                <td width="28%">
                    <span></span><br>
                    <p class="p"><?= $sekolah['kota'] ?>, <?php echo format_indo(date($pesan['pesan_tanggal'])); ?></p>
                    Kepada Yth, <br>
                    <?= $pesan['suplier_nama'] ?><br>
                    di - <br>
                    &emsp; &emsp; Tempat <br>
                </td>
            </tr>
        </tbody>
    </table>

    <p>Sehubungan dengan kebutuhan /Kegiatan /Acara:</p>
    <table class="center">
        <tr>
            <td class="p" colspan="2">
                <p>Program</p>
            </td>
            <td> :</td>
            <td></td>
            <td class="p" colspan="4">
                <p><?= $pesan['pesan_program'] ?></p>
            </td>
        </tr>
        <tr>
            <td class="p" colspan="2">
                <p>Pesanan</p>
            </td>
            <td> :</td>
            <td></td>
            <td class="p" colspan="4">
                <p><?= $pesan['pesan_pesanan'] ?></p>
            </td>
        </tr>
        <tr>
            <td class="p" colspan="2">
                <p>Kegiatan</p>
            </td>
            <td> :</td>
            <td></td>
            <td class="p" colspan="4">
                <p><?= $pesan['pesan_kegiatan'] ?></p>
            </td>
        </tr>
        <tr>
            <td class="p" colspan="2">
                <p>Bulan</p>
            </td>
            <td> :</td>
            <td></td>
            <td class="p" colspan="4">
                <p><?= $pesan['pesan_bulan'] ?></p>
            </td>
        </tr>
        <tr>
            <td class="p" colspan="2">
                <p>Sub</p>
            </td>
            <td> :</td>
            <td></td>
            <td class="p" colspan="4">
                <p><?= $pesan['pesan_sub_kegiatan'] ?></p>
            </td>
        </tr>
        <tr>
            <td class="p" colspan="2">
                <p>Belanja</p>
            </td>
            <td> :</td>
            <td></td>
            <td class="p" colspan="4">
                <p><?= $pesan['pesan_belanja'] ?></p>
            </td>
        </tr>
    </table>

    <p>Dengan rincian sebagai berikut :</p>
    <table class="table table-bordered table-condensed" style="font-size:11px;margin-top:10px;">
        <thead>
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <!-- <th style="text-align:center;">Spesifikasi</th> -->
                <th style="text-align:center;">Jumlah</th>
                <th style="text-align:center;">Satuan</th>
                <th style="text-align:center;">Harga Satuan</th>
                <th style="text-align:center;">Jumlah Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            $subtotal = 0;
            $total = 0; ?>
            <?php foreach ($barang as $items) : ?>
                <tr>
                    <td><?= $items['barang_id']; ?></td>
                    <td><?= $items['barang_nama']; ?></td>
                    <td style="text-align:center;"><?php echo number_format($items['d_pesan_jumlah']); ?></td>
                    <td style="text-align:center;"><?= $items['barang_satuan']; ?></td>
                    <td style="text-align:center;"><?php echo number_format($items['d_pesan_harga']); ?></td>
                    <td style="text-align:right;"><?php echo number_format($subtotal = $items['d_pesan_jumlah'] * $items['d_pesan_harga']); ?></td>
                </tr>
                <?php $total += $subtotal ?>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" style="text-align:center;">Total</td>
                <td style="text-align:right;">Rp. <?php echo number_format($total); ?></td>
            </tr>
        </tfoot>
    </table>

    <p style="font: italic bold 12px/30px ">Terbilang : <?= ucwords(terbilang($total)) . " Rupiah"; ?></p>
    <p>Harga sudah termasuk pajak dan selanjutnya pembayaran ditagihkan kepada Kepala <?= $sekolah['nama_sekolah'] ?> Provinsi <?= $sekolah['provinsi'] ?>.</p>
    <p>Demikian disampaikan atas kerjasamanya diucapkan terimakasih.</p>

    <table>
        <thead> </thead>
        <tbody>
            <tr>
                <td width="2%"></td>
                <td width="70%"></td>
                <td width="2%"></td>
                <td width="20%"></td>
                <td width="7%"></td>
                <td width="65%">
                    <span></span><br>
                    <p style="font-weight: bold">KEPALA <?= $sekolah['nama_sekolah'] ?></p> <br>
                    <br><br><br>
                    <p style="font-weight: bold;text-decoration: underline"><?= $sekolah['sebutan_kepala'] ?></p>
                    <!-- NIP. -->
                    <p style="font-weight: bold">Pembina</p>
                    <p style="font-weight: bold">NIP.<?= $sekolah['nip'] ?></p>

                </td>
            </tr>
        </tbody>
    </table>

</body>

</html>