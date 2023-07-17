<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title; ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html"><?= $home; ?></a></li>
                <!-- <li class="breadcrumb-item"><?= $subtitle; ?></li> -->
                <li class="breadcrumb-item active"><?= $title; ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <!-- Main content -->
    <section class="content">
        <div class="col-12">

            <div class="card" style="border-top: 8px solid #035AA6;border-bottom: 8px solid #035AA6;border-right: 4px solid #035AA6;border-top-left-radius: 16px;border-bottom-left-radius: 16px;box-shadow: 0px 3px 6px 0px #222;">
                <div class='col-md-12'>
                    <div class='box box-info'>

                        <div class="card">
                            <div class="card-body">

                                <div class="card">
                                    <div class="modal-header">
                                        <h4 class="modal-title"><?= ucwords($this->uri->segment(3, 0)) ?> Data</h4>
                                    </div>
                                    <div class="col-12">
                                        <div class="modal-body">
                                            <?= form_open_multipart(base_url('siswa_qrcode/genbar/update')); ?>
                                            <input type="hidden" name="_id" id="_id" value="<?= $data['siswa_id']; ?>">

                                            <br>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="kode" class="control-label">NIS</label>
                                                        <input type="text" name="nis" value="<?= $data['nis']; ?>" class="form-control" id="nis" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="kode" class="control-label">NISN</label>
                                                        <input type="text" name="nisn" value="<?= $data['nisn']; ?>" class="form-control" id="nisn" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="kode" class="control-label">Nama</label>
                                                        <input type="text" name="nama" value="<?= $data['nama']; ?>" class="form-control" id="nama" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <br>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="kode" class="control-label">Jns Kel</label>
                                                        <?= form_dropdown('jk', $p_jk, $data['jk'], 'class="form-control" id="jk" required'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="kode" class="control-label">Tempat Lahir</label>
                                                        <input type="text" name="tmp_lahir" value="<?= $data['tmp_lahir']; ?>" class="form-control" id="tmp_lahir" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="kode" class="control-label">Tgl Lahir</label>
                                                        <input type="date" name="tgl_lahir" value="<?= $data['tgl_lahir']; ?>" class="form-control" id="tgl_lahir" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <br>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="kode" class="control-label">Agama</label>
                                                        <?= form_dropdown('agama', $p_agama, $data['agama'], 'class="form-control" id="agama" required'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="kode" class="control-label">No. Telp</label>
                                                        <input type="text" name="notelp" value="<?= $data['notelp']; ?>" class="form-control" id="notelp">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="kode" class="control-label">Diterima di kelas</label>
                                                        <select class="form-control" name="diterima_kelas" id="diterima_kelas" required>
                                                            <option value="<?= $data['diterima_kelas']; ?>"><?= $data['diterima_kelas']; ?></option>
                                                            <?php
                                                            foreach ($p_diterima_kelas as $dt) {
                                                                echo "<option value=" . $dt['tingkat'] . ">" . $dt['kelas'] . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="kode" class="control-label">Diterima Tgl</label>
                                                        <input type="date" name="diterima_tgl" value="<?= $data['diterima_tgl']; ?>" class="form-control" id="diterima_tgl">
                                                    </div>
                                                </div>
                                            </div>

                                            <br>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                                                        <label class="form-check-label" for="is_active">
                                                            Active?
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <br />
                                            <button type="submit" class="btn btn-success">Simpan</button>
                                            <a href="<?= base_url() . 'siswa_qrcode/genbar'; ?>" class="btn btn-primary" data-dismiss="modal">Kembali</a>
                                            <div class="clearfix"></div>

                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.col -->

        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</main>
<!-- /.content-wrapper -->