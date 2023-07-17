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
      <div class="row">
        <!-- /.row -->
        <div class="animated fadeInLeft col-md-8">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title"><i class="fas fa-ballot"></i> Input <?php echo $judul; ?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>pelanggaran_jenis/pelanggaran/pelanggaran_save" method="post">

              <input type="hidden" name="tipe" value="<?php echo $tipe; ?>">
              <input type="hidden" name="id_pelanggaran_siswa" value="<?php echo $id_pelanggaran_siswa; ?>">


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
                  <label class="col-sm-3 col-form-label">Nama Siswa</label>
                  <div class="col-sm-12">
                    <div class="input-group input-group">
                      <input id="cari-siswa" type="text" class="form-control" autofocus="" name="id_siswa" value="<?php echo $siswa; ?>" placeholder="Cari Siswa . . . ." required>
                      <span class="input-group-append">
                        <button type="submit" class="btn btn-info"><i class="fa fa-search"></i></button>
                      </span>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-3 col-form-label">Jenis Pelanggaran</label>
                  <div class="col-sm-12">
                    <select id="cari-pelanggaran" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%; " name="id_poin_pelanggaran">
                      <?php echo $combo_pelanggaran;  ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Poin Pelanggaran</label>
                  <div class="col-sm-12">
                    <input id="poin-pelanggaran" type="text" class="form-control poin pelanggaran" name="poin" placeholder="Poin Pelangaran . . . " value="<?php echo $poin_pelanggaran; ?>" required disabled="">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Tanggal Pelanggaran</label>
                  <div class="col-sm-12">
                    <input type="daterangepicker" class="form-control tglcalendar" name="tanggal" value="<?php echo $tanggal; ?>" placeholder="Pilih Tanggal" required>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="btn-group btn-group-sm float-right">
                  <button type="submit" class="btn btn-info float-right ml-3"><i class="fa fa-save"> </i> Simpan</button>
                  <a class="btn btn-danger float-right" href="<?php echo base_url(); ?>pelanggaran_jenis/pelanggaran"><i class="fa fa-undo"> </i> Kembali</a>
                </div>
              </div>
              <!-- /.card-footer -->
            </form>
          </div>
        </div>
        <div class="animated fadeInRight col-md-4">
          <div class="callout callout-info">
            <h4><span class="fa fa-info-circle text-danger"></span> Petunjuk dan Bantuan</h4>
            <ol>
              <li>
                Isi <b><?php echo $judul; ?></b> selengkap dan sebenar mungkin.
              </li>
              <li>
                Gunakan <i>button</i>
                <button class="btn btn-xs btn-info"><span class="fa fa-save"></span> Simpan </button>
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
  </section>
  <!-- /.content -->

</main>
<!-- jQuery -->
<script src="<?= base_url() ?>panel/plugins/jquery/jquery.min.js"></script>

<script>
  $(document).ready(function() {
    $('#cari-siswa').typeahead({
      source: function(query, result) {
        $.ajax({
          url: "<?php echo base_url(); ?>pelanggaran_jenis/pelanggaran/ajax_siswa",
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
    $("#cari-pelanggaran").change(function() {
      var id_poin_pelanggaran = $("#cari-pelanggaran").val();
      $.get("<?php echo base_url(); ?>pelanggaran_master/get_poin_pelanggaran", {
        id_poin_pelanggaran: id_poin_pelanggaran
      }, function(data) {
        $("#poin-pelanggaran").val(data);
      });
    });
  });
</script>