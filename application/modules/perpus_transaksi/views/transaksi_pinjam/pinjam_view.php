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
						<br>
						<div class="box-header with-border">						 	
							<a href="<?= base_url('perpus_transaksi/pinjam_umum');?>"><button class="btn btn-primary"><i class="fa fa-plus"> </i> Pinjam Umum</button></a>   
                            <a href="<?= base_url('perpus_transaksi/pinjam_guru');?>"><button class="btn btn-secondary"><i class="fa fa-plus"> </i> Pinjam Guru</button></a>
                            <a href="<?= base_url('perpus_transaksi/pinjam_siswa');?>"><button class="btn btn-success"><i class="fa fa-plus"> </i> Pinjam Siswa</button></a>                                         
						</div>
						<br>
						<!-- /.box-header -->
							<div class="card">
								<div class="card-body">									
									<div class="box-body">
									<br/>
									<div class="table-responsive">
										<table id="myTable-1" class="table table-bordered table-striped table" width="100%">
											<thead>
												<tr>
													<th>No</th>
													<th>No Pinjam</th>
													<th>ID Anggota</th>
													<th>Nama</th>
													<th>Pinjam</th>
													<th>Balik</th>
													<th style="width:10%">Status</th>
													<th>Denda</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>
											<?php 
												$no=1;
												foreach($pinjam->result_array() as $isi){
													if ($isi['anggota_id'] != ''){
														$anggota_id = $isi['anggota_id'];
														$ang = $this->db->query("SELECT * FROM perpus_angota WHERE anggota_id = '$anggota_id'")->row();
													}
													if ($isi['guru_id'] != ''){
														$anggota_id = $isi['guru_id'];
														$guru = $this->db->query("SELECT * FROM m_guru WHERE nip = '$anggota_id'")->row();
													}
													if ($isi['siswa_id'] != ''){
														$anggota_id = $isi['siswa_id'];
														$siswa = $this->db->query("SELECT * FROM m_siswa WHERE nis = '$anggota_id'")->row();
													}														

														$pinjam_id = $isi['pinjam_id'];
														$denda = $this->db->query("SELECT * FROM perpus_denda WHERE pinjam_id = '$pinjam_id'");
														$total_denda = $denda->row();
											?>
												<tr>
													<td><?= $no;?></td>
													<td><?= $isi['pinjam_id'];?></td>
													<td>
														<?php if ($isi['anggota_id'] != ''){?>
															<?= $isi['anggota_id'];?>
														<?php } ?>
														<?php if ($isi['guru_id'] != ''){?>
															<?= $isi['guru_id'];?>
														<?php } ?>
														<?php if ($isi['siswa_id'] != ''){?>
															<?= $isi['siswa_id'];?>
														<?php } ?>
													</td>
													<td>
														<?php if ($isi['anggota_id'] != ''){?>
															<?= $ang->nama;?>
														<?php } ?>
														<?php if ($isi['guru_id'] != ''){?>
															<?= $guru->nama_guru;?>
														<?php } ?>
														<?php if ($isi['siswa_id'] != ''){?>
															<?= $siswa->nama;?>
														<?php } ?>														
													</td>
													<td><?= $isi['tgl_pinjam'];?></td>
													<td><?= $isi['tgl_balik'];?></td>
													<td><?= $isi['status'];?></td>
													<td>
														<?php 
															if($isi['status'] == 'Di Kembalikan')
															{
																echo $this->pepus->rp($total_denda->denda);
															}else{
																$jml = $this->db->query("SELECT * FROM perpus_pinjam WHERE pinjam_id = '$pinjam_id'")->num_rows();			
																$date1 = date('Ymd');
																$date2 = preg_replace('/[^0-9]/','',$isi['tgl_balik']);
																$diff = $date1 - $date2;
																if($diff > 0 )
																{
																	echo $diff.' hari';
																	$dd = $this->perpus->get_tableid_edit('perpus_biaya_denda','stat','Aktif'); 
																	echo '<p style="color:red;font-size:18px;">
																	'.$this->perpus->rp($jml*($dd->harga_denda*$diff)).' 
																	</p><small style="color:#333;">* Untuk '.$jml.' Buku</small>';
																}else{
																	echo '<p style="color:green;">
																	Tidak Ada Denda</p>';
																}
															}
														?>
													</td>
													<td style="text-align:center;">
														<?php if($isi['tgl_kembali'] == '0') {?>
															<a href="<?= base_url('perpus_transaksi/kembalipinjam/'.$isi['pinjam_id']);?>" class="btn btn-warning btn-sm" title="pengembalian buku">
															<i class="fa fa-arrow-circle-right"></i></a>
														<?php }else{ ?>
															<a href="javascript:void(0)" class="btn btn-success btn-sm" title="pengembalian buku">
															<i class="fa fa-check"></i></a>
													    <?php }?>
															<a href="<?= base_url('perpus_transaksi/detailpinjam/'.$isi['pinjam_id'].'?pinjam=yes');?>" class="btn btn-primary btn-sm" title="detail pinjam"><i class="fa fa-eye"></i></button></a>
															<a href="<?= base_url('perpus_transaksi/prosespinjam?pinjam_id='.$isi['pinjam_id']);?>" 
																onclick="return confirm('Anda yakin Peminjaman Ini akan dihapus ?');" 
																class="btn btn-danger btn-sm" title="hapus pinjam">
																<i class="fa fa-trash"></i></a>
													
													</td>
												</tr>
											<?php $no++;}?>
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

