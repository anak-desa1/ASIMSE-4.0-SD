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
                            <div class="card-header">
                                <h5 class="card-title">Data Guru dan Pegawai</h5>
                            </div>                                                  
                            <div class="card-body">                        
                                <div class="pull-right">
                                    <a href="<?= base_url('perpus_data/data_pengguna');?>" class="btn btn-danger btn-md">Kembali</a>
                                </div>                        
                                <br/>                                   
                                <div class="row">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th>Nama Guru dan Pegawai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1 ?>
                                            <?php foreach ($guru as $k) :
                                                    if ($k['stat_data'] == 'A') { ?>
                                                    <tr>                                                    
                                                        <td class="text-center"><?= $no++ ?> </td>                                                        
                                                        <td> <?= $k['nama_guru'] ?></td>                                                 
                                                    </tr>
                                            <?php }
                                                endforeach ?>
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
