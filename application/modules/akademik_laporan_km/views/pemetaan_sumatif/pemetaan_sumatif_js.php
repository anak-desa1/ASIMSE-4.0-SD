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
        $("#FormKM").submit(function(e) {
            e.preventDefault();
            var id = $("#id_guru").val();
            // console.log(id);
            var url = "<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') . 'tabel_sumatif' ?>/"  + id ;
            $("#PemetaanSumatif").load(url);
        })
    });

    $('.btn-cetak').on('click', function() {
        show_loading();
        id = $(this).data('id');
        target = $(this).data('target');
        mapel = $(this).data('mapel');
        xhr = $.ajax({
            method: "POST",
            url: "<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') ?>tabel_detail/"  + id + '/' + target + '/' + mapel,
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