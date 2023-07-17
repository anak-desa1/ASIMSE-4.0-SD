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
                        <div class="card">
                            <div class="card-body">                           
                                <br/>
								<div class="row">
                                    <div class="col-md-12">	
                                        <?php if(!empty($this->session->flashdata())){ echo $this->session->flashdata('pesan');}?>
                                        <div class="box box-primary">
                                            <div class="box-header with-border">
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <form method="post" action="<?= base_url() . $this->uri->segment(1, 0) ?>/data_pengguna/upd_pengguna" enctype="multipart/form-data">                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Nama Pengguna</label>
                                                                <input type="text" class="form-control" value="<?= $user->nama;?>" name="nama" required="required" placeholder="Nama Pengguna">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Tempat Lahir</label>
                                                                <input type="text" class="form-control" name="lahir" value="<?= $user->tempat_lahir;?>" required="required" placeholder="Contoh : Bekasi">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Tanggal Lahir</label>
                                                                <input type="date" class="form-control" name="tgl_lahir" value="<?= $user->tgl_lahir;?>" required="required" placeholder="Contoh : 1999-05-18">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Username</label>
                                                                <input type="text" class="form-control" readonly value="<?= $user->user;?>"  name="user" required="required" placeholder="Username">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Password (opsional)</label>
                                                                <input type="password" class="form-control" name="pass" placeholder="Isi Password Jika di Perlukan Ganti">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Level</label>
                                                                <select name="level" class="form-control" required="required">
                                                                    <option <?php if($user->level == 'Petugas'){ echo 'selected';}?>>Petugas</option>
                                                                    <option <?php if($user->level == 'Anggota'){ echo 'selected';}?>>Anggota</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Jenis Kelamin</label>
                                                                <br/>
                                                                <input type="radio" name="jenkel" <?php if($user->jenkel == 'Laki-Laki'){ echo 'checked';}?> value="Laki-Laki" required="required"> Laki-Laki
                                                                <br/>
                                                                <input type="radio" name="jenkel" <?php if($user->jenkel == 'Perempuan'){ echo 'checked';}?> value="Perempuan" required="required"> Perempuan
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Telepon</label>
                                                                <input id="uintTextBox" class="form-control" value="<?= $user->telepon;?>" name="telepon" required="required" placeholder="Contoh : 089618173609">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>E-mail</label>
                                                                <input type="email"  value="<?= $user->email;?>" readonly class="form-control" name="email" required="required" placeholder="Contoh : fauzan1892@codekop.com">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Pas Foto</label>
                                                                <!-- <input type="file" accept="image/*" name="gambar"> -->
                                                                <br/>
                                                                <img src="<?= base_url('panel/dist/upload/perpus_pengguna/'.$user->foto);?>" class="img-responsive" alt="#">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Alamat</label>
                                                                <textarea class="form-control" name="alamat"  required="required"><?= $user->alamat;?></textarea>
                                                                <input type="hidden" class="form-control" value="<?= $user->id_login;?>" name="id_login">
                                                                <input type="hidden" class="form-control" value="<?= $user->foto;?>" name="foto">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="pull-right">
                                                        <button type="submit" class="btn btn-warning btn-md">Edit Data</button> 
                                                        <a href="<?= base_url('perpus_data/data_pengguna');?>" class="btn btn-danger btn-md">Kembali</a>
                                                    </form>
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
