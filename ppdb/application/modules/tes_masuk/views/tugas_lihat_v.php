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

                                    <div class="col-md-8">
                                        <!-- notif tugas -->
                                        <div class="card card-primary card-outline">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    <img class="img-profile rounded-circle" style="width: 3rem;" src="<?= base_url('assets/img/materi.png') ?>" alt="user image">
                                                    <?= $tugas['judul'] ?>
                                                </h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="post">
                                                    <div class="user-block">
                                                        <span class="username">
                                                            <a href="#">Kerjakan tugas dibawah ini :</a>
                                                        </span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                        <?= $tugas['tugas'] ?>
                                                    </p>
                                                    <!-- Dibuka Tanggal : <i class="fas fa-calendar"></i>
                                                    <span class="text-red"> <?= $tugas['tgl_buka'] ?></span>
                                                    <br>
                                                    Ditutup Tanggal : <i class="fas fa-calendar"></i>
                                                    <span class="text-red"><?= $tugas['tgl_tutup'] ?></span> -->
                                                    <br>
                                                    <p>Tugas ini sudah dikerjakan : <i class="fas fa-user   "></i> <?= $jawabtugas ?>
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    Lampiran Tugas :
                                        <?php if($tugas['file_guru']== $tugas['file_guru']){?>
                                        <embed type="application/pdf" src="https://oel.sch.id/yssch_tk/assets/tugas/<?= $tugas['file_guru'] ?>" width="600" height="400"></embed>
                                        <?php } else {?>
                                        <embed type="application/pdf" src="https://oel.sch.id/yssch_sd/assets/tugas/<?= $tugas['file_guru'] ?>" width="600" height="400"></embed>
                                        <?php }?>
                                                    
                                                    
                                                </div>
                                                <br>
                                                <?php
                                                $cek = $this->db->get_where('ppdb_tugas_jawab', ['id_siswa' => $this->session->userdata('no_daftar'), 'id_tugas' => $tugas['id_tugas']])->num_rows();
                                                if ($cek == 0) {
                                                    if (date('Y-m-d H:i:s') <= $tugas['tgl_tutup']) {
                                                ?>
                                                        <form action="<?= base_url('tes_masuk/kirim_tugas/') . $tugas['id_tugas'] ?>" method="post" enctype="multipart/form-data">
                                                            <input type="hidden" name="kd_campus" value="<?= $tugas['kd_campus'] ?>">
                                                            <input type="hidden" name="kd_sekolah" value="<?= $tugas['kd_sekolah'] ?>">
                                                            <input type="hidden" name="id_kursus" value="<?= $tugas['id_kursus'] ?>">
                                                            <div class="form-group">
                                                                <label for="file">Upload Jawaban Disini</label>
                                                                <div class="custom-file">
                                                                    <input type="file" class="form-control custom-file-input" id="file" name="file">
                                                                    <label class="custom-file-label" for="file">Choose file</label>
                                                                </div>
                                                                <small class="form-text text-muted">Upload file JPG/PNG</small>
                                                            </div>
                                                            <div class="form-group">
                                                                <button class="btn btn-warning"><i class="fab fa-telegram"></i> Kirim Jawaban</button>
                                                            </div>
                                                        </form>
                                                    <?php } else { ?>
                                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                            <strong>Terima Kasih!</strong> Upload Sudah ditutup
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                        <strong>Terima Kasih!</strong> Jawaban Sudah Terkirim dan akan dinilai
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <a href="<?= base_url() . $this->uri->segment(1, 0) ?>" class="btn btn-primary"><i class="fas fa-backward"></i> Kembali</a>
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Keterangan</th>
                                                                <th>Jawaban</th>
                                                                <th>Nilai</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $data = $this->db->get_where('ppdb_tugas_jawab', ['id_siswa' => $this->session->userdata('no_daftar'), 'id_tugas' => $tugas['id_tugas']])->row_array(); ?>
                                                            <tr>
                                                                <td scope="row"> Jawaban sudah terkirim</td>
                                                                <td>
                                                                    <a target="_blank" class="btn btn-primary" href="<?= base_url('assets/tugas/') . $data['file'] ?>" role="button">Lihat</a>
                                                                </td>
                                                                <td>
                                                                    <?php if ($data['nilai'] == "") {
                                                                        echo "<span class='badge badge-danger'>Belum dinilai</span>";
                                                                    } else {
                                                                        echo $data['nilai'];
                                                                    } ?>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                <?php } ?>
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                        <!-- end notif tugas -->
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card card-user">
                                            <div class="card-body">
                                                <p><strong>Info Lebih Lanjut</strong></p>
                                                <?php foreach ($kontak as $k) : ?>
                                                    <div class="alert alert-info" role="alert">
                                                        <li class="media">
                                                            <img class="img-profile rounded-circle" style="width: 3rem;" src="<?= base_url() ?>assets/img/avatar/avatar-1.png">
                                                            <div class="media-body">
                                                                <div>&nbsp<?= $k['nama_kontak'] ?></div>
                                                                <div>&nbsp<a target="_blank" href="https://api.whatsapp.com/send?phone=+62<?= $k['no_kontak'] ?>&text=<?= $sekolah['livechat'] ?>" class="alert-link"><?= $k['no_kontak'] ?></a></div>
                                                            </div>
                                                        </li>
                                                    </div>
                                                <?php endforeach ?>
                                            </div>
                                            <hr>
                                            <div class="button-container">
                                                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                                                    <i class="fab fa-facebook-f"></i>
                                                </button>
                                                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                                                    <i class="fab fa-twitter"></i>
                                                </button>
                                                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                                                    <i class="fab fa-google-plus-g"></i>
                                                </button>
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
    <!-- /.container-fluid -->


    <script>
        $('.post').on('click', '.hapus', function() {
            var id = $(this).data('id');
            console.log(id);

            $.ajax({
                url: "<?php echo base_url(); ?>Kursus/hapuskomentar",
                method: "POST",
                dataType: 'json',
                data: {
                    id: id
                },
                success: function(data) {
                    if (data == 'ok') {
                        location.reload();
                    }
                }
            });

        });
        $('.post').on('click', '.hapusbalas', function() {
            var id = $(this).data('id');
            console.log(id);

            $.ajax({
                url: "<?php echo base_url(); ?>Kursus/hapusbalaskomentar",
                method: "POST",
                dataType: 'json',
                data: {
                    id: id
                },
                success: function(data) {
                    if (data == 'ok') {
                        location.reload();
                    }
                }
            });

        });
    </script>