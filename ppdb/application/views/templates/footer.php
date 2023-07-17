    <!-- Footer -->
    <footer class="footer" data-background-color="black">
      <div class="container">

        <nav>
          <div class="text-muted">
            Page rendered in <strong>{elapsed_time}</strong> seconds.
          </div>
        </nav>

        <div class="copyright" id="copyright">
          <!--<script>-->
          <!--  document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))-->
          <!--</script>-->
          <?= $sekolah['nama_sekolah'] ?> &copy; <strong><span>2022</span></strong>. All Rights Reserved
        </div>

        <div class="credits">
          Developed by <a href="https://sistemanakdesa.my.id">Sistem Anak Desa</a>
        </div>

      </div>
    </footer>
    <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?= base_url('login/logout'); ?>">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!--   Core JS Files   -->
    <script src="<?= base_url(); ?>assets/template_dalam/js/core/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/template_dalam/js/core/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/template_dalam/js/core/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/template_dalam/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
    <!-- Chart JS -->
    <script src="<?= base_url(); ?>assets/template_dalam/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="<?= base_url(); ?>assets/template_dalam/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?= base_url(); ?>assets/template_dalam/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
    <script src="<?= base_url(); ?>assets/template_dalam/demo/demo.js"></script>

    <script>
      $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
      });

      $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
          url: "<?= base_url('admin/changeaccess'); ?>",
          type: 'post',
          data: {
            menuId: menuId,
            roleId: roleId
          },
          success: function() {
            document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
          }
        });

      });
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

      /// CEK UNTUK 2 MODAL SUPAYA BISA SCROLL
      $('body').on('hidden.bs.modal', function() {
        if ($('.modal.in').length > 0) {
          $('body').addClass('modal-open');
        }
      });

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