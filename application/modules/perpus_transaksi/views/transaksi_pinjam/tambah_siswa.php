<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title; ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html"><?= $home; ?></a></li>
                <!-- <li class="breadcrumb-item"><?= $subtitle; ?></li> -->
                <li class="breadcrumb-item active"><?= $title; ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <!-- Main content -->
    <section class="content">
        <div class="col-12">

            <div class="card" style="border-top: 8px solid #035AA6;border-bottom: 8px solid #035AA6;border-right: 4px solid #035AA6;border-top-left-radius: 16px;border-bottom-left-radius: 16px;box-shadow: 0px 3px 6px 0px #222;">
				
				<div class="col-md-12">
					<div class="box box-primary">
						<!-- /.box-header -->
							<div class="card">
								<div class="card-body">
								<div class="box-body">
										<form action="<?php echo base_url('perpus_transaksi/prosespinjam');?>" method="POST" enctype="multipart/form-data">
											
											<div class="row">
												<div class="col-sm-5">
													<table class="table table-striped">
														<tr style="background:yellowgreen">
															<td colspan="3">Data Transaksi</td>
														</tr>
														<tr>
															<td>No Peminjaman</td>
															<td>:</td>
															<td>
																<input type="text" name="nopinjam" value="<?= $nop;?>" readonly class="form-control">
															</td>
														</tr>
														<tr>
															<td>Tgl Peminjaman</td>
															<td>:</td>
															<td>
																<input type="date" value="<?= date('Y-m-d');?>" name="tgl" class="form-control">
															</td>
														</tr>
														<tr>
															<td>ID Anggota</td>
															<td>:</td>
															<td>
																<div class="input-group">
																	<input type="text" class="form-control" required autocomplete="off" name="anggota_id" id="search-box" placeholder="Contoh ID Anggota : AG001" type="text" value="">
																	<span class="input-group-btn">
																		<a data-toggle="modal" data-target="#TableAnggota" class="btn btn-primary"><i class="fa fa-search"></i></a>
																	</span>
																</div>
															</td>
														</tr>
														<tr>
															<td>Biodata</td>
															<td>:</td>
															<td>
																<div id="result_tunggu"> <p style="color:red">* Belum Ada Hasil</p></div>
																<div id="result"></div>
															</td>
														</tr>
														<tr>
															<td>Lama Peminjaman</td>
															<td>:</td>
															<td>
																<input type="number" required placeholder="Lama Pinjam Contoh : 2 Hari (2)" name="lama" class="form-control">
															</td>
														</tr>
													</table>
												</div>
												<div class="col-sm-7">
													<table class="table table-striped">
														<tr style="background:yellowgreen">
															<td colspan="3">Pinjam Buku</td>
														</tr>
														<tr>
															<td>Kode Buku</td>
															<td>:</td>
															<td>
																<div class="input-group">
																	<input type="text" class="form-control" autocomplete="off" name="buku_id" id="buku-search" placeholder="Contoh ID Buku : BK001" type="text" value="">
																	<span class="input-group-btn">
																		<a data-toggle="modal" data-target="#TableBuku" class="btn btn-primary"><i class="fa fa-search"></i></a>
																	</span>
																</div>
															</td>
														</tr>
														<tr>
															<td>Data Buku</td>
															<td>:</td>
															<td>
																<div id="result_tunggu_buku"> <p style="color:red">* Belum Ada Hasil</p></div>
																<div id="result_buku"></div>
															</td>
														</tr>
													</table>
												</div>
											</div>
											<div class="pull-right">
												<input type="hidden" name="tambah_siswa" value="tambah_siswa">
												<button type="submit" class="btn btn-primary btn-md">Submit</button> 
										</form>
												<a href="<?= base_url('perpus_transaksi/transaksi_peminjaman');?>" class="btn btn-danger btn-md">Kembali</a>
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
<!-- jQuery -->
<script src="<?= base_url() ?>panel/plugins/jquery/jquery.min.js"></script>
<!--modal cari buku -->
<div class="modal fade" id="TableBuku">
<div class="modal-dialog modal-lg" style="width:80%;">
<div class="modal-content">

<div class="modal-header">
    <h5 class="modal-title" id="exampleModalToggleLabel">Add Buku</h5>
    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
</div>

<div id="modal_body" class="modal-body fileSelection1">
<div class="table-responsive">
<table id="myTable-1" class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>No</th>
				<th>ISBN</th>
				<th>Title</th>
				<th>Penerbit</th>
				<th>Tahun Buku</th>
				<th>Stok Buku</th>
				<th>Tanggal Masuk</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
		<?php $no=1;foreach($buku->result_array() as $isi){?>
			<tr>
				<td><?= $no;?></td>
				<td><?= $isi['isbn'];?></td>
				<td><?= $isi['title'];?></td>
				<td><?= $isi['penerbit'];?></td>
				<td><?= $isi['thn_buku'];?></td>
				<td><?= $isi['jml'];?></td>
				<td><?= $isi['tgl_masuk'];?></td>
				<td style="width:17%">
				<button class="btn btn-primary" id="Select_File2" data_id="<?= $isi['buku_id'];?>">
					<i class="fa fa-check"> </i> 
				</button>
			</tr>
		<?php $no++;}?>
		</tbody>
	</table>
</div>
</div>

<div class="modal-footer">
	<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
	$(".fileSelection1 #Select_File2").click(function (e) {
		document.getElementsByName('buku_id')[0].value = $(this).attr("data_id");
		$('#TableBuku').modal('hide');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('perpus_transaksi/buku');?>",
			data:'kode_buku='+$(this).attr("data_id"),
			beforeSend: function(){
				$("#result_buku").html("");
				$("#result_tunggu_buku").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
			},
			success: function(html){
				$("#result_buku").load("<?= base_url('perpus_transaksi/buku_list');?>");
				$("#result_tunggu_buku").html('');
			}
		});
	});
	</script>
	  
	<script>
	// AJAX call for autocomplete 
	$(document).ready(function(){
		$("#buku-search").keyup(function(){
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('perpus_transaksi/buku');?>",
				data:'kode_buku='+$(this).val(),
				beforeSend: function(){
					$("#result_tunggu_buku").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
				},
				success: function(html){
					$("#result_buku").load("<?= base_url('perpus_transaksi/buku_list');?>");
					$("#result_tunggu_buku").html('');
				}
			});
		});
	});
	</script>
 <!--modal cari anggota -->
 <div class="modal fade" id="TableAnggota">
	<div class="modal-dialog">
	<div class="modal-content">

	<div class="modal-header">
		<h5 class="modal-title" id="exampleModalToggleLabel">Add Anggota</h5>
		<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
	</div>
	
	<div id="modal_body" class="modal-body fileSelection1">	
	<table id="myTable-2" class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>No</th>
				<th>ID</th>
				<th>Nama</th>				
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
		<?php $no=1;foreach($user as $isi){
			if($isi['stat_data'] == 'K'){
			?>
			<tr>
				<td><?= $no;?></td>
				<td><?= $isi['nis'];?></td>
				<td><?= $isi['nama'];?></td>
				<td style="width:20%;">
					<button class="btn btn-primary" id="Select_File1" data_id="<?= $isi['nis'];?>">
					<i class="fa fa-check"> </i>
					</button>
				</td>
			</tr>
		<?php $no++;}}?>
		</tbody>
		</table>
	</div>
	
	<div class="modal-footer">
		<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
	</div>
	</div>
	<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
	<script>
	$(".fileSelection1 #Select_File1").click(function (e) {
		document.getElementsByName('anggota_id')[0].value = $(this).attr("data_id");
		$('#TableAnggota').modal('hide');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('perpus_transaksi/result_siswa');?>",
			data:'kode_anggota='+$(this).attr("data_id"),
			beforeSend: function(){
				$("#result").html("");
				$("#result_tunggu").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
			},
			success: function(html){
				$("#result").html(html);
				$("#result_tunggu").html('');
			}
		});
	});
	</script>
	  
	<script>
	// AJAX call for autocomplete 
	$(document).ready(function(){
		$("#search-box").keyup(function(){
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('perpus_transaksi/result_siswa');?>",
				data:'kode_anggota='+$(this).val(),
				beforeSend: function(){
					$("#result").html("");
					$("#result_tunggu").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
				},
				success: function(html){
					$("#result").html(html);
					$("#result_tunggu").html('');
				}
			});
		});
	});
	</script>
