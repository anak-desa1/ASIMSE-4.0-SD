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
            <div class="card" style="border-top: 8px solid #035AA6;border-bottom: 8px solid #035AA6;border-right: 4px solid #035AA6;border-top-left-radius: 16px;border-bottom-left-radius: 16px;box-shadow: 0px 3px 6px 0px #222;">
                <!-- /.row -->
                <div class="row">
                    <div class=" col-md-12">
                        <div class="card card-info card-outline">
                            <div class="card-header col-md-12">

                                <a><i class="bi bi-search text-info"> </i> Cari Data Arsip Berdasarkan</a>
                                <form role="form" action="<?php echo base_url(); ?>arsip_laporan/proses_tampil_arsip" method="post">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Dari Tanggal</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend date" data-date="" data-date-format="yyyy-mm-dd">
                                                        <button type="button" class="btn btn-danger"><i class="bi bi-calendar2-week"></i></button>
                                                    </div>
                                                    <input class="form-control tglcalendar" type="text" name="tgl_awal" placeholder="Dari Tanggal" value="<?php echo $tgl_awal; ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Sampai Tanggal</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend date" data-date="" data-date-format="yyyy-mm-dd">
                                                    <button type="button" class="btn btn-danger"><i class="bi bi-calendar2-week"></i></button>
                                                </div>
                                                <input class="form-control tglcalendar" type="text" name="tgl_akhir" placeholder="Dari Tanggal" value="<?php echo $tgl_akhir; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Jenis Dokumen</label>
                                                <select class="form-control select2" type="text" name="jenis_dokumen">
                                                    <?php echo $combo_jenis_dokumen; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-3">
                                            <label>&nbsp;</label>
                                            <div class="form-group">
                                                <button class="btn btn-info"><i class="bi bi-search"> </i> Tampilkan Data</button>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <label>&nbsp;</label>
                                            <div class="form-group ">
                                                <button class="btn btn-danger float-right" onclick="printDiv('cetak')"><i class="bi bi-printer"> </i> Print Data</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-header -->
                            <!-- TABLE: LATEST ORDERS -->
                            <div class="card" id="cetak">
                                <div class="card-header border-transparent">
                                    <center>
                                        <h3>Laporan Arsip</h3>
                                        <p style="margin:0;">Periode : <?php echo $tgl_awal . ' s/d ' . $tgl_akhir; ?></p>
                                    </center>
                                    <div class="card-tools">

                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <?php if (!empty($laporan_arsip)) { ?>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table m-0 table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Jenis Dokumen</th>
                                                        <th>Lokasi</th>
                                                        <th>Nomor Dok</th>
                                                        <th>Nama Dok</th>
                                                        <th>Tahun Ajaran</th>
                                                        <th>Tanggal Dokumen</th>
                                                        <th>Tanggal Upload</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;

                                                    foreach ($laporan_arsip as $data) {
                                                        $lokasi = $data['nama_ruangan'] . '/' . $data['nama_lemari'] . '/' . $data['nama_rak'] . '/' . $data['nama_box'] . '/' . $data['nama_map'] . '/' . $data['nama_urut']
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $no; ?></td>
                                                            <td><?php echo $data['nama_jenis_dokumen']; ?></td>
                                                            <td><?php echo $lokasi; ?></td>
                                                            <td><?php echo $data['nomor_dokumen']; ?></td>
                                                            <td><?php echo $data['nama_dokumen']; ?></td>
                                                            <td><?php echo $data['tahun_ajaran']; ?></td>
                                                            <td><?php echo date("d-m-Y", strtotime($data['tanggal_dokumen'])); ?></td>
                                                            <td><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
                                                            <td style="text-align:center;">
                          <a class="btn btn-success btn-xs lihat-dokumen" href="" data-toggle="modal" data-target="#modalView" data-jenis_dokumen="<?php echo $data['nama_jenis_dokumen']; ?>" data-lokasi="<?php echo $lokasi; ?>" data-tanggal="<?php echo date("d-m-Y", strtotime($data['tanggal'])); ?>" data-tanggal_dokumen="<?php echo date("d-m-Y", strtotime($data['tanggal_dokumen'])); ?>" data-nama_dokumen="<?php echo $data['nama_dokumen']; ?>" data-deskripsi="<?php echo $data['deskripsi']; ?>" data-file_dokumen="<?php echo $data['file_dokumen']; ?>" data-nomor_dokumen="<?php echo $data['nomor_dokumen']; ?>"><i class="bi bi-search"> </i> </a>
                          <?php if ($data['nama_jenis_dokumen'] == 'Ijazah') { ?>
                            <a class="btn btn-info btn-xs" href="<?php echo base_url() . 'panel/dist/upload/ijazah/' . $data['file_dokumen']; ?>" target="_blank"><i class="bi bi-box-arrow-down"> </i> </a>
                          <?php } ?>
                          <?php if ($data['nama_jenis_dokumen'] == 'Surat Masuk') { ?>
                            <a class="btn btn-info btn-xs" href="<?php echo base_url() . 'panel/dist/upload/surat_masuk/' . $data['file_dokumen']; ?>" target="_blank"><i class="bi bi-box-arrow-down"> </i> </a>
                          <?php } ?>
                          <?php if ($data['nama_jenis_dokumen'] == 'Surat Keluar') { ?>
                            <a class="btn btn-info btn-xs" href="<?php echo base_url() . 'panel/dist/upload/surat_keluar/' . $data['file_dokumen']; ?>" target="_blank"><i class="bi bi-box-arrow-down"> </i> </a>
                          <?php } ?>
                          <?php if ($data['nama_jenis_dokumen'] == 'Surat Keputusan') { ?>
                            <a class="btn btn-info btn-xs" href="<?php echo base_url() . 'panel/dist/upload/surat_keputusan/' . $data['file_dokumen']; ?>" target="_blank"><i class="bi bi-box-arrow-down"> </i> </a>
                          <?php } ?>
                          <?php if ($data['nama_jenis_dokumen'] == 'Surat Undangan') { ?>
                            <a class="btn btn-info btn-xs" href="<?php echo base_url() . 'panel/dist/upload/surat_undangan/' . $data['file_dokumen']; ?>" target="_blank"><i class="bi bi-box-arrow-down"> </i> </a>
                          <?php } ?>
                          <?php if ($data['nama_jenis_dokumen'] == 'Surat Permohonan') { ?>
                            <a class="btn btn-info btn-xs" href="<?php echo base_url() . 'panel/dist/upload/surat_permohonan/' . $data['file_dokumen']; ?>" target="_blank"><i class="bi bi-box-arrow-down"> </i> </a>
                          <?php } ?>
                          <?php if ($data['nama_jenis_dokumen'] == 'Surat Pemberitahuan') { ?>
                            <a class="btn btn-info btn-xs" href="<?php echo base_url() . 'panel/dist/upload/surat_pemberitahuan/' . $data['file_dokumen']; ?>" target="_blank"><i class="bi bi-box-arrow-down"> </i> </a>
                          <?php } ?>
                          <?php if ($data['nama_jenis_dokumen'] == 'Surat Peminjaman') { ?>
                            <a class="btn btn-info btn-xs" href="<?php echo base_url() . 'panel/dist/upload/surat_peminjaman/' . $data['file_dokumen']; ?>" target="_blank"><i class="bi bi-box-arrow-down"> </i> </a>
                          <?php } ?>
                          <?php if ($data['nama_jenis_dokumen'] == 'Surat Pernyataan') { ?>
                            <a class="btn btn-info btn-xs" href="<?php echo base_url() . 'panel/dist/upload/surat_pernyataan/' . $data['file_dokumen']; ?>" target="_blank"><i class="bi bi-box-arrow-down"> </i> </a>
                          <?php } ?>
                          <?php if ($data['nama_jenis_dokumen'] == 'Surat Mandat') { ?>
                            <a class="btn btn-info btn-xs" href="<?php echo base_url() . 'panel/dist/upload/surat_mandat/' . $data['file_dokumen']; ?>" target="_blank"><i class="bi bi-box-arrow-down"> </i> </a>
                          <?php } ?>
                          <?php if ($data['nama_jenis_dokumen'] == 'Surat Tugas') { ?>
                            <a class="btn btn-info btn-xs" href="<?php echo base_url() . 'panel/dist/upload/surat_tugas/' . $data['file_dokumen']; ?>" target="_blank"><i class="bi bi-box-arrow-down"> </i> </a>
                          <?php } ?>
                          <?php if ($data['nama_jenis_dokumen'] == 'Surat Keterangan') { ?>
                            <a class="btn btn-info btn-xs" href="<?php echo base_url() . 'panel/dist/upload/surat_keterangan/' . $data['file_dokumen']; ?>" target="_blank"><i class="bi bi-box-arrow-down"> </i> </a>
                          <?php } ?>
                          <?php if ($data['nama_jenis_dokumen'] == 'Surat Rekomendasi') { ?>
                            <a class="btn btn-info btn-xs" href="<?php echo base_url() . 'panel/dist/upload/surat_rekomendasi/' . $data['file_dokumen']; ?>" target="_blank"><i class="bi bi-box-arrow-down"> </i> </a>
                          <?php } ?>
                          <?php if ($data['nama_jenis_dokumen'] == 'Surat Balasan') { ?>
                            <a class="btn btn-info btn-xs" href="<?php echo base_url() . 'panel/dist/upload/surat_balasan/' . $data['file_dokumen']; ?>" target="_blank"><i class="bi bi-box-arrow-down"> </i> </a>
                          <?php } ?>
                          <?php if ($data['nama_jenis_dokumen'] == 'Surat Perintah Perjalanan Dinas') { ?>
                            <a class="btn btn-info btn-xs" href="<?php echo base_url() . 'panel/dist/upload/surat_perintah_perjalanan_dinas/' . $data['file_dokumen']; ?>" target="_blank"><i class="bi bi-box-arrow-down"> </i> </a>
                          <?php } ?>
                          <?php if ($data['nama_jenis_dokumen'] == 'Sertifikat') { ?>
                            <a class="btn btn-info btn-xs" href="<?php echo base_url() . 'panel/dist/upload/sertifikat/' . $data['file_dokumen']; ?>" target="_blank"><i class="bi bi-box-arrow-down"> </i> </a>
                          <?php } ?>
                          <?php if ($data['nama_jenis_dokumen'] == 'Perjanjian Kerja') { ?>
                            <a class="btn btn-info btn-xs" href="<?php echo base_url() . 'panel/dist/upload/perjanjian_kerja/' . $data['file_dokumen']; ?>" target="_blank"><i class="bi bi-box-arrow-down"> </i> </a>
                          <?php } ?>
                          <?php if ($data['nama_jenis_dokumen'] == 'Surat Pengantar') { ?>
                            <a class="btn btn-info btn-xs" href="<?php echo base_url() . 'panel/dist/upload/surat_pengantar/' . $data['file_dokumen']; ?>" target="_blank"><i class="bi bi-box-arrow-down"> </i> </a>
                          <?php } ?>
                          <?php if ($data['nama_jenis_dokumen'] == 'Surat Pindah') { ?>
                            <a class="btn btn-info btn-xs" href="<?php echo base_url() . 'panel/dist/upload/surat_pindah/' . $data['file_dokumen']; ?>" target="_blank"><i class="bi bi-box-arrow-down"> </i> </a>
                          <?php } ?>
                          <?php if ($data['nama_jenis_dokumen'] == 'Surat Pengesahan') { ?>
                            <a class="btn btn-info btn-xs" href="<?php echo base_url() . 'panel/dist/upload/surat_pengesahan/' . $data['file_dokumen']; ?>" target="_blank"><i class="bi bi-box-arrow-down"> </i> </a>
                          <?php } ?>
                          <?php if ($data['nama_jenis_dokumen'] == 'Laporan Bulanan') { ?>
                            <a class="btn btn-info btn-xs" href="<?php echo base_url() . 'panel/dist/upload/laporan_bulanan/' . $data['file_dokumen']; ?>" target="_blank"><i class="bi bi-box-arrow-down"> </i> </a>
                          <?php } ?>                        
                        </td>
                                                        </tr>
                                                    <?php $no++;
                                                    } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.table-responsive -->
                                    </div>
                                <?php } ?>
                                <!-- /.card-body -->
                                <!-- /.card-footer -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
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

<div class="modal fade" id="modalView">
  <div class="modal-dialog modal-lg">
    <div class="modal-content card card-primary card-outline">
      <div class="modal-header">
        <h4 class="modal-title">Detail Document</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <table class="table">
          <tbody>
            <tr>
              <td>Nomor Dokumen</td>
              <td class="nomor_dokumen"></td>
            </tr>
            <tr>
              <td>Jenis Dokumen</td>
              <td class="jenis_dokumen"></td>
            </tr>
            <tr>
              <td>Deskripsi</td>
              <td class="deskripsi"></td>
            </tr>
            <tr>
              <td>Nama Dokumen</td>
              <td class="nama_dokumen"></td>
            </tr>
            <tr>
              <td>Nama File</td>
              <td class="file_dokumen"></td>
            </tr>
            <tr>
              <td>Tanggal Dokumen</td>
              <td class="tanggal_dokumen"></td>
            </tr>
            <tr>
              <td>Tanggal Upload</td>
              <td class="tanggal"></td>
            </tr>
            <tr>
              <td>Lokasi Penyimpanan</td>
              <td class="lokasi"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- jQuery -->
<script src="<?= base_url() ?>panel/plugins/jquery/jquery.min.js"></script>

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