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
      <div class="card" style="border-top: 8px solid #035AA6;border-bottom: 8px solid #035AA6;border-right: 4px solid #035AA6;border-top-left-radius: 16px;border-bottom-left-radius: 16px;box-shadow: 0px 3px 6px 0px #222;">
        <div class="row">
          <!-- /.row -->
          <div class="animated fadeInLeft col-md-12">
            <div class="card card-info card-outline">
              <div class="card-header">
                <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>arsip_surat/tamu/tamu_tambah"><i class="bi bi-plus-square"> </i> Tambah Data</a>

              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-2">
                <table id="datatb" class="table table-bordered table-hover table-striped" style="font-size: 13px">
                  <thead>
                    <tr class="text-info">
                      <th>No</th>
                      <th>Nama</th>
                      <th>Asal / Instansi</th>
                      <th>Alamat</th>
                      <th>Keperluan</th>
                      <th>No.Telp</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($tamu->result_array() as $data) { ?>
                      <tr>
                        <td class="text-sm"><?php echo $no; ?></td>
                        <td class="text-sm"><?php echo $data['nama_tamu']; ?></td>
                        <td class="text-sm"><?php echo $data['asal']; ?></td>
                        <td class="text-sm"><?php echo $data['alamat']; ?></td>
                        <td class="text-sm"><?php echo $data['keperluan']; ?></td>
                        <td class="text-sm"><?php echo $data['no_telepon']; ?></td>
                        <td style="text-align:center;">
                          <a class="btn btn-warning btn-xs" href="<?php echo base_url() . 'arsip_surat/tamu/tamu_edit/' . $data['id_tamu']; ?>"><i class="bi bi-pencil-square"> </i></a>

                          <a class="btn btn-danger btn-xs" href="<?php echo base_url() . 'arsip_surat/tamu/tamu_hapus/' . $data['id_tamu']; ?>" onclick="return confirm('yakin ingin hapus data ?');"><i class="bi bi-trash"></i></a>
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