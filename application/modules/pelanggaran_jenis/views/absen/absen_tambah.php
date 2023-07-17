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
            <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>pelanggaran_jenis/absen/absen_save" method="post">

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
                      <input type="hidden" name="tipe" value="<?php echo $tipe; ?>">
                      <input type="hidden" name="id_absen" value="<?php echo $id_absen; ?>">
                      <input id="cari-siswa" type="text" class="form-control" autofocus="" name="id_siswa" value="<?php echo $siswa; ?>" placeholder="Cari Siswa . . . " required>
                      <span class="input-group-append">
                        <button type="submit" class="btn btn-info"><i class="fa fa-search"></i></button>
                      </span>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label>Keterangan</label>
                  <select class="form-control select2" name="keterangan" required>
                    <option value>Pilih</option>
                    <option value="SAKIT" <?php if ($keterangan == 'SAKIT') echo 'selected'; ?>>SAKIT</option>
                    <option value="IZIN" <?php if ($keterangan == 'IZIN') echo 'selected'; ?>>IZIN</option>
                    <option value="ALPA" <?php if ($keterangan == 'ALPA') echo 'selected'; ?>>ALPA</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Alasan</label>
                  <input type="text" class="form-control" name="alasan" value="<?php echo $alasan; ?>" required>
                </div>

                <div class="form-group">
                  <label>Tanggal Absen</label>
                  <input type="text" class="form-control tglcalendar" name="tanggal_absen" value="<?php echo $tanggal_absen; ?>" placeholder="Pilih Tanggal" required>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-info float-right ml-3"><i class="fa fa-save"> </i> Simpan</button>
                <a class="btn btn-danger float-right" href="<?php echo base_url(); ?>pelanggaran_jenis/absen"><i class="fa fa-undo"> </i> Kembali</a>
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

<script>
  $(function() {
    //Initialize Select2 Elements
    $('.select2').select2()

    $('#datemask').inputmask('dd/mm/yyyy', {
      'placeholder': 'dd/mm/yyyy'
    })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', {
      'placeholder': 'mm/dd/yyyy'
    })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker({
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
      },
      function(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function() {
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>

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
  });
</script>