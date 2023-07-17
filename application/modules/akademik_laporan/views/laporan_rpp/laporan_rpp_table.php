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
             <th>Pembelajaran</th>
             <th>Acion</th>
         </tr>
     </thead>
     <tbody>
         <?php $i = 1; ?>
         <?php foreach ($rpp as $t) : { ?>                 
                 <tr>
                     <td><?= $i ?></td>                  
                     <td><?= $t['tingkat'] ?></td>
                     <td>
                     <?php
                        foreach ($silabus_data as $si) :
                            if ($si['id_silabus'] == $t['id_silabus']) {
                                {
                                    echo  $si['tema']; 
                                }
                            }
                        endforeach;
                     ?>
                     </td>
                     <td>
                     <?php
                        foreach ($silabus_data as $si) :
                            if ($si['id_silabus'] == $t['id_silabus']) {
                                {
                                    echo  $si['subtema']; 
                                }
                            }
                        endforeach;
                     ?>
                     </td>
                     <td><?= $t['pembelajaran'] ?></td>
                     <td>
                        <button type="button" class="btn btn-secondary mb-3 btn-cetak" data-id="<?= $t['id_rpp']; ?>">
                            <i class="fa fa-print"></i></a>
                        </button>
                     </td>
                 </tr>
                 <?php $i++; ?>
         <?php }
            endforeach; ?>
    </tbody>
</table>