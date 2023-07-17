<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><?= $home; ?></a></li>
                        <li class="breadcrumb-item active"><?= $subtitle; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="modal-body">
        <div class="card">
            <div class="modal-header">
                <h4 class="modal-title"><?= ucwords($this->uri->segment(3, 0)) ?> Data</h4>
            </div>
            <div class="col-12">
                <div class="modal-body">
                    <?= form_open_multipart(base_url('master_siswa/data_siswa/update')); ?>
                    <input type="hidden" name="_id" id="_id" value="<?= $data['siswa_id']; ?>">
                    <!-- <input type="hidden" name="_mode" id="_mode" value="<?= $data['mode']; ?>"> -->
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="kode" class="control-label">NIS</label>
                                <input type="text" name="nis" value="<?= $data['nis']; ?>" class="form-control" id="nis" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label">NISN</label>
                                <input type="text" name="nisn" value="<?= $data['nisn']; ?>" class="form-control" id="nisn" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="kode" class="control-label">Nama</label>
                                <input type="text" name="nama" value="<?= $data['nama']; ?>" class="form-control" id="nama" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label">Jns Kel</label>
                                <?= form_dropdown('jk', $p_jk, $data['jk'], 'class="form-control" id="jk" required'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label">Tempat Lahir</label>
                                <input type="text" name="tmp_lahir" value="<?= $data['tmp_lahir']; ?>" class="form-control" id="tmp_lahir" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label">Tgl Lahir</label>
                                <input type="date" name="tgl_lahir" value="<?= $data['tgl_lahir']; ?>" class="form-control" id="tgl_lahir" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label">Agama</label>
                                <?= form_dropdown('agama', $p_agama, $data['agama'], 'class="form-control" id="agama" required'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label">Status Anak</label>
                                <?= form_dropdown('status', $p_status_anak, $data['status'], 'class="form-control" id="status" required'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label">Anak Ke</label>
                                <input type="number" name="anakke" value="<?= $data['anakke']; ?>" class="form-control" id="anakke">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="kode" class="control-label">No. Telp</label>
                                <input type="text" name="notelp" value="<?= $data['notelp']; ?>" class="form-control" id="notelp">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="kode" class="control-label">Alamat</label>
                                <input type="text" name="alamat" value="<?= $data['alamat']; ?>" class="form-control" id="alamat">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="kode" class="control-label">Sekolah Asal</label>
                                <input type="text" name="sek_asal" value="<?= $data['sek_asal']; ?>" class="form-control" id="sek_asal">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="kode" class="control-label">Alamat Sekolah Asal</label>
                                <input type="text" name="sek_asal_alamat" value="<?= $data['sek_asal_alamat']; ?>" class="form-control" id="sek_asal_alamat">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label">Diterima di kelas</label>
                                <select class="form-control" name="diterima_kelas" id="diterima_kelas" required>
                                    <option value="<?= $data['diterima_kelas']; ?>"><?= $data['diterima_kelas']; ?></option>
                                    <?php
                                    foreach ($p_diterima_kelas as $dt) {
                                        echo "<option value=" . $dt['tingkat'] . ">" . $dt['kelas'] . "</option>";
                                    }
                                    ?>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label">Diterima Tgl</label>
                                <input type="date" name="diterima_tgl" value="<?= $data['diterima_tgl']; ?>" class="form-control" id="diterima_tgl">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label">No. Ijazah</label>
                                <input type="text" name="ijazah_no" value="<?= $data['ijazah_no']; ?>" class="form-control" id="ijazah_no">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label">Thn Ijazah</label>
                                <input type="text" name="ijazah_thn" value="<?= $data['ijazah_thn']; ?>" class="form-control" id="ijazah_thn">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label">No. SKHUN</label>
                                <input type="text" name="skhun_no" value="<?= $data['skhun_no']; ?>" class="form-control" id="skhun_no">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label" style="font-size: 10px">Thn SKHUN</label>
                                <input type="text" name="skhun_thn" value="<?= $data['skhun_thn']; ?>" class="form-control" id="skhun_thn">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label">Nama Ayah</label>
                                <input type="text" name="ortu_ayah" value="<?= $data['ortu_ayah']; ?>" class="form-control" id="ortu_ayah">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label">Nama Ibu</label>
                                <input type="text" name="ortu_ibu" value="<?= $data['ortu_ibu']; ?>" class="form-control" id="ortu_ibu">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label">Alamat Ortu</label>
                                <input type="text" name="ortu_alamat" value="<?= $data['ortu_alamat']; ?>" class="form-control" id="ortu_alamat">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="kode" class="control-label">Kelurahan/Desa</label>
                                <input type="text" name="desa" value="<?= $data['desa']; ?>" class="form-control" id="ortu_ayah">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="kode" class="control-label">Kecamatan</label>
                                <input type="text" name="kecamatan" value="<?= $data['kecamatan']; ?>" class="form-control" id="ortu_ibu">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="kode" class="control-label">Kabupaten/Kota</label>
                                <input type="text" name="kota" value="<?= $data['kota']; ?>" class="form-control" id="ortu_alamat">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="kode" class="control-label">Provinsi</label>
                                <input type="text" name="provinsi" value="<?= $data['provinsi']; ?>" class="form-control" id="ortu_alamat">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label">Telp Ortu</label>
                                <input type="text" name="ortu_notelp" value="<?= $data['ortu_notelp']; ?>" class="form-control" id="ortu_notelp">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label">Pekerjaan Ayah</label>
                                <input type="text" name="ortu_ayah_pkj" value="<?= $data['ortu_ayah_pkj']; ?>" class="form-control" id="ortu_ayah_pkj">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label">Pekerjaan Ibu</label>
                                <input type="text" name="ortu_ibu_pkj" value="<?= $data['ortu_ibu_pkj']; ?>" class="form-control" id="ortu_ibu_pkj">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label">Nama wali</label>
                                <input type="text" name="wali" value="<?= $data['wali']; ?>" class="form-control" id="wali">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label">Alamat Wali</label>
                                <input type="text" name="wali_alamat" value="<?= $data['wali_alamat']; ?>" class="form-control" id="wali_alamat">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label">No. Telp rumah</label>
                                <input type="text" name="notelp_rumah" value="<?= $data['notelp_rumah']; ?>" class="form-control" id="notelp_rumah">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label">Pekerjaan Wali</label>
                                <input type="text" name="wali_pkj" value="<?= $data['wali_pkj']; ?>" class="form-control" id="wali_pkj">
                            </div>
                        </div>
                    </div>

                    <!-- <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="kode" class="control-label">Foto Siswa</label>
                                <input type="file" name="userfile" class="form-control" id="userfile">
                            </div>
                        </div>
                    </div> -->

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url() . 'master_siswa/data_siswa'; ?>" class="btn btn-default" data-dismiss="modal">Kembali</a>
                    <div class="clearfix"></div>

                    </form>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
</div>
<!-- /.content-wrapper -->