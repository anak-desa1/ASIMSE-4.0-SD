<div class="modal fade modal-action" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?= ucwords($this->uri->segment(4, 0)) ?> Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart(base_url('master_siswa/data_siswa/simpan_tambah')); ?>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Diterima di kelas<span class="symbol required"> </span></label>
                            <select name="tingkat" id="kelas" class="selectpicker form-control" data-live-search="true">
                                <option value="">Pilih Kelas</option>
                                <?php foreach ($kelas as $cam) {
                                    echo '<option value="' . $cam->tingkat . '">' . $cam->kelas . '</option>';
                                } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="kode" class="control-label">NIS</label>
                            <input type="text" name="nis" class="form-control" id="nis" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="kode" class="control-label">NISN</label>
                            <input type="text" name="nisn" class="form-control" id="nisn" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kode" class="control-label">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kode" class="control-label">Jns Kel</label>
                            <?= form_dropdown('jk', $p_jk, 'Jns Kel', 'class="form-control" id="jk" required'); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kode" class="control-label">Tempat Lahir</label>
                            <input type="text" name="tmp_lahir" class="form-control" id="tmp_lahir" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kode" class="control-label">Tgl Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kode" class="control-label">Agama</label>
                            <?php echo form_dropdown('agama', $p_agama, 'Agama', 'class="form-control" id="agama" required'); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kode" class="control-label">Status Anak</label>
                            <?php echo form_dropdown('status', $p_status_anak, 'Status Anak', 'class="form-control" id="status" required'); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kode" class="control-label">Anak Ke</label>
                            <input type="number" name="anakke" class="form-control" id="anakke">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="kode" class="control-label">No. Telp</label>
                            <input type="text" name="notelp" class="form-control" id="notelp">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="kode" class="control-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="kode" class="control-label">Alamat Sekolah Asal</label>
                            <input type="text" name="sek_asal_alamat" class="form-control" id="sek_asal_alamat">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="kode" class="control-label">Sekolah Asal</label>
                            <input type="text" name="sek_asal" class="form-control" id="sek_asal">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- <div class="col-md-4">
                        <div class="form-group">
                            <label for="kode" class="control-label">Diterima di kelas</label>
                            <select class="form-control" name="diterima_kelas" id="diterima_kelas" required>
                                <option value=""></option>
                                <?php
                                foreach ($p_diterima_kelas as $dt) {
                                    echo "<option value=" . $dt['nama'] . ">" . $dt['nama'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div> -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kode" class="control-label">Diterima Tgl</label>
                            <input type="date" name="diterima_tgl" class="form-control" id="diterima_tgl">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kode" class="control-label">No. Ijazah</label>
                            <input type="text" name="ijazah_no" class="form-control" id="ijazah_no">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kode" class="control-label">Thn Ijazah</label>
                            <input type="text" name="ijazah_thn" class="form-control" id="ijazah_thn">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kode" class="control-label">No. SKHUN</label>
                            <input type="text" name="skhun_no" class="form-control" id="skhun_no">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kode" class="control-label" style="font-size: 10px">Thn SKHUN</label>
                            <input type="text" name="skhun_thn" class="form-control" id="skhun_thn">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="kode" class="control-label">Nama Ayah</label>
                            <input type="text" name="ortu_ayah" class="form-control" id="ortu_ayah">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="kode" class="control-label">Nama Ibu</label>
                            <input type="text" name="ortu_ibu" class="form-control" id="ortu_ibu">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="kode" class="control-label">Alamat Ortu</label>
                            <input type="text" name="ortu_alamat" class="form-control" id="ortu_alamat">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="kode" class="control-label">Telp Ortu</label>
                            <input type="text" name="ortu_notelp" class="form-control" id="ortu_notelp">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="kode" class="control-label">Kelurahan/Desa</label>
                            <input type="text" name="desa" class="form-control" id="desa">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="kode" class="control-label">Kecamatan</label>
                            <input type="text" name="kecamatan" class="form-control" id="kecamatan">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="kode" class="control-label">Kabupaten/Kota</label>
                            <input type="text" name="kota" class="form-control" id="kota">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="kode" class="control-label">Provinsi</label>
                            <input type="text" name="provinsi" class="form-control" id="provinsi">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kode" class="control-label">Pekerjaan Ayah</label>
                            <input type="text" name="ortu_ayah_pkj" class="form-control" id="ortu_ayah_pkj">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kode" class="control-label">Pekerjaan Ibu</label>
                            <input type="text" name="ortu_ibu_pkj" class="form-control" id="ortu_ibu_pkj">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kode" class="control-label">Nama wali</label>
                            <input type="text" name="wali" class="form-control" id="wali">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kode" class="control-label">Alamat Wali</label>
                            <input type="text" name="wali_alamat" class="form-control" id="wali_alamat">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kode" class="control-label">No. Telp rumah</label>
                            <input type="text" name="notelp_rumah" class="form-control" id="notelp_rumah">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kode" class="control-label">Pekerjaan Wali</label>
                            <input type="text" name="wali_pkj" class="form-control" id="wali_pkj">
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kode" class="control-label">Foto Siswa</label>
                            <input type="file" name="userfile" class="form-control" id="userfile">
                        </div>
                    </div>
                </div> -->

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url() . 'data_siswa/master_siswa'; ?>" class="btn btn-default" data-dismiss="modal">Kembali</a>
                <div class="clearfix"></div>

                </form>
            </div>
        </div>
    </div>
</div>