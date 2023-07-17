<main>
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        
                        <div class="container">
                            <div class="card text-center">
                                <div class="card-header">
                                    ABSEN QRCODE SISWA MASUK 
                                </div>
                                <div class="card-body">                                    
                                    <br>
                                    <div class="row">                                                           
                                        <div class="col-sm-8"> 
                                            <div class="card" style="border-top: 8px solid #035AA6;border-bottom: 8px solid #035AA6;border-right: 4px solid #035AA6;border-top-left-radius: 16px;border-bottom-left-radius: 16px;box-shadow: 0px 3px 6px 0px #222;">
                                                <div class="tampil-modal"></div>
                                                <?= form_error('email', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                                                <!-- <div class="flash-data" data-flashdata=""><?= $this->session->flashdata('messageAlert'); ?></div> -->
                                                <div class="card-body">
                                                    <div class="panel-body">
                                                        <?php
                                                        if (function_exists('date_default_timezone_set'))
                                                            date_default_timezone_set('Asia/Jakarta');
                                                        ?>
                                                        <span id="clock">&nbsp;</span>
                                                        <form method="post" action="<?= base_url() . $this->uri->segment(1, 0) ?>/cek_id_masuk" role="form" id="form-action" enctype="multipart/form-data">
                                                        <div class="card-body">                                                        
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <h5 class="card-title"><i class="bi bi-upc-scan"></i></h5>
                                                                    <label for="id_siswa">NIS* ( Nomor Induk Siswa )</label>
                                                                    <input type="text" minlength="3" maxlength="18" class="form-control" name="id_siswa" placeholder="NIS" autocomplete="off" autofocus="autofocus" required >
                                                                    <?= form_error('id_siswa', '<small class="text-danger pl-3">', '</small>'); ?>
                                                                </div>                         
                                                                </div>
                                                                <!-- <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Save</button>
                                                                </div> -->
                                                            </div>
                                                            <!-- /.card-body -->
                                                    </form>
                                                    </div>
                                                </div>                                            
                                            </div> 
                                            <div class="card" style="border-top: 8px solid #035AA6;border-bottom: 8px solid #035AA6;border-right: 4px solid #035AA6;border-top-left-radius: 16px;border-bottom-left-radius: 16px;box-shadow: 0px 3px 6px 0px #222;">
                                                <div class="card-body">
                                                <br>
                                                    <div class="panel-body">
                                                    <?php foreach ($siswa_masuk as $sm) : ?>
                                                        <div class="alert alert-primary" role="alert">
                                                            <div class="row">
                                                                <div><img style="margin-left: -180px; border: 1px solid #fff; position: absolute; margin-top: -12px; width: 50px; height: 50px; overflow: hidden; border-radius: 15%;" class="img-responsive img" src="<?= base_url() ?>panel/assets/img/foto/<?= $sm['nis'] ?>.png"></div>
                                                                <div><?= $sm['nama']?></div>
                                                            </div>                                                        
                                                        </div>                                                  
                                                    <?php endforeach ?>
                                                    </div>
                                                </div>
                                            </div>                                         
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="card text-dark bg-info mb-3">
                                                <div class="card-body">
                                                    <br>    
                                                    <canvas id="mycanvas" width="149" height="149" > </canvas>                                                    
                                                </div>
                                            </div>
                                            <div class="card text-dark bg-info mb-3">
                                                <div class="card-body">
                                                    <h5 class="card-title" style="font-size:14px"><?= $sekolah['nama_sekolah'] ?></h5>
                                                    <p class="card-text" style="font-size:12px"><?= $sekolah['alamat'] ?></p> 
                                                    <div class="card-text" style="font-size:14px"><?= date('d F Y')?></div>
                                                    <div class="card-text" style="font-size:14px" id='jam'></div>
                                                </div>
                                            </div>
                                            <div class="card text-dark bg-danger mb-3">
                                                <div class="card-body">
                                                    <h5 class="card-title"><i class="bi bi-house-door-fill"></i></h5>
                                                    <a href="<?= base_url()?>scqrcode" class="btn btn-primary">HOME</a>
                                                </div>
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>
                                <div class="card-footer text-muted">
                                    <?= date('Y-m-d G:i:s');?>
                                </div>
                            </div>              
                        </div>                                  

                        <div class="credits">
                            Designed by <a href="https://sistemanakdesa.my.id/">SistemAnakDesa  </a>
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>
</main><!-- End #main -->

<script>
var canvas = document.getElementById("mycanvas");
var ctx = canvas.getContext("2d");
var radius = canvas.height / 2;
ctx.translate(radius, radius);
radius = radius * 0.90
setInterval(gambarjam, 1000);
function gambarjam() {
  drawFace(ctx, radius);
  angkajam(ctx, radius);
  drawTime(ctx, radius);
}
function drawFace(ctx, radius) {
  var grad;
  ctx.beginPath();
  ctx.arc(0, 0, radius, 0, 2*Math.PI);
  ctx.fillStyle = 'white';
  ctx.fill();
  grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
  grad.addColorStop(0, '#00ff');
  grad.addColorStop(0.5, 'white');
  grad.addColorStop(1, '#00ff');
  ctx.strokeStyle = grad;
  ctx.lineWidth = radius*0.1;
  ctx.stroke();
  ctx.beginPath();
  ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
  ctx.fillStyle = '#00ff';
  ctx.fill();
}
function angkajam(ctx, radius) {
  var ang;
  var num;
  ctx.font = radius*0.15 + "px arial";
  ctx.textBaseline="middle";
  ctx.textAlign="center";
  for(num = 1; num < 13; num++){
    ang = num * Math.PI / 6;
    ctx.rotate(ang);
    ctx.translate(0, -radius*0.85);
    ctx.rotate(-ang);
    ctx.fillText(num.toString(), 0, 0);
    ctx.rotate(ang);
    ctx.translate(0, radius*0.85);
    ctx.rotate(-ang);
  }
}
function drawTime(ctx, radius){
    var now = new Date();
    var hour = now.getHours();
    var minute = now.getMinutes();
    var second = now.getSeconds();
    //hour
    hour=hour%12;
    hour=(hour*Math.PI/6)+
    (minute*Math.PI/(6*60))+
    (second*Math.PI/(360*60));
    jarumjam(ctx, hour, radius*0.5, radius*0.07);
    //minute
    minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
    jarumjam(ctx, minute, radius*0.8, radius*0.07);
    // second
    second=(second*Math.PI/30);
    jarumjam(ctx, second, radius*0.9, radius*0.02);
}
function jarumjam(ctx, pos, length, width) {
    ctx.beginPath();
    ctx.lineWidth = width;
    ctx.lineCap = "round";
    ctx.moveTo(0,0);
    ctx.rotate(pos);
    ctx.lineTo(0, -length);
    ctx.stroke();
    ctx.rotate(-pos);
}
</script>

<script type="text/javascript">
    // 1 detik = 1000
    window.setTimeout("waktu()", 1000);

    function waktu() {
      var tanggal = new Date();
      setTimeout("waktu()", 1000);
      document.getElementById("jam").innerHTML = tanggal.getHours() + ":" + tanggal.getMinutes() + ":" + tanggal.getSeconds();
    }
  </script>

                   