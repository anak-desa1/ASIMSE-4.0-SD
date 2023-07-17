<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>

    <title><?= $lulus['nama_siswa'] ?></title>

    <!-- General CSS Files -->   
    <style>
        @page {
            margin-top: 0 px !important;
            margin-bottom: 0 px !important;

        }

        .styled-table {
            border-collapse: collapse;
            margin: 25px;
            font-size: 11px;

            min-width: 400px;
            width: 100%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .styled-table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }

        .styled-table th,
        .styled-table td {
            padding: 4px 7px;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }
    </style>



</head>

<body>

    <div>
    <center>
        <img src="<?= base_url(); ?>panel/dist/upload/logo/<?= $publish['logo'] ?>" alt="..." style="width:100%;max-width:750px">
    </center>  
    </div>
     
    <div>        
        <center>  
        <div style="padding-left:50px;margin-right:50px ;" class="col-md-12">  
            <h3 style="text-align: center">
                <u>SURAT KETERANGAN LULUS</u> <br>
                NO : <?= $lulus['no_surat'] ?>
            </h3>      
       
        <p>
            Yang bertanda tangan dibawah ini Kepala <?= $sekolah['nama_sekolah'] ?> <br>
            Menerangkan dengan sesungguhnya bahwa : <br>
        </p>

            <table style="margin-left: 80px;margin-right:80px" class="table table-sm table-bordered">
                <tr>
                    <td>NAMA</td>
                    <td>:</td>
                    <td><b><?= $lulus['nama_siswa'] ?></b></td>
                </tr>
                <tr>
                    <td>NIS </td>
                    <td>:</td>
                    <td><?= $lulus['nis'] ?></td>
                </tr> 
                <tr>
                    <td>NISN</td>
                    <td>:</td>
                    <td><?= $lulus['nisn'] ?></td>
                </tr> 
                <tr>
                    <td>TEMPAT / TGL LAHIR</td>
                    <td>:</td>
                    <td><?= $lulus['tempat_lahir'] ?>, <?= format_indo_a($lulus['tanggal_lahir'])?></td>
                </tr>           
                <tr>
                    <td>ALAMAT</td>
                    <td>:</td>
                    <td><?= $lulus['alamat_siswa'] ?></td>
                </tr> 
            </table>
            <br>  
            <p>Telah Mengikuti Ujian Sekolah  pada Tahun Pelajaran <?= $lulus['tahun_pelajaran'] ?> Dan dinyatakan </p>      
            <h3 style="text-align: center"><?= $lulus['keterangan'] ?></h3>              
            <p>Demikian Surat Keterangan ini di buat agar dipergunakan sebagaimana mestinya.</p>     
        </div>      
        </center>
    </div>

    <table width="100%">
            <tr>
                <td style="text-align: center;width:180px">                   
                </td>
                <td style="text-align: center;width:180px">                  
                </td>
                <td style="text-align: center">
                    <?=$publish['kota']?>, <?php echo format_indo_a(date(substr($publish['tanggal_publis'], 0, 10))); ?><br>
                    KEPALA SEKOLAH
                    <br>
                    <img src="<?= base_url(); ?>panel/dist/upload/logo/<?= $publish['ttd_kepsek'] ?>" alt="..." style="width:100%;max-width:210px">
                    <br>                
                    <u><b><?= $sekolah['sebutan_kepala'] ?></b></u><br>
                    PEMBINA <br>
                    NIP. <?= $sekolah['nip'] ?>                    
                </td>

            </tr>
        </table>       
   
</body>
</html>