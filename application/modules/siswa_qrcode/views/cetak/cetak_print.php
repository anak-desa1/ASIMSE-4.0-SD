<?php foreach ($siswa as $s) : ?>
    <div style="width: 850px;height: 260px;margin-bottom: -12px;padding:; background-image: url('<?= base_url() ?>panel/assets/img/blangko/<?= $blangko["gambar"]; ?>');">
        <!--foto siswa -->
        <img style="margin-left: 280px; border: 1px solid #fff; position: absolute; margin-top: 102px; width: 130px; height: 150px; overflow: hidden; border-radius: 15%;" class="img-responsive img" src="<?= base_url() ?>panel/assets/img/foto/<?= $s->nis; ?>.png">
        <!--logo sekolah -->
        <img style="position: absolute; margin-left: 40px; margin-top: 10px; width: 50px;" src="<?= base_url() ?>panel/dist/upload/logo/<?= $sekolah["logo"]; ?>">
        <!--nama yayasan -->
        <p style="color: #fff; position: absolute; padding-left: 60px; padding-top: 8px; width:380px; height: 45px; text-transform: uppercase;text-align: center;letter-spacing: 2px; font-size: 11px; text-transform: uppercase;  font-family: Tahoma, Verdana, sans-serif;"><b><?= $sekolah["nama_sekolah"]; ?></b></p>
        <p style="color: #fff; position: absolute;padding-left: 100px; padding-top: 23px; width:605px; height: 70px;text-transform: capitalize; text-align: left;letter-spacing: 2px;font-size: 10px"><b><?= $sekolah["alamat"]; ?></b></p>
        <!--nama sekolah -->
        <p style="color: #fff; position: absolute;padding-left: 100px; padding-top: 35px; width:405px; height: 70px;text-transform: capitalize; text-align: left;letter-spacing: 2px;font-size: 10px"> <b>Telp : <?= $sekolah["telp"]; ?> Kode Pos : <?= $sekolah["kodepos"]; ?></b> </p>
        <p style="color: #090910; position: absolute;padding-left: 105px; padding-top: 53px; width:405px; height: 70px;text-transform: capitalize; text-align: left;letter-spacing: 2px;font-size: 10px"></p>
        <!--batas waktu -->
        <p style="letter-spacing: 2px;margin-left: 135px;padding-top: 80px; width: 240px; text-align: left; font-size: 18px"><b>KARTU PELAJAR</b></p>
        <p style="letter-spacing: 2px; margin-left: 150px; padding-top: 100px;width: 240px; text-align: left; font-size: 15px"></p>
        <!--web site -->
        <p style="color: #fff;font-family: arial;font-size: 11px; position: absolute; margin-left: 300px; margin-top: 112px; width: 83px; height:30px; text-align:center; position: center; float: center"><b></b></p>
        <!--qrcode siswa -->
        <img style="margin-left: 20px; solid #fff;position: absolute; margin-top: -80px; width: 100px; height: 100px;" src="<?= base_url() ?>panel/assets/img/qrcode/<?= $s->nis; ?>code.png">
        <!-- <table cellspacing="0em" style="margin-left: 28px; margin-top: -23px;  padding-left: 0px; position: relative; font-family: arial; font-size: 11px; transition-property: 2px; width: 275px; height: 130px;"> -->
        <table cellspacing="0em" style="margin-left: 20px; margin-top: -130px; padding-left: 0px; position: relative; transition-property: 2px; font-family: arial; height: 50px;">
            <tr>
                <td></td>
                <td><b style="font-size: 12px;  text-transform: uppercase;  font-family: Tahoma, Verdana, sans-serif;"><?= $s->nama; ?></b></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td><b style="font-size: 12px;"><?= $s->tmp_lahir; ?>, <?= format_indo_a(date($s->tgl_lahir)); ?></b></td>
                <td></td>
            </tr>            
        </table>
        <table cellspacing="0em" style="margin-left: 125px; margin-top: -5px; padding-left: 0px; position: relative; transition-property: 2px; font-family: arial; height: 90px;">
            <tr>
                <td></td>
                <td>
                    <b style="font-size: 18px;"><?= $s->nis; ?></b>
                    <br>
                    <b style="font-size: 18px;"><?= $s->nisn; ?></b>
                </td>
                <td></td>
            </tr>  
        </table>
        <!--hieder belakang -->
        <p style="margin-top: -230px; padding-left: 560px; padding-top: 40px;font-size: 11px;"> <b style="font-size: 12px;">TATA TERTIB SEKOLAH</b> </p>
        <!--isi belakang -->
        <ol style="padding-left: 480px;font-family: arial;font-size: 11px;text-align: justify;padding-right: 25px;margin-top: -8px;">
            <li>Kartu ini berlaku untuk masuk ke perpustakaan dan meminjam buku</a></li>
            <li>Kartu ini berlaku selama yang bersangkutan menjadi pelajar di <?= $sekolah["nama_sekolah"]; ?></li>
            <li>Bagi yang menemukan kartu ini mohon mengembalikan ke alamat <?= $sekolah["nama_sekolah"]; ?></li>
        </ol>
        <!--ttd belakang -->
        <p style="margin-left: 495px;font-family: arial;font-size: 11px;text-align: center;padding-right: 45px;width: 35%;margin-top: 15px;"><?= $blangko['kota'] ?>, <?= format_indo_a(date($blangko['ttd_date'])); ?><br><b>Kepala Sekolah</b><br><br><br><br><b><?= $blangko["kepsek"]; ?></b></p>
        <img style="margin-left: 550px;font-family: arial;padding-right: 30px;width: 140px; height: 90px; margin-top: -85px;position: absolute;" src="<?= base_url() ?>panel/assets/img/tandatangan/<?= $blangko['ttd'] ?>">
        <!-- <img style="border-radius: 2px;border:4px solid #fff;margin-left: 500px;font-family: arial;font-size: 10px;text-align: justify;width: 70px;margin-top: -90px;position: absolute;" src="<?= base_url() ?>assets/img/qrcode/"> -->
        <!--footer belakang -->
        <p style="color: #fff; margin-left: 360px; font-family: arial; font-size: 11px; text-align: center; padding-right: 25px; width: 55%; margin-top: 15px;position: absolute;"><b>&copy; <?= date('Y') ?></b> <?= $sekolah['web'] ?></p>
    </div>
<?php
endforeach ?>