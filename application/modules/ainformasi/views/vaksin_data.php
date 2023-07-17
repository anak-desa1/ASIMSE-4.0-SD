<div class="card-header">
    <span style="float: right">
        <a target="_blank" href="<?= base_url() ?>ainformasi/mpdf_cetak/<?= $vaksin['nik'] ?>" type="button" class="btn btn-success btn-right"><i class="fas fa-print"></i> Download Sertifikat</a>
    </span>
    <h2>DATA VAKSIN </h2>
</div>
<div class="card-body">
    <div class="activities">


        <div class="activity">
            <div class="activity-detail">
                <div class="container">
                    <div class="row">
                        <div class="col-4">NIK</div>
                        <div class="col-8">: <?= $vaksin['nik'] ?></div>
                    </div>
                    <div class="row">
                        <div class="col-4">NAMA</div>
                        <div class="col-8">: <?= $vaksin['nama_siswa'] ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card-header">
    <h2>SERTIFIKAT VAKSIN 1 </h2>
</div>
<div class="card-body">
    <div class="activities">
        <div class="activity">
            <div class="activity-detail">
                <div>
                    <?php if ($vaksin['vaksin_1'] == '') { ?>
                        Belum mengikuti vaksin 1
                    <?php } else { ?>
                        <img src="<?= base_url() ?>panel/dist/upload/sertifikat_vaksin/<?= $vaksin['vaksin_1'] ?>" alt="..." class="img-fluid">
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card-header">
    <h2>SERTIFIKAT VAKSIN 2 </h2>
</div>
<div class="card-body">
    <div class="activities">
        <div class="activity">
            <div class="activity-detail">
                <div>
                    <?php if ($vaksin['vaksin_2'] == '') { ?>
                        Belum mengikuti vaksin 2
                    <?php } else { ?>
                        <img src="<?= base_url() ?>panel/dist/upload/sertifikat_vaksin/<?= $vaksin['vaksin_2'] ?>" alt="..." class="img-fluid">
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>