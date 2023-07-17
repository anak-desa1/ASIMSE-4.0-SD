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
				
			<div class="row">
						<div class="col-md-12">
							<div class="box box-primary">
								<div class="box-header with-border">
								</div>
								<!-- /.box-header -->
								<div class="card">
									<div class="card-body">	
										<div class="box-body">
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
																<?= $pinjam->pinjam_id;?>
															</td>
														</tr>
														<tr>
															<td>Tgl Peminjaman</td>
															<td>:</td>
															<td>
																<?= $pinjam->tgl_pinjam;?>
															</td>
														</tr>
														<tr>
															<td>Tgl pengembalian</td>
															<td>:</td>
															<td>
																<?= $pinjam->tgl_balik;?>
															</td>
														</tr>
														<tr>
															<td>ID Anggota</td>
															<td>:</td>
															<td>
																<?php if ($pinjam->anggota_id != ''){?>
																	<?= $pinjam->anggota_id;?>
																<?php } ?>
																<?php if ($pinjam->guru_id != ''){?>
																	<?= $pinjam->guru_id;?>
																<?php } ?>
																<?php if ($pinjam->siswa_id != ''){?>
																	<?= $pinjam->siswa_id;?>
																<?php } ?>																
															</td>
														</tr>
														<tr>
															<td>Biodata</td>
															<td>:</td>
															<td>
																<?php if ($pinjam->anggota_id != ''){?>
																	<?php
																$user = $this->perpus->get_tableid_edit('perpus_angota','anggota_id',$pinjam->anggota_id);
																error_reporting(0);
																if($user->nama != null)
																{
																	echo '<table class="table table-striped">
																				<tr>
																					<td>Nama Anggota</td>
																					<td>:</td>
																					<td>'.$user->nama.'</td>
																				</tr>
																				<tr>
																					<td>Telepon</td>
																					<td>:</td>
																					<td>'.$user->telepon.'</td>
																				</tr>
																				<tr>
																					<td>E-mail</td>
																					<td>:</td>
																					<td>'.$user->email.'</td>
																				</tr>
																				<tr>
																					<td>Alamat</td>
																					<td>:</td>
																					<td>'.$user->alamat.'</td>
																				</tr>
																				<tr>
																					<td>Level</td>
																					<td>:</td>
																					<td>'.$user->level.'</td>
																				</tr>
																			</table>';
																}else{
																	echo 'Anggota Tidak Ditemukan !';
																}
																?>
																<?php } ?>
																<?php if ($pinjam->guru_id != ''){?>
																<?php
																$user = $this->perpus->get_tableid_edit('m_guru','nip',$pinjam->guru_id);
																error_reporting(0);
																if($user->nama_guru != null)
																{
																	echo '	<table class="table table-striped">
																				<tr>									
																					<td>'.$user->nama_guru.'</td>
																				</tr>																				
																			</table>';
																}else{
																	echo 'Anggota Tidak Ditemukan !';
																}
																?>
																<?php } ?>
																<?php if ($pinjam->siswa_id != ''){?>
																	<?php
																$user = $this->perpus->get_tableid_edit('m_siswa','nis',$pinjam->siswa_id);
																error_reporting(0);
																if($user->nama != null)
																{
																	echo '<table class="table table-striped">
																				<tr>																					
																					<td>'.$user->nama.'</td>
																				</tr>																				
																			</table>';
																}else{
																	echo 'Anggota Tidak Ditemukan !';
																}
																?>
																<?php } ?>																
															</td>
														</tr>
														<tr>
															<td>Lama Peminjaman</td>
															<td>:</td>
															<td>
																<?= $pinjam->lama_pinjam;?> Hari
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
															<td>Status</td>
															<td>:</td>
															<td>
																<?= $pinjam->status;?>
															</td>
														</tr>
														<tr>
															<td>Tgl Kembali</td>
															<td>:</td>
															<td>
																<?php 
																	if($pinjam->tgl_kembali == '0')
																	{
																		echo '<p style="color:red;">belum dikembalikan</p>';
																	}else{
																		echo $pinjam->tgl_kembali;
																	}
																
																?>
															</td>
														</tr>
														<tr>
															<td>Denda</td>
															<td>:</td>
															<td>
															<?php 
																	$pinjam_id = $pinjam->pinjam_id;
																	$denda = $this->db->query("SELECT * FROM perpus_denda WHERE pinjam_id = '$pinjam_id'");
																	$jml = $this->db->query("SELECT * FROM perpus_pinjam WHERE pinjam_id = '$pinjam_id'")->num_rows();			
																	$date1 = date('Ymd');
																	$date2 = preg_replace('/[^0-9]/','',$pinjam->tgl_balik);	
																	$diff = $date1 - $date2;																	
																	if($diff > 0 )
																	{
																		echo $diff.' hari';
																		$dd = $this->perpus->get_tableid_edit('perpus_biaya_denda','stat','Aktif'); 
																		echo '<p style="color:red;font-size:18px;">'.$this->perpus->rp($jml*($dd->harga_denda*$diff)).' 
																		</p><small style="color:#333;">* Untuk '.$jml.' Buku</small>';
																	}else{
																		echo '<p style="color:green;text-align:center;">
																		Tidak Ada Denda</p>';
																	}
																?>
															</td>
														</tr>
														
														<tr>
															<td>Kode Buku</td>
															<td>:</td>
															<td>
															<?php
																$pin = $this->perpus->get_tableid('perpus_pinjam','pinjam_id',$pinjam->pinjam_id);
																$no =1;
																foreach($pin as $isi)
																{
																	$buku = $this->perpus->get_tableid_edit('perpus_buku','buku_id',$isi['buku_id']);
																	echo $no.'. '.$buku->buku_id.'<br/>';
																$no++;}

															?>
															</td>
														</tr>
														<tr>
															<td>Data Buku</td>
															<td>:</td>
															<td>
																<table class="table table-striped">
																	<thead>
																		<tr>
																			<th>No</th>
																			<th>Title</th>
																			<th>Penerbit</th>
																			<th>Tahun</th>
																		</tr>
																	</thead>
																	<tbody>
																	<?php 
																		$no=1;
																		foreach($pin as $isi)
																		{
																			$buku = $this->perpus->get_tableid_edit('perpus_buku','buku_id',$isi['buku_id']);
																	?>
																		<tr>
																			<td><?= $no;?></td>
																			<td><?= $buku->title;?></td>
																			<td><?= $buku->penerbit;?></td>
																			<td><?= $buku->thn_buku;?></td>
																		</tr>
																	<?php $no++;}?>
																	</tbody>
																</table>
															</td>
														</tr>
													</table>
												</div>
											</div>
											<div class="pull-right">
												<a data-toggle="modal" data-target="#TableDenda" class="btn btn-primary btn-md" style="margin-left:1pc;">
													<i class="fa fa-sign-in"></i> Kembalikan</a>
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
 <!--modal import -->
<div class="modal fade" id="TableDenda">
<div class="modal-dialog modal-lg" style="width:70%">
<div class="modal-content">

<div class="modal-header">
    <h5 class="modal-title" id="exampleModalToggleLabel">Pengembalian Buku</h5>
    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
</div>

<div id="modal_body" class="modal-body fileSelection1">
	<table class="table table-striped">
		<tr style="background:yellowgreen">
			<td colspan="3">Data Peminjaman Buku</td>
		</tr>
		<tr>
			<td>No Peminjaman</td>
			<td>:</td>
			<td>
				<?= $pinjam->pinjam_id;?>
			</td>
		</tr>
		<tr>
			<td>Tgl Peminjaman</td>
			<td>:</td>
			<td>
				<?= $pinjam->tgl_pinjam;?>
			</td>
		</tr>
		<tr>
			<td>Tgl pengembalian</td>
			<td>:</td>
			<td>
				<?= $pinjam->tgl_balik;?>
			</td>
		</tr>
		<tr>
			<td>ID Anggota</td>
			<td>:</td>
			<td>
				<?php if ($pinjam->anggota_id != ''){?>
					<?= $pinjam->anggota_id;?>
					<?php
						$user = $this->perpus->get_tableid_edit('perpus_angota','anggota_id',$pinjam->anggota_id);
						error_reporting(0);
						if($user->nama != null)
						{
							echo ' ( '. $user->nama. ' )';
						}	
					?>
				<?php } ?>
				<?php if ($pinjam->guru_id != ''){?>
					<?= $pinjam->guru_id;?>
					<?php
						$user = $this->perpus->get_tableid_edit('m_guru','nip',$pinjam->anggota_id);
						error_reporting(0);
						if($user->nama_guru != null)
						{
							echo ' ( '. $user->nama_guru. ' )';
						}	
					?>
				<?php } ?>
				<?php if ($pinjam->siswa_id != ''){?>
					<?= $pinjam->siswa_id;?>
					<?php
						$user = $this->perpus->get_tableid_edit('m_siswa','nis',$pinjam->anggota_id);
						error_reporting(0);
						if($user->nama != null)
						{
							echo ' ( '. $user->nama. ' )';
						}	
					?>
				<?php } ?>
				
			</td>
		</tr>
		<tr>
			<td>Lama Peminjaman</td>
			<td>:</td>
			<td>
				<?= $pinjam->lama_pinjam;?> Hari
			</td>
		</tr>
		<tr>
			<td>Tanggal Pengembalian</td>
			<td>:</td>
			<td>
				<?= date('Y-m-d');?> ( Sekarang )
			</td>
		</tr>
		<tr>
			<td>Terlewat Masa Pengembalian</td>
			<td>:</td>
			<td>
			<?php
				
				$date1 = date('Ymd');
				$date2 = preg_replace('/[^0-9]/','',$pinjam->tgl_balik);
				$diff = $date1 - $date2;
				if($diff > 0)
				{
					echo abs($diff);

				}else{
					echo '0';
				}
			?> Hari
			</td>
		</tr>
		<tr>
			<td>Detail Buku</td>
			<td>:</td>
			<td>
			<?php
				$pin = $this->perpus->get_tableid('perpus_pinjam','pinjam_id',$pinjam->pinjam_id);
				$no =1;
				foreach($pin as $isi)
				{
					$buku = $this->perpus->get_tableid_edit('perpus_buku','buku_id',$isi['buku_id']);
					echo $no.'. '.$buku->buku_id.' ( '.$buku->title.' )<br/>';
				$no++;}

			?>
			</td>
		</tr>

		<tr>
			<td>Total Denda</td>
			<td>:</td>
			<td>
			<?php 
				$pinjam_id = $pinjam->pinjam_id;
				$denda = $this->db->query("SELECT * FROM perpus_denda WHERE pinjam_id = '$pinjam_id'");
				
				$jml = $this->db->query("SELECT * FROM perpus_pinjam WHERE pinjam_id = '$pinjam_id'")->num_rows();			
				$date1 = date('Ymd');
				$date2 = preg_replace('/[^0-9]/','',$pinjam->tgl_balik);
				$diff = $date1 - $date2;	
				if($diff >0 )
				{
					$dd = $this->perpus->get_tableid_edit('perpus_biaya_denda','stat','Aktif'); 
					echo '<p style="color:red;font-size:18px;">'.$this->perpus->rp($jml*($dd->harga_denda*$diff)).' 
					</p><small style="color:#333;">* Untuk '.$jml.' Buku</small>';
				}else{
					echo '<p style="color:green;text-align:center;">
					Tidak Ada Denda</p>';
				}
			?>
			</td>
		</tr>
	</table>
</div>
<div class="modal-footer">
	<div class="pull-right">
		<a href="<?= base_url('perpus_transaksi/prosespinjam?kembali='.$pinjam->pinjam_id);?>">
		<button class="btn btn-primary"> Proses Pengembalian</button></a>
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	</div>
</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
