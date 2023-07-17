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
                            <div class="col-md-4">
                                <div class="card ">
                                    <form action="" id="FormTingkat-2">
                                        <div class="dropdown bootstrap-select">
                                            <div class="form-group">
                                                <label>Kelas Awal<span class="symbol required"> </span></label>
                                                <select name="" id="tingkat" class="selectpicker form-control" data-live-search="true">
                                                    <option value="">Pilih Kelas</option>
                                                    <?php foreach ($kelas as $kel) {
                                                        echo '<option value="' . $kel['tingkat'] . '">' . $kel['kelas'] . '</option>';
                                                    } ?>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Tampil Siswa</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <form action="<?= base_url('master_siswa/naik_kelas/simpan_naik'); ?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="th_active" value="<?= $ta ?>">
                                    <div class="form-group">
                                        <label>Naik Kelas<span class="symbol required"> </span></label>
                                        <select name="tingkat" id="tingkat" class="selectpicker form-control" data-live-search="true">
                                            <option value="">Pilih Kelas</option>
                                            <?php foreach ($kelas as $kel) {
                                                echo '<option value="' . $kel['tingkat'] . '">' . $kel['kelas'] . '</option>';
                                            } ?>
                                            <option value="Lulus">Lulus</option>
                                            <option value="Keluar">Keluar</option>
                                            <option value="Mutasi">Mutasi</option>
                                        </select>
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
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                        <button type="submit" id="simpan" class="btn btn-primary">Simpan</button>
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