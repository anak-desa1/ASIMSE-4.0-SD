<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title; ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html"><?= $home; ?></a></li>
                <!-- <li class="breadcrumb-item"><?= $subtitle; ?></li> -->
                <li class="breadcrumb-item active"><?= $title; ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <!-- Main content -->
    <section class="content">
        <div class="col-12">

        <div class="card" style="border-top: 8px solid #035AA6;border-bottom: 8px solid #035AA6;border-right: 4px solid #035AA6;border-top-left-radius: 16px;border-bottom-left-radius: 16px;box-shadow: 0px 3px 6px 0px #222;">
                <div class='col-md-12'>
                    <div class='box box-info'>

                        <div class="card">
                            <div class="card-body">
                                <br>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="box box-primary">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">GENERATE QRCODE</h3>
                                            </div>
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">INPUT KODE BUKU</label>
                                                    <input type="text" onChang="ready()" id="id" name="buku_id" class="form-control" placeholder="Masukkan kode buku (BK001) yang terdaftar">
                                                </div>
                                            </div>
                                            <div class="box-footer">
                                                <button onClick="ready()" onFocus="ready()" type="button" class="btn  btn-primary btn-lg btn3d">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="box box-info">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">INFORMASI QRCODE AKAN MUNCUL DISINI</h3>
                                            </div>
                                            <div class="box-body ajax-content" id="showR"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card" style="border-top: 8px solid #035AA6;border-bottom: 8px solid #035AA6;border-right: 4px solid #035AA6;border-top-left-radius: 16px;border-bottom-left-radius: 16px;box-shadow: 0px 3px 6px 0px #222;">
                <div class='col-md-12'>
                    <div class='box box-info'>
                    <div class="tampil-modal"></div>
                    <?= form_error('email', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                    <div class="flash-data" data-flashdata=""><?= $this->session->flashdata('pesan'); ?></div>                    
                        <div class="card">
                            <div class="card-body">     
                                <br/>
                                <div class="container px-6">
                                    <div class="row gx-6 text-center" >
                                        <?php foreach($buku as $b){?>
                                            <div class="col-md-3" >
                                                <div class="p-3" style="border: 2px solid black;">
                                                    <div style="font-size: small;">PERPUSTAKAAN</div>
                                                    <div style="font-size: small;"><?= $sekolah['nama_sekolah']?></div>
                                                    <div><hr/></div>
                                                    <div class="row">  
                                                        <div style="font-size: small;"><?= $b['nama_rak']?></div>                                                          
                                                        <div class="col-md-5 text-center">
                                                            <div style="font-size: small;"><?= $b['buku_id']?></div>    
                                                            <div style="font-size: small;"><?= strtoupper($b['nama_kategori'])?></div>                                                                                                               
                                                            <div style="font-size: small;"><?= substr(strtoupper($b['title']), 0, 1)?></div>
                                                        </div>
                                                        <div class="col-md-7 text-center">
                                                            <img class="img-responsive" src="<?php echo base_url('panel/assets/img/qrcode_buku/') .$b['buku_id']. 'code.png'; ?>" />
                                                        </div>                                                        
                                                    </div>                                                         
                                                </div>
                                                <br>                                                  
                                            </div>
                                        <?php } ?>                                           
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</main>
<!-- /.content-wrapper -->
<link rel="stylesheet" href="<?= base_url() ?>panel/plugins/jQueryUI/css/jquery-ui.css">
<script src="<?= base_url() ?>panel/plugins/jQueryUI/js/jquery-ui.js"></script>

<script type="text/javascript">
    function pindah() {
        $('#id').focus();
    };

    function ready() {
        var id = $('#id').val();
        $.ajax({
            type: 'POST',
            url: '<?= base_url('/perpus_data/showw') ?>',
            data: `id=${id}`,
            beforeSend: function(msg) {
                $('#showR').html('<h1><i class="fa fa-spin fa-refresh" /></h1>');
            },
            success: function(msg) {
                $('#showR').html(msg);
                $('#buku_id').focus();
            }
        });
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#id').autocomplete({
            source: "<?= site_url('perpus_data/get_autocomplete'); ?>",
            select: function(event, ui) {
                $('[name="qr"]').val(ui.item.label);
            }
        });
    });
</script>
