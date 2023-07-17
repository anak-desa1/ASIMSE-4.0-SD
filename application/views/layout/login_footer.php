<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?= base_url() ?>panel/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>panel/assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="<?= base_url() ?>panel/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>panel/assets/vendor/chart.js/chart.min.js"></script>
<script src="<?= base_url() ?>panel/assets/vendor/echarts/echarts.min.js"></script>
<script src="<?= base_url() ?>panel/assets/vendor/quill/quill.min.js"></script>
<script src="<?= base_url() ?>panel/assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="<?= base_url() ?>panel/assets/vendor/tinymce/tinymce.min.js"></script>
<script src="<?= base_url() ?>panel/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="<?= base_url() ?>panel/assets/js/main.js"></script>

<script>
      $(document).ready(function() {
          $("#show_hide_password button").on('click', function(event) {
              event.preventDefault();
              if ($('#show_hide_password input').attr("type") == "text") {
                  $('#show_hide_password input').attr('type', 'password');
                  $('#show_hide_password span').addClass("fa-eye-slash");
                  $('#show_hide_password span').removeClass("fa-eye");
              } else if ($('#show_hide_password input').attr("type") == "password") {
                  $('#show_hide_password input').attr('type', 'text');
                  $('#show_hide_password span').removeClass("fa-eye-slash");
                  $('#show_hide_password span').addClass("fa-eye");
              }
          });
      });
  </script>

</body>

</html>