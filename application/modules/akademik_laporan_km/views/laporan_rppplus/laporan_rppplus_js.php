<!-- overlayScrollbars -->
<script src="<?= base_url() ?>panel/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- jQuery -->
<script src="<?= base_url() ?>panel/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>panel/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url() ?>panel/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- jquery-validation -->
<script src="<?= base_url() ?>panel/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>panel/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>panel/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>panel/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- Datepicker -->
<script src="<?= base_url() ?>panel/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url() ?>panel/plugins/select2/js/select2.full.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        show_loading();
        $("#tingkat").change(function() {
            var url = "<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') . 'add_ajax_pendidik' ?>/" + $(this).val();
            $('#id_guru').load(url);
            return false;
        })
    });

    $(document).ready(function() {
        $("#FormKM").submit(function(e) {
            e.preventDefault();
            var id = $("#tingkat").val();
            var target = $("#id_guru").val();
            // console.log(id);
            var url = "<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') . 'tabel_rppplus' ?>/"  + id + '/' + target;
            $("#LaporanRPPPLUS").load(url);
        })
    });

    $('.btn-cetak').on('click', function() {
        show_loading();
        id = $(this).data('id');
        // target = $(this).data('target');
        // mapel = $(this).data('mapel');
        xhr = $.ajax({
            method: "POST",
            url: "<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') ?>cetak_rppplus/"  + id,
            data: "jenis=cetak",
            success: function(response) {
                $('.tampil-modal').html(response);
                $('.modal-cetak').modal({
                    backdrop: 'static',
                    keyboard: false
                }, 'show');
                hide_loading();
            },
            error: function() {
            }
        })
    })
</script>