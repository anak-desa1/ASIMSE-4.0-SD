<div class="card-header">
    <span style="float: right">
        <a target="_blank" href="<?= base_url() ?>ainformasi/print_lulus/<?= $lulus['lulus_id'] ?>" type="button" class="btn btn-success btn-right"><i class="fas fa-print"></i> Cetak SKL</a>
    </span>
    <h2>INFORMASI DATA KELULUSAN </h2>
</div>
<div class="card-body">
    <div class="activities">


        <div class="activity">
            <div class="activity-detail">
                <div class="container">
                    <?php if ($lulus['nis'] == 0) { ?>
                        Belum ada informasi
                    <?php } else { ?>
                        <div class="row">
                            <div class="col-4">NO SURAT</div>
                            <div class="col-8">: <?= $lulus['no_surat'] ?></div>
                        </div>
                        <div class="row">
                            <div class="col-4">TAHUN PELAJARAN</div>
                            <div class="col-8">: <?= $lulus['tahun_pelajaran'] ?></div>
                        </div>

                        <div class="row">
                            <div class="col-4">NAMA</div>
                            <div class="col-8">: <?= $lulus['nama_siswa'] ?></div>
                        </div>
                        <div class="row">
                            <div class="col-4">TEMPAT / TGL LAHIR</div>
                            <div class="col-8">: <?= $lulus['tempat_lahir'] ?>, <?php echo format_indo_a(date($lulus['tanggal_lahir'])); ?></div>
                        </div>
                        <div class="row">
                            <div class="col-4">NIS</div>
                            <div class="col-8">: <?= $lulus['nis'] ?></div>
                        </div>
                        <div class="row">
                            <div class="col-4">NISN</div>
                            <div class="col-8">: <?= $lulus['nisn'] ?></div>
                        </div>
                        <!--<div class="row">-->
                        <!--    <div class="col-4">ALAMAT</div>-->
                        <!--    <div class="col-8">: <?= $lulus['alamat_siswa'] ?></div>-->
                        <!--</div>-->
                        <div class="row">
                            <div class="col-4">KETERANGAN</div>
                            <div class="col-8">: <?= $lulus['keterangan'] ?></div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>