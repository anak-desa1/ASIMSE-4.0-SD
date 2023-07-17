<div class="modal fade modal-action" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?= ucwords($this->uri->segment(4, 0)) ?> Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                        <h4 class="card-title">Data Siswa</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card-header text-center">
                                    <div class="form-group">
                                        <form action="" id="FormTingkat">
                                            <!-- <input type="hidden" name="" id="tingkat" value="<?= ucwords($this->uri->segment(4, 0)) ?>"> -->
                                            <div class="form-group">
                                                <label>Kelas Masuk<span class="symbol required"> </span></label>
                                                <select name="" id="tingkat" class="selectpicker form-control" data-live-search="true">
                                                    <option value="">Pilih Kelas</option>
                                                    <?php foreach ($kelas as $kel) {
                                                        echo '<option value="' . $kel['tingkat'] . '">' . $kel['nama'] . '</option>';
                                                    } ?>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-info">Tampil Siswa</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <form action="<?= base_url('akademik_rombel/atur_kelas/kelas_simpan'); ?>" method="post" enctype="multipart/form-data">
                                    <!-- <input type="hidden" name="id_kelas" value="<?= ucwords($this->uri->segment(4, 0)) ?>"> -->
                                    <input type="hidden" name="ta" value="<?= $ta ?>">
                                    <div class="form-group">
                                        <label>Nama Kelas <span class="symbol required"> </span></label>
                                        <input type="text" name="rombel" class="form-control">
                                    </div>
                                    <div class="card ">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="table-responsive" id="siswa">
                                                            <table class="table table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th class="text-center">#</th>
                                                                        <th>NIS </th>
                                                                        <th>Nama Lengkap</th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="bi bi-arrow-counterclockwise"></i> Tutup</button>
                                        <button type="submit" id="simpan" class="btn btn-primary"><i class="bi bi-save2"></i> Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>