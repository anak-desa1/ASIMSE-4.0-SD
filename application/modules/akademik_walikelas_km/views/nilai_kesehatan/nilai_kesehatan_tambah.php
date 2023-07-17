<div class="modal fade modal-action" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?= ucwords($this->uri->segment(4, 0)) ?> Data </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                        <h4 class="card-title"><?= $pegawai['nama_pegawai'] ?></h4>
                    </div>
                    <div class="card-body">
                        <?php if ($pegawai['kd_sekolah'] == $pegawai['kd_sekolah']) : ?>
                            <form method="post" action="<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') . 'simpan_data' ?>" role="form" id="form-action" enctype="multipart/form-data">
                                <div class="row">
                                    <input type="hidden" name="tasm" value="<?= $tahun['tahun'] ?>">
                                    <input type="hidden" name="semester" value="<?= $tahun['semester'] ?>">
                                    <input type="hidden" name="id_siswa" value="<?= $siswa['id_siswa']; ?>">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Nama Siswa <span class="symbol required"> </span></label>
                                            <input type="text" class="form-control" value="<?= $siswa['id_siswa']; ?> | <?= $siswa['nmsiswa']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Aspek Fisik <span class="symbol required"> </span></label>
                                            <input type="text" class="form-control" name="aspek_fisik">
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan <span class="symbol required"> </span></label>
                                            <input type="text" class="form-control" name="keterangan">
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                            <button type="submit" id="simpan" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    $("#select_box").change(function() {
        var nilai = $(this).val()
        var desk = "";
        if (nilai === "A") {
            desk = "Memuaskan, aktif megikuti kegiatan  mingguan";
        } else if (nilai === "B") {
            desk = "Cukup memuaskan, aktif mengikuti kegiatan  mingguan";
        } else if (nilai === "C") {
            desk = "Kurang memuaskan, pasif mengikuti kegiatan  mingguan";
        } else {
            desk = "-";
        }
        $("#pnilai").val(desk);
    });
</script>