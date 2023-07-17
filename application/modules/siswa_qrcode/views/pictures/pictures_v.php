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
                                <br>
                                <div class='box-header with-border'>
                                    <h3 class='box-title'><i class='fa fa-edit'></i>UPLOAD FOTO SISWA</h3>
                                </div>

                                <?= form_error('email', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                                <div class="flash-data" data-flashdata=""><?= $this->session->flashdata('message'); ?></div>

                                <form class='form-horizontal' role='form' method=POST action='<?= base_url() ?>siswa_qrcode/pictures/upload' enctype='multipart/form-data'><br>
                                    <input type='hidden' name='id_blangko' value='<?= $balangko['id_blangko'] ?>'>
                                    <div class='box-body'>
                                        <div class="alert bg-red alert-dismissible">
                                            <h4><i class="icon fa fa-info-circle"></i> Informasi Penting</h4>
                                            <div class="box-body">
                                                Untuk upload foto file diberi mana nis siswa dengan format .jpeg lalu block semua gambar klik kanan lalau add to archive pilih .zip .<br>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class='form-group'>
                                        <label class='col-sm-3 control-label'>Nama Folder :</label>
                                        <div class='col-sm-6'>
                                            <input type="text" class='form-control' name="folder" />
                                        </div>
                                    </div> -->
                                    <div class='form-group'>
                                        <label class='col-sm-3 control-label'>File Foto [.zip] : max data 5 MB</label>
                                        <div class='col-sm-6'>
                                            <input type='file' class='form-control' name='folder'>
                                        </div>
                                    </div>
                                    <div class='form-group'>
                                        <label class='col-sm-3 control-label'></label>
                                        <div class='col-sm-6'>
                                            <button style="width: 100px" type="submit" name="simpan" class="btn btn-flat btn-primary">SIMPAN</button>
                                            <!-- <a href="home"><button style="width: 100px" type="button" class="btn btn-flat btn-danger">BATAL</button></a> -->
                                        </div>
                                    </div><br>
                                </form>

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