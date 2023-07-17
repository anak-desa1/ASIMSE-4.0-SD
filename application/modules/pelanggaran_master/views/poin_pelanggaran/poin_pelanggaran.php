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
      <!-- /.row -->
      <div class="row">
        <div class="animated fadeInUp col-12">
          <div class="card card-info card-outline">
            <div class="card-header">
              <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>pelanggaran_master/poin_tambah"><i class="fa fa-plus"> </i> Tambah Data</a>
              <a class="btn btn-danger btn-sm" href="" data-toggle="modal" data-target="#modalImport"><i class="fas fa-file-excel"> </i> Import Excel</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-2">
              <table id="datatb" class="table table-bordered table-hover table-striped">
                <thead>
                  <tr class="text-info">
                    <th>No</th>
                    <th>Jenis Pelanggaran</th>
                    <th>Poin Pelanggaran</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($poin_pelanggaran->result_array() as $data) { ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data['nama_poin_pelanggaran']; ?></td>
                      <td><?php echo $data['poin']; ?></td>
                      <td style="text-align:center;width:80px;">
                        <a class="btn btn-warning btn-xs" href="<?php echo base_url() . 'pelanggaran_master/poin_edit/' . $data['id_poin_pelanggaran']; ?>"><i class="fa fa-edit"> </i> </a> |
                        <?php if ($data['id_poin_pelanggaran'] != "1") { ?>
                          <a class="btn btn-danger btn-xs" href="<?php echo base_url() . 'pelanggaran_master/poin_hapus/' . $data['id_poin_pelanggaran']; ?>" onclick="return confirm('Yakin ingin hapus data ? ');"><i class="fa fa-trash"> </i> </a>
                        <?php } ?>
                      </td>
                    </tr>
                  <?php $no++;
                  } ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->

</main>

<div class="modal fade" id="modalImport">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-info"><i class="far fa-upload"></i></i> Import Data Poin Pelanggaran</h4>
        <button type="submit" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url(); ?>pelanggaran_master/poin_import" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <table class="table-form">
            <tbody>
              <tr>
                <td class="tblabel">Pilih File :&nbsp;<i class="fas fa-file-excel fa-2x text-success"> </i></i> </th>
                <td><input class="form-control" name="file_import" type="file" required /></td>
              </tr>
            </tbody>
          </table>
          <br>
          <p style="margin:0;">- Ukuran Maks <b>5MB</b> dan Format File <b><i class="fas fa-file-excel fa-2x text-success"> </i></i>.xlsx</b>.</p>
          <p style="margin:0;">- Format Data Poin Pelanggarah di unduh <a href="<?php echo base_url(); ?>panel/dist/upload/pelanggran/format/poin_import.xlsx" target="_blank"> <i class="bi bi-cloud-download"></i> DISINI</a></a>
        </div>
      </form>
      <div class="modal-footer">
        <button type="submit" class="btn btn-info"><i class="bi bi-cloud-upload"></i> Simpan</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->