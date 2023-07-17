 <?php
 $sekolah = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
 ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Content Header (Page header) -->
    <div class="content-header animated fadeInDown">
      <div class="container-fluid">
        <div class="row mb-2" id="cetak">
          <div class="col-sm-12">
            <div class="card">
              <center><h1 class="m-0 text-dark mt-2" style="text-shadow: 2px 2px 4px #17a2b8;">
              <img src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/asis/asispanel/upload/'.$sekolah->logo; ?>" alt="Logo" class="brand-image img-rounded " style="width:60px;height:60px;">
               <br><?php echo $nama_sekolah ?></h1>
              <?php echo $alamat_sekolah; ?><br>
              <?php echo $website; ?></center>
              <hr>
             <div class="container-fluid">
                <div class="row">
                  <div class="col-md-3">
                    <div class="card card-info card-outline">
                      <div class="card-header">
                                <i class="card-title"></i><center><b>FOTO SISWA</b></center>
                        </div>
                      <div class="row ml-1 mr-1">
                        <div class="card-body">
                              <center>
                               <?php if (!empty($foto)) { ?>
                                        <img class="img-rounded elevation-2" style="width:180px;height:250px;" alt="User Image" src="<?php echo '../../../akademik/upload/siswa/' . $foto; ?>" alt="<?php echo $nama_siswa; ?>">
                                    <?php } else { ?>
                                        <img class="img-rounded elevation-2" style="width:180px;height:250px;" alt="User Image" src="<?php echo '../../../akademik/upload/user.jpg'; ?>" alt="<?php echo $nama_siswa; ?>">
                                    <?php } ?>
                                </center>
                                </div>
                        </div>
                    </div>
                  </div>
                  <!-- DATA KELAS -->
                  <div class="col-md-9">
                    <div class="card card-info card-outline">
                      <div class="card-header">
                                <i class="card-title"></i><center><b>DATA DIRI SISWA</b></center>
                        </div>
                        <table class="table table-striped">
                          <tr>
                                            <td style="width:200px;font-weight:bold;">Nama Siswa</td>
                                            <td style="width:10px;">:</td>
                                            <td><?php echo $nama_siswa; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Kelas</td>
                                            <td>:</td>
                                            <td><?php echo $nama_kelas; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Alamat</td>
                                            <td>:</td>
                                            <td><?php echo $alamat_jalan . ' ' . $kelurahan . ' ' . $kecamatan . ' ' . $kode_pos; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">No.Telp Siswa</td>
                                            <td>:</td>
                                            <td><?php echo $hp; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">No.Telp Ayah</td>
                                            <td>:</td>
                                            <td><?php echo $no_hp_ayah; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">No.Telp Ibu</td>
                                            <td>:</td>
                                            <td><?php echo $no_hp_ibu; ?></td>
                                        </tr>
                      </table>
                    </div>
                  </div>                 
                </div>  
              
              <div class="col-md-12">
                    <div class="card card-danger card-outline">
                      <div class="card-header">
                        <h3 class="card-title text-danger" style="text-shadow: 2px 2px 4px #black;"><i class="fas fa-ballot"></i> DAFTAR DETAIL PELANGARAN SISWA <b>[<?php echo $nama_siswa; ?>]</b></h3>
                        <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                              </button>
                        </div>
                      </div>
                          <div class="card-body p-0">
                        <table class="table table-striped table-sm">
                          <thead>
                            <tr>
                            <th style="width: 10px">No.</th>
                            <th>Tanggal</th>
                            <th>Jenis Pelanggaran</th>
                            <th class="text-center">Jumlah Poin</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                                            $no = 1;
                                            $total_poin = 0;
                                            foreach ($pelanggaran_siswa->result_array() as $data) { ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo date("d-m-Y",strtotime($data['tanggal'])); ?></td>
                                                    <td><?php echo $data['nama_poin_pelanggaran']; ?></td>
                                                    <td class="text-right"><?php echo $data['poin_minus']; ?></td>
                                                </tr>
                                                <?php $no++;
                                                $total_poin += $data['poin_minus'];
                                            } ?>
                                            <tr>
                                                <td colspan="3" class="text-center"><b>Total Poin</b></td>
                                                <td class="text-right"><b><?php echo $total_poin; ?></b></td>
                                            </tr>
                                            <?php
                                             $get_interval = $this->db->query("SELECT * FROM mst_sanksi WHERE $total_poin BETWEEN dari_poin AND sampai_poin");
                                             if($get_interval->num_rows() > 0) {
                                               $d_sanksi = $get_interval->row();
                                               $sanksi = $d_sanksi->sanksi;
                                             } else {
                                               $sanksi = '';
                                             }
                                             ?>
                                             <tr>
                                                <td colspan="2" class="text-center text"><b>SANKSI : </b></td>
                                                <td colspan="2" class="text-left text-danger text-uppercase"><b><?php echo $sanksi; ?></b></td>
                                            </tr>
                        </tbody>
                      </table>
                    </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="card-footer mb-2">
            <div class="btn-group btn-group-sm float-right">
                  <a class="btn btn-danger float-right" href="<?php echo base_url() . 'pelanggaran_siswa'; ?>"><i class="fa fa-undo"> </i> Kembali</a>
                  <button class="btn bg-navy float-right" onclick="printDiv('cetak')"><i class="fa fa-print" target="_blank" > </i> Cetak</button>
                  </div>
                  
                </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  
  </div>

