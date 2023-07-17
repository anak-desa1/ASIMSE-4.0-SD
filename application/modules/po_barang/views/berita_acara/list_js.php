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

<script type="text/javascript">
    $(document).ready(function() {
        $('#tablebayar').DataTable();
    });
</script>

<script>
    $(document).ready(function() {
        $("#FormBayar").submit(function(e) {
            e.preventDefault();
            var id = $("#data").val();
            // console.log(id);
            var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . 'data_bayar' ?>/" + id;
            $("#bayar").load(url);
        })

    });
</script>

<script type="text/javascript">
    //set default swal sweet alert..
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    $('.btn-action').on('click', function() {
        show_loading();

        xhr = $.ajax({
            method: "POST",
            url: "<?= base_url() . $this->uri->segment(1, 0) ?>/tambah_bayar",
            data: "jenis=tambah",
            success: function(response) {
                $('.tampil-modal').html(response);
                $('.modal-action').modal({
                    backdrop: 'static',
                    keyboard: false
                }, 'show');
                // validate_form();
                hide_loading();
            },
            error: function() {

            }
        })
    })

    // $('.btn-edit').on('click', function() {
    //     show_loading();
    //     id = $(this).data('id');
    //     xhr = $.ajax({
    //         method: "POST",
    //         url: "<?= base_url() . $this->uri->segment(1, 0) ?>/edit_pendaftar/" + id,
    //         data: "jenis=edit",
    //         success: function(response) {
    //             $('.tampil-modal').html(response);
    //             $('.modal-edit').modal({
    //                 backdrop: 'static',
    //                 keyboard: false
    //             }, 'show');
    //             // validate_form();
    //             hide_loading();
    //         },
    //         error: function() {

    //         }
    //     })
    // })

    $('.btn-detail').on('click', function() {
        show_loading();
        id = $(this).data('id');
        xhr = $.ajax({
            method: "POST",
            url: "<?= base_url() . $this->uri->segment(1, 0) ?>/bukti_pembayaran/" + id,
            data: "jenis=detail",
            success: function(response) {
                $('.tampil-modal').html(response);
                $('.modal-detail').modal({
                    backdrop: 'static',
                    keyboard: false
                }, 'show');
                // validate_form();
                hide_loading();
            },
            error: function() {

            }
        })
    })
</script>