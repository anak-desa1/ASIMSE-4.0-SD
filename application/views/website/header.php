<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $title; ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url() ?>panel/dist/upload/logo/<?= $sekolah['logo'] ?>" rel="icon">
    <link href="<?= base_url() ?>panel/dist/upload/logo/<?= $sekolah['logo'] ?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url() ?>website/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>website/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url() ?>website/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>website/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url() ?>website/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>website/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>website/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url() ?>website/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url() ?>website/assets/css/style.css" rel="stylesheet">
</head>
<!-- <body oncontextmenu="return false" onselectstart="return false" ondragstart="return false"> -->

<body>

    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-flex align-items-center fixed-top bg-warning">
        <div class="container d-flex justify-content-between">
            <div class="contact-info d-flex align-items-center">
                <div class="col-lg-4">
                    <div class="header-logo">
                        <img src="<?= base_url() ?>panel/dist/upload/logo/<?= $sekolah['logo'] ?>" alt="Computer man" style="width:95px;height:95px;">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="header-logo text-dark">
                        <h4 style="font-size: 14px; width:350px; height:11px; font-weight: bold;"><?= $sekolah['nama_sekolah'] ?></h4>
                        <span style="font-size: 14px; width:350px; height:11px; font-weight: bold;"><?= $sekolah['alamat'] ?></span>
                        <p style="font-size: 14px; width:350px; height:11px; font-weight: bold;"><?= $sekolah['kecamatan'] ?>, <?= $sekolah['kota'] ?> <?= $sekolah['kodepos'] ?>
                            <?= $sekolah['provinsi'] ?></p>
                    </div>
                </div>
            </div>

            <div class="contact-info d-flex align-items-center" style="font-size: 14px; width:350px; height:120px; font-weight: bold;">
                <div class="header-text text-dark">
                    <p style="font-size: 14px; width:350px; height:11px; font-weight: bold;"><i class="bi bi-envelope"></i> <a href="mailto:<?= $sekolah['email'] ?>"><?= $sekolah['email'] ?></a></p>
                    <p style="font-size: 14px; width:350px; height:11px; font-weight: bold;"><i class="bi bi-phone"></i><a href=""><?= $sekolah['telp'] ?></a></p>
                </div>
            </div>

            <div class="header-text d-lg-flex social-links align-items-center">
                <div class="header-logo text-dark">
                    <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <h4 class="logo me-auto"><a href="<?= base_url('home') ?>"><span><?= $sekolah['nama_sekolah'] ?></span></a></h4>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="<?= base_url() ?>website/assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar order-last order-lg-0 ">
                <ul>
                    <li>
                    <li><a href="<?= base_url('ahome') ?>" <?= $this->uri->segment(1) == 'ahome' ? 'class="active"' : '' ?>>HOME</a></li>
                    <li class="dropdown"><a href="#" <?= $this->uri->segment(1) == 'aprofil' ? 'class="active"' : '' ?>><span>PROFIL</span> <i class=" bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="<?= base_url('aprofil/sambutan') ?>" class="<?= ('aprofil/sambutan' == $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'leading') ? 'active' : '') ?>">KATA SAMBUTAN</a></li>
                            <li><a href="<?= base_url('aprofil/sejarah') ?>">SEJARAH</a></li>
                            <li><a href="<?= base_url('aprofil/visi_misi') ?>">VISI & MISI</a></li>
                            <li><a href="<?= base_url('aprofil/mars') ?>">MARS</a></li>
                            <li><a href="<?= base_url('aprofil/data_sekolah') ?>">DATA SEKOLAH</a></li>
                            <li><a href="<?= base_url('aprofil/kurikulum') ?>">KURIKULUM</a></li>
                            <li><a href="<?= base_url('aprofil/akreditasi') ?>">AKREDITASI</a></li>
                            <li><a href="<?= base_url('aprofil/pendidik') ?>">PENDIDIK</a></li>
                            <li><a href="<?= base_url('aprofil/fasilitas') ?>">FASILITAS</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#" class="<?= ('akesiswaan' == $this->uri->segment(1) ? 'active' : '')  ?>"><span>KESISWAAN</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <!-- <li><a href="<?= base_url('akesiswaan/osis') ?>">OSIS</a></li> -->
                            <li><a href="<?= base_url('akesiswaan/ekstra') ?>">EKSTRAKURIKULER</a></li>
                            <li><a href="<?= base_url('akesiswaan/prestasi') ?>">PRESTASI SISWA</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#" class="<?= ('ainformasi' == $this->uri->segment(1) ? 'active' : '')  ?>"><span>INFORMASI</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <!--<li><a href="<?= base_url('ainformasi/ppdb') ?>">PPDB</a></li>-->
                            <li><a href="https://ppdb.sds-sintyosephtigabinanga.sch.id/">PPDB</a></li>
                            <li><a href="<?= base_url('ainformasi/vaksin') ?>">VAKSIN</a></li>
                            <li><a href="<?= base_url('ainformasi/lulus') ?>">KELULUSAN</a></li>
                            <li><a href="<?= base_url('ainformasi/beasiswa') ?>">BEASISWA</a></li>
                        </ul>
                    </li>
                    <li><a href="<?= base_url('akegiatan/belajar') ?>" class="<?= ('akegiatan/belajar' == $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'leading') ? 'active' : '') ?>">BELAJAR</a></li>
                    <li><a href="<?= base_url('akegiatan/berita') ?>" class="<?= ('akegiatan/berita' == $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'leading') ? 'active' : '') ?>">BERITA</a></li>
                    <li><a href="<?= base_url('akegiatan/galery') ?>" class="<?= ('akegiatan/galery' == $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'leading') ? 'active' : '') ?>">GALERY</a></li>
                    <li><a href="<?= base_url('akegiatan/contact') ?>" class="<?= ('akegiatan/contact' == $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'leading') ? 'active' : '') ?>">CONTACT</a></li>
                    <!-- <li class="dropdown"><a href="#" <?= $this->uri->segment(1) == 'login' ? 'class="active"' : '' ?>><span>LOGIN</span> <i class=" bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a target="_blank" href="<?= base_url('login') ?>">OPERATOR</a></li>
                            <li><a target="_blank" href="<?= base_url('login') ?>">PENDIDK</a></li>
                            <li><a href="#">SISWA</a></li>
                        </ul>
                    </li> -->
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->