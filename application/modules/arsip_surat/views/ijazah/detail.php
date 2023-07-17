<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>

<main id="main" class="main">

	<div class="pagetitle">
		<h1><?= $title; ?></h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href=""><?= $home; ?></a></li>
				<!-- <li class="breadcrumb-item"><?= $subtitle; ?></li> -->
				<li class="breadcrumb-item active"><?= $title; ?></li>
			</ol>
		</nav>
	</div><!-- End Page Title -->

	<!-- Main content -->
	<section class="content">
		<div class="col-12">

			<div class="card" style="border-top: 8px solid #035AA6;border-bottom: 8px solid #035AA6;border-right: 4px solid #035AA6;border-top-left-radius: 16px;border-bottom-left-radius: 16px;box-shadow: 0px 3px 6px 0px #222;">
				<div class='col-md-12'>
					<div class='box box-info'>

						<div class="card">
							<div class="card-body">

								<br>
								<div class="col-md-10 col-md-offset-1">
									<div class="box">
										<div class="box-header bg-yellow"><i class="fas fa-file-archive"></i> Detail Ijazah &amp; Skhun</div>
										<br>
										<div class="box-body">
											<div class="mb-3 row">
												<label for="inputPassword" class="col-sm-3 col-form-label">
													<h4>File Ijazah</h4>
												</label>
												<div class="col-sm-7">
													<a target="_blank" href="<?php echo base_url('arsip_surat/ijazah/ijazah_download/' . $detail['berkas']) ?>" title="File Ijazah">
														<h1 style="font-size: 100px;"><i class="fas fa-file-archive"></i></h1>
													</a>
												</div>
											</div>

											<div class="mb-3 row">
												<label for="inputPassword" class="col-sm-3 col-form-label">
													<h4>File Skhun</h4>
												</label>
												<div class="col-sm-7">
													<a target="_blank" href="<?php echo base_url('arsip_surat/ijazah/ijazah_download/' . $detail['berkas']) ?>" title="File Skhun">
														<h1 style="font-size: 100px;"><i class="fas fa-file-archive"></i></h1>
													</a>
												</div>
											</div>

											<div class="col-md-12" style="margin-top: 20px;">
												<form class="form-horizontal">

													<div class="mb-3 row">
														<label for="inputPassword" class="col-sm-3 col-form-label">Nama Lengkap </label>
														<div class="col-sm-7">
															: <?php echo $detail['nama_lengkap'] ?>
														</div>
													</div>

													<div class="mb-3 row">
														<label for="inputPassword" class="col-sm-3 col-form-label">T. Tgl Lahir </label>
														<div class="col-sm-7">
															: <?php echo $detail['tempat_lahir'] ?>/<?php echo $detail['tgl_lahir'] ?>
														</div>
													</div>

													<div class="mb-3 row">
														<label for="inputPassword" class="col-sm-3 col-form-label">Nomor Ujian Nasional </label>
														<div class="col-sm-7">
															: <?php echo $detail['no_un'] ?>
														</div>
													</div>

													<div class="mb-3 row">
														<label for="inputPassword" class="col-sm-3 col-form-label">Nomor Ijazah </label>
														<div class="col-sm-7">
															: <?php echo $detail['no_ijazah'] ?>
														</div>
													</div>

													<div class="mb-3 row">
														<label for="inputPassword" class="col-sm-3 col-form-label">Tahun Lulus </label>
														<div class="col-sm-7">
															: <?php echo $detail['tahun_lulus'] ?>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
								<a href="<?= base_url() ?>arsip_surat/ijazah" class="btn btn-flat btn-outline-primary"><i class="fas fa-sync"></i> CLOSE </a>

							</div>
						</div>

					</div>
				</div>
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->

</main>
<!-- /.content-wrapper -->