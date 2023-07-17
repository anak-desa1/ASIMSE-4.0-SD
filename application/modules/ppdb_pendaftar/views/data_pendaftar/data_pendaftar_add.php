<div class="modal fade modal-action" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-lg">
                <div class="card card-primary card-outline">
                    <div class="modal-header">
                        <h5 class="modal-title"><?= ucwords($this->uri->segment(3, 0)) ?> Tambah Data </h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- /.card-header -->
                    <form method="post" action="<?= base_url() . $this->uri->segment(1, 0) ?>/simpan_tambah_pendaftar" role="form" id="form-action" enctype="multipart/form-data">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-6 mt-3 mt-md-3">
                                    <label for="jenis">JENIS PENDAFTARAN*</label>
                                    <select class="form-control" aria-label="Default select example" name="jenis" required>
                                        <option value="" disabled selected>Jenis Pendaftaran</option>
                                        <?php foreach ($jenis as $jenis) : ?>
                                            <option value="<?= $jenis['nama_jenis'] ?>"><?= $jenis['nama_jenis'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="col-sm-6 mt-3 mt-md-3">
                                    <label for="nik">NIK* ( Nomor Induk Kependudukan )</label>
                                    <input type="text" minlength="16" maxlength="18" class="form-control" name="nik" placeholder="NIK" autocomplete="off" required>
                                    <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="col-md-12 mt-3 mt-md-3">
                                <label for="nama">NAMA LENGKAP*</label>
                                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" autocomplete="off" required>
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 mt-3 mt-md-3">
                                    <label for="exampleFormControlInput1">PERIODE*</label>
                                    <select class="form-control" aria-label="Default select example" name="periode" required>
                                        <option value="" disabled selected>Pilih Periode</option>
                                        <?php foreach ($periode as $periode) : ?>
                                            <option value="<?= $periode['periode'] ?>"><?= $periode['periode'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="col-sm-6 mt-3 mt-md-3">
                                    <label for="no_hp">NO HANDPHONE* (diisi untuk info dan konfirmasi)</label>
                                    <input type="text" minlength="12" maxlength="18" class="form-control" name="no_hp" placeholder="No HP Whatsapp">
                                    <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 mt-3 mt-md-3">
                                    <label for="exampleFormControlInput1">KELAS MASUK*</label>
                                    <select class="form-control" aria-label="Default select example" name="kelas" id="kelas" required>
                                        <option value="">Pilih Kelas</option>
                                        <?php foreach ($kls as $se) : ?>
                                            <option value="<?= $se['kelas'] ?>"><?= $se['kelas'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="col-sm-6 mt-3 mt-md-3">
                                    <label for="exampleFormControlInput1">ASAL SEKOLAH*</label>
                                    <select class="form-control" aria-label="Default select example" name="npsn" required>
                                        <option value="" disabled selected>Pilih Asal Sekolah</option>
                                        <?php foreach ($asal_sekolah as $se) : ?>
                                            <option value="<?= $se['npsn'] ?>"><?= $se['nama_sekolah'] ?></option>
                                        <?php endforeach ?>
                                        <!-- <option value="Lainnya">Lainnya</option> -->
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 mt-3 mt-md-3">
                                    <label for="tempat_lahir">TEMPAT LAHIR*</label>
                                    <input type="text" class="form-control" name="tempat_lahir" required>
                                    <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6 mt-3 mt-md-3">
                                    <label for="tgl_lahir">TANGGAL LAHIR*</label>
                                    <input type="date" class="form-control datepicker" name="tgl_lahir" required>
                                </div>
                            </div>

                            <div class="col-sm-6 mt-3 mt-md-3">
                                <label for="password">PASSWORD* (Mohon Diingat!)</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <br>
                            <div class="text-center"><button type="submit" class="btn btn-outline-primary">Simpan data</button></div>
                        </div>
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