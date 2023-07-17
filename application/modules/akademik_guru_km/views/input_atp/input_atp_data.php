  <?php foreach ($sumatif as $g) : ?>
    <div class="form-group">
        <input type="text" class="form-control" name="no_sumatif" id="no_sumatif" value="<?= $g['no_sumatif'] ?>" readonly>
    </div>
    <div class="form-group">
        <textarea name="nama_sumatif" class="form-control" id="textarea" rows="3" cols="20" maxlength="100" readonly><?= $g['nama_sumatif'] ?></textarea>
    </div>   
  <?php endforeach ?>