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
  <section class="content animated fadeInUp ">
    <div class="container-fluid">
      <!-- /.row -->
      <div class="row">
        <div class=" col-12">
          <div class="card card-info card-outline">
            <div class="card-header">
              <a class="btn btn-info btn-sm bg-navy" href="<?php echo base_url(); ?>pelanggaran_jenis/pelanggaran/pelanggaran_tambah"><i class="fa fa-plus"> </i> Tambah Data</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-2">
              <table id="datatb" class="table table-bordered table-hover table-striped">
                <thead>
                  <tr class="text-info bg-navy">
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Pelanggaran</th>
                    <th>Poin</th>
                    <th>Tanggal</th>
                    <th>Penginput</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($pelanggaran_siswa->result_array() as $data) {
                    if (!empty($data['id_penginput'])) {
                      $get = $this->db->query("SELECT nama_guru FROM mst_guru WHERE id_guru = '$data[id_penginput]'");
                      if ($get->num_rows() > 0) {
                        $d_get = $get->row();
                        $nama_penginput = $d_get->nama_guru;
                      } else {
                        $nama_penginput = 'Administrator';
                      }
                    } else {
                      $nama_penginput = '';
                    }
                  ?>
                    <tr>
                      <td class="text-sm"><?php echo $no; ?></td>
                      <td class="text-sm"><?php echo $data['nama_siswa']; ?></td>
                      <td class="text-sm"><?php echo $data['nama_kelas']; ?></td>
                      <td class="text-sm" style="width:300px"><?php echo $data['nama_poin_pelanggaran']; ?></td>
                      <td class="text-sm"><?php echo $data['poin_minus']; ?></td>
                      <td class="text-sm"><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
                      <td class="text-sm"><?php echo $nama_penginput; ?></td>
                      <td style="text-align:center;width:100px;">
                        <div class="btn-group btn-group-sm">
                          <a class="btn btn-info btn-xs" href="<?php echo base_url() . 'pelanggaran_jenis/pelanggaran/pelanggaran_detail/' . $data['id_siswa']; ?>"><i class="fa fa-eye"> </i> </a>
                          <a class="btn bg-navy btn-xs" href="<?php echo base_url() . 'pelanggaran_jenis/pelanggaran/pelanggaran_edit/' . $data['id_pelanggaran_siswa']; ?>"><i class="fa fa-edit"> </i> </a>
                          <a class="btn btn-danger btn-xs" href="<?php echo base_url() . 'pelanggaran_jenis/pelanggaran/pelanggaran_hapus/' . $data['id_pelanggaran_siswa']; ?>" onclick="return confirm('Yakin ingin hapus data ?');"><i class="fa fa-trash"> </i> </a>
                        </div>
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
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url(); ?>pelanggaran_jenis/poin_import" method="post" enctype="multipart/form-data">
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
          <p style="margin:0;">- Format Data Poin Pelanggarah di unduh <a href="<?php echo base_url(); ?>upload/format/poin_import.xlsx" target="_blank"> <i class="fal fa-download"></i> DISINI</a></a>
        </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-info"><i class="far fa-upload"></i> Simpan</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->