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
                                                <a href="<?= base_url('perpus_data/data_pengguna/tambah_pengguna');?>"><button class="btn btn-primary"><i class="fa fa-plus"> </i> Umum</button></a>   
                                                <a href="<?= base_url('perpus_data/data_pengguna/tambah_guru');?>"><button class="btn btn-secondary"><i class="fa fa-eye"> </i> Guru</button></a>
                                                <a href="<?= base_url('perpus_data/data_pengguna/tambah_siswa');?>"><button class="btn btn-success"><i class="fa fa-eye"> </i> Siswa</button></a>                                         
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                            <div class="table-responsive">
                                                <br/>
                                                <table id="myTable" class="table table-bordered table-striped table" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>ID</th>
                                                            <th>Foto</th>
                                                            <th>Nama</th> 
                                                            <th>Jenkel</th>                                       
                                                            <th>Telepon</th>                                                            
                                                            <th>Alamat</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $no=1;foreach($user as $isi){?>
                                                        <tr>
                                                            <td><?= $no;?></td>
                                                            <td><?= $isi['anggota_id'];?></td>
                                                            <td>
                                                                <center>
                                                                    <?php if(!empty($isi['foto'] !== '')){?>
                                                                    <img src="<?php echo base_url();?>panel/dist/upload/perpus_pengguna/<?php echo $isi['foto'];?>" alt="#" 
                                                                    class="img-responsive" style="height:auto;width:100px;"/>
                                                                    <?php }else{?>
                                                                        <i class="fa fa-user fa-3x" style="color:#333;"></i>
                                                                    <?php }?>
                                                                </center>
                                                            </td>
                                                            <td><?= $isi['nama'];?></td>                                                           
                                                            <td><?= $isi['jenkel'];?></td> 
                                                            <td><?= $isi['telepon'];?></td>                                                           
                                                            <td><?= $isi['alamat'];?></td>
                                                            <td style="width:20%;">
                                                                <a href="<?= base_url('perpus_data/data_pengguna/edit_pengguna/'.$isi['id_login']);?>"><button class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
                                                                <a href="<?= base_url('perpus_data/data_pengguna/del_pengguna/'.$isi['id_login']);?>" onclick="return confirm('Anda yakin user akan dihapus ?');">
                                                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                                            </td>
                                                        </tr>
                                                    <?php $no++;}?>
                                                    </tbody>
                                                </table>
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

