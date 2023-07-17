<div class="table-responsive">
    <table id="myTable" class="table-sm" style="font-size: 14px">
        <thead>
            <tr>
                <th>No</th>
                <th>Sampul</th>
                <th>ISBN</th>
                <th>Title</th>
                <th>Penerbit</th>
                <th>Tahun Buku</th>
                <th>Stok Buku</th>
                <th>Dipinjam</th>
                <th>Tanggal Masuk</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $no = 1 ?>
            <?php foreach ($buku as $isi) { ?>                      
            <tr>
                <td><?= $no;?></td>
                <td>
                    <center>
                        <?php if(!empty($isi['sampul'] !== '')){?>
                        <img src="<?php echo base_url();?>panel/dist/upload/perpus_buku/<?php echo $isi['sampul'];?>" alt="#" 
                        class="img-responsive" style="height:auto;width:100px;"/>
                        <?php }else{?>
                        <i class="fa fa-book fa-3x" style="color:#333;"></i> <br/><br/>
                        Tidak Ada Sampul
                        <?php }?>
                    </center>
                </td>
                    <td><?= $isi['isbn'];?></td>
                    <td><?= $isi['title'];?></td>
                    <td><?= $isi['penerbit'];?></td>
                    <td><?= $isi['thn_buku'];?></td>
                    <td><?= $isi['jml'];?></td>
                    <td>
                        <?php
                            $id = $isi['buku_id'];
                            $dd = $this->db->query("SELECT * FROM perpus_pinjam WHERE buku_id= '$id' AND status = 'Dipinjam'");
                            if($dd->num_rows() > 0 )
                                {
                                    echo $dd->num_rows();
                                }else{
                                    echo '0';
                                }
                        ?>
                    </td>
                    <td><?= $isi['tgl_masuk'];?></td>
                    <td>                                           
                        <a href="<?= base_url('perpus_buku/bukudetail/'.$isi['id_buku']);?>">
                        <button class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></button></a>                                                    
                    </td>
                </tr>
            <?php $no++;}?>
        </tbody>
    </table>
</div>
