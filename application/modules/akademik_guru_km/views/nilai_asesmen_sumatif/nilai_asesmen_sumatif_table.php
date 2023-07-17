 <form method="post" action="<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') . 'nilai_sumatif_simpan' ?>" role="form" id="form-action" enctype="multipart/form-data">

     <div class="card-header">
         <h3 class="card-title">Penilaian SUMATIF</h3>
     </div>
     <div class="card-body">
         <input type="hidden" name="id_guru_mapel" value="<?= $mapel['mapel_id'] ?>">
         <input type="hidden" name="mapel_id" value="<?= $mapel['mapel_id'] ?>">
         <input type="hidden" name="tasm" value="<?= $tasm ?>">
         <input type="hidden" name="penilaian" value="PAS">
         <input type="hidden" name="jenis" value="SUMATIF">
         <div class="row">
             <div class="col-md-12">
                 <div class="row">                    
                     <div class="col-md-4 form-group">
                         <label>Sumatif<span class="symbol required"> </span></label>
                         <select class="form-control select2" style="width: 100%;" id="id_mapel_sumatif" name="id_mapel_sumatif" required>
                             <option value="">Pilih Sumatif</option>
                             <?php foreach ($sumatif as $kel) {
                                    echo '<option value="' . $kel['sumatif_id'] . '">' . $kel['no_sumatif'] . '</option>';
                                } ?>
                         </select>
                     </div>                     
                 </div>
             </div>
         </div>
     </div>

     <table class="table table-striped">
         <thead>
             <tr>
                 <th class="text-center">#</th>
                 <th>NIS</th>
                 <th>Nama</th>
                 <th>Nilai</th>
             </tr>
         </thead>
         <tbody>
             <?php $no = 1 ?>
             <?php foreach ($siswa as $s) : ?>
                 <tr>
                     <td class="text-center"><?= $no++ ?></td>
                     <td><?= $s['nis'] ?></td>
                     <td><?= $s['nama'] ?></td>
                     <td>
                         <div class="col-md-8 form-group">
                             <input type="number" name="nilai[]" class="form-control" id="nilai">
                             <input type="hidden" name="id_siswa[]" value="<?= $s['nis'] ?>">
                         </div>
                     </td>
                 </tr>
             <?php endforeach ?>
         </tbody>
     </table>
     <div class="modal-footer justify-content-between">
         <button type="submit" id="simpan" class="btn btn-primary">Simpan</button>
     </div>
 </form>