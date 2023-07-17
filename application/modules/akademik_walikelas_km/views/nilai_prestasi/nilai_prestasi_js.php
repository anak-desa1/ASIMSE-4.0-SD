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
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    });
</script>

<script>
    $(document).ready(function() {
        $("#FormEks").submit(function(e) {
            e.preventDefault();
            var id = $("#eks").val();
            // console.log(id);
            var url = "<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') . 'tabel' ?>/" + id;
            $("#mapel").load(url);
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
            url: "<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') ?>tambah/<?= $siswa['id_siswa'] ?>",
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

    function validate_form() {

        $.validator.setDefaults({

        });

        $('#form-action').validate({
            rules: {
                terms: {
                    required: true
                },
                kd_campus: {
                    required: true
                },
                kd_sekolah: {
                    required: true
                },
                tingkat: {
                    required: true
                },
                nama: {
                    required: true
                },
            },
            messages: {
                terms: "Please accept our terms",
                kd_campus: "Harus diisi",
                kd_sekolah: "Harus diisi",
                tingkat: "Harus diisi",
                nama: "Harus diisi",
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                error.appendTo($(element).closest('.form-group').find('.symbol'));
            },
            highlight: function(element, errorClass, validClass) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');

            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).closest('.form-group').removeClass('has-error');

            },
            success: function(label, element) {
                label.addClass('help-block valid');
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');

            },
            submitHandler: function() {
                $('#simpan').text('Menyimpan data...');
                $('#simpan').attr('disabled', 'disabled');
                show_loading();
                let formdata = $('#form-action').serialize();
                xhr = $.ajax({
                    method: "POST",
                    url: "<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') ?>simpan_tambah",
                    data: formdata,
                    success: function(response) {
                        let result = JSON.parse(response);

                        if (result.status == 'error') {
                            hide_loading();
                            $('#simpan').text('Simpan');
                            $('#simpan').removeAttr('disabled');
                        } else {
                            reload_table();
                            $('.modal-action').modal('hide');
                            hide_loading();
                        }
                        Toast.fire({
                            type: result.status,
                            title: result.pesan
                        })

                    },

                })

            }
        });
    }
</script>