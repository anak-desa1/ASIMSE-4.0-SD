<div class="modal fade modal-edit" id="modal-lg">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-lg">
                <div class="card card-primary card-outline">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Lulus</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- /.card-header -->
                    <form method="post" action="<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') ?>/simpan_editlulus" role="form" id="form-action" enctype="multipart/form-data">
                        <div class="card-body">
                            <input type="hidden" name="lulus_id" value="<?= $lulus['lulus_id'] ?>">
                            <div class="modal-body">
                            <div class="row">                                   
                                <div class="col-8">
                                    <div class="mb-3">
                                        <label for="no_surat">No Surat</label>
                                        <input type="text" name="no_surat" value="<?= $lulus['no_surat'] ?>" class="form-control"  placeholder="No Surat" autocomplete="off" required>
                                        <?= form_error('no_surat', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label>Tahun Pelajaran</label>                                   
                                        <input type="text" id="tahun_pelajaran" name="tahun_pelajaran" value="<?= $lulus['tahun_pelajaran'] ?>" class="form-control" placeholder="Tahun Pelajaran">
                                        <?= form_error('tahun_pelajaran', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label>Nama Siswa</label>
                                <input type="text" name="nama_siswa"  value="<?= $lulus['nama_siswa'] ?>" class="form-control" placeholder="Nama Siswa" required="">
                                <?= form_error('nama_siswa', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>                           
                            <div class="row">  
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="nis">NIS</label>
                                        <input type="text" minlength="5" maxlength="18" name="nis" value="<?= $lulus['nis'] ?>" class="form-control"  placeholder="NIS" autocomplete="off" required>
                                        <?= form_error('nis', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>                                 
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="nisn">NISN</label>
                                        <input type="text" minlength="5" maxlength="18" name="nisn" value="<?= $lulus['nisn'] ?>" class="form-control"  placeholder="NISN" autocomplete="off" required>
                                        <?= form_error('nisn', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div> 
                                </div>                               
                            </div>    
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label>Tempat Lahir</label>
                                        <div class="mb-3">
                                            <input type="text" id="tempat_lahir" name="tempat_lahir" value="<?= $lulus['tempat_lahir'] ?>" class="form-control" placeholder="Tempat Lahir">
                                            <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>                                   
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label>Tanggal Lahir</label>
                                        <div class="mb-3">
                                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?= $lulus['tanggal_lahir'] ?>" class="form-control" placeholder="Tanggal Lahir">
                                            <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>            
                                </div>                                
                            </div> 
                            <div class="row">                                   
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label>Keterangan</label>
                                        <input type="text" id="keterangan" name="keterangan" value="<?= $lulus['keterangan'] ?>" class="form-control" placeholder="Lulus / Tidak Lulus">
                                        <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>                                   
                                </div>                                
                            </div>                             
                            <div class="mb-3">
                                <label>Alamat Siswa</label>
                                <div class="mb-3">
                                    <input type="text" id="alamat_siswa" name="alamat_siswa" value="<?= $lulus['alamat_siswa'] ?>" class="form-control" placeholder="Alamat Siswa">
                                    <?= form_error('alamat_siswa', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>            
                                
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="status" value="1" class="selectgroup-input" checked="">
                                        <span class="selectgroup-button">Aktif</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="status" value="2" class="selectgroup-input">
                                        <span class="selectgroup-button">Tidak Aktif</span>
                                    </label>
                                </div>
                            </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Save</button>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!-- form start -->
        </div>
        <!-- /.modal-content -->

    </div>
    <!-- /.modal-dialog -->
</div>