<div class="box box-widget">
    <?php
    $params['data'] = $buku_id;
    $params['level'] = 'H';
    $params['size'] = 4;
    $params['savename'] = FCPATH . "panel/assets/img/qrcode_buku/" . $buku_id . 'code.png';
    $this->ciqrcode->generate($params);
    ?>

    <div id="print-area">
        <!-- Widget: user widget style 1 -->
        <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-blue">
                <div class="widget-user-image">
                    <img class="img-responsive" src="<?php echo base_url('panel/assets/img/qrcode_buku/') . $buku_id . 'code.png'; ?>" />
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username"><?php echo $buku_id ?></h3>
                <h5 class="widget-user-desc"><?php echo $title; ?></h5>
                <h5 class="widget-user-desc"><?php echo $penerbit; ?></h5>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>