<form method="post" action="<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') . 'absen_perbaikan' ?>" role="form" id="form-action" enctype="multipart/form-data">
<div class="table-responsive">
<input type="hidden" class="form-control" id="tgl" name="tgl" value="<?= $tgl ?>"> 
    <table class="table table-striped" width="100%">
        <thead>
            <tr>
                <th></th>
                <th class="text-center">#</th>
                <th class="text-center">NIS</th>
                <th>Nama </th>
                <th class="text-center">Kelas</th> 
                <th class="text-center">Tanggal</th>
                <th class="text-center">Jam Masuk</th>
                <th class="text-center">Jam Keluar</th>
                <th class="text-center">Kehadiran</th>
                <!-- <th class="text-center">Suhu</th> -->
                <th class="text-center">Masuk</th>
                <th class="text-center">Pulang</th>
                <th class="text-center">status </th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ?>
                <?php foreach ($siswa as $s) {                  
                ?>       
                <tr>
                    <td></td>
                    <td width="2%" class="text-center"><?= $no++ ?></td>
                    <td width="5%" class="text-center"><?= $s['nis'] ?></td>
                    <input type="hidden" name="id_siswa[]" value="<?= $s['nis'] ?>">
                    <td width="45%"><?= $s['nm_siswa'] ?></td> 
                                  
                    <td width="10%" class="text-center">  
                        <?php
                            foreach ($absen as $a) :
                                if ($a['nis'] == $s['nis']) { ?>                                                                         
                                <div><?= $a['nm_kelas']?> </div>                   
                            <?php }
                            endforeach;
                        ?>      
                    </td>                           
                    <td width="10%" class="text-center">  
                        <?php
                        foreach ($absen as $a) :
                            if ($a['nis'] == $s['nis']) { ?>                                                                        
                            <div><?= $a['tgl']?> </div>
                            <input type="hidden" name="tgl" value="<?= $a['tgl']?>">
                            <?php }
                        endforeach;
                        ?>      
                    </td>                    
                    <td width="10%" class="text-center">
                    <?php
                        foreach ($absen as $a) :
                            if ($a['nis'] == $s['nis']) { ?>                                                                        
                            <div><?= $a['jam_msk']?> </div>
                            <input type="hidden" name="jam_msk" value="<?= $a['jam_msk']?>">
                            <?php }
                        endforeach;
                    ?>    
                    </td>
                    <td width="10%" class="text-center">
                    <?php
                        foreach ($absen as $a) :
                            if ($a['nis'] == $s['nis']) { ?>                                                                        
                            <div><?= $a['jam_klr']?> </div>
                            <input type="hidden" name="jam_klr" value="<?= $a['jam_klr']?>">
                            <?php }
                        endforeach;
                    ?>   
                    </td>                
                    <td width="10%" class="text-center">  
                        <select class="form-control select2" style="width: 100%;" name="id_khd[]" id="id_khd" required>
                        <?php
                            foreach ($absen as $a) :
                                if ($a['nis'] == $s['nis']) { ?>                                                                        
                                <option value="<?= $a['id_khd'] ?>"><?= $a['nama_khd'] ?></option>
                                <?php }
                            endforeach;
                        ?>            
                        <?php foreach ($kehadiran as $kh) {
                            echo '<option value="' . $kh['id_khd'] . '">' . $kh['nama_khd'] . '</option>';
                        } ?>
                        </select>                        
                    </td>
                    <td width="10%">
                    <?php
                        foreach ($absen as $a) :
                            if ($a['nis'] == $s['nis']) { ?>                                                                        
                            <div> 
                                <?php if ($a['masuk'] == 4) { ?>Masuk Tepat Waktu<?php }?>
                                <?php if ($a['masuk'] == 5) { ?>Masuk Lambat<?php }?>      
                            </div>
                            <input type="hidden" name="masuk" value="<?= $a['masuk']?>">
                            <?php }
                        endforeach;
                    ?>                       
                    </td>
                    <td width="10%">
                    <?php
                        foreach ($absen as $a) :
                            if ($a['nis'] == $s['nis']) { ?>                                                                        
                            <div>
                                <?php if ($a['pulang'] == 6) { ?>Pulang Tepat Waktu<?php }?>
                                <?php if ($a['pulang'] == 7) { ?>Pulang Cepat<?php }?> 
                            </div>
                            <input type="hidden" name="pulang" value="<?= $a['pulang']?>">
                            <?php }
                        endforeach;
                    ?>                  
                    </td>                                    
                    <td width="10%" class="text-center"> 
                        <?php
                        foreach ($absen as $a) :
                            if ($a['nis'] == $s['nis']) { ?>                                                                         
                            <div><?= $a['nama_status']?> </div> 
                            <?php }
                        endforeach;
                        ?>                                  
                    </td>                              
                </tr>
            <?php
                }            
            ?>
        </tbody>
    </table>
</div>
<div class="modal-footer justify-content-between">
    <button type="submit" id="simpan" class="btn btn-primary">Simpan</button>
</div>
</form>
