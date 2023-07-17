<!DOCTYPE html>
<html>

<head>
    <title>Cetak Nilai Sikap Spiritual</title>
    <style type="text/css">
        body {
            font-family: arial;
            font-size: 12pt
        }

        .table {
            border-collapse: collapse;
            border: solid 1px #999;
            width: 100%
        }

        .table tr td,
        .table tr th {
            border: solid 1px #999;
            padding: 3px;
            font-size: 12px
        }

        .rgt {
            text-align: right;
        }

        .ctr {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="table-responsive">
        <p align="center"><b>NILAI EKSTRAKURIKULER</b>
            <br><?php echo "Kelas : " . $kelas['id_kelas'] . ", Nama Wali : " . $kelas['nama_lengkap']; ?>
        </p>
        <table class="table">
            <thead>
                <tr>
                    <th width="5%" rowspan="2">No</th>
                    <th width="30%" rowspan="2">Nama</th>
                    <th width="20%" rowspan="2">Ekstrakurikuler</th>
                    <th width="50%" colspan="2">Nilai</th>
                </tr>
                <tr>
                    <th width="10%">Nilai</th>
                    <th width="40%">Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $html = "";
                if (!empty($nilai)) {
                    $no = 0;
                    foreach ($nilai as $n) {
                        $no++;
                        $html .= '<tr><td class="ctr">' . $no . '</td><td>' . $n['nmsiswa'] . '</td><td class="ctr">' . $n['nmeks'] . '</td><td class="ctr">' . $n['nilai'] . '</td><td class="ctr">' . $n['desk'] . '</td></tr>';
                    }
                } else {
                    $html .= '<tr><td colspan="5">Belum ada data</td></tr>';
                }
                echo $html;
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>