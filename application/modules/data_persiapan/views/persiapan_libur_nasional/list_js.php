<!-- overlayScrollbars -->
<script src="<?= base_url() ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- jQuery -->
<script src="<?= base_url() ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url() ?>plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- jquery-validation -->
<script src="<?= base_url() ?>plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>plugins/jquery-validation/additional-methods.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- Datepicker -->
<script src="<?= base_url() ?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url() ?>plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?= base_url() ?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?= base_url() ?>plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url() ?>plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="<?= base_url() ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url() ?>plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- BS-Stepper -->
<script src="<?= base_url() ?>plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="<?= base_url() ?>plugins/dropzone/min/dropzone.min.js"></script>

<script type="text/javascript">
    $(function() {
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true
        });
    });
</script>

<script type="text/javascript">
    ambilData();

    function ambilData() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') ?>ambildata',
            dataType: 'json',
            success: function(data) {
                var baris = '';
                for (var i = 0; i < data.length; i++) {
                    baris += '<tr>' +
                        '<td>' + data[i].no_urut + '</td>' +
                        '<td>' + data[i].tgl_libur + '</td>' +
                        '<td>' + data[i].keterangan + '</td>' +
                        '<td>' + data[i].tahun + '</td>' +
                        '<td><a href="#form" data-toggle="modal" class="btn btn-warning" onclick="submit(' + data[i].no_urut + ')">Ubah</a> </td>' +
                        '</tr>';
                }
                $('#target').html(baris);
            }

        });
    }

    function tambahdata() {
        var tgl_libur = $("[name='tgl_libur']").val();
        var keterangan = $("[name='keterangan']").val();
        var tahun = $("[name='tahun']").val();

        $.ajax({
            type: 'POST',
            data: 'tgl_libur=' + tgl_libur + '&keterangan=' + keterangan + '&tahun=' + tahun,
            url: '<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') ?>tambahdata',
            dataType: 'json',
            success: function(hasil) {
                $("#pesan").html(hasil.pesan);

                if (hasil.pesan == '') {
                    $("#form").modal('hide');
                    ambilData();

                    $("['tgl_libur']").val('');
                    $("['keterangan']").val('');
                    $("['tahun']").val('');
                }

            }
        })
    }

    function submit(x) {
        if (x == 'tambah') {
            $('#btn-tambah').show();
            $('#btn-ubah').hide();
        } else {
            $('#btn-tambah').hide();
            $('#btn-ubah').show();

            $.ajax({
                type: "POST",
                data: "no_urut=" + x,
                url: '<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') ?>ambilid',
                dataType: 'json',
                success: function(hasil) {
                    $('[name="no_urut"]').val(hasil[0].no_urut);
                    $('[name="tgl_libur"]').val(hasil[0].tgl_libur);
                    $('[name="keterangan"]').val(hasil[0].keterangan);
                    $('[name="tahun"]').val(hasil[0].tahun);

                }
            });
        }
    }

    function ubahdata() {
        var no_urut = $("[name='no_urut']").val();
        var tgl_libur = $("[name='tgl_libur']").val();
        var keterangan = $("[name='keterangan']").val();
        var tahun = $("[name='tahun']").val();
        $.ajax({
            type: 'POST',
            data: 'no_urut=' + no_urut + '&tgl_libur=' + tgl_libur + '&keterangan=' + keterangan + '&tahun=' + tahun,
            url: '<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') ?>ubahdata',
            dataType: 'json',
            success: function(hasil) {
                $("#pesan").html(hasil.pesan);

                if (hasil.pesan == '') {
                    $("#form").modal('hide');
                    ambilData();

                    $("['tgl_libur']").val('');
                    $("['keterangan']").val('');
                    $("['tahun']").val('');
                }
            }

        })
    }
</script>