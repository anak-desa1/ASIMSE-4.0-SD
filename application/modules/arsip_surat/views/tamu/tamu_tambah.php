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
    <section class="content" style="font-size: 13px">
        <div class="container-fluid">
            <div class="card" style="border-top: 8px solid #035AA6;border-bottom: 8px solid #035AA6;border-right: 4px solid #035AA6;border-top-left-radius: 16px;border-bottom-left-radius: 16px;box-shadow: 0px 3px 6px 0px #222;">

                <div class="row">
                    <!-- /.row -->
                    <div class="animated fadeInLeft col-md-8">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-ballot"></i> Input <?php echo $judul; ?></h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>arsip_surat/tamu/tamu_save" method="post">

                                <?php if ($this->session->flashdata('error')) { ?>
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <span style="text-align: left;"><?php echo $this->session->flashdata('error'); ?></span>
                                    </div>
                                <?php } ?>

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nama</label>
                                        <div class="col-sm-12">
                                            <input type="hidden" name="tipe" value="<?php echo $tipe; ?>">
                                            <input type="hidden" name="id_tamu" value="<?php echo $id_tamu; ?>">
                                            <input type="text" class="form-control" name="nama_tamu" value="<?php echo $nama_tamu; ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Asal/Instansi</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="asal" value="<?php echo $asal; ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Alamat</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="alamat" value="<?php echo $alamat; ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Keperluan</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="keperluan" value="<?php echo $keperluan; ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">No Telepon</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="no_telepon" value="<?php echo $no_telepon; ?>" required>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info float-right ml-3"><i class="bi bi-save"> </i> Simpan</button>
                                    <a class="btn btn-danger float-right" href="<?php echo base_url(); ?>arsip_surat/tamu"><i class="bi bi-arrow-counterclockwise"> </i> Kembali</a>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
                    </div>
                    <div class="animated fadeInRight col-md-4">
                        <div class="callout callout-info">
                            <div class="card-body">
                                <br>
                                <h4><span class="bi bi-info-circle-fill text-danger"></span> Petunjuk dan Bantuan</h4>
                                <ol>
                                    <li>
                                        Isi <b><?php echo $judul; ?></b> selengkap dan sebenar mungkin.
                                    </li>
                                    <li>
                                        Gunakan <i>button</i>
                                        <button class="btn btn-xs btn-info"><span class="bi bi-save"></span> Simpan </button>
                                        untuk menambahkan <b><?php echo $judul; ?></b>.
                                    </li>
                                </ol>
                                <p>
                                    Untuk <b>Keterangan</b> dan <b>Informasi</b> lebih lanjut silahkan hubungi <b>Bagian IT (Information &amp; Technology)</b>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- /.content -->

</main>

<?php if ($this->session->flashdata('success')) {
    echo '<script>
                    toastr.options.timeOut = 2000;
                    toastr.success("' . $this->session->flashdata('success') . '");
                    </script>';
} ?>

<?php if ($this->session->flashdata('error')) {
    echo '<script>
       toastr.options.timeOut = 2000;
       toastr.error("' . $this->session->flashdata('error') . '");
       </script>';
} ?>