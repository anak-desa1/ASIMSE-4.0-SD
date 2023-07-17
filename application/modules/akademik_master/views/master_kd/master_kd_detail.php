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
         <div class="container-fluid">
             <div class="row">
                 <div class="col-md-12">

                     <!-- About Me Box -->
                     <div class="card card-info">
                         <div class="card-header">
                             <h3 class="card-title">About Me</h3>
                         </div>
                         <!-- /.card-header -->
                         <div class="card-body">
                             <p class="text-muted">Kelas : <?= $tampil['tingkat'] ?></p>
                             <hr>
                             <ul class="list-group">
                                 <?php
                                    if (!empty($mapel)) {
                                        foreach ($mapel as $m) {
                                    ?>
                                         <li class="list-group-item"><a href="#"><i class="fa fa-chevron-right"></i><button type="submit" class="btn"><?php echo $m['nama']; ?></button></a></li>
                                 <?php
                                        }
                                    } else {
                                        echo '<div class="alert alert-info">Belum ada Mapel diinputkan</div>';
                                    }
                                    ?>
                             </ul>
                         </div>

                         <!-- /.card-body -->
                     </div>
                     <!-- /.card -->
                 </div>
                 <!-- /.col -->
                 <div class="col-md-12">
                     <div class="card">
                         <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                         <?= $this->session->flashdata('message'); ?>
                         <div class="tampil-modal"></div>
                         <div class="card-header p-2">
                             <?php if ($pegawai['bagian_shift'] == 'ON') : ?>
                                 <button type="button" class="btn btn-info mb-3 btn-action-1">
                                     <i class="fa fa-plus-circle"></i> KI-3 PENGETAHUAN
                                 </button>
                                 <button type="button" class="btn btn-info mb-3 btn-action-2">
                                     <i class="fa fa-plus-circle"></i> KI-4 KETERAMPILAN
                                 </button>
                                 <a class="btn btn-danger mb-3" href="<?= site_url('akademik_master/master_kd/input_kd/') ?><?= ucwords($this->uri->segment(4, 0)) ?>">
                                     <i class="fa fa-arrow-circle-left"></i> Kembali
                                 </a>
                             <?php endif ?>
                         </div><!-- /.card-header -->
                         <div class="card-body">
                             <div class="tab-content">
                                 <div class="active tab-pane" id="activity">
                                     <!-- Table row -->
                                     <div class="row">
                                         <div class="col-12 table-responsive">
                                             <table class="table table-striped table table-sm">
                                                 <div class="card-header">
                                                     <h3 class="card-title"><b>KI-3 PENGETAHUAN</b></h3>
                                                 </div>
                                                 <thead>
                                                     <tr>
                                                         <th>#</th>
                                                         <th>KD</th>
                                                         <th>Deskripsi KD</th>
                                                         <th>Action</th>
                                                     </tr>
                                                 </thead>
                                                 <tbody>
                                                     <?php $i = 1; ?>
                                                     <?php foreach ($kd as $s) :
                                                            if ($s['jenis'] == 'P') { ?>
                                                             <?php if ($s['kelas'] == $tampil['tingkat']) : ?>
                                                                 <tr>
                                                                     <td><?= $i; ?></td>
                                                                     <td width="4%"><?= $s['no_kd']; ?></td>
                                                                     <td width="80%"><?= $s['deskripsi']; ?></td>
                                                                     <td width="5%">
                                                                         <button type="button" class="btn btn-xs btn-warning btn-action-3" data-id="<?= $s['id']; ?>">
                                                                             <i class="fa fa-edit"></i> Edit</a>
                                                                         </button>
                                                                     </td>
                                                                     <td width="5%">
                                                                         <form action="<?= base_url() ?>akademik_master/master_kd/del/<?= $s['id']; ?>" method="post" enctype="multipart/form-data">
                                                                             <input type="hidden" class="form-control" id="id" name="id" value="<?= $s['id'] ?>">
                                                                             <input type="hidden" name="kelas" value="<?= ucwords($this->uri->segment(4, 0)) ?>">
                                                                             <input type="hidden" name="id_mapel" value="<?= ucwords($this->uri->segment(5, 0)) ?>">
                                                                             <button type="submit" id="hapus" class="btn btn-danger btn-xs"><i class="fa fa-trash-alt"></i> Hapus</button>
                                                                         </form>
                                                                     </td>
                                                                 </tr>
                                                                 <?php $i++ ?>
                                                             <?php endif ?>

                                                     <?php }
                                                        endforeach ?>
                                                 </tbody>
                                             </table>
                                         </div>
                                         <!-- /.col -->
                                     </div>
                                     <!-- /.row -->
                                     <!-- Table row -->
                                     <div class="row">
                                         <div class="col-12 table-responsive">
                                             <table class="table table-striped table table-sm">
                                                 <div class="card-header">
                                                     <h3 class="card-title"><b>KI-4 KETERAMPILAN</b></h3>
                                                 </div>
                                                 <thead>
                                                     <tr>
                                                         <th>#</th>
                                                         <th>KD</th>
                                                         <th>Deskripsi KD</th>
                                                         <th>Action</th>
                                                     </tr>
                                                 </thead>
                                                 <tbody>
                                                     <?php $i = 1; ?>
                                                     <?php foreach ($kd as $s) :
                                                            if ($s['jenis'] == 'K') { ?>
                                                             <?php if ($s['kelas'] == $tampil['tingkat']) : ?>
                                                                 <tr>
                                                                     <td><?= $i; ?></td>
                                                                     <td width="4%"><?= $s['no_kd']; ?></td>
                                                                     <td width="80%"><?= $s['deskripsi']; ?></td>
                                                                     <td width="5%">
                                                                         <button type="button" class="btn btn-xs btn-warning btn-action-3" data-id="<?= $s['id']; ?>">
                                                                             <i class="fa fa-edit"></i> Edit</a>
                                                                         </button>
                                                                     </td>
                                                                     <td width="5%">
                                                                         <form action="<?= base_url() ?>akademik_master/master_kd/del/<?= $s['id']; ?>" method="post" enctype="multipart/form-data">
                                                                             <input type="hidden" class="form-control" id="id" name="id" value="<?= $s['id'] ?>">
                                                                             <input type="hidden" name="kelas" value="<?= ucwords($this->uri->segment(4, 0)) ?>">
                                                                             <input type="hidden" name="id_mapel" value="<?= ucwords($this->uri->segment(5, 0)) ?>">
                                                                             <button type="submit" id="hapus" class="btn btn-danger btn-xs"><i class="fa fa-trash-alt"></i> Hapus</button>
                                                                         </form>
                                                                     </td>
                                                                 </tr>
                                                                 <?php $i++ ?>
                                                             <?php endif ?>

                                                     <?php }
                                                        endforeach ?>
                                                 </tbody>
                                             </table>
                                         </div>
                                         <!-- /.col -->
                                     </div>
                                     <!-- /.row -->
                                 </div>
                                 <!-- /.tab-pane -->
                             </div>
                             <!-- /.tab-content -->
                         </div><!-- /.card-body -->
                     </div>
                     <!-- /.nav-tabs-custom -->
                 </div>
                 <!-- /.col -->
             </div>
             <!-- /.row -->
         </div><!-- /.container-fluid -->
     </section>
     <!-- /.content -->


 </main>