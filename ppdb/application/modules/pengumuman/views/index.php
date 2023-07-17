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
                    <!-- notif pengumuman -->
                    <?php foreach ($pengumuman as $p) : ?>
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-bullhorn"></i> <?= $p['tgl'] ?> <br>
                        <strong><?= $p['judul'] ?></strong> <br>
                        <p><?= $p['pengumuman'] ?></p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    <?php endforeach ?>
                    <!-- end notif pengumuman -->
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