<div class="modal fade modal-cetak" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?= ucwords($this->uri->segment(4, 0)) ?> Data </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="col-md-12">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                        <?php
                            echo '<div class="card-body">
                                  
                                  <b class="text-muted">' . $data['tingkat'] . ' | ' . $data['mapel'] . '</b><br>
                                  <b class="text-muted">' . $data['mapel_id'] . ' | ' . $data['nama_guru'] . '</b><br>
                                  <br>
                                  <b>ATP (SILABUS) KURIKULUM MERDEKA BELAJAR</b>
                            </div>';
                        ?>  
                        <table class="table table-striped table table-sm" style="width:100%">
                                <thead>
                                    <tr>   
                                        <th width="30px">ELEMEN</th>
                                        <th width="50px">CAPAIAN PEMBELAJARAN</th>                                                   
                                        <th width="5px">TUJUAN PEMBELAJARAN</th>
                                        <th width="5px">PROFIL PELAJAR PANCASILA</th>
                                        <th width="5px">KATA KUNCI</th>
                                        <th width="5px">GLOSARIUM</th>
                                        <th width="5px">ALOKASI WAKT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $i = 1;
                                ?>
                                <?php foreach ($atp as $s) :
                                    if ($s['semester'] == $semester) { ?>
                                    <tr>
                                        <td><?=$s['elemen']?></td>
                                        <td><?=$s['no_sumatif']?>.<?=$s['nama_sumatif']?></td>
                                        <td><?=$s['tujuan_pembelajaran']?></td>
                                        <td><?=$s['profil_pancasila']?></td>
                                        <td><?=$s['kata_kunci']?></td>
                                        <td><?=$s['glorasium']?></td>
                                        <td><?=$s['alokasi_waktu']?> JP</td>
                                    </tr>     
                                    <?php $i++ ?>
                                <?php }
                                endforeach ?>	                
                                </tbody>
                            </table>	

                        </div>
                        <!-- /.tab-content -->                        
                    </div><!-- /.card-body -->                    
                </div><!-- /.modal-content -->            
            </div><!-- /.modal-dialog -->
        </div>
    </div>
</div>