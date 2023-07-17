<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $title ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url(); ?>assets/img/ppdb-logo.png" rel="icon">
    <link href="<?= base_url(); ?>assets/img/ppdb-logo.png" rel="apple-touch-icon">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url(); ?>assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">

</head>

 <!-- <body oncontextmenu="return false" onselectstart="return false" ondragstart="return false">  -->

<body>
<!-- ======= Mobile nav toggle button ======= -->
  <!-- <button type="button" class="mobile-nav-toggle d-xl-none"><i class="bi bi-list mobile-nav-toggle"></i></button> -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>
  <!-- ======= Header ======= -->
  <header id="header" class="d-flex flex-column justify-content-center">

    <nav id="navbar" class="navbar nav-menu">
      <ul>
        <li><a href="https://sds-sintyosephtigabinanga.sch.id/" class="nav-link scrollto <?= ('' == $this->uri->segment(1) ? 'active' : '')  ?>"><i class="bx bx-home"></i> <span>Home</span></a></li>
        <li><a href="<?= base_url('info') ?>" class="nav-link scrollto <?= ('info' == $this->uri->segment(1) ? 'active' : '')  ?>"><i class="bx bx-volume-low"></i> <span>Informasi</span></a></li>
        <li><a href="<?= base_url('ppdb') ?>" class="nav-link scrollto <?= ('ppdb' == $this->uri->segment(1) ? 'active' : '')  ?>"><i class="bx bx-file-blank"></i> <span>Registrasi</span></a></li>
        <!-- <li><a href="#portfolio" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Siswa Mutasi</span></a></li> -->
        <!-- <li><a href="#services" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Services</span></a></li> -->
        <li><a href="<?= base_url('login') ?>" class="nav-link scrollto <?= ('login' == $this->uri->segment(1) ? 'active' : '')  ?>"><i class="bx bx-user-circle"></i> <span>Login</span></a></li>
      </ul>
    </nav><!-- .nav-menu -->

  </header><!-- End Header -->
   