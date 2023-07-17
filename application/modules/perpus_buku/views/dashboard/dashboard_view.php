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
                            <br/>
                            <div class="row row-cols-1 row-cols-md-3 g-4">
                              
                                <div class="col-lg-4 col-xs-6">
                                  <div class="small-box bg-aqua">
                                    <div class="inner">
                                          <h3><?= $count_pengguna_umum;?></h3>
                                          <p>Anggota Umum</p>
                                        </div>
                                        <div class="icon">
                                          <i class="fa fa-edit"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                      </div>
                                    </div>

                                    <div class="col-lg-4 col-xs-6">
                                      <div class="small-box bg-aqua">
                                        <div class="inner">
                                          <h3><?= $count_pengguna_guru;?></h3>
                                          <p>Anggota Guru</p>
                                        </div>
                                        <div class="icon">
                                          <i class="fa fa-edit"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                      </div>
                                    </div>

                                    <div class="col-lg-4 col-xs-6">
                                      <div class="small-box bg-aqua">
                                        <div class="inner">
                                          <h3><?= $count_pengguna_siswa;?></h3>
                                          <p>Anggota Siswa</p>
                                        </div>
                                        <div class="icon">
                                          <i class="fa fa-edit"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                      </div>
                                    </div>

                                    <div class="col-lg-4 col-xs-6">
                                      <!--small box-->
                                      <div class="small-box bg-blue">
                                        <div class="inner">
                                          <h3><?= $count_buku;?></h3>

                                          <p>Jenis Buku</p>
                                        </div>
                                        <div class="icon">
                                          <i class="fa fa-book"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                      </div>
                                    </div> 

                                    <div class="col-lg-4 col-xs-6">
                                      <!-- small box -->
                                      <div class="small-box bg-green">
                                        <div class="inner">
                                          <h3><?= $count_pinjam;?></h3>

                                          <p>Pinjam</p>
                                        </div>
                                        <div class="icon">
                                          <i class="fa fa-user-plus"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                      </div>
                                    </div>
                                   
                                    <div class="col-lg-4 col-xs-6">
                                      <div class="small-box bg-red">
                                        <div class="inner">
                                          <h3><?= $count_kembali;?></h3>

                                          <p>Di Kembalikan</p>
                                        </div>
                                        <div class="icon">
                                          <i class="fa fa-list"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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