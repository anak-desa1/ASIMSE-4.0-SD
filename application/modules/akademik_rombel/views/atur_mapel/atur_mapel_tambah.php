<div class="modal fade modal-action" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?= ucwords($this->uri->segment(4, 0)) ?> Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                        <h4 class="card-title">Guru Mapel : <?= $guru['nama_lengkap'] ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                           
                            <div class="col-md-12">
                                <form action="<?= base_url('akademik_rombel/atur_mapel/mapel_simpan'); ?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id_guru" value="<?= $guru['nip'] ?>">
                                    <input type="hidden" name="th_active" value="<?= $ta ?>">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Rombel Mengajar<span class="symbol required"> </span></label>
                                            <select class="form-control select2" style="width: 100%;" id="" name="id_kelas">
                                                <option value="">Pilih Kelas</option>
                                                <?php foreach ($kelas as $kel) {
                                                    echo '<option value="' . $kel->rombel . '">' . $kel->rombel . '</option>';
                                                } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="card ">
                                        <div class="card-body">
                                            <div class="row">
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
                                                            </tr>
                                                        <?php endforeach ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="bi bi-arrow-counterclockwise"></i> Tutup</button>
                                        <button type="submit" id="simpan" class="btn btn-primary"><i class="bi bi-save2"></i> Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>