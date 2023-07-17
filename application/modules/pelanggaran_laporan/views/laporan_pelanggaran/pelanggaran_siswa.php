<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<?php
$sekolah = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
?>
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
        <div class=" col-md-12">
          <div class="card card-info card-outline">
            <div class="card-header col-md-12">

              <a><i class="fa fa-file-search text-info"> </i> Cari Data Pelanggaran Berdasarkan</a>
              <form role="form" action="<?php echo base_url(); ?>pelanggaran_laporan/proses_tampil_pelanggaran" method="post">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Cari Siswa</label>
                      <input id="cari-siswa" class="form-control" type="text" name="id_siswa" placeholder="Cari Siswa">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Dari Tanggal</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend date" data-date="" data-date-format="yyyy-mm-dd">
                          <button type="button" class="btn btn-danger"><i class="bi bi-calendar2-week"></i></button>
                        </div>
                        <input class="form-control tglcalendar" type="text" name="tgl_awal" readonly="readonly" placeholder="Dari Tanggal" value="<?php echo $tgl_awal; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label>Sampai Tanggal</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend date" data-date="" data-date-format="yyyy-mm-dd">
                        <button type="button" class="btn btn-danger"><i class="bi bi-calendar2-week"></i></button>
                      </div>
                      <input class="form-control tglcalendar" type="text" name="tgl_akhir" readonly="readonly" placeholder="Dari Tanggal" value="<?php echo $tgl_akhir; ?>" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Kelas</label>
                      <select class="form-control select2" type="text" name="id_kelas">
                        <?php echo $combo_kelas; ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Tahun Ajaran</label>
                      <div class="form-group">
                        <select class="form-control select2" type="text" name="tahun_ajaran">
                          <?php echo $combo_tahun_ajaran; ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Cari Berdasarkan Pelanggaran</label>
                      <select class="form-control select2" type="text" name="id_poin_pelanggaran">
                        <?php echo $combo_poin_pelanggaran; ?>
                      </select>
                    </div>
                  </div>
                  <div class="btn-group btn-group-sm">
                    <label>&nbsp;</label>
                    <div class="form-group">
                      <button class="btn btn-info"><i class="fa fa-search "> </i> Tampilkan Data</button>

                    </div>

                    <label>&nbsp;</label>
                    <div class="form-group ">
                      <button class="btn btn-danger btn-block float-right" onclick="printDiv('cetak')"><i class="fa fa-print "> </i> Print Data</button>
                    </div>

                  </div>
                </div>
              </form>
            </div>
            <!-- /.card-header -->
            <!-- TABLE: LATEST ORDERS -->
            <?php if (!empty($pelanggaran_siswa)) { ?>
              <div class="card" id="cetak">
                <div class="card-header border-transparent">
                  <center>
                    <h4 class="m-0 text-dark mt-3" style="text-shadow: 2px 2px 4px #17a2b8;">
                      <img src="<?php echo 'http://' . $_SERVER['SERVER_NAME'] . '/asis/asispanel/upload/' . $sekolah->logo; ?>" alt="Logo" class="brand-image img-rounded " style="width:60px;height:60px;">
                      <br><?php echo $nama_sekolah ?>
                    </h4>
                    <h4 style="margin:0;">Laporan Pelanggaran Siswa </h4>
                    <p style="margin:0;">Tahun Ajaran : <?php echo str_replace("-", "/", $tahun_ajaran); ?></p>
                    <p style="margin:0;">Periode : <?php echo $tgl_awal . ' s/d ' . $tgl_akhir; ?></p>
                  </center>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table m-0 table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Tanggal</th>
                          <th>NIS</th>
                          <th>Nama Siswa</th>
                          <th>Kelas</th>
                          <th>Pelanggaran</th>
                          <th>Sanksi</th>
                          <th class="text-center">Poin</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        $total_poin = 0;
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

                          $get_interval = $this->db->query("SELECT * FROM mst_sanksi WHERE $data[poin_minus] BETWEEN dari_poin AND sampai_poin");
                          if ($get_interval->num_rows() > 0) {
                            $d_sanksi = $get_interval->row();
                            $sanksi = $d_sanksi->sanksi;
                          } else {
                            $sanksi = '';
                          }

                          $total_poin += $data['poin_minus'];
                        ?>
                          <tr>
                            <td class="text-sm"><?php echo $no; ?></td>
                            <td class="text-sm"><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
                            <td class="text-sm"><?php echo $data['nis']; ?></td>
                            <td class="text-sm"><?php echo $data['nama_siswa']; ?></td>
                            <td class="text-sm"><?php echo $data['nama_kelas']; ?></td>
                            <td class="text-sm" style="width:300px"><?php echo $data['nama_poin_pelanggaran']; ?></td>
                            <td class="text-sm"><?php echo $sanksi; ?></td>
                            <td class="text-sm" class="text-center"><?php echo $data['poin_minus']; ?></td>
                          </tr>
                        <?php $no++;
                        } ?>
                        <tr>
                          <td colspan="7" class="text-center" style="font-weight:bold;">Total Poin</td>
                          <td style="font-weight:bold;" class="text-center"><?php echo $total_poin; ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <!-- /.card-footer -->
              </div>
            <?php } ?>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    </div>
  </section>
  <!-- /.content -->

</main>

<script>
  $(document).ready(function() {
    $('#cari-siswa').typeahead({
      source: function(query, result) {
        $.ajax({
          url: "<?php echo base_url(); ?>pelanggaran_siswa/ajax_siswa",
          data: 'query=' + query,
          dataType: "json",
          type: "POST",
          success: function(data) {
            result($.map(data, function(item) {
              return item;
            }));
          }
        });
      }
    });
  });
</script>