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
                                    <div class="col-sm-12">
                                        <input type="hidden" name="tasm" value="<?= $tahun['tahun'] ?>">
                                        <div class="form-group">
                                            <label>Nama Siswa <span class="symbol required"> </span></label>
                                            <select class="form-control select2" style="width: 100%;" id="id_siswa" name="id_siswa" required>
                                                <option value="">Pilih Siswa</option>
                                                <?php foreach ($siswa as $s) {
                                                    echo '<option value="' . $s['nis'] . '">' . $s['nama'] . '</option>';
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Ekstrakurikuler <span class="symbol required"> </span></label>
                                            <select class="form-control" style="width: 100%;" id="id_ekstra" name="id_ekstra" required>
                                                <option value="">Pilih Ekstrakurikuler</option>
                                                <?php foreach ($ekskul as $e) {
                                                    echo '<option value="' . $e['id'] . '">' . $e['nama'] . '</option>';
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nilai <span class="symbol required"> </span></label>
                                            <select name="nilai" class="form-control" id="select_box" required>
                                                <option value="">Pilih Nilai</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Deskripsi <span class="symbol required"> </span></label>
                                            <input type="text" class="form-control" name="desk" id="pnilai" readonly>
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
    // $("#select_box").change(function() {
    //     var pnilai = $("#pnilai").val($(this).val());
    // });
    $("#select_box").change(function() {
        var nilai = $(this).val()
        var desk = "";
        if (nilai === "A") {
            desk = "Sangat Memuaskan, Sangat aktif mengikuti kegiatan mingguan";
        } else if (nilai === "B") {
            desk = "Memuaskan, Aktif mengikuti kegiatan mingguan";
        } else if (nilai === "C") {
            desk = "Cukup Memuaskan, Cukup aktif mengikuti kegiatan mingguan";
        } else {
            desk = "-";
        }
        $("#pnilai").val(desk);
    });
</script>