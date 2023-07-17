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
          <div class="animated fadeInLeft col-md-8">
            <div class="card card-info card-outline">
              <div class="card-header">
                <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>arsip_master/box_tambah"><i class="bi bi-plus-square"> </i> Tambah Data</a>

              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-2">
                <table id="datatb" class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr class="text-info">
                      <th>No</th>
                      <th>Box Penyimpanan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($box->result_array() as $data) { ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['nama_box']; ?></td>
                        <td style="text-align:center;">
                          <a class="btn btn-warning btn-sm" href="<?php echo base_url() . 'arsip_master/box_edit/' . $data['id_box']; ?>"><i class="bi bi-pencil-square"> </i> </a>
                          <a href="<?php echo base_url('arsip_master/box_delete/' . $data['id_box']) ?>">
                            <button onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini ?')" class="btn btn-flat btn-sm btn-danger" title="Delete"><i class="bi bi-trash"></i></button>
                          </a>
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


          <div class="animated fadeInRight col-md-4">
            <div class="callout callout-info">
              <br>
              <div class="card-body">
                <h4><span class="bi bi-info-circle-fill text-danger"></span> Petunjuk dan Bantuan</h4>
                <ol>
                  <li>
                    Isi <b><?= $title; ?></b> selengkap dan sebenar mungkin.
                  </li>
                  <li>
                    Gunakan <i>button</i>
                    <button class="btn btn-xs btn-info"><span class="bi bi-plus-square"></span> Tambah </button>
                    untuk menambahkan <b><?= $title; ?></b>.
                  </li>
                  <li>
                    Gunakan <i>button</i>
                    <button class="btn btn-xs btn-warning"><span class="bi bi-pencil-square"></span> Edit </button>
                    untuk Merubah <b><?= $title; ?></b>.
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