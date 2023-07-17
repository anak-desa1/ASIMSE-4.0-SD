<div class="container auth-card">
    <div class="row justify-content-center">
        <div class="col-lg-6 align-self-center">
            <div class="text-center my-2">
                <img src="<?= $logo_source = (empty($dataapp['logo_instansi'])) ? base_url('assets/img/favicon_1.ico') : (($dataapp['logo_instansi'] == 'default-logo.png') ? base_url('assets/img/favicon_1.ico') : base_url('storage/setting/' . $dataapp['logo_instansi'])); ?>" class="card-img" style="width:50%;">
                <h1 class="text-white"><?= $appname = (empty($dataapp['nama_app_absensi'])) ? 'Sistem Akademik' : $dataapp['nama_app_absensi']; ?></h1>
                <h3 class="text-white" id="dateclocknow"></h3>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card shadow-lg border-0 rounded-lg p-2">
                <div class="card-header">
                    <h3 class="text-center font-weight-light">Login </h3>
                    <p class="text-center font-weight-light">Sekolah Dasar (SD)</p>
                </div>
                <div class="card-body">
                    <!-- Content Wrapper -->
                    <div id="content-wrapper" class="d-flex flex-column">

                        <!-- Main Content -->
                        <div id="content">

                            <!-- Begin Page Content -->
                            <div class="container-fluid mt-5">

                                <!-- 404 Error Text -->
                                <div class="text-center">
                                    <div class="error mx-auto" data-text="403">403</div>
                                    <p class="lead text-gray-800 mb-5">Access Forbidden</p>
                                    <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
                                    <a href="<?= base_url('dashboard'); ?>">&larr; Back to Dashboard</a>
                                </div>

                            </div>
                            <!-- /.container-fluid -->

                        </div>
                        <!-- End of Main Content -->

                    </div>
                    <!-- End of Content Wrapper -->

                </div>
            </div>
        </div>
    </div>
</div>
</div>