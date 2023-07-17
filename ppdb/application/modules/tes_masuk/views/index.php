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
                    <!-- notif penugasan -->
                    <?php foreach ($tugas as $tugas) : ?>
                      <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <i class="fas fa-envelope-open-text"></i> <strong><?= $user['nama'] ?></strong> Silahkan kerjakan tugas anda, klik tombol Kerjakan
                        <br>
                        <br>
                        <h5 class="widget-user-desc">
                          <img class="img-profile rounded-circle" style="width: 3rem;" src="<?= base_url() ?>assets/img/materi.png">
                          <strong><?= substr($tugas['id_mapel'], 0, 20) . ' ...'; ?></strong> <br>
                        </h5>
                        <?php if ($tugas['status'] == 1) : ?>
                          <span class="btn btn-info btn-sm">Aktif</span>
                        <?php else : ?>
                          <span class="btn btn-danger btn-sm">Tidak Aktif</span>
                        <?php endif; ?>
                        <a class="btn btn-success btn-sm" href="<?= base_url() . $this->uri->segment(1, 0) ?>/lihattugas/<?= $tugas['id_kursus'] ?>">Kerjakan</a>
                      </div>
                    <?php endforeach ?>
                    <!-- end notif penugasan -->

                    <!-- notif quiz -->
                    <?php foreach ($materi as $materi) : ?>
                      <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <i class="fas fa-envelope-open-text"></i> <strong><?= $user['nama'] ?></strong> Silahkan kerjakan quiz anda, klik tombol Kerjakan
                        <br>
                        <br>
                        <h5 class="widget-user-desc">
                          <img class="img-profile rounded-circle" style="width: 3rem;" src="<?= base_url() ?>assets/img/materi.png">
                          <strong><?= substr($materi['nama_mapel'], 0, 20) . ' ...'; ?></strong> <br>
                        </h5>
                        <?php if ($materi['status'] == 1) : ?>
                          <span class="btn btn-info btn-sm">Aktif</span>
                        <?php else : ?>
                          <span class="btn btn-danger btn-sm">Tidak Aktif</span>
                        <?php endif; ?>
                        <a class="btn btn-success btn-sm" href="<?= base_url() . $this->uri->segment(1, 0) ?>/quiz/<?= $materi['id_materi'] ?>">Kerjakan</a>
                      </div>
                    <?php endforeach ?>
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