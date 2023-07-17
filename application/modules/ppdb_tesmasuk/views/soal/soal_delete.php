 <div class="modal fade modal-delete" id="modal-lg">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-lg">
                 <div class="card card-primary card-outline">
                     <div class="modal-header">
                         <h5 class="modal-title">Hapus Penugasan - <?= $this->uri->segment(4, 0)  ?></h5>
                         <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <!-- /.card-header -->
                     <div class="modal-body text-center">
                         <i class="far fa-times-circle"></i><br>
                         Apa anda yakin?<br>
                         akan menghapus data ini!
                     </div>
                     <div class="text-center">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         <a type="submit" href="<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') ?>/hapus_soal/<?= $soal['id_soal'] ?>" class="btn btn-danger">Delete</a>
                     </div>
                 </div>
                 <!-- /.card-body -->
             </div>
             <!-- /.card -->
         </div>
         <!-- form start -->
     </div>
     <!-- /.modal-content -->

 </div>
 <!-- /.modal-dialog -->