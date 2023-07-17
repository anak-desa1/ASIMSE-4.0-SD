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
                    <div class="card-header">
                        <h3 class="card-title">
                        <a href="<?= base_url()?>perpus_data/bukutambah"><button class="btn btn-primary">
						<i class="fa fa-plus"> </i> Tambah Buku</button></a>
                        </h3>
                    </div>

                        <div class="card">
                            <div class="card-body">                           
                                <br/>
                                <div class="table-responsive">
                                    <table id="myTable" class="table-sm" style="font-size: 14px">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Sampul</th>
                                                <th>ISBN</th>
                                                <th>Title</th>
                                                <th>Penerbit</th>
                                                <th>Tahun Buku</th>
                                                <th>Stok Buku</th>
                                                <th>Dipinjam</th>
                                                <th>Tanggal Masuk</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1;foreach($buku->result_array() as $isi){?>
                                            <tr>
                                                <td><?= $no;?></td>
                                                <td>
                                                    <center>
                                                        <?php if(!empty($isi['sampul'] !== '')){?>
                                                        <img src="<?php echo base_url();?>panel/dist/upload/perpus_buku/<?php echo $isi['sampul'];?>" alt="#" 
                                                        class="img-responsive" style="height:auto;width:100px;"/>
                                                        <?php }else{?>
                                                            <i class="fa fa-book fa-3x" style="color:#333;"></i> <br/><br/>
                                                            Tidak Ada Sampul
                                                        <?php }?>
                                                    </center>
                                                </td>
                                                <td><?= $isi['isbn'];?></td>
                                                <td><?= $isi['title'];?></td>
                                                <td><?= $isi['penerbit'];?></td>
                                                <td><?= $isi['thn_buku'];?></td>
                                                <td><?= $isi['jml'];?></td>
                                                <td>
                                                    <?php
                                                        $id = $isi['buku_id'];
                                                        $dd = $this->db->query("SELECT * FROM perpus_pinjam WHERE buku_id= '$id' AND status = 'Dipinjam'");
                                                        if($dd->num_rows() > 0 )
                                                        {
                                                            echo $dd->num_rows();
                                                        }else{
                                                            echo '0';
                                                        }
                                                    ?>
                                                </td>
                                                <td><?= $isi['tgl_masuk'];?></td>
                                                <td> 
                                                    <a href="<?= base_url('perpus_data/bukuedit/'.$isi['id_buku']);?>"><button class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button></a>
                                                    <a href="<?= base_url('perpus_data/bukudetail/'.$isi['id_buku']);?>">
                                                    <button class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></button></a>
                                                    <a href="<?= base_url('perpus_data/prosesbuku?buku_id='.$isi['id_buku']);?>" onclick="return confirm('Anda yakin Buku ini akan dihapus ?');">
                                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>										
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
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</main>
<!-- /.content-wrapper -->
