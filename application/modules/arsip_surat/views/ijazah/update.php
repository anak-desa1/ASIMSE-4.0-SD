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
								<form action="<?php echo base_url('arsip_surat/ijazah/update_ijazah') ?>" method="post" class="form-horizontal">
									<div class="box box-solid">
										<div class="box-body">
											<input type="hidden" name="id" value="<?php echo $detail['id'] ?>">
											<div class="mb-3 row">
												<label for="nama_lengkap" class="col-sm-3 col-form-label">Nama Lengkap </label>
												<div class="col-sm-7">
													<input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" value="<?php echo $detail['nama_lengkap'] ?>" autocomplete="off" required>
												</div>
											</div>
											<div class="mb-3 row">
												<label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir </label>
												<div class="col-sm-7">
													<input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="<?php echo $detail['tempat_lahir'] ?>" autocomplete="off" required>
												</div>
											</div>
											<div class="mb-3 row">
												<label for="tgl_lahir" class="col-sm-3 col-form-label">Tanggal Lahir </label>
												<div class="col-sm-7">
													<input type="text" class="form-control tanggal" name="tgl_lahir" id="tgl_lahir" value="<?php echo $detail['tgl_lahir'] ?>" autocomplete="off" required>
												</div>
											</div>
											<div class="mb-3 row">
												<label for="no_un" class="col-sm-3 col-form-label">Nomor UN </label>
												<div class="col-sm-7">
													<input type="text" class="form-control" name="no_un" id="no_un" value="<?php echo $detail['no_un'] ?>" autocomplete="off" required>
												</div>
											</div>
											<div class="mb-3 row">
												<label for="no_ijazah" class="col-sm-3 col-form-label">Nomor Ijazah </label>
												<div class="col-sm-7">
													<input type="text" class="form-control" name="no_ijazah" id="no_ijazah" value="<?php echo $detail['no_ijazah'] ?>" autocomplete="off" required>
												</div>
											</div>
											<div class="mb-3 row">
												<label for="tahun_lulus" class="col-sm-3 col-form-label">Tahun Lulus </label>
												<div class="col-sm-7">
													<input type="text" class="form-control" name="tahun_lulus" id="tahun_lulus" value="<?php echo $detail['tahun_lulus'] ?>" autocomplete="off" required>
												</div>
											</div>
											<div class="mb-3 row">
												<label for="berkas" class="col-sm-3 col-form-label">Scan Ijazah </label>
												<div class="col-sm-7">
													<input type="text" class="form-control" name="berkas" id="berkas" value="<?php echo $detail['berkas'] ?>" autocomplete="off" required>
												</div>
											</div>
											<div class="mb-3 row">
												<label for="berkas2" class="col-sm-3 col-form-label">Scan SKHUN </label>
												<div class="col-sm-7">
													<input type="text" class="form-control" name="berkas2" id="berkas2" value="<?php echo $detail['skhun'] ?>" autocomplete="off" required>
												</div>
											</div>
											<div class="mb-3 row">
												<label for="" class="col-sm-3 col-form-label"></label>
												<div class="col-md-8">
													<button type="submit" name="submit" class="btn btn-flat btn-success"><i class="fas fa-sync"></i> UPDATE</button>
													<a href="<?= base_url() ?>arsip_surat/ijazah" class="btn btn-flat btn-outline-primary"><i class="fas fa-sync"></i> CLOSE </a>
												</div>
											</div>
										</div>
									</div>
								</form>

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