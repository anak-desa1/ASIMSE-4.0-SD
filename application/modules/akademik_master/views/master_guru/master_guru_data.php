  <?php foreach ($guru as $g) : ?>
      <div class="mb-3">
          <label for="jk" class="col-sm-3 control-label">ID</label>
          <div class="col-sm-8">
              <input type="text" class="form-control" name="nip" value="<?= $g['nik'] ?>" readonly>
          </div>
      </div>
      <div class="mb-3">
          <label for="jk" class="col-sm-3 control-label">Nama</label>
          <div class="col-sm-8">
              <input type="text" class="form-control" name="nama_guru" value="<?= $g['nama_lengkap'] ?>" readonly>
          </div>
      </div>
  <?php endforeach ?>