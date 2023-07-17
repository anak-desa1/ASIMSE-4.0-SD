<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= ($this->uri->segment(2) ? ucwords(str_replace('-', ' ', $this->uri->segment(2, 0))) : ucwords(str_replace('-', ' ', $this->uri->segment(1, 0)))) ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicons -->
  <link href="<?= base_url() ?>panel/dist/upload/logo/<?= $sekolah['logo'] ?>" rel="icon">
  <link href="<?= base_url() ?>panel/dist/upload/logo/<?= $sekolah['logo'] ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url() ?>panel/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>panel/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url() ?>panel/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>panel/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?= base_url() ?>panel/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?= base_url() ?>panel/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url() ?>panel/assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="<?= base_url() ?>panel/assets/css/style.css" rel="stylesheet">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url() ?>panel/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url() ?>panel/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Animate -->
  <link rel="stylesheet" href="<?= base_url() ?>panel/plugins/animate.css-master/animate.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>panel/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Font Awesome Pro -->
  <link rel="stylesheet" href="<?= base_url() ?>panel/plugins/fontawesome-free/css/all.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url() ?>panel/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>panel/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>panel/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>panel/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">
  <link href="<?= base_url() ?>panel/dist/css/fullcalendar.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url() ?>panel/plugins/toastr/build/toastr.min.css" />