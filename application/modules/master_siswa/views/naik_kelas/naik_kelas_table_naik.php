<table class="table table-striped">
    <thead>
        <tr>
            <th></th>
            <th class="text-center">#</th>
            <th>NIK</th>
            <th>Nama </th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1 ?>
        <?php foreach ($siswa as $s) : if ($s['kd_sekolah'] == $pegawai['kd_sekolah']) { ?>
                <tr>
                    <td>
                        <div class="form-check">
                            <div class="icheck-primary">
                                <label class="form-check1-label">
                                    <input class="form-check-input" type="checkbox" name="nis[]" value="<?= $s['nis'] ?>" id="check1">
                                    <span class="form-check1-label">
                                        <span class="check1"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </td>
                    <td class="text-center"><?= $no++ ?></td>
                    <td><?= $s['nis'] ?></td>
                    <td><?= $s['nama'] ?></td>
                    <input type="hidden" name="kd_campus" value="<?= $s['kd_campus'] ?>">
                    <input type="hidden" name="kd_sekolah" value="<?= $s['kd_sekolah'] ?>">
                    <!-- <input type="hidden" name="tingkat" value="<?= $s['tingkat'] ?>"> -->
                </tr>
        <?php }
        endforeach ?>
    </tbody>
</table>