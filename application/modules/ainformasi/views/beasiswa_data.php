<div class="card-header">
    <!-- <span style="float: right">
        <a target="_blank" href="<?= base_url() ?>ainformasi/mpdf_cetak/<?= $vaksin['nik'] ?>" type="button" class="btn btn-success btn-right"><i class="fas fa-print"></i> Download Sertifikat</a>
    </span> -->
    <h2>INFORMASI DATA BEASISWA </h2>
</div>
<div class="card-body">
    <div class="activities">


        <div class="activity">
            <div class="activity-detail">
                <div class="container">
                    <?php if ($beasiswa['nis'] == 0) { ?>
                        Belum ada informasi
                    <?php } else { ?>
                        <div class="row">
                            <div class="col-4">NIS</div>
                            <div class="col-8">: <?= $beasiswa['nis'] ?></div>
                        </div>
                        <div class="row">
                            <div class="col-4">Nama Siswa</div>
                            <div class="col-8">: <?= $beasiswa['nama_siswa'] ?></div>
                        </div>
                        <div class="row">
                            <div class="col-4">Tahun Pelajaran</div>
                            <div class="col-8">: <?= $beasiswa['th_pelajaran'] ?></div>
                        </div>
                        <div class="row">
                            <div class="col-4">Keterangan</div>
                            <div class="col-8">: <?= $beasiswa['keterangan'] ?></div>
                        </div>
                    <?php } ?>


                </div>
            </div>
        </div>
    </div>
</div>