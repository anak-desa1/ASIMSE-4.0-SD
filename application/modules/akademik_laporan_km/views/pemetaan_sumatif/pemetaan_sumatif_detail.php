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
                <div class="card-header">
                    <h3 class="card-title">
                        Kelas : <b><?= ucwords($this->uri->segment(5, 0)) ?></b>
                        <br>
                        Mata Pelajaran : <b><?= $mapel['mapel'] ?></b>
                        <br>
                        <br>
                        <b>PEMETAAN SUMATIF</b>
                    </h3>            
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped table table-sm">
                                        <thead>
                                            <tr>
                                                <th>#</th>                                                      
                                                <th>Sumatif</th>
                                                <th>Deskripsi Sumatif</th>
                                                <th>Semester</th>                                                       
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($sumatif as $s) :
                                                if ($s['semester'] == $semester) { ?>                                                               
                                                    <tr>
                                                        <td><?= $i; ?></td>                                                                
                                                        <td width="5%"><?= $s['no_sumatif']; ?></td>
                                                        <td width="80%"><?= (str_word_count($s['nama_sumatif']) > 17 ? substr('<p class="alert alert-danger" role="alert">' . $s['nama_sumatif'] . '<p>', 0, 115) . " [...] !!! melebihi batas karakter" : $s['nama_sumatif'])  ?></td>
                                                        <td width="5%" class="text-center"><?= $s['semester']; ?></td>                                                                
                                                    </tr>
                                                <?php $i++ ?>
                                            <?php }
                                            endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                    
            </div>
        </div>
    </div>
</div>