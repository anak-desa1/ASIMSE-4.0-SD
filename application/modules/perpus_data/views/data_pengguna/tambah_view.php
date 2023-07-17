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
                    <div class="tampil-modal"></div>
                    <?= form_error('email', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                    <div class="flash-data" data-flashdata=""><?= $this->session->flashdata('pesan'); ?></div>                    
                        <div class="card">
                            <div class="card-body">                           
                                <br/>
								<div class="row">
                                    <div class="col-md-12">
                                        <div class="box box-primary">
                                            <div class="box-header with-border">
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <form method="post" action="<?= base_url() . $this->uri->segment(1, 0) ?>/data_pengguna/add_pengguna" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Nama Pengguna</label>
                                                                <input type="text" class="form-control" name="nama" required="required" placeholder="Nama Pengguna">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Tempat Lahir</label>
                                                                <input type="text" class="form-control" name="lahir" required="required" placeholder="Contoh : Bekasi">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Tanggal Lahir</label>
                                                                <input type="date" class="form-control" name="tgl_lahir" required="required" placeholder="Contoh : 1999-05-18">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Username</label>
                                                                <input type="text" class="form-control" name="user" required="required" placeholder="Username">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Password</label>
                                                                <input type="password" class="form-control" name="pass" required="required" placeholder="Password">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Level</label>
                                                                <select name="level" class="form-control" required="required">
                                                                <option>Petugas</option>
                                                                <option>Anggota</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Jenis Kelamin</label>
                                                                <br/>
                                                                <input type="radio" name="jenkel" value="Laki-Laki" required="required"> Laki-Laki
                                                                <br/>
                                                                <input type="radio" name="jenkel" value="Perempuan" required="required"> Perempuan
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Telepon</label>
                                                                <input id="uintTextBox" class="form-control" name="telepon" required="required" placeholder="Contoh : 089618173609">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>E-mail</label>
                                                                <input type="email" class="form-control" name="email" required="required" placeholder="Contoh : fauzan1892@codekop.com">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Pas Foto</label>
                                                                <input type="file" accept="image/*" name="gambar" required="required">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Alamat</label>
                                                                <textarea class="form-control" name="alamat" required="required"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="pull-right">
                                                        <button type="submit" class="btn btn-primary btn-md">Submit</button> 
                                                </form>
                                                <a href="<?= base_url('perpus_data/data_pengguna');?>" class="btn btn-danger btn-md">Kembali</a>
                                                </div>
                                            </div>
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
