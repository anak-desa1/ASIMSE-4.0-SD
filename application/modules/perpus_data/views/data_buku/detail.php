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
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<div class="box box-primary">
								<a href="<?= base_url('perpus_data/data_buku');?>" class="btn btn-danger btn-md">Kembali</a>
								<br/>
								<br/>
								<div class="box-header with-border">
									<div class="alert alert-light" role="alert">
										<h4><?= $buku->title;?></h4>
									</div>
								</div>
								<!-- /.box-header -->
								<div class="box-body">
									<table class="table table-striped table-bordered">
										<tr>
											<td style="width:20%">ISBN</td>
											<td><?= $buku->isbn;?></td>
										</tr>
										<tr>
											<td>Sampul Buku</td>
											<td><?php if(!empty($buku->sampul !== "0")){?>
													<a href="<?= base_url('panel/dist/upload/perpus_buku/'.$buku->sampul);?>" target="_blank">
														<img src="<?= base_url('panel/dist/upload/perpus_buku/'.$buku->sampul);?>" style="width:170px;height:170px;" class="img-responsive">
													</a>
													<?php }else{ echo '<br/><p style="color:red">* Tidak ada Sampul</p>';}?>
												</td>
										</tr>
										<tr>
											<td>Judul Buku</td>
											<td><?= $buku->title;?></td>
										</tr>
										<tr>
											<td>Kategori</td>
											<td><?= $buku->nama_kategori;?></td>
										</tr>
										<tr>
											<td>Penerbit</td>
											<td><?= $buku->penerbit;?></td>
										</tr>
										<tr>
											<td>Pengarang</td>
											<td><?= $buku->pengarang;?></td>
										</tr>
										<tr>
											<td>Tahun Terbit</td>
											<td><?= $buku->thn_buku;?></td>
										</tr>
										<tr>
											<td>Jumlah Buku</td>
											<td><?= $buku->jml;?></td>
										</tr>
										<tr>
											<td>Jumlah Pinjam</td>
											<td>
												<?php
													$id = $buku->buku_id;
													$dd = $this->db->query("SELECT * FROM perpus_pinjam WHERE buku_id= '$id' AND status = 'Dipinjam'");
													if($dd->num_rows() > 0 )
													{
														echo $dd->num_rows();
													}else{
														echo '0';
													}
												?> 
												<a data-toggle="modal" data-target="#TableAnggota" class="btn btn-primary btn-xs" style="margin-left:1pc;"><i class="fa fa-sign-in"></i> Detail Pinjam</a>
											</td>
										</tr>
										<tr>
											<td>Keterangan Lainnya</td>
											<td><?= $buku->isi;?></td>
										</tr>
										<tr>
											<td>Rak / Lokasi</td>
											<td><?= $buku->nama_rak;?></td>
										</tr>
										<tr>
											<td>Lampiran</td>
											<td><?php if(!empty($buku->lampiran !== "0")){?>
													<a href="<?= base_url('panel/dist/upload/perpus_buku/'.$buku->lampiran);?>" class="btn btn-primary btn-md" target="_blank">
														<i class="fa fa-download"></i> Sample Buku
													</a>
												<?php  }else{ echo '<br/><p style="color:red">* Tidak ada Lampiran</p>';}?>
											</td>
										</tr>
										<tr>
											<td>Tanggal Masuk</td>
											<td><?= $buku->tgl_masuk;?></td>
										</tr>
									</table>
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

 <!--modal import -->
<div class="modal fade" id="TableAnggota">
<div class="modal-dialog modal-lg" style="width:100%">
<div class="modal-content">

<div class="modal-header">
<h5 class="modal-title" id="TableAnggotaLabel">Anggota Yang Sedang Pinjam</h5>
<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
</div>

<div id="modal_body" class="modal-body fileSelection1">
	<div class="table-responsive">
		<table id="myTable" class="table table-bordered table-striped" style="font-size: 14px">
			<thead>
				<tr>
					<th>No</th>
					<th>ID</th>
					<th>Nama</th>
					<th>Jenkel</th>
					<th>Telepon</th>
					<th>Tgl Pinjam</th>
					<th>Lama Pinjam</th>
				</tr>
			</thead>
			<tbody>
			<?php 
			$no = 1;
			$bukuid = $buku->buku_id;
			$pin = $this->db->query("SELECT * FROM perpus_pinjam WHERE buku_id ='$bukuid' AND status = 'Dipinjam'")->result_array();
			foreach($pin as $si)
			{
				$isi = $this->db->get('perpus_anggota','anggota_id',$si['anggota_id']);
				if($isi->level == 'Anggota'){
				?>
				<tr>
					<td><?= $no;?></td>
					<td><?= $isi->anggota_id;?></td>
					<td><?= $isi->nama;?></td>
					<td><?= $isi->jenkel;?></td>
					<td><?= $isi->telepon;?></td>
					<td><?= $si['tgl_pinjam'];?></td>
					<td><?= $si['lama_pinjam'];?> Hari</td>
				</tr>
			<?php $no++;}}?>
			</tbody>
		</table>
	</div>
</div>

<div class="modal-footer">
	<button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
