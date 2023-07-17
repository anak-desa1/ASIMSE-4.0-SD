<?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
<?= $this->session->flashdata('message'); ?>
<div class="tampil-modal"></div>
<table class="table table-striped projects">
     <thead>
         <tr>
             <th>#</th>            
             <th>Kelas</th>
             <th>Tema / BAB</th>
             <th>Sub Tema / Sub BAB</th>
             <th>Acion</th>
         </tr>
     </thead>
     <tbody>
         <?php $i = 1; ?>
         <?php foreach ($silabus as $t) : { ?>                 
                 <tr>
                     <td><?= $i ?></td>                  
                     <td><?= $t['tingkat'] ?></td>
                     <td><?= $t['tema'] ?></td>
                     <td><?= $t['subtema'] ?></td>
                     <td>
                        <button type="button" class="btn btn-secondary mb-3 btn-cetak" data-id="<?= $t['id_silabus']; ?>">
                            <i class="fa fa-print"></i></a>
                        </button>
                     </td>
                 </tr>
                 <?php $i++; ?>
         <?php }
            endforeach; ?>
     </tbody>
 </table>