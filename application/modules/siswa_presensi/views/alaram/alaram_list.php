<div class="table-responsive">
    <table class="table table-striped" width="100%">
        <thead>
            <tr>
                <th></th>
                <th class="text-center">#</th>
                <th class="text-center">Kelas</th>
                <th class="text-center">NIS</th>
                <th>Nama </th>
                <th class="text-center">Tanggal</th>
                <th class="text-center">Jam Masuk</th>
                <th class="text-center">Jam Keluar</th>
                <th class="text-center">Kehadiran</th>
                <!-- <th class="text-center">Suhu</th> -->
                <th>Keterangan</th>
                <th class="text-center">status </th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ?>
            <?php foreach ($siswa as $s) :
                // if ($s['kd_sekolah'] == $pegawai['kd_sekolah'])
                //     if ($s['ta'] == $ta) { 
            ?>
                <tr>
                    <td></td>
                    <td width="2%" class="text-center"><?= $no++ ?></td>
                    <td width="3%" class="text-center"><?= $s['nm_kelas'] ?></td>
                    <td width="5%" class="text-center"><?= $s['nis'] ?></td>
                    <td width="45%"><?= $s['nm_siswa'] ?></td>
                    <td width="20%" class="text-center"><?= $s['tgl'] ?></td>
                    <td width="5%" class="text-center"><?= $s['jam_msk'] ?></td>
                    <td width="5%" class="text-center"><?= $s['jam_klr'] ?></td>
                    <td width="5%" class="text-center"><?= $s['nama_khd'] ?></td>
                    <!-- <td width="5%" class="text-center"><?= $s['suhu'] ?></td> -->
                    <td width="10%"><?= $s['ket'] ?></td>
                    <td width="5%" class="text-center"><?= $s['nama_status'] ?></td>
                </tr>
            <?php
            endforeach ?>
        </tbody>
    </table>
</div>