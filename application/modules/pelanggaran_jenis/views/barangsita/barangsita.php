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
              <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>pelanggaran_jenis/barangsita/barangsita_tambah"><i class="fa fa-plus"> </i> Tambah Data</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-2">
              <table id="datatb" class="table table-bordered table-hover table-striped">
                <thead>
                  <tr class="text-info">
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Barang Sitaan</th>
                    <th>Tanggal Sita</th>
                    <th>Dinput Oleh</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($barangsita->result_array() as $data) {
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
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data['nama_siswa']; ?></td>
                      <td><?php echo $data['nama_kelas']; ?></td>
                      <td><?php echo $data['keterangan_sita']; ?></td>
                      <td><?php echo date("d-m-Y", strtotime($data['tanggal_sita'])); ?></td>
                      <td><?php echo $nama_penginput; ?></td>
                      <td style="text-align:center;">
                        <a class="btn btn-info btn-xs" href="<?php echo base_url() . 'pelanggaran_jenis/barangsita/barangsita_edit/' . $data['id_barangsita_siswa']; ?>"><i class="fa fa-edit"> </i> Ubah </a>

                        <a class="btn btn-danger btn-xs" href="<?php echo base_url() . 'pelanggaran_jenis/barangsita/barangsita_hapus/' . $data['id_barangsita_siswa']; ?>"><i class="fa fa-trash"> </i> Hapus </a>
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