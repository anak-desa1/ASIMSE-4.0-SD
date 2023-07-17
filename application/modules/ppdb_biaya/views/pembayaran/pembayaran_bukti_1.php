 <div class="modal fade modal-detail" id="modal-lg">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-lg">
                 <div class="card card-primary card-outline">
                     <div class="modal-header">
                         <h5 class="modal-title">Bukti Bayar</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <!-- /.card-header -->
                     <div class="modal-body">
                         <div class="form-group">
                             <div class="row">
                                 <div class="col-md-4">Kode Transaksi</div>
                                 <div class="col-md-6">: <?= $bayar['id_bayar'] ?></div>
                             </div>

                             <div class="row">
                                 <div class="col-md-4">Nama Siswa</div>
                                 <div class="col-md-6">: <?= $bayar['nama'] ?></div>
                             </div>

                             <div class="row">
                                 <div class="col-md-4">Jumlah Bayar</div>
                                 <div class="col-md-6">: <?= $bayar['jumlah'] ?></div>
                             </div>

                             <div class="row">
                                 <div class="col-md-4">Tanggal Bayar</div>
                                 <div class="col-md-6">: <?= $bayar['tgl_bayar'] ?></div>
                             </div>
                         </div>
                         <div class="form-group">
                             <img src="<?= base_url() ?>website/bukti_transaksi/<?= $bayar['bukti'] ?>" class="img-fluid" alt="Responsive image">
                         </div>
                     </div>

                 </div>
                 <!-- /.card -->
             </div>
             <!-- form start -->
         </div>
         <!-- /.modal-content -->

     </div>
     <!-- /.modal-dialog -->
 </div>