<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title; ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href=""><?= $home; ?></a></li>
                <!-- <li class="breadcrumb-item"><?= $subtitle; ?></li> -->
                <li class="breadcrumb-item active"><?= $title; ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <!-- Main content -->
    <section class="content">
        <div class="col-12">
            <div class="card" style="border-top: 8px solid #035AA6;border-bottom: 8px solid #035AA6;border-right: 4px solid #035AA6;border-top-left-radius: 16px;border-bottom-left-radius: 16px;box-shadow: 0px 3px 6px 0px #222;">

                <div class="card-body">
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">GENERATE QRCODE</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">INPUT NAMA DI SINI</label>
                                            <input type="text" onChang="ready()" id="id" name="nik" class="form-control" placeholder="Masukkan Nama yang terdaftar di Data Guru">
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <button onClick="ready()" onFocus="ready()" type="button" class="btn  btn-primary btn-lg btn3d">Submit</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box box-info">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">INFORMASI QRCODE AKAN MUNCUL DISINI</h3>
                                    </div>
                                    <div class="box-body ajax-content" id="showR"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->

    <!-- Main content -->
    <section class="content">
        <div class="modal-body">
            <div class="card">
                <div class="modal-header">
                    <h4 class="modal-title"><?= ucwords($this->uri->segment(3, 0)) ?></h4>
                </div>
                <div class="col-12">
                    <div class="modal-body">
                        <?= form_open_multipart(base_url('akademik_master/master_guru/simpan_ubahdata')); ?>
                        <input type="hidden" name="id" id="id" value="<?= $p_guru['id']; ?>">
                        <!-- <input type="hidden" name="nip" id="nip" value="<?= $p_guru['nip']; ?>"> -->
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama_guru" class="col-sm-3 control-label">Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" name="nama_guru" value="<?= $p_guru['nama_guru'] ?>" class="form-control" id="nama" required>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                            <label class="col-sm-3 control-label">Campus <span class="symbol required"> </span></label>
                            <div class="col-sm-8">
                                <select class="form-control select2" style="width: 100%;" id="campus" name="kd_campus">
                                    <option value="<?= $p_guru['kd_campus'] ?>"><?= $p_guru['nama_campus'] ?></option>
                                    <?php foreach ($campus as $cam) {
                                        echo '<option value="' . $cam->kd_campus . '">' . $cam->nama_campus . '</option>';
                                    } ?>
                                </select>
                            </div>
                        </div> -->
                            <!-- <div class="form-group">
                            <label class="col-sm-3 control-label">Sekolah<span class="symbol required"> </span></label>
                            <div class="col-sm-8">
                                <select class="form-control select2" style="width: 100%;" id="sekolah" name="kd_sekolah">
                                    <option value="<?= $p_guru['kd_sekolah'] ?>"><?= $p_guru['nama_sekolah'] ?></option>

                                </select>
                            </div>
                        </div> -->
                            <div class="form-group">
                                <label for="jabatan" class="col-sm-3 control-label">Jenis PTK</label>
                                <div class="col-sm-8">
                                    <?php echo form_dropdown('jabatan', $p_jabatan, '', 'class="form-control" required id="jabatan"'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jk" class="col-sm-3 control-label">JK</label>
                                <div class="col-sm-8">
                                    <?php echo form_dropdown('jk', $p_jk, '', 'class="form-control" required id="jk"'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="is_bk" class="col-sm-3 control-label">Guru BK..?</label>
                                <div class="col-sm-8">
                                    <?php echo form_dropdown('is_bk', $p_isbk, '', 'class="form-control" required id="is_bk"'); ?>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-save2"></i> Simpan</button>
                        <a href="<?= base_url() . 'akademik_master/master_guru'; ?>" class="btn btn-default" data-dismiss="modal"><i class="bi bi-arrow-counterclockwise"></i> Kembali</a>
                        <div class="clearfix"></div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- /.content -->
        </div>
    </section>
    <!-- /.content -->

</main>