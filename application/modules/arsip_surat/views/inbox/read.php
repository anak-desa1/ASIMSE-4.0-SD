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
								<a href="#exampleModal" data-toggle="modal" class="btn btn-flat btn-primary btn-sm"><i class="fas fa-plus-square"></i> Tambah</a>
								<a href="<?php echo base_url('arsip_surat/excel_inbox') ?>" class="btn btn-flat btn-success btn-sm"><i class="fas fa-file-excel "></i> Simpan Ke Excel</a>

								<div class="table-responsive">
									<table class="table table-striped table-sm" id="example1" style="font-size: 13px">
										<thead>
											<tr>
												<th>No</th>
												<th>Tanggal</th>
												<th>Nomor Surat</th>
												<th>Perihal</th>
												<th>Pengirim</th>
												<th>Tujuan</th>
												<th>Disposisi</th>
												<th>Status</th>
												<th><i class="fas fa-cogs"></i></th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1 ?>
											<?php foreach ($inbox as $key => $row) :
											?>
												<tr>
													<td style='text-align:center'><?= $no++ ?></td>
													<td><?= $row['tanggal'] ?></td>
													<td><?= $row['nomor'] ?></td>
													<td><?= $row['perihal'] ?></td>
													<td><?= $row['pengirim'] ?></td>
													<td><?= $row['tujuan'] ?></td>
													<td><?= $row['disposisi'] ?></td>
													<td>
														<?php
														if ($row['is_approved'] == 1) {
															echo '<span class="text-success"><i class="fas fa-check-square"></i></span> Diterima';
														} elseif ($row['is_approved'] == 0) {
															echo '<span class="text-warning"><i class="fas fa-check-circle"></i></span> Terkirim';
														} elseif ($row['is_approved'] == 2) {
															echo '<span class="text-danger"><i class="fas fa-times-circle"></i></span> Ditolak';
														}
														?>
													</td>
													<td>
														<a target="_blank" href="<?php echo base_url('arsip_surat/inbox/inbox_download/' . $row['berkas']) ?>" title="Download" class="btn btn-sm btn-warning"><i class="fas fa-cloud-download-alt "></i></a>
														<a title="show" href="#pdfModal<?php $key ?>" data-toggle="modal" class="btn btn-sm btn-warning"><i class="fas fa-file-alt "></i></a>
														<a href="<?php echo base_url('arsip_surat/inbox/detail/' . $row['id']) ?>" title="Update">
															<button class="btn btn-flat btn-sm btn-primary"><i class="fas fa-eye"></i></button>
														</a>

														<a href="<?php echo base_url('arsip_surat/inbox/update/' . $row['id']) ?>" title="Update">
															<button class="btn btn-flat btn-sm btn-success"><i class="fas fa-edit"></i></button>
														</a>

														<a href="<?php echo base_url('arsip_surat/inbox/delete/' . $row['id']) ?>">
															<button onclick="return confirm('Apakah ORa Yakin Akan Menghapus Data Ini ?')" class="btn btn-flat btn-sm btn-danger" title="Delete"><i class="fa fa-user-times"></i></button>
														</a>
													</td>
												</tr>
											<?php
											endforeach ?>
										</tbody>
									</table>
									<!-- Modal view Pdf -->
									<div class="modal fade" id="pdfModal<?php $key ?>" tabindex="-1" role="dialog" aria-labelledby="pdfModal<?php $key ?>" aria-hidden="true">
										<div class="modal-dialog modal-lg" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="pdfModal<?php $key ?>"><i class="fas fa-envelope-open"></i> <?php echo $row['nomor'] ?></h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body" style="height: 450px;">
													<embed type="application/pdf" src="<?php echo base_url('arsip_surat/inbox/inbox_download/' . $row['berkas']) ?>" width="100%" height="100%"></embed>
												</div>
											</div>
										</div>
									</div>
									<!-- End Modal view Pdf -->
								</div>

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

<!-- Modal Tambah Surat Masuk -->
<form action="<?php echo base_url('arsip_surat/inbox/add') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-envelope"></i> Tambah Surat Masuk</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<div class="mb-3 row">
						<label for="inputPassword" class="col-sm-3 col-form-label">Tanggal Masuk </label>
						<div class="col-sm-7">
							<input type="date" class="form-control tanggal" name="tanggal" id="date" placeholder="Tanggal" autocomplete="off" required>
						</div>
					</div>

					<div class="mb-3 row">
						<label for="inputPassword" class="col-sm-3 col-form-label">Nomor Surat </label>
						<div class="col-sm-7">
							<input type="text" class="form-control" name="nomor" id="nomor" placeholder="Nomor Surat" autocomplete="off" required>
						</div>
					</div>

					<div class="mb-3 row">
						<label for="inputPassword" class="col-sm-3 col-form-label">Pengirim </label>
						<div class="col-sm-7">
							<input type="text" class="form-control" name="pengirim" id="pengirim" placeholder="Pengirim" autocomplete="off" required>
						</div>
					</div>

					<div class="mb-3 row">
						<label for="inputPassword" class="col-sm-3 col-form-label">Tujuan </label>
						<div class="col-sm-7">
							<input type="text" class="form-control" name="tujuan" id="tujuan" placeholder="Tujuan" autocomplete="off" required>
						</div>
					</div>

					<div class="mb-3 row">
						<label for="inputPassword" class="col-sm-3 col-form-label">Perihal </label>
						<div class="col-sm-7">
							<input type="text" class="form-control" name="perihal" id="perihal" placeholder="Perihal" autocomplete="off" required>
						</div>
					</div>

					<div class="mb-3 row">
						<label for="inputPassword" class="col-sm-3 col-form-label">Disposisi </label>
						<div class="col-sm-7">
							<select name="disposisi" id="disposisi" class="form-control" required>
								<option value="">-- Belum Ditentukan --</option>
								<?php foreach ($disposisi as $key => $row) { ?>
									<option value="<?php echo $row['disposisi'] ?>"><?php echo $row['disposisi'] ?></option>
								<?php } ?>
							</select>
						</div>
					</div>

					<div class="mb-3 row">
						<label for="inputPassword" class="col-sm-3 col-form-label">Isi Disposisi </label>
						<div class="col-sm-7">
							<input type="text" class="form-control" name="isi_disposisi" id="isi_disposisi" placeholder="Nama Disposisi" autocomplete="off" required>
						</div>
					</div>

					<div class="mb-3 row">
						<label for="inputPassword" class="col-sm-3 col-form-label">Upload Scan Surat </label>
						<div class="col-sm-7">
							<input type="file" class="form-control" name="berkas" id="berkas" required>
						</div>
					</div>

					<div class="mb-3 row">
						<label for="inputPassword" class="col-sm-3 col-form-label">Status Surat</label>
						<div class="col-sm-7">
							<select name="is_approved" id="is_approved" class="form-control" required>
								<option value="">-- Belum Ditentukan --</option>
								<option value="0">-- Terkirim --</option>
								<option value="1">-- Diterima --</option>
								<option value="2">-- Ditolah --</option>
							</select>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="submit" name="submit" class="btn btn-flat btn-primary"><i class="fas fa-save"></i> SIMPAN</button>
				</div>
			</div>
		</div>
	</div>
</form>