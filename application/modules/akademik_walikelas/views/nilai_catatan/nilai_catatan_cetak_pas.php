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
        <p align="center"><b>CATATAN WALIKELAS</b>
            <br><?php echo "Kelas : " . $kelas['rombel'] . ", Nama Wali : " . $kelas['nama_lengkap']; ?>
        </p>
        <table class="table">
            <thead>
                <tr>
                    <th width="3%">No</th>
                    <th width="15%">Nama</th>
                    <th width="10%">Naik</th>
                    <th width="20%">Catatan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $html = "";
                if (!empty($siswa_kelas)) {
                    $no = 0;
                    foreach ($siswa_kelas as $d) {
                        $no++;
                        $html .= '<tr><td class="ctr">' . $no . '</td><td>' . $d['nama'] . '</td><td class="ctr">' . $d['naik'] . '</td><td class="ctr">' . $d['catatan_wali'] . '</td></tr>';
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