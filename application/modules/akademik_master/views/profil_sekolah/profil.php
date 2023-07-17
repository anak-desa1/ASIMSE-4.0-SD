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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="<?= base_url() ?>/panel/dist/upload/logo/<?= $sekolah['logo'] ?>" alt="User profile picture">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> ID</strong>
                            <hr>
                            <p class="text-muted"> <?= $sekolah['nss'] ?></p>
                            <p class="text-muted"> <?= $sekolah['npsn'] ?></p>
                            <hr>
                            <strong><i class="fas fa-home mr-1"></i> Name</strong>
                            <hr>
                            <p class="text-muted">
                                <span class="tag tag-danger"><?= $sekolah['nama_sekolah'] ?></span>
                            </p>
                            <hr>
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                            <hr>
                            <p class="text-muted"><?= $sekolah['alamat'] ?></p>
                            <hr>
                            <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
                            <hr>
                            <p class="text-muted"><?= $sekolah['telp'] ?></p>
                            <p class="text-muted"><?= $sekolah['kodepos'] ?></p>
                            <p class="text-muted"><?= $sekolah['email'] ?></p>
                            <p class="text-muted"><?= $sekolah['web'] ?></p>
                            <hr>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#profil" data-toggle="tab">Profil</a></li>
                                <li class="nav-item"><a class="nav-link" href="#biodata" data-toggle="tab">Tanggal Cetak Rapor</a></li>
                                <!-- <li class="nav-item"><a class="nav-link" href="#riwayat" data-toggle="tab">Tanggal Cetak Semester 2</a></li> -->
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="profil">
                                    <!-- Default box -->
                                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                                    <?= $this->session->flashdata('message'); ?>
                                    <div class="tampil-modal"></div>
                                    <?= form_open_multipart('akademik_master/profil_sekolah/editsekolah'); ?>
                                    <input type="hidden" name="sekolah_id" value="<?= $sekolah['sekolah_id'] ?>">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="inputNSS" class="col-sm-4 col-form-label">NSS</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="nss" name="nss" value="<?= $sekolah['nss'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputNPSN" class="col-sm-4 col-form-label">NPSN</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="npsn" name="npsn" value="<?= $sekolah['npsn'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputNamaSekolah" class="col-sm-4 col-form-label">Nama Sekolah</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah" value="<?= $sekolah['nama_sekolah'] ?>">
                                                <?= form_error('nama_sekolah', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputAlamat" class="col-sm-4 col-form-label">Alamat</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control" id="alamat" name="alamat"><?= $sekolah['alamat'] ?></textarea>
                                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputProvinsi" class="col-sm-4 col-form-label">Provinsi</label>
                                            <div class="col-sm-8">
                                                <select name="sekolah_provinsi_id" class="col-sm-4 form-control" id="provinsi">
                                                    <option value="<?= $lokasi['sekolah_provinsi_id'] ?>"><?= $lokasi['provinsi'] ?></option>
                                                    <?php foreach ($provinsi as $prov) {
                                                        echo '<option value="' . $prov->provinsi_id . '">' . $prov->provinsi . '</option>';
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputKabupaten" class="col-sm-4 col-form-label">Kabupaten</label>
                                            <div class="col-sm-8">
                                                <select name="sekolah_kota_id" class="col-sm-4 form-control" id="kabupaten">
                                                    <option value='<?= $lokasi['sekolah_kota_id'] ?>'><?= $lokasi['kota'] ?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputKecamatan" class="col-sm-4 col-form-label">Kecamatan</label>
                                            <div class="col-sm-8">
                                                <select name="sekolah_kecamatan_id" class="col-sm-4 form-control" id="kecamatan">
                                                    <option value="<?= $lokasi['sekolah_kecamatan_id'] ?>"><?= $lokasi['kecamatan'] ?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputTelp" class="col-sm-4 col-form-label">Telp</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="telp" name="telp" value="<?= $sekolah['telp'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputKecamatan" class="col-sm-4 col-form-label">Kode Pos</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="kodepos" name="kodepos" value="<?= $sekolah['kodepos'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-4 col-form-label">Email</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="email" name="email" value="<?= $sekolah['email'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputweb" class="col-sm-4 col-form-label">Website</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="web" name="web" value="<?= $sekolah['web'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputsebutan_kepala" class="col-sm-4 col-form-label">Kepala Sekolah</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="sebutan_kepala" name="sebutan_kepala" value="<?= $sekolah['sebutan_kepala'] ?>">
                                            </div>
                                        </div>
                                        <!-- <div class="form-group row">
                                            <label for="inputkop_1" class="col-sm-4 col-form-label">KOP 1</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="kop_1" name="kop_1" value="<?= $sekolah['kop_1'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputkop_2" class="col-sm-4 col-form-label">KOP 2</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="kop_2" name="kop_2" value="<?= $sekolah['kop_2'] ?>">
                                            </div>
                                        </div> -->

                                        <div class="form-group row">
                                            <label for="inputSkills" class="col-sm-4 col-form-label">File input</label>
                                            <div class="col-sm-8">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="custom-file">
                                                            <img src="<?= base_url() ?>/panel/dist/upload/logo/<?= $sekolah['logo'] ?>" class="logo-thumbnail" height="100px" width="100px">
                                                            <input type="hidden" name="old_image" value="<?= $sekolah['logo'] ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="logo" name="logo">
                                                            <label class="custom-file-label" for="logo">Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-8">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    </form>
                                    <!-- /.card -->
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="biodata">
                                    <?= form_open_multipart('akademik_master/profil_sekolah/cetakrapor'); ?>
                                    <input type="hidden" name="sekolah_id" value="<?= $sekolah['sekolah_id'] ?>">
                                    <input type="hidden" name="id" value="<?= $tahun['id'] ?>">
                                    <div class="form-group row">
                                        <label for="inputNamaSekolah" class="col-sm-4 col-form-label">Nama Sekolah</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah" value="<?= $sekolah['nama_sekolah'] ?>">
                                            <?= form_error('nama_sekolah', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputAlamat" class="col-sm-4 col-form-label">Alamat</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="alamat" name="alamat"><?= $sekolah['alamat'] ?></textarea>
                                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSemester" class="col-sm-4 col-form-label">Semester</label>
                                        <div class="col-sm-8">
                                            <?php
                                            $semester = $tahun['semester'];
                                            if ($semester == 1) { ?>
                                                <div class="container">
                                                    <div class="row align-items-start">
                                                        <div class="col-sm-2">
                                                            <input type="text" class="form-control" id="<?= $semester ?>" name="semester" value="<?= $semester ?>" readonly>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label class="col-form-label">/ Ganjil</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } else { ?>
                                                <div class="container">
                                                    <div class="row align-items-start">
                                                        <div class="col-sm-2">
                                                            <input type="text" class="form-control" id="<?= $semester ?>" name="semester" value="<?= $semester ?>" readonly>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label class="col-form-label">/ Genap</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php  }  ?>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputth_pelajaran" class="col-sm-4 col-form-label">Tahun Pelajaran</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="th_pelajaran" name="th_pelajaran" value="<?= $tahun['th_pelajaran'] ?>">
                                            <?= form_error('th_pelajaran', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tahun" class="col-sm-4 control-label">Tgl TTD Biodata <span class=" symbol required"> </span></label>
                                        <div class="col-sm-8">
                                            <!-- <label for="tahun" class="col-sm-5 control-label"><?php echo format_indo(date($tahun['tgl_biodata'])); ?></label> -->
                                            <input type="date" name="tgl_biodata" value="<?= $tahun['tgl_biodata'] ?>" class=" col-sm-5 form-control" id="tgl_biodata" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tahun" class="col-sm-4 control-label">Tgl TTD Raport PTS <span class=" symbol required"> </span></label>
                                        <div class="col-sm-8">
                                            <!-- <label for="tahun" class="col-sm-5 control-label"><?php echo format_indo(date($tahun['tgl_raport_pts'])); ?></label> -->
                                            <input type="date" name="tgl_raport_pts" value="<?= $tahun['tgl_raport_pts'] ?>" class=" col-sm-5 form-control" id="tgl_raport_pts" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tahun" class="col-sm-4 control-label">Tgl TTD Raport PAS/PAT <span class=" symbol required"> </span></label>
                                        <div class="col-sm-8">
                                            <!-- <label for="tahun" class="col-sm-5 control-label"><?php echo format_indo(date($tahun['tgl_raport_pas'])); ?></label> -->
                                            <input type="date" name="tgl_raport_pas" value="<?= $tahun['tgl_raport_pas'] ?>" class="col-sm-5 form-control" id="tgl_raport_pas" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputnama_kepsek" class="col-sm-4 col-form-label">Kepala Sekolah</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="nama_kepsek" name="nama_kepsek" value="<?= $tahun['nama_kepsek'] ?>">
                                            <?= form_error('nama_kepsek', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-8">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="riwayat">
                                    <!-- The timeline -->
                                    <div class="timeline timeline-inverse">
                                        <!-- timeline time label -->
                                        <div class="time-label">
                                            <span class="bg-danger">
                                                10 Feb. 2014
                                            </span>
                                        </div>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-envelope bg-primary"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                                <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                                <div class="timeline-body">
                                                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                    weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                    jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                                    quora plaxo ideeli hulu weebly balihoo...
                                                </div>
                                                <div class="timeline-footer">
                                                    <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-user bg-info"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                                                <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                                                </h3>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-comments bg-warning"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                                                <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                                                <div class="timeline-body">
                                                    Take me to your leader!
                                                    Switzerland is small and neutral!
                                                    We are more like Germany, ambitious and misunderstood!
                                                </div>
                                                <div class="timeline-footer">
                                                    <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <!-- timeline time label -->
                                        <div class="time-label">
                                            <span class="bg-success">
                                                3 Jan. 2014
                                            </span>
                                        </div>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-camera bg-purple"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                                                <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                                <div class="timeline-body">
                                                    <img src="https://placehold.it/150x100" alt="...">
                                                    <img src="https://placehold.it/150x100" alt="...">
                                                    <img src="https://placehold.it/150x100" alt="...">
                                                    <img src="https://placehold.it/150x100" alt="...">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <div>
                                            <i class="far fa-clock bg-gray"></i>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</main>