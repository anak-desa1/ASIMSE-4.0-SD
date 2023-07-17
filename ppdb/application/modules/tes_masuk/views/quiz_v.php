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
                                        <!-- notif quiz -->
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        KERJAKAN SOAL DENGAN BENAR
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        <div class="table-responsiv">
                                                            <!-- Timelime example  -->
                                                            <div class="row">
                                                                <div class="col-md-12">

                                                                    <!-- The time line -->
                                                                    <form action="<?= base_url() . $this->uri->segment(1, 0) ?>/cekquiz/<?= $id_materi ?>" method="post">

                                                                        <?php
                                                                        $no = 1;
                                                                        foreach ($soal as $soal) :
                                                                        ?>
                                                                            <div>

                                                                                <div class="card">
                                                                                    <div class="card-header">
                                                                                        <span class="time">Soal No : <?= $no++; ?></span>

                                                                                        <?= $soal['soal'] ?>
                                                                                    </div>
                                                                                    <div class="card-body">
                                                                                        <table class="table table-striped table-hover table-sm">
                                                                                            <tbody>
                                                                                                <?php
                                                                                                $opsi = $this->db->get_where('ppdb_soal_opsi', ['id_soal' => $soal['id_soal']])->result_array();
                                                                                                foreach ($opsi as $opsi) :
                                                                                                ?>
                                                                                                    <tr>
                                                                                                        <td scope="row" style="width:10px">
                                                                                                            <input type="radio" name="jawab[<?= $opsi['id_soal'] ?>]" value="<?= $opsi['id_opsi'] ?>" id="jawab-<?= $opsi['id_opsi'] ?>" />
                                                                                                        </td>
                                                                                                        <td><?= $opsi['opsi'] ?></td>
                                                                                                    </tr>
                                                                                                <?php endforeach; ?>
                                                                                            </tbody>
                                                                                        </table>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <?php endforeach; ?>
                                                                        <button type="submit" class="float-right btn btn-primary">Selesai</button>
                                                                    </form>

                                                                </div>
                                                                <!-- /.col -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end notif quiz -->
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