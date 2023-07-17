<!-- jQuery -->
<script src="<?= base_url() ?>panel/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>panel/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url() ?>panel/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- jquery-validation -->
<script src="<?= base_url() ?>panel/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>panel/plugins/jquery-validation/additional-methods.min.js"></script>

<!-- overlayScrollbars -->
<script src="<?= base_url() ?>panel/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url() ?>panel/plugins/select2/js/select2.full.min.js"></script>
<script src="<?= base_url() ?>panel/plugins/moment/moment.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>panel/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>panel/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="<?= base_url() ?>panel/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script>
    $(function() {
        $('#datatb').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': true,
            'ordering': true,
            'info': false,
            'autoWidth': true
        })
    })
</script>

<script>
    $(document).ready(function() {
        $('.select2').select2();
        $(".tglcalendar").datepicker({
            todayHighlight: true,
            format: "dd-mm-yyyy"
        });
    });
</script>

<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>

<script>
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
            autoclose: true,
            todayHighlight: true
        });
    }

    $('.notifikasi').on('click', function(e) {
        let id = e.currentTarget.dataset.id;
        let jenis_notif = e.currentTarget.dataset.jenis;
        show_loading();
        xhr = $.ajax({
            method: "POST",
            url: "<?= base_url('notifikasi/approval') ?>",
            data: 'id=' + id + '&jenis_notif=' + jenis_notif,
            success: function(response) {
                $('.div-modal-approval').html(response);
                $('.modal-approval').modal('show');
                hide_loading();
            }
        })
    })

    /// CEK UNTUK 2 MODAL SUPAYA BISA SCROLL
    $('body').on('hidden.bs.modal', function() {
        if ($('.modal.in').length > 0) {
            $('body').addClass('modal-open');
        }
    });


    /////// disable close modal escape
    // $.fn.modal.prototype.constructor.Constructor.DEFAULTS.backdrop = 'static';
    // $.fn.modal.prototype.constructor.Constructor.DEFAULTS.keyboard =  false;


    function format_angka(nilai) {
        bk = nilai.replace(/[^\d]/g, "");
        ck = "";
        panjangk = bk.length;
        j = 0;
        for (i = panjangk; i > 0; i--) {
            j = j + 1;
            if (((j % 3) == 1) && (j != 1)) {
                ck = bk.substr(i - 1, 1) + "." + ck;
                xk = bk;
            } else {
                ck = bk.substr(i - 1, 1) + ck;
                xk = bk;
            }
        }
        return ck;

    }

    function hanya_angka(nilai) {
        bk = nilai.replace(/[^\d]/g, "");
        ck = "";
        panjangk = bk.length;
        j = 0;
        for (i = panjangk; i > 0; i--) {

            ck = bk.substr(i - 1, 1) + ck;
            xk = bk;

        }
        return ck;
    }

    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")
    }

    function error_timeout_ajax($param1) {
        swal({
            title: "Perhatian!",
            text: ($param1 ? $param1 : "Gagal Memuat Halaman, silahkan coba lagi atau periksa koneksi internet anda.."),
            type: "warning",
            confirmButtonColor: "#007AFF"
        });
    }
</script>
</body>

</html>