  <?php foreach ($modul as $g) : ?>
    <div class="col-md-3">
      <h5 class="card-title">ELEMEN</h5>
      <div class="form-group">
        <textarea name="elemen" class="form-control" id="textarea" rows="3" cols="20" maxlength="100" readonly><?= $g['elemen'] ?></textarea>
        <div id="textarea_feedback"></div>
      </div>   
    </div>         
    <div class="col-md-3">
      <h5 class="card-title">ALOKASI WAKTU </h5>
      <div class="form-group">
        <input type="text" class="form-control" name="alokasi_waktu" id="alokasi_waktu" value="<?= $g['alokasi_waktu'] ?>" readonly>
      </div>   
    </div>                                               
    <div class="col-md-6">                                                    
      <h5 class="card-title">TUJUAN PEMBELAJARAN </h5>
      <div class="mb-3">
        <div class="form-group">
          <input type="text" class="form-control" name="no_sumatif" id="no_sumatif" value="<?= $g['no_sumatif'] ?>" readonly>
        </div>
        <div class="form-group">
          <textarea name="nama_sumatif" class="form-control" id="textarea" rows="3" cols="20" maxlength="100" readonly><?= $g['nama_sumatif'] ?></textarea>
        </div>   
      </div>                                                    
    </div>   
  <?php endforeach ?>