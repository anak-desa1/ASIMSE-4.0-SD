<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- ChartJS -->
<script src="<?= base_url() ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url() ?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url() ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url() ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url() ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url() ?>plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url() ?>dist/js/pages/dashboard.js"></script>

<!-- page add -->
<script type="text/javascript">
    //set default swal sweet alert..
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

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
                    // "class": "details-control",
                    // "orderable": false,
                    // "data": null,
                    // "defaultContent": ""
                    "data": "no"
                },
                {
                    "data": "departemen"
                },
                {
                    "data": "jenis_jabatan"
                },
                {
                    "data": "lokasi"
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
                // {
                //     "data": "action"
                // },

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