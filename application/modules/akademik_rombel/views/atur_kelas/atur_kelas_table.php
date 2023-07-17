<table class="table table-striped" width="100%">
    <thead>
        <tr>
            <th></th>
            <th class="text-center">#</th>
            <th>Kelas</th>
            <th>NIS</th>
            <th>Nama </th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1 ?>
        <?php foreach ($siswa as $s) :
            if ($s['th_active'] == $ta) { ?>
                <tr>
                    <td width="3%">
                        <div class="form-check">
                            <div class="icheck-primary">
                                <label class="form-check1-label">
                                    <input class="form-check-input" type="checkbox" name="id_siswa[]" value="<?= $s['nis'] ?>" id="check1">
                                    <input class="form-check-input" type="hidden" name="id_kelas" value="<?= $s['tingkat'] ?>" id="check1">
                                    <span class="form-check1-label">
                                        <span class="check1"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </td>
                    <td width="3%" class="text-center"><?= $no++ ?></td>
                    <td width="17%"><?= $s['nm_kelas'] ?></td>
                    <td width="17%"><?= $s['nis'] ?></td>
                    <td width="70%"><?= $s['nm_siswa'] ?></td>
                </tr>
        <?php }
        endforeach ?>
    </tbody>
</table>