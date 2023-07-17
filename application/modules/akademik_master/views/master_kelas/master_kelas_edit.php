<!-- Content Wrapper. Contains page content -->
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
        <div class="modal-body">
            <div class="card">
                <div class="modal-header">
                    <h4 class="modal-title"><?= ucwords($this->uri->segment(3, 0)) ?> Data</h4>
                </div>
                <div class="col-12">
                    <div class="modal-body">
                        <?= form_open_multipart(base_url('akademik_master/master_kelas/update')); ?>
                        <input type="hidden" name="_id" id="_id" value="<?= $data['id']; ?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="kode" class="col-sm-3 control-label">Tingkat</label>
                                <div class="col-sm-9">
                                    <input type="text" name="tingkat" value="<?= $data['tingkat'] ?>" class="form-control" id="tingkat" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama" class="col-sm-3 control-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nama" value="<?= $data['nama'] ?>" class="form-control" id="nama" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-save2"></i> Simpan</button>
                        <a href="<?= base_url() . 'akademik_master/master_kelas'; ?>" class="btn btn-default" data-dismiss="modal"><i class="bi bi-arrow-counterclockwise"></i> Kembali</a>
                        <div class="clearfix"></div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- /.content -->
        </div>
    </section>
    <!-- /.content -->

</main>