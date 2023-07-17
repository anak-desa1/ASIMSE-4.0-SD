<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<!-- SweetAlert2 -->
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

<!-- jquery-validation -->
<script src="<?= base_url() ?>plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>plugins/jquery-validation/additional-methods.min.js"></script>

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

<script>
    $('#form-bayar').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_bayar/crud_bayar.php?pg=tambah',
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                $('form button').on("click", function(e) {
                    e.preventDefault();
                });
            },
            success: function(data) {
                if (data == 'ok') {
                    $('#tambahdata').modal('hide');
                    iziToast.success({
                        title: 'Mantap!',
                        message: 'Data berhasil disimpan',
                        position: 'topRight'
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);

                } else {
                    iziToast.error({
                        title: 'Maaf!',
                        message: 'data gagal disimpan',
                        position: 'topRight'
                    });
                }
                //$('#bodyreset').load(location.href + ' #bodyreset');
            }
        });
        return false;
    });


    $('#tablebayar').on('click', '.hapus', function() {
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
                    url: 'mod_bayar/crud_bayar.php?pg=hapus',
                    method: "POST",
                    data: 'id_bayar=' + id,
                    success: function(data) {
                        iziToast.error({
                            title: 'Hmm!',
                            message: 'Pembayaran berhasil dibatalkan',
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