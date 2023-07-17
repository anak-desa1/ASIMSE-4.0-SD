<!DOCTYPE html>
<html>

<head>
    <title><?= $vaksin['nama_siswa'] ?></title>
    <style type="text/css">
        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>
    <?php if ($vaksin['vaksin_2'] == '') { ?>
        Belum mengikuti vaksin 2
    <?php } else { ?>
        <img src="<?= base_url() ?>panel/dist/upload/sertifikat_vaksin/<?= $vaksin['vaksin_2'] ?>" alt="..." style="width:900%;max-width:1000px">
    <?php } ?>
</body>

</html>