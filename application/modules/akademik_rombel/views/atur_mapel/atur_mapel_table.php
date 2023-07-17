<table class="table table-striped">
    <thead>
        <tr>
            <th></th>
            <th class="text-center">#</th>
            <th>KD Singkat </th>
            <th>Nama Mapel</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1 ?>
        <?php foreach ($mapel as $s) : ?>
            <tr>
                <td>
                    <div class="form-check">
                        <div class="icheck-primary">
                            <label class="form-check1-label">
                                <input class="form-check-input" type="checkbox" name="id_mapel[]" value="<?= $s['id'] ?>" id="check1">
                                <span class="form-check1-label">
                                    <span class="check1"></span>
                                </span>
                            </label>
                        </div>
                    </div>
                </td>
                <td class="text-center"><?= $no++ ?></td>
                <td><?= $s['kd_singkat'] ?></td>
                <td><?= $s['nama'] ?></td>
                <input type="hidden" name="kd_campus" value="<?= $s['kd_campus'] ?>">
                <input type="hidden" name="kd_sekolah" value="<?= $s['kd_sekolah'] ?>">
                <!-- <input type="hidden" name="naik_id[]" value="<?= $s['naik_id'] ?>"> -->
            </tr>
        <?php endforeach ?>
    </tbody>
</table>