<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title; ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html"><?= $home; ?></a></li>
                <li class="breadcrumb-item"><?= $subtitle; ?></li>
                <li class="breadcrumb-item active"><?= $title; ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <!-- Main content -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <!-- Main content -->
                <section class="content">
                    <div class="card">
                        <div class="col-12">
                            <!-- Default box -->
                            <form action="<?= base_url('data_akses/active_access'); ?>" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <!-- form start -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>NIK <span class="symbol required"> </span></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input type="text" autocomplete="off" name="nik" id="nik" value="<?= $data_pegawai['nik'] ?>" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email <span class="symbol required"> </span></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                </div>
                                                <input type="email" autocomplete="off" name="email" value="<?= $data_pegawai['email'] ?>" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nama Lengkap <span class="symbol required"> </span></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input type="text" autocomplete="off" name="nama_lengkap" value="<?= $data_pegawai['nama_lengkap'] ?>" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>User Access <span class="symbol required"> </span></label>
                                            <select class="form-control select2" style="width: 100%;" id="id" name="id">
                                                <option value="">--User Access--</option>
                                                <?php foreach ($role as $ro) : ?>
                                                    <option value="<?= $ro['id']; ?>"><?= $ro['role']; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="card card-secondary">
                                                <div class="card-body">
                                                    <input type="checkbox" name="is_active" value="1" checked data-bootstrap-switch data-off="N" data-off-color="danger" data-on="Y" data-on-color="success">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <span class="symbol required"> Harus diisi

                                </div>
                                <div class="modal-footer justify-content-between">
                                    <a href="<?= base_url() ?>data_akses/data_akses" class="btn btn-default"><i class="bi bi-arrow-counterclockwise"></i> Kembali</a>
                                    <button type="submit" id="simpan" class="btn btn-primary"><i class="bi bi-save2"></i> Simpan</button>
                                </div>
                            </form>
                            <!-- /.card -->
                        </div>
                    </div>

                </section>
                <!-- /.content -->

            </div>
        </div>
    </section>

</main><!-- End #main -->

<!-- jQuery -->
<script src="<?= base_url() ?>panel/plugins/jquery/jquery.min.js"></script>
<!-- Datepicker -->
<script src="<?= base_url() ?>panel/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>