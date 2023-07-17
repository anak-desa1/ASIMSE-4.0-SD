<!-- overlayScrollbars -->
<script src="<?= base_url() ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

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
            url: "<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') . $this->uri->slash_segment(3, 'both') ?>/tambah",
            data: "jenis=tambah",
            success: function(response) {
                $('.tampil-modal').html(response);
                $('.tampil-modal .modal-action').modal({
                    backdrop: 'static',
                    keyboard: false
                }, 'show');

                // validate_form();
                call_datepicker();
                // tanggal_cuti();
                hide_loading();
            },
            error: function() {

            }
        })
    })


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
                "targets": [-2, 4], //last column
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
                    "data": "lokasi_id"
                },
                {
                    "data": "jenis_jabatan"
                },
                {
                    "data": "lokasi"
                },
                {
                    "data": "kode_lokasi"
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