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
    //set default swal sweet alert..
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

<script>
    var cleaveI = new Cleave('.uang', {
        numeral: true
    });
</script>

<script type="text/javascript">
    // set default swal sweet alert..
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    $('.btn-action').on('click', function() {
        show_loading();
        id = $(this).data('id');
        xhr = $.ajax({
            method: "POST",
            url: "<?= base_url() . $this->uri->segment(1, 0) ?>/detail/" + id,
            data: "jenis=tambah",
            success: function(response) {
                $('.tampil-modal').html(response);
                $('.modal-action').modal({
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