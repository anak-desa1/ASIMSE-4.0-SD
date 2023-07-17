<!DOCTYPE html>
<html>

<head>
    <title>Cetak Nilai Absensi</title>
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
    <p align="center"><b>REKAP ABSENSI PAS</b>
        <br><?php echo "Kelas : " . $kelas['rombel'] . ", Nama Wali : " . $pegawai['nama_pegawai']; ?>
    </p>
    <table class="table">
        <thead>
            <tr>
                <th width="3%">No</th>
                <th width="5%">Kelas</th>
                <th width="37%">Nama</th>
                <th width="20%">Sakit</th>
                <th width="20%">Izin</th>
                <th width="20%">Tanpa Keterangan</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $html = "";
            if (!empty($siswa_kelas)) {
                $no = 0;
                foreach ($siswa_kelas as $d) {
                    $no++;

                    $html .= '<tr><td class="ctr">' . $no . '</td><td>' . $d['rombel'] . '</td><td>' . $d['nama'] . '</td><td class="ctr">' . $d['s'] . '</td><td class="ctr">' . $d['i'] . '</td><td class="ctr">' . $d['a'] . '</td></tr>';
                }
            } else {
                $html .= '<tr><td colspan="5">Belum ada data</td></tr>';
            }
            echo $html;
            ?>
        </tbody>
    </table>
</body>

</html>