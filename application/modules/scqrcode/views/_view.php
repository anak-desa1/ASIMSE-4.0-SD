<main>
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-6 d-flex flex-column align-items-center justify-content-center">
                    
                    <!-- new layout -->
                        <div class="card text-center">
                            <div class="card-header">
                                ABSEN QRCODE SISWA
                            </div>
                            <div class="card-body">
                                <br>                                
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <br>
                                                    <img src="<?= base_url() ?>panel/dist/upload/logo/<?= $sekolah['logo'] ?>" width="200" height="150">                                       
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <br>
                                                    <h5 class="card-title" style="font-size:14px"><?= $sekolah['nama_sekolah'] ?></h5>
                                                    <p class="card-text" style="font-size:12px"><?= $sekolah['alamat'] ?></p> 
                                                    <div class="card-text" style="font-size:14px"><?= date('d F Y')?></div>
                                                    <div class="card-text" style="font-size:14px" id='jam'></div>                                                 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <br>    
                                                    <canvas id="mycanvas" width="149" height="149" > </canvas>                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>                                 
                                <div class="container">
                                    <div class="row row-cols-2 row-cols-lg-2 g-2 g-lg-3">  
                                        <div class="col">
                                            <div class="p-3 border bg-warning card text-dark mb-3">
                                                <h5 class="card-title"><i class="bi bi-upc-scan"></i></h5>
                                                <a href="<?= base_url()?>scqrcode/masuk" class="btn btn-primary">Scan Masuk</a>                                                
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="p-3 border bg-info card text-dark mb-3">
                                                <h5 class="card-title"><i class="bi bi-upc-scan"></i></h5>
                                                <a href="<?= base_url()?>scqrcode/pulang" class="btn btn-primary" >Scan Pulang</a>
                                            </div>
                                        </div>                                    
                                    </div>
                                </div>                              
                                <br>
                                <div class="container">
                                    <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-3">
                                        <div class="col">
                                            <div class="p-3 border bg-light card text-dark mb-3">
                                                <h5 class="card-title" style="font-size:18px">Hadir</h5>
                                                <p><?= $hadir['hadir']?></p>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="p-3 border bg-light card text-dark mb-3">
                                                <h5 class="card-title" style="font-size:18px">Sakit</h5>
                                                <p><?= $sakit['sakit']?></p>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="p-3 border bg-light card text-dark mb-3">
                                                <h5 class="card-title" style="font-size:18px">Ijin</h5>
                                                <p><?= $ijin['ijin']?></p>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="p-3 border bg-light card text-dark mb-3">
                                                <h5 class="card-title" style="font-size:18px">Alpha</h5>
                                                <p><?= $alpha['alpha']?></p>  
                                            </div>
                                        </div>                                       
                                    </div>
                                </div>
                                <br>
                                <div class="container">
                                    <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-3">
                                        <div class="col">
                                            <div class="p-3 border bg-light card text-dark mb-3">
                                                <h5 class="card-title" style="font-size:13px"> Absen Masuk </h5>
                                                <p><?= $masuk['masuk']?></p>
                                            </div>                                            
                                        </div>
                                        <div class="col">
                                            <div class="p-3 border bg-light card text-dark mb-3">
                                                <h5 class="card-title" style="font-size:13px"> Absen Pulang </h5>
                                                <p><?= $pulang['pulang']?></p> 
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="p-3 border bg-light card text-dark mb-3">
                                                <h5 class="card-title" style="font-size:13px"> Siswa Masuk </h5>
                                                <p><?= $terlambat['terlambat']?></p> 
                                            </div>
                                        </div>
                                        <div class="col">                                        
                                            <div class="p-3 border bg-light card text-dark mb-3">
                                                <h5 class="card-title" style="font-size:13px"> Siswa Pulang </h5>
                                                <p><?= $pulang_cepat['pulang_capat']?></p>
                                            </div>
                                        </div>                                       
                                    </div>
                                </div>         
                            </div>
                            <div class="card-footer text-muted">                                
                                <?= date('Y-m-d G:i:s');?>                                
                            </div>
                        </div>
                        
                        <div class="credits">
                            Developed by <a href="https://sistemanakdesa.my.id/">SistemAnakDesa  </a>
                        </div>

                    </div>
                </div>
            </div>

        </section>

        

    </div>
</main><!-- End #main -->

<!-- <script>
    
    window.addEventListener('load', function() {
            Swal.fire({
            title: 'Anak Desa',
            type:'warning',
            html: '<?= $this->session->flashdata('message'); ?>',
            })
           
    })  
</script> -->

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


