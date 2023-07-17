<div class="table-responsive">
    <table class="table table-striped" width="100%">
        <thead>
            <tr>
                <th></th>
                <th class="text-center">#</th>
                <th class="text-center">NIS</th>
                <th>Nama </th>
                <th>Kelas</th> 
                <th class="text-center">Photo</th> 
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ?>
                <?php foreach ($siswa as $s) { ?>                
                <tr>
                    <td></td>
                    <td width="2%" class="text-center"><?= $no++ ?></td>
                    <td width="5%" class="text-center"><?= $s['nis'] ?></td>
                    <td width="45%"><?= $s['nm_siswa'] ?></td> 
                    <td width="15%"><?= $s['rombel'] ?></td> 
                    <td width="25%"><center><img class='img-thumbnail' src='<?= base_url() ?>/panel/assets/img/foto/<?= $s['folder'] ?>/<?= $s['nis'] ?>.png' width=70 height=50></center></td>                                                        
                </tr>
            <?php
                }            
            ?>
        </tbody>
    </table>
</div>

