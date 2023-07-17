<style>
    td.details-control {
        background: url('<?= base_url() ?>assets/images/details_open.png') no-repeat center center;
        cursor: pointer;
    }

    tr.details td.details-control {
        background: url('<?= base_url() ?>assets/images/details_close.png') no-repeat center center;
    }
</style>
<div class="content-wrapper">
    <?php $this->load->view('layout/header-page') ?>

    <!-- Main content -->
    <section class="content">
        <div class="col-12">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <div class="tampil-modal"></div>
            <div class="card-toolbar">
                <a href="" class="btn btn-primary font-weight-bolder font-size-sm mr-3" data-toggle="modal" data-target="#newMenuModal"><i class="fa fa-plus"></i> Tambah Data</a>
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
                                <tr class="text-left">
                                    <th scope="col">#</th>
                                    <th scope="col">Logo</th>
                                    <th scope="col">NPSN</th>
                                    <th scope="col">Nama Sekolah</th>
                                    <th scope="col">Kecamatan</th>
                                    <th scope="col">Telp</th>
                                    <th scope="col">Kepala Sekolah</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($sekolah->result() as $s) : ?>
                                    <tr>
                                        <td scope="row"><?= $i; ?></td>
                                        <td><img src="<?= base_url(); ?>dist/upload/logo/<?= $s->logo; ?>" alt="..." style="width:30%;max-width:30px"></td>
                                        <td><?= $s->npsn; ?></td>
                                        <td><?= $s->nama_sekolah; ?></td>
                                        <td><?= $s->kecamatan; ?></td>
                                        <td><?= $s->telp; ?></td>
                                        <td><?= $s->sebutan_kepala; ?></td>
                                        <td>
                                            <a class="btn btn-icon btn-light btn-hover-primary btn-sm" href="" title="Edit" data-nss="<?= $s->nss; ?>" data-npsn="<?= $s->npsn; ?>" data-nama_sekolah="<?= $s->nama_sekolah; ?>" data-alamat="<?= $s->alamat; ?>" data-prov="<?= $s->sekolah_provinsi_id; ?>" data-kota="<?= $s->sekolah_kota_id; ?>" data-kec="<?= $s->sekolah_kecamatan_id; ?>" data-telp="<?= $s->telp; ?>" data-kodepos="<?= $s->kodepos; ?>" data-email="<?= $s->email; ?>" data-web="<?= $s->web; ?>" data-sebutan_kepala="<?= $s->sebutan_kepala; ?>" data-kop_1="<?= $s->kop_1; ?>" data-kop_2="<?= $s->kop_2; ?>" data-id="<?= $s->sekolah_id; ?>" data-toggle="modal" data-target="#editModal" title="edit">
                                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                    <i class="fa fa-edit text-warning">
                                                        <span></span>
                                                    </i>
                                                </span>
                                            </a>
                                            <a class="btn btn-icon btn-light btn-hover-primary btn-sm" href="<?= base_url('akademik_rombel/profil_sekolah/delsekolah/') . $s->sekolah_id ?>" title="Delete">
                                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                    <i class="fa fa-trash-alt text-danger">
                                                        <span></span>
                                                    </i>
                                                </span>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!--end::Table-->
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- Content Wrapper. Contains page content -->

<!--modal add-->
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Tambah <?= $title; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('akademik_rombel/profil_sekolah'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Campus <span class="symbol required"> </span></label>
                                <select class="form-control select2" style="width: 100%;" id="campus" name="kd_campus">
                                    <option value="">Pilih Campus</option>
                                    <?php foreach ($campus as $cam) {
                                        echo '<option value="' . $cam->kd_campus . '">' . $cam->nama_campus . '</option>';
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sekolah<span class="symbol required"> </span></label>
                                <select class="form-control select2" style="width: 100%;" id="sekolah" name="kd_sekolah">
                                    <option value="">Pilih campus Dulu</option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="nss" name="nss" placeholder="NSS">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="npsn" name="npsn" placeholder="NPSN">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah" placeholder="Nama Sekolah">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat" style="height: 100px"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="sekolah_provinsi_id" class="form-control" id="provinsi">
                                    <option>- Select Provinsi -</option>
                                    <?php foreach ($provinsi as $prov) {
                                        echo '<option value="' . $prov->provinsi_id . '">' . $prov->provinsi . '</option>';
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="sekolah_kota_id" class="form-control" id="kabupaten">
                                    <option value=''>Select Kabupaten</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="sekolah_kecamatan_id" class="form-control" id="kecamatan">
                                    <option>Select Kecamatan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="kodepos" name="kodepos" placeholder="Kode Pos">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="telp" name="telp" placeholder="Telpon">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="web" name="web" placeholder="Website">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="sebutan_kepala" name="sebutan_kepala" placeholder="Nama Kepala Sekolah">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="kop_1" name="kop_1" placeholder="Kop 1">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="kop_2" name="kop_2" placeholder="Kop 2">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control" id="logo" name="logo" placeholder="Logo">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end modal add-->
<!--modal edit-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit <?= $title; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('akademik_rombel/profil_sekolah/editsekolah'); ?>" method="post" enctype="multipart/form-data">
                <div class=" modal-body">
                    <input type="hidden" class="form-control" id="ed_id" name="ed_id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="ed_nss" name="ed_nss" placeholder="NSS">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="ed_npsn" name="ed_npsn" placeholder="NPSN">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="ed_nama_sekolah" name="ed_nama_sekolah" placeholder="Nama Sekolah">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="ed_alamat" name="ed_alamat" placeholder="Alamat" style="height: 100px"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-1">
                            <div class="form-group">
                                <input type="text" class="form-control" id="ed_prov" name="ed_prov" placeholder="Provinsi">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label><?= $s->provinsi; ?></label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <input type="text" class="form-control" id="ed_kota" name="ed_kota" placeholder="Kota">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label><?= $s->kota; ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1">
                            <div class="form-group">
                                <input type="text" class="form-control" id="ed_kec" name="ed_kec" placeholder="Kecamatan">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label><?= $s->kecamatan; ?></label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="ed_kodepos" name="ed_kodepos" placeholder="Kode Pos">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="ed_telp" name="ed_telp" placeholder="Telpon">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="ed_email" name="ed_email" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="ed_web" name="ed_web" placeholder="Website">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="ed_sebutan_kepala" name="ed_sebutan_kepala" placeholder="Kepala Sekolah">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="ed_kop_1" name="ed_kop_1" placeholder="Kop 1">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="ed_kop_2" name="ed_kop_2" placeholder="Kop 2">
                    </div>
                    <div class="form-group">
                        <img src="<?= base_url(); ?>dist/upload/logo/<?= $s->logo; ?>" alt="..." style="width:30%;max-width:30px">
                        <input type="hidden" name="old_image" value="<?= $s->logo; ?>" />
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control" id="logo" name="logo" placeholder="Logo">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end modal edit-->