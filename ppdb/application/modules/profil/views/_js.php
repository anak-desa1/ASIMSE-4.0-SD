<!-- jQuery -->
<script src="<?= base_url() ?>plugins/jquery/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    $("#form-sekolah").submit(function(e) {
      e.preventDefault();
      var id = $("#sekolah_id").val();
      // var target = $("#tingkat").val();
      // console.log(id);
      var url = "<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') . 'sekolah' ?>/" + id;
      $("#sekolah").load(url);
    })

  });
</script>