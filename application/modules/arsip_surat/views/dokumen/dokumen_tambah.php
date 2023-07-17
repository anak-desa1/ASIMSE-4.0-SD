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
  <section class="content" style="font-size: 14px">
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
              <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>arsip_surat/dokumen/dokumen_save" method="post" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $id_dokumen; ?>" name="id_dokumen">
                <input type="hidden" value="<?php echo $tipe; ?>" name="tipe">
                <?php if ($this->session->flashdata('error')) { ?>
                  <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="fa fa-remove"></i>
                    </button>
                    <span style="text-align: left;"><?php echo $this->session->flashdata('error'); ?></span>
                  </div>
                <?php } ?>

                <div class="card-body col-sm-12">
                  <div class="row">
                    <div class="form-group col-md-3 mr-2">
                      <label>Ruangan</label>
                      <select class="form-control select2" name="id_ruangan" required style="font-size: 14px">
                        <?php echo $combo_ruangan;  ?>
                      </select>
                    </div>

                    <div class="form-group col-md-3 mr-2">
                      <label>Lemari</label>
                      <select class="form-control select2" name="id_lemari" required style="font-size: 14px">
                        <?php echo $combo_lemari;  ?>
                      </select>
                    </div>
                    <div class="form-group col-md-3 mr-2">
                      <label>Rak</label>
                      <select class="form-control select2" name="id_rak" required style="font-size: 14px">
                        <?php echo $combo_rak;  ?>
                      </select>
                    </div>
                    <div class="form-group col-md-3 mr-2">
                      <label>Box</label>
                      <select class="form-control select2" name="id_box" required style="font-size: 14px">
                        <?php echo $combo_box;  ?>
                      </select>
                    </div>
                    <div class="form-group col-md-3 mr-2">
                      <label>Map</label>
                      <select class="form-control select2" name="id_map" required style="font-size: 14px">
                        <?php echo $combo_map;  ?>
                      </select>
                    </div>
                    <div class="form-group col-md-3 mr-2">
                      <label>Urut</label>
                      <select class="form-control select2" name="id_urut" required style="font-size: 14px">
                        <?php echo $combo_urut;  ?>
                      </select>
                    </div>
                  </div>
                  <hr>
                  <div class="form-group col-md-6">
                    <label>Tanggal Dokumen</label>
                    <input type="date" class="form-control" name="tanggal_dokumen" value="<?php echo $tanggal_dokumen; ?>" required style="font-size: 14px">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Jenis Dokumen</label>
                    <select class="form-control select2" name="nama_jenis_dokumen" required style="font-size: 14px">
                      <?php echo $combo_jenis_dokumen;  ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Nomor Dokumen</label>
                    <input type="text" class="form-control" name="nomor_dokumen" value="<?php echo $nomor_dokumen; ?>" required style="font-size: 14px">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Nama Dokumen</label>
                    <input type="text" class="form-control" name="nama_dokumen" value="<?php echo $nama_dokumen; ?>" required style="font-size: 14px">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Deskripsi</label>
                    <input type="text" class="form-control" name="deskripsi" value="<?php echo $deskripsi; ?>" required style="font-size: 14px">
                  </div>
                  <div class="form-group col-md-6">
                    <label>File</label>
                    <input type="file" class="form-control" name="file_dokumen">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Tahun Ajaran</label>
                    <select class="form-control select2" name="tahun_ajaran" required style="font-size: 14px">
                      <?php echo $combo_tahun_ajaran;  ?>
                    </select>
                  </div>

                </div>

                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info float-right ml-3"><i class="bi bi-save"> </i> Simpan</button>
                  <a class="btn btn-danger float-right" href="<?php echo base_url(); ?>arsip_surat/dokumen"><i class="bi bi-arrow-counterclockwise"> </i> Kembali</a>
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