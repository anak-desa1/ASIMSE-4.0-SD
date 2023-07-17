 <div class="modal fade modal-action" id="modal-lg">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-lg">
                 <div class="card card-primary card-outline">
                     <div class="modal-header">
                         <h5 class="modal-title">Tambah Soal - <?= $this->uri->segment(4, 0)  ?></h5>
                         <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <!-- /.card-header -->
                     <form method="post" action="<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') ?>/add_soal" role="form" id="form-action" enctype="multipart/form-data">
                         <div class="modal-body">
                             <div class="alert alert-danger" style="display:none">
                             </div>
                             <input type="hidden" name="id" id="id" class="form-control" placeholder="">
                             <input type="hidden" name="id_materi" value="<?= $id_materi ?>" class="form-control" placeholder="">
                             <div class="form-group">
                                 <label for="soal">Soal</label>
                                 <textarea id="ckeditor" class="form-control" name="soal"></textarea>
                             </div>
                             <table class="table table-condensed">
                                 <thead>
                                     <tr>
                                         <th>Opsi</th>
                                         <th width="50px">Kunci</th>
                                         <th width="50px"></th>
                                     </tr>
                                 </thead>
                                 <tbody id="itemlist">
                                     <tr>
                                         <td><textarea name="opsi[0]" class="form-control"></textarea></td>
                                         <td><input type="checkbox" name="kunci[0]" class="form-check-input form-control" /></td>
                                         <td></td>
                                     </tr>
                                 </tbody>
                                 <tfoot>
                                     <tr>
                                         <td></td>
                                         <td></td>
                                         <td>
                                             <button class="btn btn-sm btn-success" onclick="additem(); return false"><i class="fas fa-plus-circle"></i></button>
                                         </td>
                                     </tr>
                                 </tfoot>
                             </table>
                         </div>
                         <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                             <button id='btn-submit2' class="btn btn-primary">Save changes</button>
                         </div>
                     </form>
                     <!-- /.card-body -->
                 </div>
                 <!-- /.card -->
             </div>
             <!-- form start -->
         </div>
         <!-- /.modal-content -->

     </div>
     <!-- /.modal-dialog -->
 </div>

 <script src="<?= base_url() ?>panel/plugins/ckeditor/ckeditor.js"></script>
 <script>
     CKEDITOR.replace('ckeditor');
     var ck_ed = CKEDITOR.instances.ckeditor.getData();
 </script>
 <script>
     var i = 1;

     function additem() {
         //                menentukan target append
         var itemlist = document.getElementById('itemlist');
         //                membuat element
         var row = document.createElement('tr');
         var jenis = document.createElement('td');
         var jumlah = document.createElement('td');
         var aksi = document.createElement('td');
         //                meng append element
         itemlist.appendChild(row);
         row.appendChild(jenis);
         row.appendChild(jumlah);
         row.appendChild(aksi);
         //                membuat element input
         var jenis_input = document.createElement('textarea');
         jenis_input.setAttribute('name', 'opsi[' + i + ']');
         jenis_input.setAttribute('class', 'form-control');
         var jumlah_input = document.createElement('input');
         jumlah_input.setAttribute('name', 'kunci[' + i + ']');
         jumlah_input.setAttribute('class', 'form-check-input form-control');
         jumlah_input.setAttribute('type', 'checkbox');
         var hapus = document.createElement('span');
         //                meng append element input
         jenis.appendChild(jenis_input);
         jumlah.appendChild(jumlah_input);
         aksi.appendChild(hapus);
         hapus.innerHTML = '<button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>';
         //                membuat aksi delete element
         hapus.onclick = function() {
             row.parentNode.removeChild(row);
         };
         i++;
     }
 </script>