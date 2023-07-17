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
        <p align="center"><b>PRESTASI SISWA</b>
            <br><?php echo "Kelas : " . $kelas['id_kelas'] . ", Nama Wali : " . $kelas['nama_lengkap']; ?>
        </p>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th width="5%" class="ctr">No</th>
                    <th width="35%">Nama</th>
                    <th width="15%" class="ctr">Jenis</th>
                    <th width="45%" class="ctr">Prestasi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $html = "";
                $no = 0;
                if (!empty($prestasi)) {
                    foreach ($prestasi as $p) {
                        $no++;
                        $html .= '<tr><td class="ctr">' . $no . '</td><td>' . $p['nmsiswa'] . '</td><td class="ctr">' . $p['jenis'] . '</td><td class="ctr">' . $p['keterangan'] . '</td></tr>';
                    }
                } else {
                    $html .= '<tr><td colspan="5"><div class="alert alert-info">Belum ada prestasi diinputkan</div></td></tr>';
                }
                echo $html;
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>