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

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="<?= base_url() ?>panel/assets/img/profil-user/<?= $pegawai['img'] ?>" alt="Profile" class="rounded-circle">
                        <h2><?= $pegawai['nama_pegawai'] ?></h2>
                        <h3><?= $pegawai['nik'] ?></h3>
                        <div class="social-links mt-2">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Dinas Pendidikan</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <!-- <h5 class="card-title">About</h5>
                                <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p> -->

                                <div class="info-box">
                                    <h5 class="card-title">Profile Details</h5>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-9 col-md-8"><?= $pegawai['nama_pegawai'] ?></div>
                                </div>

                                <!-- <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Company</div>
                                    <div class="col-lg-9 col-md-8">Lueilwitz, Wisoky and Leuschke</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Job</div>
                                    <div class="col-lg-9 col-md-8">Web Designer</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Country</div>
                                    <div class="col-lg-9 col-md-8">USA</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Address</div>
                                    <div class="col-lg-9 col-md-8">A108 Adam Street, New York, NY 535022</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Phone</div>
                                    <div class="col-lg-9 col-md-8">(436) 486-3538 x29071</div>
                                </div> -->

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8"><?= $pegawai['email_pegawai'] ?></div>
                                </div>

                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                                <?= $this->session->flashdata('message'); ?>
                                <div class="tampil-modal"></div>
                                <?= form_open_multipart('pegawai_profil/pegawai/profil'); ?>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="email_pegawai" name="email_pegawai" value="<?= $pegawai['email_pegawai'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" value="<?= $pegawai['nama_pegawai'] ?>">
                                            <?= form_error('nama_pegawai', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">File input</label>
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="custom-file">
                                                        <img src="<?= base_url() ?>panel/assets/img/profil-user/<?= $pegawai['img'] ?>" class="img-thumbnail" height="100px" width="100px">
                                                        <input type="hidden" name="old_image" value="<?= $pegawai['img'] ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="img" name="img">
                                                        <label class="custom-file-label" for="img">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                </div>
                                </form><!-- End Profile Edit Form -->

                            </div>

                            <div class="tab-pane fade pt-3" id="profile-settings">

                                <!-- Settings Form -->
                                <div class="timeline-item">
                                    <a href="http://paud.kemdikbud.go.id/" target="_blank">DIREKTORAT PAUD</a>
                                </div>
                                <div class="timeline-item">
                                    <a href="http://ditpsd.kemdikbud.go.id/" target="_blank">DIREKTORAT SEKOLAH DASAR</a>
                                </div>
                                <div class="timeline-item">
                                    <a href="http://ditsmp.kemdikbud.go.id/" target="_blank">DIREKTORAT SEKOLAH MENENGAH PERTAMA</a>
                                </div>
                                <div class="timeline-item">
                                    <a href="https://psma.kemdikbud.go.id/" target="_blank">DIREKTORAT SEKOLAH MENENGAH ATAS</a>
                                </div>
                                <div class="timeline-item">
                                    <a href="https://smk.kemdikbud.go.id/" target="_blank">DIREKTORAT MENENGAH KEJURUAN</a>
                                </div>
                                <div class="timeline-item">
                                    <a href="https://dikti.kemdikbud.go.id/" target="_blank">DIREKTORAT JENDERAL PENDIDIKAN TINGGI</a>
                                </div>
                                <div>
                                    <i class="far fa-clock bg-gray"></i>
                                </div>
                                <!-- End settings Form -->

                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <?= form_open_multipart('pegawai_profil/pegawai/password'); ?>
                                <div class="mb-3">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="email_pegawai" name="email_pegawai" value="<?= $pegawai['email_pegawai'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password1" class="form-control" id="password1" placeholder="Password">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="inputName2" class="col-sm-5 col-form-label">Konfirmasi Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password2" class="form-control" id="password2" placeholder="Konfirmasi Password">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Submit</button>
                                    </div>
                                </div>
                                </form><!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->