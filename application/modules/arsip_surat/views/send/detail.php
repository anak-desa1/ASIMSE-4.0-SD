<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>

<main id="main" class="main">

	<div class="pagetitle">
		<h1><?= $title; ?></h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href=""><?= $home; ?></a></li>
				<li class="breadcrumb-item"><?= $subtitle; ?></li>
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
								<div class="col-md-12 col-md-offset-1">
									<div class="box">
										<div class="box-header bg-yellow"><i class="fas fa-file-archive"></i> Detail Surat Keluar</div>
										<div class="box-body">
											<div class="col-md-12 text-center">
												<a target="_blank" href="<?php echo base_url('arsip_surat/send/send_download/' . $views['berkas']) ?>" title="File Surat Keluar">
													<h1 style="font-size: 100px;"><i class="fas fa-file-pdf"></i></h1>
												</a>
												<h4><?php echo $views['nomor'] ?></h4>
											</div>
											<hr>

											<div class="col-md-12" style="margin-top: 20px;">
												<form class="form-horizontal">

													<div class="mb-3 row">
														<label for="inputPassword" class="col-sm-3 col-form-label">Nomor Surat </label>
														<div class="col-sm-7">
															: <?php echo $views['nomor'] ?>
														</div>
													</div>

													<div class="mb-3 row">
														<label for="inputPassword" class="col-sm-3 col-form-label">Tanggal Surat </label>
														<div class="col-sm-7">
															: <?php echo $views['tanggal'] ?>
														</div>
													</div>

													<div class="mb-3 row">
														<label for="inputPassword" class="col-sm-3 col-form-label">Pengrim </label>
														<div class="col-sm-7">
															: <?php echo $views['pengirim'] ?>
														</div>
													</div>

													<div class="mb-3 row">
														<label for="inputPassword" class="col-sm-3 col-form-label">Tertuju </label>
														<div class="col-sm-7">
															: <?php echo $views['tertuju'] ?>
														</div>
													</div>

													<div class="mb-3 row">
														<label for="inputPassword" class="col-sm-3 col-form-label">Alamat </label>
														<div class="col-sm-7">
															: <i class="fas fa-map-marker-alt"></i> <?php echo $views['alamat'] ?>
														</div>
													</div>

													<div class="mb-3 row">
														<label for="inputPassword" class="col-sm-3 col-form-label">Perihal </label>
														<div class="col-sm-7">
															: <?php echo $views['perihal'] ?>
														</div>
													</div>

													<div class="mb-3 row">
														<label for="inputPassword" class="col-sm-3 col-form-label">Disposisi </label>
														<div class="col-sm-7">
															: <span class="text-success"><i class="fas fa-check-circle"></i></span> <?php echo $views['disposisi'] ?>
														</div>
													</div>

												</form>
											</div>
										</div>
									</div>
								</div>
								<a href="<?= base_url() ?>arsip_surat/send" class="btn btn-flat btn-outline-primary"><i class="fas fa-sync"></i> CLOSE </a>

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