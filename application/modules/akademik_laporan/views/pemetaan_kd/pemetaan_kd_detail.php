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
                    </h3>
                </div>
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
                                                    <th>Semester</th>                                                       
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                    <?php foreach ($kd as $s) :
                                                        if ($s['semester'] == $semester) { ?>                                                               
                                                            <tr>
                                                                <td><?= $i; ?></td>                                                                
                                                                <td width="5%"><?= $s['no_kd_1']; ?></td>
                                                                <td width="80%"><?= (str_word_count($s['nama_kd_1']) > 17 ? substr('<p class="alert alert-danger" role="alert">' . $s['nama_kd_1'] . '<p>', 0, 115) . " [...] !!! melebihi batas karakter" : $s['nama_kd_1'])  ?></td>
                                                                <td width="5%" class="text-center"><?= $s['semester']; ?></td>                                                                
                                                            </tr>
                                                            <?php $i++ ?>
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
                                                        <th>Semester</th>                                                       
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 1;
                                                    ?>
                                                    <?php foreach ($kd as $s) :
                                                        if ($s['semester'] == $semester){ ?>                                                             
                                                            <tr>
                                                                <td><?= $i; ?></td>                                                              
                                                                <td width="5%"><?= $s['no_kd_2']; ?></td>
                                                                <td width="80%"><?= (str_word_count($s['nama_kd_2']) > 17 ? substr('<p class="alert alert-danger" role="alert">' . $s['nama_kd_2'] . '<p>', 0, 115) . " [...] !!! melebihi batas karakter" : $s['nama_kd_2'])  ?></td>
                                                                <td width="5%" class="text-center"><?= $s['semester']; ?></td>
                                                            </tr>
                                                            <?php $i++ ?>
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
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>