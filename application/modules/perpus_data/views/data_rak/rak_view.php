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
                <div class='col-md-12'>
                    <div class='box box-info'>
                    <div class="tampil-modal"></div>
                    <?= form_error('email', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                    <div class="flash-data" data-flashdata=""><?= $this->session->flashdata('pesan'); ?></div>                    
                        <div class="card">
                            <div class="card-body">                           
                                <br/>
								<div class="row">
									<div class="col-md-12">
										<div class="row">
											<div class="col-sm-4">
												<div class="box box-primary">
													<div class="box-header with-border">
														<?php if(!empty($this->input->get('id'))){?>
														<h4> Edit Rak</h4>
														<?php }else{?>
														<h4> Tambah Rak</h4>
														<?php }?>
													</div>
													<!-- /.box-header -->
													<div class="box-body">
														<?php if(!empty($this->input->get('id'))){?>
														<form method="post" action="<?= base_url('perpus_data/rakproses');?>">
															<div class="form-group">
																<label for="">Nama Rak / Lokasi</label>
																<input type="text" name="rak"  value="<?=$rak->nama_rak;?>" id="rak" class="form-control" placeholder="Contoh : Rak Buku 1">
															</div>
															<br/>
															<input type="hidden" name="edit" value="<?=$rak->id_rak;?>">
															<button type="submit" class="btn btn-warning"><i class="fa fa-edit"></i> Edit Rak</button>
														</form>
														<?php }else{?>

														<form method="post" action="<?= base_url('perpus_data/rakproses');?>">
															<div class="form-group">
																<label for="">Nama Rak / Lokasi</label>
																<input type="text" name="rak" id="rak" class="form-control" placeholder="Contoh : Rak Buku 1" required>
															</div>
															<br/>
															<input type="hidden" name="tambah" value="tambah">
															<button type="submit" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Rak</button>
														</form>
														<?php }?>
													</div>
												</div>
											</div>
											<div class="col-sm-8">
												<div class="box box-primary">
													<div class="box-header with-border">
													</div>
													<!-- /.box-header -->
													<div class="box-body">
													<div class="table-responsive">
														<table id="example1" class="table table-bordered table-striped table" width="100%">
															<thead>
																<tr>
																	<th>No</th>
																	<th>Rak Buku</th>
																	<th>Aksi</th>
																</tr>
															</thead>
															<tbody>
															<?php $no=1;foreach($rakbuku->result_array() as $isi){?>
																<tr>
																	<td><?= $no;?></td>
																	<td><?= $isi['nama_rak'];?></td>
																	<td style="width:20%;">
																		<a href="<?= base_url('perpus_data/data_rak?id='.$isi['id_rak']);?>"><button class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
																		<a href="<?= base_url('perpus_data/rakproses?rak_id='.$isi['id_rak']);?>" onclick="return confirm('Anda yakin Rak Buku ini akan dihapus ?');">
																		<button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
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
