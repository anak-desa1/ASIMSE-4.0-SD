 <div class="modal fade modal-action" id="modal-lg">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-lg">
                 <div class="card card-primary card-outline">
                     <div class="modal-header">
                         <h5 class="modal-title">SURAT PESANAN</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>

                     <!-- /.card-header -->
                     <div class="modal-body">

                         <div class="table-responsive">
                             <div class="row">
                                 <div class="col-lg-12">
                                     <form action="<?= base_url() . $this->uri->segment(1, 0) ?>/add_to_cart" method="post" enctype="multipart/form-data">
                                         <div class="table-responsive">
                                             <table>
                                                 <tr>
                                                     <th style="width:100px;padding-bottom:5px;">Nomor</th>
                                                     <th style="width:300px;padding-bottom:5px;"><input type="text" name="nofak" value="<?php echo $this->session->userdata('nofak'); ?>" class="form-control input-sm" style="width:200px;" required></th>
                                                     <th style="width:90px;padding-bottom:5px;">Tanggal</th>
                                                     <td style="width:350px;">
                                                         <div class='input-group date' id='datepicker' style="width:200px;">
                                                             <input type="date" class="form-control datepicker" name="tgl" value="" placeholder="Tanggal..." required />
                                                             <span class="input-group-addon">
                                                                 <span class="glyphicon glyphicon-calendar"></span>
                                                             </span>
                                                         </div>
                                                     </td>
                                                 </tr>
                                                 <tr>
                                                     <th style="width:100px;padding-bottom:5px;">Lampiran</th>
                                                     <th style="width:300px;padding-bottom:5px;"><input type="text" name="nofak" value="<?php echo $this->session->userdata('nofak'); ?>" class="form-control input-sm" style="width:200px;" required></th>
                                                     <th style="width:90px;padding-bottom:5px;">Suplier</th>
                                                     <td style="width:350px;">
                                                         <select name="suplier" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Suplier" data-width="100%" required>
                                                             <option aria-readonly="false">Suplier</option>
                                                             <?php foreach ($sup as $s) : ?>
                                                                 <option value="<?= $s['suplier_id'] ?>"><?= $s['suplier_nama'] ?>, <?= $s['suplier_notelp'] ?></option>
                                                             <?php endforeach ?>
                                                         </select>
                                                     </td>
                                                 </tr>
                                                 <tr>
                                                     <th style="width:100px;padding-bottom:5px;">Perihal</th>
                                                     <th style="width:300px;padding-bottom:5px;"><input type="text" name="nofak" value="<?php echo $this->session->userdata('nofak'); ?>" class="form-control input-sm" style="width:200px;" required></th>
                                                 </tr>
                                             </table>
                                         </div>
                                         <hr />
                                         <p>Sehubungan dengan kebutuhan /Kegiatan /Acara:</p>
                                         <div class="table-responsive">
                                             <table>
                                                 <tr>
                                                     <th style="width:100px;padding-bottom:5px;">Program</th>
                                                     <th style="width:300px;padding-bottom:5px;"><input type="text" name="nofak" value="<?php echo $this->session->userdata('nofak'); ?>" class="form-control input-sm" style="width:200px;" required></th>
                                                     <th style="width:90px;padding-bottom:5px;">Pesanan</th>
                                                     <th style="width:300px;padding-bottom:5px;"><input type="text" name="nofak" value="<?php echo $this->session->userdata('nofak'); ?>" class="form-control input-sm" style="width:200px;" required></th>
                                                 </tr>
                                                 <tr>
                                                     <th style="width:100px;padding-bottom:5px;">Kegiatan</th>
                                                     <th style="width:300px;padding-bottom:5px;"><input type="text" name="nofak" value="<?php echo $this->session->userdata('nofak'); ?>" class="form-control input-sm" style="width:200px;" required></th>
                                                     <th style="width:100px;padding-bottom:5px;">Bulan</th>
                                                     <th style="width:300px;padding-bottom:5px;"><input type="text" name="nofak" value="<?php echo $this->session->userdata('nofak'); ?>" class="form-control input-sm" style="width:200px;" required></th>
                                                 </tr>
                                                 <tr>
                                                     <th style="width:100px;padding-bottom:5px;">Sub</th>
                                                     <th style="width:300px;padding-bottom:5px;"><input type="text" name="nofak" value="<?php echo $this->session->userdata('nofak'); ?>" class="form-control input-sm" style="width:200px;" required></th>
                                                     <th style="width:100px;padding-bottom:5px;">Belanja</th>
                                                     <th style="width:300px;padding-bottom:5px;"><input type="text" name="nofak" value="<?php echo $this->session->userdata('nofak'); ?>" class="form-control input-sm" style="width:200px;" required></th>
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
                                                     <th style="text-align:center;">Spesifikasi</th>
                                                     <th style="text-align:center;">Jumlah</th>
                                                     <th style="text-align:center;">Satuan</th>
                                                     <th style="text-align:center;">Harga Satuan</th>
                                                     <th style="text-align:center;">Jumlah Harga</th>
                                                     <th style="width:100px;text-align:center;">Aksi</th>
                                                 </tr>
                                             </thead>
                                             <tbody>
                                                 <?php $i = 1; ?>
                                                 <?php foreach ($cart as $items) : ?>
                                                     <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>
                                                     <tr>
                                                         <td><?= $items['id']; ?></td>
                                                         <td><?= $items['name']; ?></td>
                                                         <td style="text-align:center;"><?= $items['satuan']; ?></td>
                                                         <td style="text-align:right;"><?php echo number_format($items['price']); ?></td>
                                                         <td style="text-align:right;"><?php echo number_format($items['harga']); ?></td>
                                                         <td style="text-align:center;"><?php echo number_format($items['qty']); ?></td>
                                                         <td style="text-align:right;"><?php echo number_format($items['subtotal']); ?></td>
                                                         <td style="text-align:center;"><a href="<?php echo base_url() . 'admin/pembelian/remove/' . $items['rowid']; ?>" class="btn btn-warning btn-xs"><span class="fa fa-close"></span> Batal</a></td>
                                                     </tr>
                                                     <?php $i++; ?>
                                                 <?php endforeach; ?>
                                             </tbody>
                                             <tfoot>
                                                 <tr>
                                                     <td colspan="6" style="text-align:center;">Total</td>
                                                     <td style="text-align:right;">Rp. </td>
                                                 </tr>
                                             </tfoot>
                                         </table>
                                     </div>
                                     <a href="<?php echo base_url() . 'admin/pembelian/simpan_pembelian' ?>" class="btn btn-info btn-lg"><span class="fa fa-save"></span> Simpan</a>
                                 </div>
                             </div>
                         </div>

                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         <!-- <button type="submit" class="btn btn-primary">Save</button> -->
                     </div>
                     <!-- /.card-body -->
                 </div>
                 <!-- /.card -->
             </div>
             <!-- form start -->
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
 </div>