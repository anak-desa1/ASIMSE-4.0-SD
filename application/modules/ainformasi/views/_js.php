<!-- jQuery -->
<script src="<?= base_url() ?>panel/plugins/jquery/jquery.min.js"></script>

<script>
  $(document).ready(function() {
    $("#form-vaksin").submit(function(e) {
      e.preventDefault();
      var id = $("#nik").val();
      // console.log(id);
      var url = "<?= base_url() . $this->uri->segment(1, 0) ?>/vaksin_cari/" + id;
      $("#sertifikat").load(url);
    })

  });

  $(document).ready(function() {
    $("#form-lulus").submit(function(e) {
      e.preventDefault();
      var id = $("#nisn").val();
      // console.log(id);
      var url = "<?= base_url() . $this->uri->segment(1, 0) ?>/lulus_cari/" + id;
      $("#sertifikat").load(url);
    })

  });

  $(document).ready(function() {
    $("#form-beasiswa").submit(function(e) {
      e.preventDefault();
      var id = $("#nis").val();
      // console.log(id);
      var url = "<?= base_url() . $this->uri->segment(1, 0) ?>/beasiswa_cari/" + id;
      $("#sertifikat").load(url);
    })

  });
</script>