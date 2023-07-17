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
								<form action="<?php echo base_url('arsip_surat/inbox/update_inbox') ?>" method="post" class="form-horizontal">
									<div class="box box-solid">
										<div class="box-body">
											<input type="hidden" name="id" value="<?php echo $view['id'] ?>">

											<div class="mb-3 row">
												<label for="input" class="col-sm-3 col-form-label">Tanggal Masuk </label>
												<div class="col-sm-7">
													<input type="text" class="form-control tanggal" name="tanggal" id="tanggal" value="<?php echo $view['tanggal'] ?>" autocomplete="off" required>
												</div>
											</div>

											<div class="mb-3 row">
												<label for="input" class="col-sm-3 col-form-label">Nomor Surat </label>
												<div class="col-sm-7">
													<input type="text" class="form-control" name="nomor" id="nomor" value="<?php echo $view['nomor'] ?>" autocomplete="off" required>
												</div>
											</div>

											<div class="mb-3 row">
												<label for="input" class="col-sm-3 col-form-label">Pengirim </label>
												<div class="col-sm-7">
													<input type="text" class="form-control" name="pengirim" id="pengirim" value="<?php echo $view['pengirim'] ?>" autocomplete="off" required>
												</div>
											</div>

											<div class="mb-3 row">
												<label for="input" class="col-sm-3 col-form-label">Tujuan </label>
												<div class="col-sm-7">
													<input type="text" class="form-control" name="tujuan" id="tujuan" value="<?php echo $view['tujuan'] ?>" autocomplete="off" required>
												</div>
											</div>

											<div class="mb-3 row">
												<label for="input" class="col-sm-3 col-form-label">Perihal </label>
												<div class="col-sm-7">
													<input type="text" class="form-control" name="perihal" id="perihal" value="<?php echo $view['perihal'] ?>" autocomplete="off" required>
												</div>
											</div>

											<div class="mb-3 row">
												<label for="inputPassword" class="col-sm-3 col-form-label">Disposisi </label>
												<div class="col-sm-7">
													<select name="disposisi" id="disposisi" class="form-control" required>
														<option value="<?php echo $view['disposisi'] ?>"><?php echo $view['disposisi'] ?></option>
														<?php foreach ($disposisi as $key => $row) { ?>
															<option value="<?php echo $row['disposisi'] ?>"><?php echo $row['disposisi'] ?></option>
														<?php } ?>
													</select>
												</div>
											</div>

											<div class="mb-3 row">
												<label for="input" class="col-sm-3 col-form-label">Isi Disposisi </label>
												<div class="col-sm-7">
													<input type="text" class="form-control" name="isi_disposisi" id="isi_disposisi" value="<?php echo $view['isi_disposisi'] ?>" autocomplete="off" required>
												</div>
											</div>

											<div class="mb-3 row">
												<label for="input" class="col-sm-3 col-form-label">Berkas </label>
												<div class="col-sm-7">
													<input type="text" class="form-control" name="berkas" id="berkas" value="<?php echo $view['berkas'] ?>" autocomplete="off" readonly>
												</div>
											</div>

											<div class="mb-3 row">
												<label for="input" class="col-sm-3 col-form-label">Status Surat </label>
												<div class="col-sm-7">
													<select name="is_approved" id="is_approved" class="form-control" required>
														<option value="">-- Belum Ditentukan --</option>
														<option value="1" <?php if ($view['is_approved'] == 1) {
																				echo 'selected';
																			} ?>>Diterima</option>
														<option value="0" <?php if ($view['is_approved'] == 0) {
																				echo 'selected';
																			} ?>>Terkirim</option>
														<option value="2" <?php if ($view['is_approved'] == 2) {
																				echo 'selected';
																			} ?>>Ditolak</option>
													</select>
												</div>
											</div>

											<div class="form-group">
												<label for="" class="control-label col-md-3"></label>
												<div class="col-md-8">
													<button type="submit" name="submit" class="btn btn-flat btn-success"><i class="fas fa-sync"></i> UPDATE</button>
													<a href="<?= base_url() ?>arsip_surat/inbox" class="btn btn-flat btn-outline-primary"><i class="fas fa-sync"></i> CLOSE </a>
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