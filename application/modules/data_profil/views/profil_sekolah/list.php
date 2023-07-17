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
    <section class="section dashboard">
        <div class="row">

            <!-- Main content -->
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>

            <div class="card">
                <div class="card-body">
                    <div class="info-box">
                        <h3 class="card-title"><?= $subtitle; ?></h3>
                    </div>

                    <form action="<?= base_url('data_profil/profil_sekolah/data_sekolah'); ?>" method="post" enctype="multipart/form-data">
                        <!--begin::Table-->
                        <div class="modal-body">
                            <div class="row">
                                <input type="hidden" class="form-control" name="sekolah_id" value="<?= $sch['sekolah_id'] ?>" readonly>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="nss" name="nss" value="<?= $sch['nss'] ?>" placeholder="NSS">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="npsn" name="npsn" value="<?= $sch['npsn'] ?>" placeholder="NPSN">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah" value="<?= $sch['nama_sekolah'] ?>" placeholder="Nama Sekolah">
                            </div>
                            <div class="mb-3">
                                <label for="">Alamat Sekolah</label>
                                <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat" style="height: 100px"><?= $sch['alamat'] ?></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <select name="sekolah_provinsi_id" class="form-control" id="provinsi">
                                            <option value="<?= $sch['sekolah_provinsi_id'] ?>"> <?= $sch['provinsi'] ?> </option>
                                            <?php foreach ($provinsi as $prov) {
                                                echo '<option value="' . $prov->provinsi_id . '">' . $prov->provinsi . '</option>';
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <select name="sekolah_kota_id" class="form-control" id="kabupaten">
                                            <option value="<?= $sch['sekolah_kota_id'] ?>"> <?= $sch['kota'] ?> </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <select name="sekolah_kecamatan_id" class="form-control" id="kecamatan">
                                            <option value="<?= $sch['sekolah_kecamatan_id'] ?>"> <?= $sch['kecamatan'] ?> </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="kodepos" name="kodepos" value="<?= $sch['kodepos'] ?>" placeholder="Kode Pos">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="telp" name="telp" value="<?= $sch['telp'] ?>" placeholder="Telpon">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="email" name="email" value="<?= $sch['email'] ?>" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="web" name="web" value="<?= $sch['web'] ?>" placeholder="Website">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="sebutan_kepala" name="sebutan_kepala" value="<?= $sch['sebutan_kepala'] ?>" placeholder="Nama Kepala Sekolah">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="nip" name="nip" value="<?= $sch['nip'] ?>" placeholder="NIP">
                                    </div>
                                </div>
                                <!-- <div class="col-md-6">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="sebutan_kepala" name="sebutan_kepala" value="<?= $sch['sebutan_kepala'] ?>" placeholder="Nama Kepala Sekolah">
                                    </div>
                                </div> -->
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="card">
                                    <div class="col-md-12">
                                        <label for="">Logo Sekolah</label>
                                        <div class="mb-3 text-center">
                                            <img src="<?= base_url(); ?>panel/dist/upload/logo/<?= $sch['logo'] ?>" alt="..." style="width:100%;max-width:150px">
                                            <input type="hidden" name="old_image" value="<?= $sch['logo'] ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <input type="file" class="form-control" id="logo" name="logo" placeholder="Logo">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Table-->
                        <!-- /.card-body -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->

            <div class="card">
                <div class="card-body">
                    <div class="info-box">
                        <h3 class="card-title">Sejarah</h3>
                    </div>

                    <form action="<?= base_url('data_profil/profil_sekolah/data_sejarah'); ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" name="sekolah_id" value="<?= $sch['sekolah_id'] ?>" readonly>
                        <!--begin::Table-->
                        <div class="modal-body">
                            <textarea id="ckeditor1" class="summernote" name="sejarah" placeholder="Sejarah" style="height: 100px"><?= $sch['sejarah'] ?></textarea>
                        </div>
                        <!--end::Table-->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->

            <div class="card">
                <div class="card-body">
                    <div class="info-box">
                        <h3 class="card-title">Visi dan Misi</h3>
                    </div>
                    <form action="<?= base_url('data_profil/profil_sekolah/data_visi_misi'); ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" name="sekolah_id" value="<?= $sch['sekolah_id'] ?>" readonly>
                        <!--begin::Table-->
                        <div class="modal-body">
                            <textarea id="ckeditor2" class="summernote" name="visi_misi" placeholder="Visi - Misi" style="height: 100px"><?= $sch['visi_misi'] ?></textarea>
                        </div>
                        <!--end::Table-->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->

            <div class="card">
                <div class="card-body">
                    <div class="info-box">
                        <h3 class="card-title">Mars Sekolah</h3>
                    </div>

                    <form action="<?= base_url('data_profil/profil_sekolah/data_mars'); ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" name="sekolah_id" value="<?= $sch['sekolah_id'] ?>" readonly>
                        <!--begin::Table-->
                        <div class="modal-body">
                            <textarea id="ckeditor3" class="summernote" name="mars" placeholder="Mars" style="height: 100px"><?= $sch['mars'] ?></textarea>
                        </div>
                        <!--end::Table-->
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->

            <div class="card">
                <div class="card-body">
                    <div class="info-box">
                        <h3 class="card-title">Kurikulum Sekolah</h3>
                    </div>

                    <form action="<?= base_url('data_profil/profil_sekolah/data_kurikulum'); ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" name="sekolah_id" value="<?= $sch['sekolah_id'] ?>" readonly>
                        <!--begin::Table-->
                        <div class="modal-body">
                            <textarea id="ckeditor4" class="summernote" name="kurikulum" placeholder="Kurikulum" style="height: 100px"><?= $sch['kurikulum'] ?></textarea>
                        </div>
                        <!--end::Table-->
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->

            <div class="card">
                <div class="card-body">
                    <div class="info-box">
                        <h3 class="card-title">Akreditasi Sekolah</h3>
                    </div>

                    <form action="<?= base_url('data_profil/profil_sekolah/data_akreditasi'); ?>" method="post" enctype="multipart/form-data">
                        <!--begin::Table-->
                        <div class="modal-body">
                            <div class="row">
                                <input type="hidden" class="form-control" name="sekolah_id" value="<?= $sch['sekolah_id'] ?>">
                                <input type="hidden" class="form-control" name="npsn" value="<?= $sch['npsn'] ?>">
                                <div class="col-md-1"></div>
                                <div class="card">
                                    <div class="col-md-12">
                                        <label for="">Akreditasi Sekolah</label>
                                        <div class="mb-3 text-center">
                                            <img src="<?= base_url(); ?>panel/dist/upload/logo/<?= $sch['akreditasi'] ?>" alt="..." style="width:100%;max-width:300px">
                                            <input type="hidden" name="old_image" value="<?= $sch['akreditasi'] ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <input type="file" class="form-control" id="akreditasi" name="akreditasi" placeholder="Akreditasi">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Table-->
                        <!-- /.card-body -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->

        </div>
    </section>

</main>

<!-- jQuery -->
<script src="<?= base_url() ?>panel/plugins/jquery/jquery.min.js"></script>
<script>
    $(function() {
        $('#editModal').on('show.bs.modal', function(e) {
            let btn = $(e.relatedTarget);
            let id = btn.data('id');
            let nss = btn.data('nss');
            let npsn = btn.data('npsn');
            let nama_sekolah = btn.data('nama_sekolah');
            let alamat = btn.data('alamat');
            let prov = btn.data('prov');
            let kota = btn.data('kota');
            let kec = btn.data('kec');
            let desa = btn.data('desa');
            let telp = btn.data('telp');
            let kodepos = btn.data('kodepos');
            let email = btn.data('email');
            let web = btn.data('web');
            let sebutan_kepala = btn.data('sebutan_kepala');
            let kop_1 = btn.data('kop_1');
            let kop_2 = btn.data('kop_2');
            let instagram_src = btn.data('instagram_src');
            let instagram_usrc = btn.data('instagram_usrc');
            let is_active = btn.data('is_active');
            let is_active_psb = btn.data('is_active_psb');
            $("#ed_id").val(id);
            $("#ed_nss").val(nss);
            $("#ed_npsn").val(npsn);
            $("#ed_nama_sekolah").val(nama_sekolah);
            $('#ed_alamat').val(alamat);
            $('#ed_prov').val(prov);
            $('#ed_kota').val(kota);
            $('#ed_kec').val(kec);
            $('#ed_desa').val(desa);
            $('#ed_telp').val(telp);
            $('#ed_kodepos').val(kodepos);
            $('#ed_email').val(email);
            $('#ed_web').val(web);
            $('#ed_sebutan_kepala').val(sebutan_kepala);
            $('#ed_kop_1').val(kop_1);
            $('#ed_kop_2').val(kop_2);
            $('#ed_instagram_src').val(instagram_src);
            $('#ed_instagram_usrc').val(instagram_usrc);
            $('#ed_is_active').val(is_active);
            $('#ed_is_active_psb').val(is_active_psb);
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("#provinsi").change(function() {
            var url = "<?php echo site_url('data_profil/profil_sekolah/add_ajax_kab'); ?>/" + $(this).val();
            $('#kabupaten').load(url);
            return false;
        })

        $("#kabupaten").change(function() {
            var url = "<?php echo site_url('data_profil/profil_sekolah/add_ajax_kec'); ?>/" + $(this).val();
            $('#kecamatan').load(url);
            return false;
        })
    });
</script>

<script src="<?= base_url() ?>panel/plugins/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('ckeditor1');
    CKEDITOR.replace('ckeditor2');
    CKEDITOR.replace('ckeditor3');
    CKEDITOR.replace('ckeditor4');
</script>