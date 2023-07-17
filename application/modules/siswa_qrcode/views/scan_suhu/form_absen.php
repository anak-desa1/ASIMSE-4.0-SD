<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><?= $home; ?></a></li>
                        <li class="breadcrumb-item active"><?= $subtitle; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="modal-body">
        <div class="card">
            <div class="modal-header">
                <h4 class="modal-title"><?= $subtitle; ?> Siswa</h4>
            </div>
            <div class="col-12">
                <div class="modal-body">
                    <?= form_open_multipart(base_url('siswa_qrcode/scan/update')); ?>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="kode" class="control-label">NIS</label>
                                <input type="text" name="id_siswa" value="<?= $siswa['nis'] ?>" class="form-control" id="nis" readonly>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="kode" class="control-label">Nama</label>
                                <input type="text" name="nama" value="<?= $siswa['nm_siswa'] ?>" class="form-control" id="nama" readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="kode" class="control-label">Kehadiran</label>
                                <input type="text" name="" value="<?= $siswa['nama_khd'] ?>" class="form-control" id="nama" readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="kode" class="control-label">Status</label>
                                <input type="text" name="" value="<?= $siswa['nama_status'] ?>" class="form-control" id="nama" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label">Tanggal</label>
                                <input type="text" name="tgl" value="<?= $siswa['tgl'] ?>" class="form-control" id="nis" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label">Jam Masuk</label>
                                <input type="text" name="jam_msk" value="<?= $siswa['jam_msk'] ?>" class="form-control" id="nama" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label">Suhu Badan</label>
                                <input type="text" name="suhu" value="<?= $siswa['suhu'] ?>" class="form-control" id="nama" required>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <!-- <a href="<?= base_url() . 'master_siswa/data_siswa'; ?>" class="btn btn-default" data-dismiss="modal">Kembali</a> -->
                    <div class="clearfix"></div>

                    </form>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
</div>
<!-- /.content-wrapper -->