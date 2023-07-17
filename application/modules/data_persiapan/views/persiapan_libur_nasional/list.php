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
    <section class="content">
        <div class="col-12">
            <!-- Default box -->
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <div class="dropdown">
                <?php if ($pegawai['role_id'] == 1) : ?>
                    <a href="#form" data-toggle="modal" class="btn btn-primary" onclick="submit('tambah')"><i class="fas fa-plus"></i> Tambah Data</a>
                <?php endif ?>
            </div>
            <br />
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?= $subtitle; ?></h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <!--begin::Table-->
                    <div class="table-responsive">
                        <table class="table table-striped" id="mytable" style="font-size: 14px;">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tanggal Libur</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Tahun</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="target">

                            </tbody>
                        </table>
                    </div>
                    <!--end::Table-->
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1>Form Libur Nasional</h1>
            </div>
            <table class="table align-center">
                <center>
                    <font color='red'>
                        <p id="pesan"></p>
                    </font>
                </center>
                <tr>
                    <td>Tanggal Libur</td>
                    <td>
                        <input type="hidden" class="form-control" id="no_urut" name="no_urut">
                        <div class="input-group mb-3 input-append datepicker date" data-date-format='yyyy-mm-dd' style="padding: 0px;">
                            <input class="form-control" type="text" readonly autocomplete="off" id="tgl_libur" name="tgl_libur" required />
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button"><i class="far fa-calendar-alt"></i></button>
                            </div>
                        </div>

                    </td>
                </tr>
                <tr>
                    <td>Keterangan</td>
                    <td><input type="text" name="keterangan" placeholder="Keterangan" class="form-control" /></td>
                </tr>
                <tr>
                    <td>Tahun</td>
                    <td><input type="text" name="tahun" placeholder="Tahun" class="form-control" /></td>
                </tr>
                <tr>
                    <td>
                        <button type="button" id="btn-tambah" onclick="tambahdata()" class="btn btn-primary">Tambah</button>
                    </td>
                    <td>
                        <button type="button" id="btn-ubah" onclick="ubahdata()" class="btn btn-warning">Ubah</button>
                    </td>
                    <td>
                        <button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>