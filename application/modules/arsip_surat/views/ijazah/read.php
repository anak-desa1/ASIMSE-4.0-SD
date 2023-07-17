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

								<div class="box box-solid">
									<!-- <div class="box-header bg-yellow"><i class="fas fa-file-archive"></i> Arsip Ijazah &amp; SKHUN</div> -->
									<div class="box-body table-responsive">
										<table class="table table-striped table-sm" id="example1" style="font-size: 13px">
											<thead>
												<tr>
													<th>No</th>
													<th>No Ijazah</th>
													<th>Nama Lengkap</th>
													<th>T. Tgl Lahir</th>
													<th>Tahun Lulus</th>
													<th>Unduh</th>
													<th><i class="fas fa-cogs"></i></th>
												</tr>
											</thead>
											<tbody>
												<?php $no = 1;
												foreach ($ijazah as $key => $row) { ?>
													<tr>
														<td><?php echo $no++ ?></td>
														<td><?php echo $row->no_ijazah ?></td>
														<td><?php echo $row->nama_lengkap ?></td>
														<td><?php echo $row->tempat_lahir ?> / <?php echo $row->tgl_lahir ?></td>
														<td><?php echo $row->tahun_lulus ?></td>
														<td align="center">
															<a target="_blank" href="<?php echo base_url('arsip_surat/ijazah/ijazah_download/' . $row->berkas) ?>" title="Download" class="btn btn-sm btn-warning"><i class="fas fa-cloud-download-alt "></i> Ijazah</a>
															<a target="_blank" href="<?php echo base_url('arsip_surat/ijazah/ijazah_download/' . $row->skhun) ?>" title="Download" class="btn btn-sm btn-primary"><i class="fas fa-cloud-download-alt "></i> Skhun</a>
														</td>
														<td width="15%" align="center">
															<a href="<?php echo base_url('arsip_surat/ijazah/detail/' . $row->id) ?>" title="Update">
																<button class="btn btn-flat btn-sm btn-primary"><i class="fas fa-eye"></i></button>
															</a>
															<a href="<?php echo base_url('arsip_surat/ijazah/update/' . $row->id) ?>" title="Update">
																<button class="btn btn-flat btn-sm btn-success"><i class="fas fa-edit"></i></button>
															</a>
															<a href="<?php echo base_url('arsip_surat/ijazah/delete/' . $row->id) ?>">
																<button onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini ?')" class="btn btn-flat btn-sm btn-danger" title="Delete"><i class="fa fa-user-times"></i></button>
															</a>
														</td>
													</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
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
<form action="<?php echo base_url('arsip_surat/ijazah/add') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-envelope"></i> Tambah Arsip Ijazah</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<div class="mb-3 row">
						<label for="nama_lengkap" class="col-sm-3 col-form-label">Nama Lengkap </label>
						<div class="col-sm-7">
							<input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" autocomplete="off" required>
						</div>
					</div>
					<div class="mb-3 row">
						<label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir </label>
						<div class="col-sm-7">
							<input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" autocomplete="off" required>
						</div>
					</div>
					<div class="mb-3 row">
						<label for="tgl_lahir" class="col-sm-3 col-form-label">Tanggal Lahir </label>
						<div class="col-sm-7">
							<input type="date" class="form-control tanggal" name="tgl_lahir" id="tgl_lahir" placeholder="Tanggal Lahir" autocomplete="off" required>
						</div>
					</div>
					<div class="mb-3 row">
						<label for="no_un" class="col-sm-3 col-form-label">Nomor UN </label>
						<div class="col-sm-7">
							<input type="text" class="form-control" name="no_un" id="no_un" placeholder="Nomor Ujian Nasional" autocomplete="off" required>
						</div>
					</div>
					<div class="mb-3 row">
						<label for="no_ijazah" class="col-sm-3 col-form-label">Nomor Ijazah </label>
						<div class="col-sm-7">
							<input type="text" class="form-control" name="no_ijazah" id="no_ijazah" placeholder="Nomor Ijazah" autocomplete="off" required>
						</div>
					</div>
					<div class="mb-3 row">
						<label for="tahun_lulus" class="col-sm-3 col-form-label">Tahun Lulus </label>
						<div class="col-sm-7">
							<input type="text" class="form-control" name="tahun_lulus" id="tahun_lulus" placeholder="Tahun Lulus" autocomplete="off" required>
						</div>
					</div>
					<div class="mb-3 row">
						<label for="berkas" class="col-sm-3 col-form-label">Upload Scan Ijazah </label>
						<div class="col-sm-7">
							<input type="file" class="form-control" name="ijazah" id="ijazah" required>
						</div>
					</div>
					<div class="mb-3 row">
						<label for="berkas" class="col-sm-3 col-form-label">Upload Scan SKUN </label>
						<div class="col-sm-7">
							<input type="file" class="form-control" name="skhun" id="skhun" required>
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