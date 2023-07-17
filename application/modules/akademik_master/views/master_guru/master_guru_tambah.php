<div class="modal fade modal-action" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?= ucwords($this->uri->segment(3, 0)) ?> Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nik" class="col-sm-3 control-label">Nama</label>
                        <div class="col-sm-8">
                            <form action="" id="FormGuru">
                                <div class="dropdown bootstrap-select">
                                    <select class="form-control select2" style="width: 100%;" name="data" id="data" required>
                                        <option>-- Pilih Nama --</option>
                                        <?php
                                        foreach ($p_guru as $pg) {
                                            echo "<option value=" . $pg['data_id'] . ">" . $pg['nama_lengkap'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Tampil Guru</button>
                                <div class="col-md-4 mb-3"></div>
                            </form>
                        </div>
                    </div>

                    <form method="post" action="" role="form" id="form-action" enctype="multipart/form-data">
                     
                        <!-- tampil data guru -->
                        <div class="mb-3" id="guru">
                            <div class="mb-3">
                                <label for="jk" class="col-sm-3 control-label">ID</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="jk" class="col-sm-3 control-label">Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <!-- end tampil data guru -->
                        <div class="mb-3">
                            <label for="jabatan" class="col-sm-3 control-label">Jenis PTK</label>
                            <div class="col-sm-8">
                                <?php echo form_dropdown('jabatan', $p_jabatan, '', 'class="form-control" required id="jabatan"'); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="jk" class="col-sm-3 control-label">Jenis Kelamin</label>
                            <div class="col-sm-8">
                                <?php echo form_dropdown('jk', $p_jk, '', 'class="form-control" required id="jk"'); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="is_bk" class="col-sm-3 control-label">Guru BK..?</label>
                            <div class="col-sm-8">
                                <?php echo form_dropdown('is_bk', $p_isbk, '', 'class="form-control" required id="is_bk"'); ?>
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