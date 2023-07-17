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
														<h4> Edit Kategori</h4>
														<?php }else{?>
														<h4> Tambah Kategori</h4>
														<?php }?>
													</div>
													<!-- /.box-header -->
													<div class="box-body">
														<?php if(!empty($this->input->get('id'))){?>
														<form method="post" action="<?= base_url('perpus_data/katproses');?>">
															<div class="form-group">
																<label for="">Nama Kategori</label>
																<input type="text" name="kategori"  value="<?=$kat->nama_kategori;?>" id="kategori" class="form-control"  placeholder="Contoh : Pemrograman Web" >															
															</div>
															<br/>
															<input type="hidden" name="edit" value="<?=$kat->id_kategori;?>">
															<button type="submit" class="btn btn-warning"><i class="fa fa-edit"></i> Edit Kategori</button>
														</form>
														<?php }else{?>

														<form method="post" action="<?= base_url('perpus_data/katproses');?>">
															<div class="form-group">
																<label for="">Nama Kategori</label>
																<input type="text" name="kategori" id="kategori" class="form-control" placeholder="Contoh : Pemrograman Web" required>															
															</div>
															<br/>
															<input type="hidden" name="tambah" value="tambah">
															<button type="submit" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Kategori</button>
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
																	<th>Kategori</th>
																	<th>Aksi</th>
																</tr>
															</thead>
															<tbody>
															<?php $no=1;foreach($kategori->result_array() as $isi){?>
																<tr>
																	<td><?= $no;?></td>
																	<td><?= $isi['nama_kategori'];?></td>
																	<td style="width:20%;">
																		<a href="<?= base_url('perpus_data/data_kategori?id='.$isi['id_kategori']);?>"><button class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
																		<a href="<?= base_url('perpus_data/katproses?kat_id='.$isi['id_kategori']);?>" onclick="return confirm('Anda yakin Kategori ini akan dihapus ?');">
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
