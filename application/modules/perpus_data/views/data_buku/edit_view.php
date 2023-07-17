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
                    <div class="flash-data" data-flashdata=""><?= $this->session->flashdata('message'); ?></div>
                    
                        <div class="card">
                            <div class="card-body">                           
                                <br/>
                                <form method="post" action="<?= base_url() . $this->uri->segment(1, 0) ?>/prosesbuku" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Kategori</label>
                                                <select class="form-control" required="required"  name="kategori">
                                                    <option disabled selected value> -- Pilih Kategori -- </option>
                                                    <?php foreach($kats as $isi){?>
                                                        <option value="<?= $isi['nama_kategori'];?>" <?php if($isi['nama_kategori'] == $buku->nama_kategori){ echo 'selected';}?>><?= $isi['nama_kategori'];?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Rak / Lokasi</label>
                                                <select name="rak" class="form-control" required="required">
                                                    <option disabled selected value> -- Pilih Rak / Lokasi -- </option>
                                                    <?php foreach($rakbuku as $isi){?>
                                                        <option value="<?= $isi['nama_rak'];?>" <?php if($isi['nama_rak'] == $buku->nama_rak){ echo 'selected';}?>><?= $isi['nama_rak'];?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>ISBN</label>
                                                <input type="text" class="form-control" value="<?= $buku->isbn;?>" name="isbn"  placeholder="Contoh ISBN : 978-602-8123-35-8">
                                            </div>
                                            <div class="form-group">
                                                <label>Judul Buku</label>
                                                <input type="text" class="form-control" value="<?= $buku->title;?>" name="title" placeholder="Contoh : Cara Cepat Belajar Pemrograman Web">
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Pengarang</label>
                                                <input type="text" class="form-control" value="<?= $buku->pengarang;?>" name="pengarang" placeholder="Nama Pengarang">
                                            </div>
                                            <div class="form-group">
                                                <label>Penerbit</label>
                                                <input type="text" class="form-control" value="<?= $buku->penerbit;?>" name="penerbit" placeholder="Nama Penerbit">
                                            </div>
                                            <div class="form-group">
                                                <label>Tahun Buku</label>
                                                <input type="number" class="form-control" value="<?= $buku->thn_buku;?>" name="thn" placeholder="Tahun Buku : 2019">
                                            </div>
                                            
                                        </div>
                                        <div class="col-sm-6">                                            
                                            <div class="form-group">
                                                <label>Jumlah Buku</label>
                                                <input type="number" class="form-control" value="<?= $buku->jml;?>" name="jml" placeholder="Jumlah buku : 12">
                                            </div>
                                            <div class="form-group">
                                            <label>Sampul Buku <small style="color:green">(gambar) * opsional</small></label>
                                                <input type="file" accept="image/*" name="gambar">
                                                <?php if(!empty($buku->sampul !== "0")){?>
                                                <br/>
                                                <a href="<?= base_url('panel/dist/upload/perpus_buku/'.$buku->sampul);?>" target="_blank">
                                                    <img src="<?= base_url('panel/dist/upload/perpus_buku/'.$buku->sampul);?>" style="width:70px;height:70px;" class="img-responsive">
                                                </a>
                                                <?php }else{ echo '<br/><p style="color:red">* Tidak ada Sampul</p>';}?>
                                            </div>
                                            <div class="form-group">
                                            <label>Lampiran Buku <small style="color:green">(pdf) * ganti opsional</small></label>
                                                <input type="file" accept="application/pdf" name="lampiran">
                                                <br>
                                                <?php if(!empty($buku->lampiran !== "0")){?>
                                                <a href="<?= base_url('panel/dist/upload/perpus_buku/'.$buku->lampiran);?>" class="btn btn-primary btn-md" target="_blank">
                                                    <i class="fa fa-download"></i> Sample Buku
                                                </a>
                                                <?php  }else{ echo '<br/><p style="color:red">* Tidak ada Lampiran</p>';}?>
                                            </div>
                                            <div class="form-group">
                                                <label>Keterangan Lainnya</label>
                                                <textarea class="form-control" name="ket" id="ckeditor" style="height:120px"><?= $buku->isi;?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pull-right">
                                        <input type="hidden" name="gmbr" value="<?= $buku->sampul;?>">
                                        <input type="hidden" name="lamp" value="<?= $buku->lampiran;?>">
                                        <input type="hidden" name="edit" value="<?= $buku->id_buku;?>">
                                        <button type="submit" class="btn btn-primary btn-md">Submit</button> 
                                </form>                
                                <a href="<?= base_url('perpus_data/data_buku');?>" class="btn btn-danger btn-md">Kembali</a>
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
<script src="<?= base_url() ?>panel/plugins/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('ckeditor');
</script>

