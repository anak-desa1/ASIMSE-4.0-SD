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
                        <h4 class="card-title">Walikelas</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="" role="form" id="form-action" enctype="multipart/form-data">
                            <input type="hidden" name="tasm" value="<?= $ta ?>">
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="card ">
                                        <div class="form-group">
                                            <label>Guru Kelas<span class="symbol required"> </span></label>
                                            <select class="form-control select2" style="width: 100%;" id="" name="id_kelas">
                                                <option value="">Pilih Kelas</option>
                                                    <?php foreach ($kelas as $kel) {
                                                        echo '<option value="' . $kel['rombel'] . '">' . $kel['rombel'] . '</option>';
                                                    } ?>
                                            </select>
                                        </div>                                            
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card ">                                       
                                        <div class="dropdown bootstrap-select">
                                            <div class="form-group">
                                                <label>Guru Mapel<span class="symbol required"> </span></label>
                                                <select class="form-control select2" style="width: 100%;" id="id_guru" name="id_guru">
                                                    <option value="">Pilih Guru</option>
                                                    <?php foreach ($guru as $gr) {
                                                        echo '<option value="' . $gr['nik'] . '">' . $gr['nama_lengkap'] . '</option>';
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer justify-content-between">
                                    <button type="submit" id="simpan" class="btn btn-primary"><i class="bi bi-save2"></i> Simpan</button>
                                </div>        
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>