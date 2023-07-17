<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<?php
error_reporting(0);
ini_set('displays', 0);
?>
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

        <div class="card">
            <div class="card-body">
                <!-- Projects Row -->
                <div class="row">
                    <div class="col-lg-12">
                        <br>
                        <form action="<?= base_url() . $this->uri->segment(1, 0) ?>/add_to_cart" method="post" enctype="multipart/form-data">
                            <div class="table-responsive">
                                <table>
                                    <tr>
                                        <th style="width:100px;padding-bottom:5px;">Nomor</th>
                                        <th style="width:300px;padding-bottom:5px;"><input type="text" name="nofak" value="<?php echo $this->session->userdata('nofak'); ?>" class="form-control input-sm" style="width:200px;" required></th>
                                        <th style="width:90px;padding-bottom:5px;">Tanggal</th>
                                        <td style="width:350px;">
                                            <div class='input-group date' id='datepicker' style="width:200px;">
                                                <input type="date" class="form-control datepicker" name="tgl" value="<?php echo $this->session->userdata('tglfak'); ?>" placeholder="Tanggal..." required />
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width:100px;padding-bottom:5px;">Lampiran</th>
                                        <th style="width:300px;padding-bottom:5px;"><input type="text" name="lampiran" value="<?php echo $this->session->userdata('lampiran'); ?>" class="form-control input-sm" style="width:200px;" required></th>
                                        <th style="width:90px;padding-bottom:5px;">Suplier</th>
                                        <td style="width:350px;">
                                            <select name="suplier" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Suplier" data-width="100%" required>
                                                <?php foreach ($sup as $i) {
                                                    $id_sup = $i['suplier_id'];
                                                    $nm_sup = $i['suplier_nama'];
                                                    $al_sup = $i['suplier_alamat'];
                                                    $notelp_sup = $i['suplier_notelp'];
                                                    $sess_id = $this->session->userdata('suplier');
                                                    if ($sess_id == $id_sup)
                                                        echo "<option value='$id_sup' selected>$nm_sup - $al_sup - $notelp_sup</option>";
                                                    else
                                                        echo "<option value='$id_sup'>$nm_sup - $al_sup - $notelp_sup</option>";
                                                } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width:100px;padding-bottom:5px;">Perihal</th>
                                        <th style="width:300px;padding-bottom:5px;"><input type="text" name="perihal" value="<?php echo $this->session->userdata('perihal'); ?>" class="form-control input-sm" style="width:200px;" required></th>
                                    </tr>
                                </table>
                            </div>
                            <hr />
                            <p>Sehubungan dengan kebutuhan /Kegiatan /Acara:</p>
                            <div class="table-responsive">
                                <table>
                                    <tr>
                                        <th style="width:100px;padding-bottom:5px;">Program</th>
                                        <th style="width:300px;padding-bottom:5px;"><input type="text" name="program" value="<?php echo $this->session->userdata('program'); ?>" class="form-control input-sm" style="width:200px;" required></th>
                                        <th style="width:90px;padding-bottom:5px;">Pesanan</th>
                                        <th style="width:300px;padding-bottom:5px;"><input type="text" name="pesanan" value="<?php echo $this->session->userdata('pesanan'); ?>" class="form-control input-sm" style="width:200px;" required></th>
                                    </tr>
                                    <tr>
                                        <th style="width:100px;padding-bottom:5px;">Kegiatan</th>
                                        <th style="width:300px;padding-bottom:5px;"><input type="text" name="kegiatan" value="<?php echo $this->session->userdata('kegiatan'); ?>" class="form-control input-sm" style="width:200px;" required></th>
                                        <th style="width:100px;padding-bottom:5px;">Bulan</th>
                                        <th style="width:300px;padding-bottom:5px;"><input type="text" name="bulan" value="<?php echo $this->session->userdata('bulan'); ?>" class="form-control input-sm" style="width:200px;" required></th>
                                    </tr>
                                    <tr>
                                        <th style="width:100px;padding-bottom:5px;">Sub</th>
                                        <th style="width:300px;padding-bottom:5px;"><input type="text" name="sub_kegiatan" value="<?php echo $this->session->userdata('sub_kegiatan'); ?>" class="form-control input-sm" style="width:200px;" required></th>
                                        <th style="width:100px;padding-bottom:5px;">Belanja</th>
                                        <th style="width:300px;padding-bottom:5px;"><input type="text" name="belanja" value="<?php echo $this->session->userdata('belanja'); ?>" class="form-control input-sm" style="width:200px;" required></th>
                                    </tr>
                                </table>
                            </div>
                            <hr />
                            <p>Dengan rincian sebagai berikut :</p>
                            <div class="table-responsive">
                                <table>
                                    <tr>
                                        <th>Kode Barang</th>
                                    </tr>
                                    <tr>
                                        <th><input type="text" name="kode_brg" id="kode_brg" class="form-control input-sm"></th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="table-responsive">
                                                <div id="detail_barang" style="position:absolute;">

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </form>
                        <br>
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-condensed" style="font-size:11px;margin-top:10px;">
                                <thead>
                                    <tr>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <!-- <th style="text-align:center;">Spesifikasi</th> -->
                                        <th style="text-align:center;">Jumlah</th>
                                        <th style="text-align:center;">Satuan</th>
                                        <th style="text-align:center;">Harga Satuan</th>
                                        <th style="text-align:center;">Jumlah Harga</th>
                                        <th style="width:100px;text-align:center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($this->cart->contents() as $items) : ?>
                                        <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>
                                        <tr>
                                            <td><?= $items['id']; ?></td>
                                            <td><?= $items['name']; ?></td>
                                            <td style="text-align:center;"><?php echo number_format($items['qty']); ?></td>
                                            <td style="text-align:center;"><?= $items['satuan']; ?></td>
                                            <td style="text-align:center;"><?php echo number_format($items['price']); ?></td>
                                            <td style="text-align:center;"><?php echo number_format($items['subtotal']); ?></td>
                                            <td style="text-align:center;"><a href="<?= base_url() . $this->uri->segment(1, 0) ?>/remove/<?= $items['rowid']; ?>" class="btn btn-warning btn-xs"><span class="fa fa-close"></span> Batal</a></td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="6" style="text-align:center;">Total</td>
                                        <td style="text-align:right;">Rp. <?php echo number_format($this->cart->total()); ?></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <a href="<?= base_url() . $this->uri->segment(1, 0) ?>/simpan_surat_pesanan" class="btn btn-info btn-lg"><span class="fa fa-save"></span> Simpan</a>
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">

                <div class="card author-box card-warning">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table datatable table-striped table-sm" id="" style="font-size: 14px">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>No Faktur</th>
                                        <th>Tanggal</th>
                                        <th>Suplier</th>
                                        <th>Telp</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $no = 0;
                                    foreach ($pesan as $p) {
                                        $no++;
                                    ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $p['pesan_nofak'] ?></td>
                                            <td><?= $p['pesan_tanggal'] ?></td>
                                            <td><?= $p['suplier_nama'] ?></td>
                                            <td><?= $p['suplier_notelp'] ?></td>
                                            <td>
                                                <a target="_blank" href="<?= base_url() . $this->uri->segment(1, 0) ?>/mpdf_cetak/<?= $p['pesan_kode'] ?>" class="btn btn-primary btn-sm"><i class="fas fa-print"></i></a>
                                                <a href="<?= base_url() . $this->uri->segment(1, 0) ?>/deldata_surat_pesanan/<?= $p['pesan_kode'] ?>" class="hapus btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

</main>
<!-- /.content-wrapper -->