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
        $('#myTable-1').DataTable();
    });
    $(document).ready(function() {
        $('#myTable-2').DataTable();
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
            url: "<?= base_url() . $this->uri->segment(1, 0) ?>/tambah_pendaftar",
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

    $('.btn-edit').on('click', function() {
        show_loading();
        id = $(this).data('id');
        xhr = $.ajax({
            method: "POST",
            url: "<?= base_url() . $this->uri->segment(1, 0) ?>/edit_pendaftar/" + id,
            data: "jenis=edit",
            success: function(response) {
                $('.tampil-modal').html(response);
                $('.modal-edit').modal({
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

    $('.btn-detail_1').on('click', function() {
        show_loading();
        id = $(this).data('id');
        xhr = $.ajax({
            method: "POST",
            url: "<?= base_url() . $this->uri->segment(1, 0) ?>/bukti_pembayaran_1/" + id,
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

    $('.btn-detail_2').on('click', function() {
        show_loading();
        id = $(this).data('id');
        xhr = $.ajax({
            method: "POST",
            url: "<?= base_url() . $this->uri->segment(1, 0) ?>/bukti_pembayaran_2/" + id,
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

    $('.btn-delete').on('click', function() {
        show_loading();
        id = $(this).data('id');
        xhr = $.ajax({
            method: "POST",
            url: "<?= base_url() . $this->uri->segment(1, 0) ?>/deldata_pembayaran/" + id,
            data: "jenis=delete",
            success: function(response) {
                $('.tampil-modal').html(response);
                $('.modal-delete').modal({
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

    $('#myTable-1').on('click', '.btn-delete', function() {
        var id = $(this).data('id');
        console.log(id);
        swal({
            title: 'Are you sure?',
            text: 'Akan menghapus data ini!',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((result) => {
            if (result) {
                $.ajax({
                    url: "<?= base_url() . $this->uri->segment(1, 0) ?>/deldata_pembayaran/" + id,
                    method: "POST",
                    data: 'id_bayar=' + id,
                    success: function(data) {
                        iziToast.error({
                            title: 'Horee!',
                            message: 'Data Berhasil dihapus',
                            position: 'topRight'
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);
                    }
                });
            }
        })
    });
</script>

<script>
    $(document).ready(function() {

        $("#kampus").change(function() {
            var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . 'add_sekolah' ?>/" + $(this).val();
            $('#sekolah').load(url);
            return false;
        })

        $("#sekolah").change(function() {
            var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . 'add_kelas' ?>/" + $(this).val();
            $('#kelas').load(url);
            return false;
        })

    });
</script>