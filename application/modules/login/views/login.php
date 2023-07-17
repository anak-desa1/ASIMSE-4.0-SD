<main>
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="login-box" style="margin-top: 40px;">
                            
                            <div  class="login-box-body" style="border-top: 10px solid #3c8dbc;border-top-left-radius: 20px; box-shadow: 0px 3px 6px 0px #3c8dbc;">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="pt-4 pb-3">
                                        <center><img class="img-responsive img" alt="Responsive image" src="<?= base_url() ?>panel/dist/upload/logo/<?= $sekolah['logo'] ?>" width="90px"></center>
                                        <p class="login-box-msg"><b>L O G I N system</b></p>
                                    </div>

                                    <?= $this->session->flashdata('authmsg'); ?>
                                    <form class="row g-3 needs-validation" action="" method="post">
                                        <?= csrf() ?>
                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Username</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend"><i class="ri-at-line"></i></span>
                                                <input class="form-control" name="email_pegawai" id="email_pegawai" type="text" value="<?= set_value('email_pegawai') ?>" placeholder="Enter Email">
                                                <div class="invalid-feedback">Please enter your username.</div>
                                            </div>
                                        </div>
                                        <?= form_error('email_pegawai', '<small class="text-danger pl-3">', '</small>'); ?>

                                        <div class="col-12" id="show_hide_password">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend"><i class="ri-key-2-fill"></i></span>
                                                <input class="form-control" name="password" id="password" type="password" placeholder="Password">
                                                <div class="invalid-feedback">Please enter your password!</div>
                                                <div class="input-group-append">
                                                <button class="input-group-text" type="button" tabindex="-1"><i class="ri-eye-off-line"></i></button>
                                            </div>
                                            </div>
                                        </div>
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                                                <label class="form-check-label" for="rememberMe">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" name="submit" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-log-in"></i> Login</button>
                                            <a target="blank" href="<?= base_url()?>" class="btn btn-success btn-block"><i class="glyphicon glyphicon-lock"></i> Back Home</a>
                                        </div>
                                    </form>                                    
                                </div>                        
                            </div>                                   
                        </div>

                        <p class="text-center" style="background-color: #3c8dbc; color: #FFFFFF; border-bottom-right-radius: 20px; box-shadow: 0px 1px 6px 0px #3c8dbc;">
                            <?= $title ?> - <?= $sekolah['nama_sekolah'] ?><br> ASIMSE 4.0 <i class="fa fa-copyright"></i> Copyright <?php echo date("Y");?><br>
                            <marquee>Developed by <a href="https://sistemanakdesa.my.id/"> SistemAnakDesa </a></marquee></a>
                        </p>       
                    </div>
                </div>
            </div>
        </section>
    </div>
</main><!-- End #main -->