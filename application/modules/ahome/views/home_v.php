  <!-- ======= Hero Section ======= -->
  <!-- <section id="hero" class="d-flex align-items-center">

  </section> -->
  <!-- End Hero -->

  <main id="main">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <section class="inner-page">

      <!-- <br> -->
      <div class="container">
        <div class="row">

          <div class="col-lg-8 ">
            <div class="card">

              <div class="card-body">

                <div class="card-header">
                  <div class="row">
                    <div class="col-lg-2 p-2 bg-secondary p-2 text-white bg-opacity-50">
                      Info  <i class="bi bi-megaphone-fill"></i>
                    </div>
                    <div class="col-lg-10">
                      <marquee onmouseover="this.stop()" onmouseout="this.start()">
                        <?= $info['text_info'] ?>
                      </marquee>
                    </div>
                  </div>
                </div>

                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-indicators">
                    <?php
                    foreach ($sliders as $key => $value) {
                      $active = ($key == 0) ? 'active' : '';
                      echo ' <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="' . $key . '" class="' . $active . '" aria-current="true" aria-label="Slide 1"></button>';
                    }
                    ?>
                  </div>
                  <div class="carousel-inner">
                    <?php
                    foreach ($sliders as $key => $value) {
                      $active = ($key == 0) ? 'active' : '';
                      echo '<div class="carousel-item ' . $active . '">
                                            <img src="' . base_url() . '/panel/dist/upload/profil_slide/' . $value->gambar . '" style="height: 350px; width: 750px;" alt="…">
                                            <div class="carousel-caption d-none d-md-block">
                                              <h5><font color="#fff705">' . $value->judul . '</font></h5>
                                              <p><font color="#fff705">' . $value->text . '</font></p>
                                            </div>                                           
                                        </div>';
                    }
                    ?>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>

              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="card">

              <div class="card-header text-center">
                <div class="col-lg-12 p-2 bg-secondary p-2 text-white bg-opacity-50">
                  <?php echo format_indo(date('Y-m-d')); ?>
                  <br>
                  <div id='jam'></div>
                </div>
              </div>

              <div class="card text-center">
                <div class="card-header">
                  <h5>Kepala Sekolah</h5>
                </div>
                <div class="card-body">
                  <img src="<?= base_url() ?>panel/dist/upload/logo/<?= $kepsek['foto'] ?>" class="img-profile" style="height: 240px; width: 220px;" />
                </div>
                <div class="card-footer text-muted">
                  <?= $kepsek['nama_kepsek'] ?>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>
      </br>
      <div class="container">
        <div class="row">

          <div class="col-lg-8">
            <div class="card">

              <div class="card-body">
                <div class="card-header">
                  Berita Seputar Sekolah
                </div>
              </div>

              <div class="card-body">
                <?php foreach ($berita as $e) : ?>
                  <div class="card">
                    <div class="row">
                      <div class="col-md-4">
                        <img src="<?= base_url() ?>/panel/dist/upload/profil_berita/<?= $e->gambar ?>" style="height: 200px; width: 200px;" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">

                          <h5 class="card-title"><?= $e->judul_artikel ?></h5>
                          <p class="card-text"><?= (str_word_count($e->deskripsi) > 60 ? substr("$e->deskripsi", 0, 200) . "[...]" : "$e->deskripsi")  ?></p>

                          <div class="row">
                            <div class="col-md-6">
                              <p class="card-text"><small class="text-muted">Last updated <time datetime="2020-01-01"><?= $e->tanggal_terbit ?></time> </small></p>
                            </div>
                            <div class="col-md-6">
                              <a href="<?= base_url() ?>akegiatan/detail_berita/<?= $e->id_artikel ?>" class="card-link">(Baca Selengkapnya)</a>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach ?>
              </div>

            </div>
          </div>

          <div class="col-lg-4">
            <div class="card">

              <div class="card-body">
                <div class="card-header">
                  <h5>Link Aplikasi Belajar</h5>
                </div>
                <?php foreach ($belajara as $o) : ?>
                  <div class="card">
                    <button type="button" class="btn btn-outline-warning">
                      <a target="_blank" href="<?= $o->link ?>">
                        <?= $o->judul ?>
                      </a>
                    </button>
                  </div>
                <?php endforeach ?>
              </div>

              <div class="card-body">
                <div class="card-header">
                  <h5>Kalender Sekolah</h5>
                </div>
                <div class="container">
                  <iframe src="https://calendar.google.com/calendar/embed?src=id.indonesian%23holiday%40group.v.calendar.google.com&ctz=Asia%2FJakarta" style="border: 1" width="290" height="290" frameborder="0" scrolling="no"></iframe>
                </div>
              </div>

              <div class="card-body">
                <div class="card-header">
                  <h5>Foto Gallery</h5>
                </div>

                <div class="card">
                  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                      <?php
                      foreach ($galery as $key => $value) {
                        $active = ($key == 0) ? 'active' : '';
                        echo ' <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="' . $key . '" class="' . $active . '" aria-current="true" aria-label="Slide 1"></button>';
                      }
                      ?>
                    </div>
                    <div class="carousel-inner">
                      <?php
                      foreach ($galery as $key => $value) {
                        $active = ($key == 0) ? 'active' : '';
                        echo '<div class="carousel-item ' . $active . '">
                                            <img src="' . base_url() . '/panel/dist/upload/profil_galery/' . $value['gambar'] . '" class="d-block w-100" alt="…">
                                            <div class="carousel-caption">
                                                <p><font color="#fff705">' . $value['judul_galeri'] . '</font></p>
                                            </div>
                                        </div>';
                      }
                      ?>
                    </div>
                    <!--<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">-->
                    <!--  <span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
                    <!--  <span class="visually-hidden">Previous</span>-->
                    <!--</button>-->
                    <!--<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">-->
                    <!--  <span class="carousel-control-next-icon" aria-hidden="true"></span>-->
                    <!--  <span class="visually-hidden">Next</span>-->
                    <!--</button>-->
                  </div>

                </div>

              </div>

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <script type="text/javascript">
    // 1 detik = 1000
    window.setTimeout("waktu()", 1000);

    function waktu() {
      var tanggal = new Date();
      setTimeout("waktu()", 1000);
      document.getElementById("jam").innerHTML = tanggal.getHours() + ":" + tanggal.getMinutes() + ":" + tanggal.getSeconds();
    }
  </script>