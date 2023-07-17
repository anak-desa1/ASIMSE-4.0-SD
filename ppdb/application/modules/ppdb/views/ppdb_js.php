<!-- jQuery -->
<script src="<?= base_url() ?>plugins/jquery/jquery.min.js"></script>

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

<!-- jQuery -->
<script>
  $(document).ready(function() {
    $("#form-register").submit(function(e) {
      e.preventDefault();
      var id = $("#register_id").val();
      // var target = $("#tingkat").val();
      // console.log(id);
      var url = "<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') . 'FormRegister' ?>/" + id;
      $("#FormRegister").load(url);
    })

  });
</script>