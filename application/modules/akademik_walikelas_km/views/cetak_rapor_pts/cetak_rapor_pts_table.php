<table class="table table-striped">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Nilai</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1 ?>
        <?php foreach ($siswa as $s) : ?>
            <tr>
                <td class="text-center"><?= $no++ ?></td>
                <td><?= $s['nis'] ?></td>
                <td><?= $s['nama'] ?></td>
                <td>
                    <div class="form-group">
                        <input type="number" name="nilai[]" class="form-control" id="nilai">
                        <input type="hidden" name="id_siswa[]" value="<?= $s['nis'] ?>">
                    </div>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>