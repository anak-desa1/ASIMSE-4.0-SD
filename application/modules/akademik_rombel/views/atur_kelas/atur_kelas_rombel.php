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
                 <div class="col-md-12">

                     <!-- About Me Box -->
                     <div class="card card-info">
                         <div class="card-header">
                             <h3 class="card-title">Kelas : <?= ucwords($this->uri->segment(4, 0)) ?></h3>
                         </div>
                         <!-- /.card-header -->
                         <!-- <div class="card-body">
                             <hr>
                             <p class="text-muted"><?= $data['nama_campus'] ?> || <?= $data['nama_sekolah'] ?> || <?= $data['rombel'] ?> </p>
                             <p class="text-muted"><?= $ta ?> || <?= $data['nama_lengkap'] ?></p>
                             <hr>
                         </div> -->
                         <!-- /.card-body -->
                     </div>
                     <!-- /.card -->
                 </div>
                 <!-- /.col -->
                 <div class="col-md-12">
                     <div class="card">
                         <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                         <?= $this->session->flashdata('message'); ?>
                         <div class="tampil-modal"></div>
                         <div class="card-header p-2">
                             <?php if ($cek_akses['role_id'] == 1) : ?>
                                 <!-- <button type="button" class="btn btn-info mb-3 btn-action">
                                     <i class="fa fa-plus-circle"></i> Tambah Data
                                 </button> -->
                                 <a class="btn btn-danger mb-3" href="<?= site_url('akademik_rombel/atur_kelas') ?>">
                                     <i class="fa fa-arrow-circle-left"></i> Kembali
                                 </a>
                             <?php endif ?>
                         </div><!-- /.card-header -->
                         <div class="card-body">
                             <div class="tab-content">
                                 <div class="active tab-pane" id="activity">
                                     <!-- Table row -->
                                     <div class="row">
                                         <div class="col-12 table-responsive">
                                             <table class="table table-striped">

                                                 <thead>
                                                     <tr>
                                                         <th>#</th>
                                                         <th>Nama</th>
                                                         <th>NIS</th>
                                                         <th>NISN</th>
                                                         <th>Tempat Lahir</th>
                                                         <th>Tanggal Lahir</th>
                                                         <th>Jenis Kelamin</th>
                                                         <th>Agama</th>
                                                         <th>Telp Siswa</th>
                                                         <th>Rombel</th>
                                                         <!-- <th>Action</th> -->
                                                     </tr>
                                                 </thead>
                                                 <tbody>
                                                     <?php
                                                        $i = 1;
                                                        $total = 0; ?>
                                                     <?php foreach ($siswa as $s) :
                                                            if ($s['ta'] == $ta) { ?>
                                                             <tr>
                                                                 <td><?= $i; ?></td>
                                                                 <td><?= $s['nama']; ?></td>
                                                                 <td><?= $s['nis']; ?></td>
                                                                 <td><?= $s['nisn']; ?></td>
                                                                 <td><?= $s['tmp_lahir']; ?></td>
                                                                 <td><?= $s['tgl_lahir']; ?></td>
                                                                 <td><?= $s['jk']; ?></td>
                                                                 <td><?= $s['agama']; ?></td>
                                                                 <td><?= $s['notelp']; ?></td>
                                                                 <td><?= $s['rombel']; ?></td>
                                                             </tr>
                                                             <?php $i++ ?>
                                                     <?php }
                                                        endforeach ?>
                                                 </tbody>
                                             </table>
                                         </div>
                                         <!-- /.col -->
                                     </div>
                                     <!-- /.row -->
                                 </div>
                                 <!-- /.tab-pane -->
                             </div>
                             <!-- /.tab-content -->
                         </div><!-- /.card-body -->
                     </div>
                     <!-- /.nav-tabs-custom -->
                 </div>
                 <!-- /.col -->
             </div>
             <!-- /.row -->
         </div><!-- /.container-fluid -->
     </section>
     <!-- /.content -->

 </main>