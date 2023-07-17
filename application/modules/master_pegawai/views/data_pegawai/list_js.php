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
        show_loading();
        $("#departemen").change(function() {
            var url = "<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') . 'add_ajax_jabatan' ?>/" + $(this).val();
            $('#jabatan').load(url);
            return false;
        })

        $("#jabatan").change(function() {
            var url = "<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') . 'add_ajax_tempat' ?>/" + $(this).val();
            $('#tempat').load(url);
            return false;
        })

    });
</script>

<script type="text/javascript">
    $(function() {
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true
        });
    });
    // loading dulu ach ---
    show_loading();
    $(window).on("load", function() {
        // Handler for .load() called.
        $(".preload-wrapper6").fadeOut('slow');
    });

    function show_loading() {
        $(".preload-wrapper6").show();
    }

    function hide_loading() {
        $(".preload-wrapper6").fadeOut('fast');
    }

    function call_datepicker() {
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true
        });
    }
</script>

<!-- page add -->
<script type="text/javascript">
    //set default swal sweet alert..
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    $('.btn-action').on('click', function() {
        xhr = $.ajax({
            method: "POST",
            url: "<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') ?>tambah",
            data: "jenis=tambah",
            success: function(response) {
                $('.tampil-modal').html(response);
                $('.modal-action').modal({
                    backdrop: 'static',
                    keyboard: false
                }, 'show');

                validate_form();
                call_datepicker();
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
                email_pribadi: {
                    required: true
                },
                terms: {
                    required: true
                },
                nik: {
                    required: true
                },
                nama_lengkap: {
                    required: true
                },
                tgl_lahir: {
                    required: true
                },
                tgl_masuk: {
                    required: true
                },
                alamat: {
                    required: true
                },
                telp: {
                    required: true
                },
            },
            messages: {
                email_pribadi: {
                    required: "Harus diisi",
                    email: "Isi dengan Email yang benar ya"
                },
                terms: "Please accept our terms",
                nik: "Harus diisi",
                nama_lengkap: "Harus diisi",
                tgl_lahir: "Harus diisi",
                tgl_masuk: "Harus diisi",
                alamat: "Harus diisi",
                telp: "Harus diisi",
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

    $(document).ready(function() {
        table_data = $('#example1').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') . "/tampildata"; ?>",
                "type": "POST"
            },

            // Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [-2, 5], //last column
                // "targets": 'nosort', //last column
                "orderable": false, //set not orderable
            }],

            "columns": [{
                    "class": "details-control",
                    "orderable": false,
                    "data": null,
                    "defaultContent": ""
                },
                {
                    "data": "nik"
                },
                {
                    "data": "nama_lengkap"
                },
                {
                    "data": "telp"
                },
                {
                    "data": "email_pribadi"
                },
                {
                    "data": "tgl_masuk"
                },
                {
                    "data": "action"
                },

            ],


        });
        var detailRows = [];
        $('#example1 tbody').on('click', 'tr td.details-control', function() {
            var tr = $(this).closest('tr');
            var row = table_data.row(tr);
            var idx = $.inArray(tr.attr('id'), detailRows);

            if (row.child.isShown()) {
                tr.removeClass('details');
                row.child.hide();

                // Remove from the 'open' array
                detailRows.splice(idx, 1);
            } else {
                tr.addClass('details');
                row.child(detail_table(row.data())).show();

                // Add to the 'open' array
                if (idx === -1) {
                    detailRows.push(tr.attr('id'));
                }
            }
        });

        // action edit dan delete
        $('#example1 tbody').on('click', '.btn-edit', function(e) {
            console.log('id', e.target.dataset.id);
            console.log('jenis action', e.target.dataset.jenis_action);
        })

    });

    function reload_table() {
        table_data.ajax.reload(null, false); //reload datatable ajax 
    }
</script>