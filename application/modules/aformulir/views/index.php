<!-- Begin Page Content -->
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">

        <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
          </ol>
        </nav>

        <div class="row">
          <div class="col-md-12">

            <div class="card-header">
              <h5 class="title">Hai!, <?= $user['nama'] ?></h5>
              <p class="category">Informasi terbaru dari <a href=""><strong><?= $sekolah['nama_sekolah']; ?></strong></a></p>
            </div>

            <div class="card-body">
              <div class="content">
                <div class="row">

                  <div class="col-12 col-sm-8 col-lg-8">
                    <div class="card-header-action">
                      <a target="_blank" href="<?= base_url() ?>aformulir/mpdf_cetak" type="button" class="btn btn-success"><i class="fas fa-print"></i> Cetak Form</a>
                    </div>
                    <div class="card author-box card-primary">
                      <div class="card-header">
                        <h4>Data Pendaftar</h4>
                      </div>

                      <div class="card-body">
                        <div class="author-box-details">
                          <div class="row">
                            <div class="col-lg-12">
                              <?= $this->session->flashdata('message'); ?>
                            </div>
                          </div>

                          <ul class="nav nav-pills" id="myTab3" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-user"></i> Data Diri</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3" role="tab" aria-controls="contact" aria-selected="false"><i class="fas fa-home"></i> Data Alamat</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-user-friends"></i> Orang Tua</a>
                            </li>
                          </ul>

                          <div class="tab-content" id="myTabContent2">
                            <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                              <br>
                              <form action="<?= base_url() ?>aformulir/simpandatadiri" method="post">
                                <input type="hidden" name="id_daftar" class="form-control" value="<?= $siswa['id_daftar'] ?>">
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No Pendaftaran</label>
                                  <div class="col-sm-12 col-md-7">
                                    <input type="text" name="no" class="form-control" value="<?= $siswa['no_daftar'] ?>" disabled>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Periode</label>
                                  <div class="col-sm-12 col-md-6">
                                    <input type="text" name="periode" class="form-control" value="<?= $siswa['periode'] ?>" disabled>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Ukuran Baju</label>
                                  <div class="col-sm-12 col-md-4">
                                    <input type="text" name="baju" class="form-control" value="<?= $siswa['baju'] ?>" placeholder="M/L/XL/XXL/XXXL" required>
                                  </div>
                                </div>
                                <h5><i class="fas fa-home    "></i> Data Diri Siswa</h5>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NISN</label>
                                  <div class="col-sm-12 col-md-4">
                                    <input type="text" name="nisn" minlength="10" maxlength="12" class="form-control" value="<?= $siswa['nisn'] ?>" required>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIK</label>
                                  <div class="col-sm-12 col-md-5">
                                    <input type="text" name="nik" minlength="16" maxlength="18" class="form-control" value="<?= $siswa['nik'] ?>" required>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No KK</label>
                                  <div class="col-sm-12 col-md-5">
                                    <input type="text" name="nokk" minlength="16" maxlength="18" class="form-control" value="<?= $siswa['no_kk'] ?>" required>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Lengkap</label>
                                  <div class="col-sm-12 col-md-7">
                                    <input type="text" name="nama" class="form-control" value="<?= $siswa['nama'] ?>" required>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat</label>
                                  <div class="col-sm-12 col-md-5">
                                    <input type="text" name="tempat" class="form-control" value="<?= $siswa['tempat_lahir'] ?>" required>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tgl Lahir</label>
                                  <div class="col-sm-12 col-md-4">
                                    <input type="date" name="tgllahir" class="form-control datepicker" value="<?= $siswa['tgl_lahir'] ?>" required>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Kelamin</label>
                                  <div class="col-sm-12 col-md-4">
                                    <?php echo form_dropdown('jenkel', $p_jk, $siswa['jenkel'], 'class="form-control" id="jk" required'); ?>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Agama</label>
                                  <div class="col-sm-12 col-md-5">
                                    <?php echo form_dropdown('agama', $p_agama, $siswa['agama'], 'class="form-control" id="agama" required'); ?>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No Handphone</label>
                                  <div class="col-sm-12 col-md-5">
                                    <input type="number" name="nohp" class="form-control" value="<?= $siswa['no_hp'] ?>" required>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Asal Sekolah</label>
                                  <div class="col-sm-12 col-md-7">
                                    <input type="text" name="asal" class="form-control" value="<?= $siswa['asal_sekolah'] ?>" required readonly>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Anak Ke</label>
                                  <div class="col-sm-12 col-md-2">
                                    <input type="number" name="anakke" class="form-control" value="<?= $siswa['anak_ke'] ?>" required>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jumlah Saudara</label>
                                  <div class="col-sm-12 col-md-2">
                                    <input type="number" name="saudara" class="form-control" value="<?= $siswa['saudara'] ?>" required>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tinggi Badan (Cm)</label>
                                  <div class="col-sm-12 col-md-3">
                                    <input type="number" name="tinggi" class="form-control" value="<?= $siswa['tinggi'] ?>" required>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Berat Badan (Kg)</label>
                                  <div class="col-sm-12 col-md-3">
                                    <input type="number" name="berat" class="form-control" value="<?= $siswa['berat'] ?>" required>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status Dalam Keluarga</label>
                                  <div class="col-sm-12 col-md-5">
                                    <input type="text" name="statuskeluarga" class="form-control" value="<?= $siswa['status_keluarga'] ?>" required>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No KIP</label>
                                  <div class="col-sm-12 col-md-5">
                                    <input type="text" name="kip" class="form-control" value="<?= $siswa['no_kip'] ?>" placeholder="kosongkan jika tidak punya KIP">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <br>
                                  <small class="text-danger">
                                    <p>*Harap isi data alamat dengan sebenar-benarnya</p>
                                  </small>
                                  <center><button id="btnsimpan" type="submit" class="btn btn-primary btn-lg mt-2">Simpan Data Diri</button></center>
                                </div>
                              </form>
                            </div>
                            <div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact-tab3">
                              <br>
                              <form action="<?= base_url() ?>aformulir/simpanalamat" method="post">
                                <input type="hidden" name="id_daftar" class="form-control" value="<?= $siswa['id_daftar'] ?>">
                                <h5><i class="fas fa-home"></i> Data Alamat</h5>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                                  <div class="col-sm-12 col-md-7">
                                    <input type="text" name="alamat" class="form-control" value="<?= $siswa['alamat'] ?>" placeholder="nama jalan / kampung" required>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">RT / RW</label>
                                  <div class="col-sm-6 col-md-2">
                                    <input type="number" name="rt" class="form-control" value="<?= $siswa['rt'] ?>" required>
                                  </div>
                                  <div class="col-sm-6 col-xs-6 col-md-2">
                                    <input type="number" name="rw" class="form-control" value="<?= $siswa['rw'] ?>" required>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Desa</label>
                                  <div class="col-sm-12 col-md-5">
                                    <input type="text" name="desa" class="form-control" value="<?= $siswa['desa'] ?>" required>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kecamatan</label>
                                  <div class="col-sm-12 col-md-5">
                                    <input type="text" name="kecamatan" class="form-control" value="<?= $siswa['kecamatan'] ?>" required>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kabupaten / Kota</label>
                                  <div class="col-sm-12 col-md-5">
                                    <input type="text" name="kota" class="form-control" value="<?= $siswa['kota'] ?>" required>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Provinsi</label>
                                  <div class="col-sm-12 col-md-5">
                                    <input type="text" name="provinsi" class="form-control" value="<?= $siswa['provinsi'] ?>" required>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Pos</label>
                                  <div class="col-sm-12 col-md-4">
                                    <input type="number" name="kodepos" class="form-control" value="<?= $siswa['kode_pos'] ?>" required>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tinggal Bersama</label>
                                  <div class="col-sm-12 col-md-5">
                                    <?php echo form_dropdown('tinggal', $p_tinggal, $siswa['tinggal'], 'class="form-control" id="tinggal" required'); ?>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jarak Ke Sekolah (Meter)</label>
                                  <div class="col-sm-12 col-md-3">
                                    <input type="number" name="jarak" class="form-control" value="<?= $siswa['jarak'] ?>" required>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Berapa Menit Kesekolah</label>
                                  <div class="col-sm-12 col-md-3">
                                    <input type="number" name="waktu" class="form-control" value="<?= $siswa['waktu'] ?>" required>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Transportasi</label>
                                  <div class="col-sm-12 col-md-5">
                                    <?php echo form_dropdown('transportasi', $p_transportasi, $siswa['transportasi'], 'class="form-control" id="transportasi" required'); ?>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <br>
                                  <small class="text-danger">
                                    <p>*Harap isi data alamat dengan sebenar-benarnya</p>
                                  </small>
                                  <center><button type="submit" class="btn btn-primary btn-lg mt-2">Simpan Data Alamat</button></center>
                                </div>
                              </form>
                            </div>
                            <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                              <br>
                              <form action="<?= base_url() ?>aformulir/simpanortu" method="post">
                                <input type="hidden" name="id_daftar" class="form-control" value="<?= $siswa['id_daftar'] ?>">
                                <h5><i class="fas fa-user-check"></i> Data Lengkap Ayah</h5>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIK Ayah</label>
                                  <div class="col-sm-12 col-md-5">
                                    <input type="text" name="nikayah" minlength="16" maxlength="18" class="form-control" value="<?= $siswa['nik_ayah'] ?>" required>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Ayah</label>
                                  <div class="col-sm-12 col-md-7">
                                    <input type="text" name="namaayah" class="form-control" value="<?= $siswa['nama_ayah'] ?>" required>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat Lahir</label>
                                  <div class="col-sm-12 col-md-5">
                                    <input type="text" name="tempatayah" class="form-control" value="<?= $siswa['tempat_ayah'] ?>" required>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Lahir</label>
                                  <div class="col-sm-12 col-md-4">
                                    <input type="date" name="tglayah" class="datepicker form-control" value="<?= $siswa['tgl_lahir_ayah'] ?>" required>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pendidikan</label>
                                  <div class="col-sm-12 col-md-7">
                                    <?php echo form_dropdown('pendidikan_ayah', $p_pendidikan, $siswa['pendidikan_ayah'], 'class="form-control" id="pendidikan_ayah" required'); ?>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pekerjaan</label>
                                  <div class="col-sm-12 col-md-7">
                                    <?php echo form_dropdown('pekerjaan_ayah', $p_pekerjaan, $siswa['pekerjaan_ayah'], 'class="form-control" id="pekerjaan_ayah" required'); ?>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Penghasilan</label>
                                  <div class="col-sm-12 col-md-7">
                                    <?php echo form_dropdown('penghasilan_ayah', $p_penghasilan, $siswa['penghasilan_ayah'], 'class="form-control" id="penghasilan_ayah" required'); ?>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No HP Ayah</label>
                                  <div class="col-sm-12 col-md-5">
                                    <input type="text" name="nohpayah" minlength="10" maxlength="14" class="form-control" value="<?= $siswa['no_hp_ayah'] ?>">
                                  </div>
                                </div>
                                <h5><i class="fas fa-user-check"></i> Data Lengkap ibu</h5>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIK ibu</label>
                                  <div class="col-sm-12 col-md-5">
                                    <input type="text" name="nikibu" minlength="16" maxlength="18" class="form-control" value="<?= $siswa['nik_ibu'] ?>" required>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama ibu</label>
                                  <div class="col-sm-12 col-md-7">
                                    <input type="text" name="namaibu" class="form-control" value="<?= $siswa['nama_ibu'] ?>" required>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat Lahir</label>
                                  <div class="col-sm-12 col-md-5">
                                    <input type="text" name="tempatibu" class="form-control" value="<?= $siswa['tempat_ibu'] ?>" required>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Lahir</label>
                                  <div class="col-sm-12 col-md-4">
                                    <input type="date" name="tglibu" class="datepicker form-control" value="<?= $siswa['tgl_lahir_ibu'] ?>" required>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pendidikan</label>
                                  <div class="col-sm-12 col-md-7">
                                    <?php echo form_dropdown('pendidikan_ibu', $p_pendidikan, $siswa['pendidikan_ibu'], 'class="form-control" id="pendidikan_ibu" required'); ?>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pekerjaan</label>
                                  <div class="col-sm-12 col-md-7">
                                    <?php echo form_dropdown('pekerjaan_ibu', $p_pekerjaan, $siswa['pekerjaan_ibu'], 'class="form-control" id="pekerjaan_ibu" required'); ?>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Penghasilan</label>
                                  <div class="col-sm-12 col-md-7">
                                    <?php echo form_dropdown('penghasilan_ibu', $p_penghasilan, $siswa['penghasilan_ibu'], 'class="form-control" id="penghasilan_ibu" required'); ?>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No Hp Ibu</label>
                                  <div class="col-sm-12 col-md-5">
                                    <input type="text" name="nohpibu" minlength="10" maxlength="14" class="form-control" value="<?= $siswa['no_hp_ibu'] ?>">
                                  </div>
                                </div>
                                <h5><i class="fas fa-user-check"></i> Data Lengkap wali</h5>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIK wali</label>
                                  <div class="col-sm-12 col-md-5">
                                    <input type="text" name="nikwali" minlength="16" maxlength="18" class="form-control" value="<?= $siswa['nik_wali'] ?>">
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama wali</label>
                                  <div class="col-sm-12 col-md-7">
                                    <input type="text" name="namawali" class="form-control" value="<?= $siswa['nama_wali'] ?>">
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat Lahir</label>
                                  <div class="col-sm-12 col-md-5">
                                    <input type="text" name="tempatwali" class="form-control" value="<?= $siswa['tempat_wali'] ?>">
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Lahir</label>
                                  <div class="col-sm-12 col-md-4">
                                    <input type="date" name="tglwali" class="datepicker form-control" value="<?= $siswa['tgl_lahir_wali'] ?>">
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pendidikan</label>
                                  <div class="col-sm-12 col-md-7">
                                    <?php echo form_dropdown('pendidikan_wali', $p_pendidikan, $siswa['pendidikan_wali'], 'class="form-control" id="pendidikan_wali" required'); ?>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pekerjaan</label>
                                  <div class="col-sm-12 col-md-7">
                                    <?php echo form_dropdown('pekerjaan_wali', $p_pekerjaan, $siswa['pekerjaan_wali'], 'class="form-control" id="pekerjaan_wali" required'); ?>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Penghasilan</label>
                                  <div class="col-sm-12 col-md-7">
                                    <?php echo form_dropdown('penghasilan_wali', $p_penghasilan, $siswa['penghasilan_wali'], 'class="form-control" id="penghasilan_wali" required'); ?>
                                  </div>
                                </div>
                                <div class="form-group row mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No HP wali</label>
                                  <div class="col-sm-12 col-md-5">
                                    <input type="text" name="nohpwali" minlength="10" maxlength="14" class="form-control" value="<?= $siswa['no_hp_wali'] ?>">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <br>
                                  <small class="text-danger">
                                    <p>*Harap isi data orang tua dengan sebenar-benarnya</p>
                                  </small>
                                  <center><button id="btnsimpan" type="submit" class="btn btn-primary btn-lg mt-2">Simpan Data Orang Tua</button></center>
                                </div>
                              </form>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-12 col-sm-4 col-lg-4">
                    <div class="card author-box card-primary">

                      <div class="card-header">
                        <b>Progres Pengisian Formulir</b>
                      </div>

                      <div class="card-body">

                        <div class="card">
                          <div class="card-body">
                            <div class="author-box-left">
                              <img class="img-profile rounded-circle" style="width: 3rem;" src="<?= base_url() ?>panel/dist/upload/avatar/avatar-1.png">
                              <div class="clearfix"></div>
                              <div class="author-box-job">Status Pendaftaran</div>
                              <?php if ($siswa['status'] == 1) { ?>
                                <span class="badge badge-success">Diterima</span>
                              <?php } else { ?>
                                <span class="badge badge-success">Pending</span>
                              <?php } ?>
                            </div>
                          </div>
                        </div>

                        <div class="card">
                          <div class="card-body">
                            Data Diri Siswa
                            <?php if ($datadiri <> 0) { ?>
                              <p><span class="badge badge-danger"><i class="fas fa-times-circle"></i> Belum Lengkap</span></p>
                            <?php } else { ?>
                              <p><span class="badge badge-success"><i class="fas fa-check-circle"></i> Lengkap</span></p>
                            <?php } ?>
                          </div>
                        </div>

                        <div class="card">
                          <div class="card-body">
                            Data Alamat Siswa
                            <?php if ($alamat <> 0) { ?>
                              <p><span class="badge badge-danger"><i class="fas fa-times-circle"></i> Belum Lengkap</span></p>
                            <?php } else { ?>
                              <p><span class="badge badge-success"><i class="fas fa-check-circle"></i> Lengkap</span></p>
                            <?php } ?>
                          </div>
                        </div>

                        <div class="card">
                          <div class="card-body">
                            Data Orang Tua
                            <?php if ($ortu <> 0) { ?>
                              <p><span class="badge badge-danger"><i class="fas fa-times-circle"></i> Belum Lengkap</span></p>
                            <?php } else { ?>
                              <p><span class="badge badge-success"><i class="fas fa-check-circle"></i> Lengkap</span></p>
                            <?php } ?>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>

                </div>
              </div>

            </div>

          </div>
        </div>

      </div>
    </div>
  </div>