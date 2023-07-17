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
                    <div class="box-body">
                            <form action="<?= base_url() . $this->uri->segment(1, 0)?>/print" target="_Blank" method="post" class="form-horizontal" role="form">
                                <button type="submit" class="pull-right btn btn-flat bg-purple"><i class="fa fa-print"></i> CETAK LABEL BUKU</button><br>
                                <hr>
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead class="bg-navy">
                                            <tr>
                                                <th>
                                                    <Center>No.</Center>
                                                </th>
                                                <th width="50px">QRCODE</th>
                                                <th>KODE BUKU</th>
                                                <th>RAK</th>
                                                <th>KATEGORI</th>
                                                <th>JUDUL</th>
                                                <th>
                                                    <Center>Pilih</Center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1 ?>
                                            <?php foreach ($buku as $b) :
                                            ?>
                                                <tr>
                                                    <td style='text-align:center'><?= $no++ ?></td>
                                                    <td>                                                      
                                                        <center><img class='img-thumbnail' src='<?php echo base_url('panel/assets/img/qrcode_buku/') .$b['buku_id']. 'code.png'; ?>' width=40 height=20></center>
                                                    </td>
                                                    <td><?= $b['buku_id'] ?></td>
                                                    <td><?= $b['nama_rak'] ?></td>
                                                    <td><?= $b['nama_kategori'] ?></td>
                                                    <td><?= $b['title'] ?></td>
                                                    <td>
                                                        <center>
                                                            <input name='selector[]' type='checkbox' class='minimal flat' value="<?= $b['buku_id'] ?>">
                                                        </center>
                                                    </td>
                                                </tr>
                                            <?php
                                            endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
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
