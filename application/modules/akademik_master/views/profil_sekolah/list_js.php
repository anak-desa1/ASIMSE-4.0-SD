<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>panel/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- ChartJS -->
<script src="<?= base_url() ?>panel/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url() ?>panel/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url() ?>panel/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url() ?>panel/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url() ?>panel/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url() ?>panel/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>panel/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>panel/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>panel/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>panel/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url() ?>panel/dist/js/pages/dashboard.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>panel/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- jQuery -->
<script src="<?= base_url() ?>panel/plugins/jquery/jquery.min.js"></script>

<!-- upload gambar tidak tampil diinput file -->
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    })
</script>

<script>
    $(function() {
        $('#editModal').on('show.bs.modal', function(e) {
            let btn = $(e.relatedTarget);
            let id = btn.data('id');
            let nss = btn.data('nss');
            let npsn = btn.data('npsn');
            let nama_sekolah = btn.data('nama_sekolah');
            let alamat = btn.data('alamat');
            let prov = btn.data('prov');
            let kota = btn.data('kota');
            let kec = btn.data('kec');
            let desa = btn.data('desa');
            let telp = btn.data('telp');
            let kodepos = btn.data('kodepos');
            let email = btn.data('email');
            let web = btn.data('web');
            let sebutan_kepala = btn.data('sebutan_kepala');
            let kop_1 = btn.data('kop_1');
            let kop_2 = btn.data('kop_2');
            $("#ed_id").val(id);
            $("#ed_nss").val(nss);
            $("#ed_npsn").val(npsn);
            $("#ed_nama_sekolah").val(nama_sekolah);
            $('#ed_alamat').val(alamat);
            $('#ed_prov').val(prov);
            $('#ed_kota').val(kota);
            $('#ed_kec').val(kec);
            $('#ed_desa').val(desa);
            $('#ed_telp').val(telp);
            $('#ed_kodepos').val(kodepos);
            $('#ed_email').val(email);
            $('#ed_web').val(web);
            $('#ed_sebutan_kepala').val(sebutan_kepala);
            $('#ed_kop_1').val(kop_1);
            $('#ed_kop_2').val(kop_2);
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("#provinsi").change(function() {
            var url = "<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') . 'add_ajax_kab' ?>/" + $(this).val();
            $('#kabupaten').load(url);
            return false;
        })

        $("#kabupaten").change(function() {
            var url = "<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') . 'add_ajax_kec' ?>/" + $(this).val();
            $('#kecamatan').load(url);
            return false;
        })
    });
</script>

<script>
    $(document).ready(function() {
        show_loading();
        $("#campus").change(function() {
            var url = "<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') . 'add_ajax_sekolah' ?>/" + $(this).val();
            $('#sekolah').load(url);
            return false;
        })
    });
</script>