<?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
<?= $this->session->flashdata('message'); ?>
<div class="tampil-modal"></div>
<table class="table table-striped projects">
     <thead>
         <tr>
             <th>#</th>            
             <th>Mata Pelajaran</th>            
             <th>Acion</th>
         </tr>
     </thead>
     <tbody>
         <?php $i = 1; ?>
         <?php foreach ($mapel as $t) : { ?>                 
                 <tr>
                     <td><?= $i ?></td>                  
                     <td><?= $t['mapel'] ?></td>
                     <td>
                        <a class="btn btn-success btn-sm" href="<?= base_url() ?>akademik_laporan_km/laporan_nilai/nilai_sumatif/<?= $t['mapel_id']; ?>" target='_blank'>
                            <i class="fa fa-print"></i>
                        </a>
                     </td>
                 </tr>
                 <?php $i++; ?>
         <?php }
            endforeach; ?>
     </tbody>
 </table>