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
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="tampil-modal"></div>
                <br>
                <div class="card-body">
                    <?php if ($cek_akses['role_id'] == 1) : ?>
                        <button type="button" class="btn btn-primary mb-3 btn-action">
                            <span class="fa fa-plus"></span> Tambah Data
                        </button>
                        <a class="btn btn-success mb-3" href="<?= base_url() . $this->uri->segment(1, 0) ?>/export_excel_pendaftaran"><i class="fa fa-download"></i> Export Excel</a>
                    <?php endif ?>
                    <div class="table-responsive">
                        <table class="table datatable table-striped table-sm" style="font-size: 14px">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>No Daftar</th>
                                    <th>Password</th>
                                    <th>Nama Pendaftar</th>
                                    <th>Asal Sekolah</th>
                                    <th>No Hp</th>
                                    <!-- <th>Bayar</th> -->
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                foreach ($daftar as $daftar) :
                                    $no++ ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $daftar['no_daftar'] ?></td>
                                        <td><?= $daftar['password_x'] ?></td>
                                        <td><?= $daftar['nama'] ?></td>
                                        <td><?= $daftar['asal_sekolah'] ?></td>
                                        <td>
                                            <?php foreach ($sch as $s) : ?>
                                                <i class="fab fa-whatsapp text-success   "></i>
                                                <a target="_blank" href="https://api.whatsapp.com/send?phone=62<?= $daftar['no_hp'] ?>&text=Terima%20kasih%20sudah%20mendaftar%20di%20<?= $s['nama_sekolah'] ?>%2C%0AHarap%20segera%20melakukan%20proses%20%2ADAFTAR%20ULANG%2A%20agar%20bisa%20diterima%20menjadi%20siswa%20baru%20di%20<?= $s['nama_sekolah'] ?>.%0AInfo%20lebih%20lanjut%20silahkan%20kunjungi%20website%20www.oel.sch.id%0ASilahkan%20login%20dan%20lengkapi%20data%20formulirnya.%20%0Ausername%20%3A%20%2A<?= $daftar['no_daftar'] ?>%2A%0Apassword%20%3A%20%2A<?= $daftar['password_x'] ?>%2A">
                                                    <?= $daftar['no_hp'] ?></a>
                                            <?php endforeach ?>
                                        </td>
                                        <!-- <td>
                                             <?php
                                                foreach ($bayar as $bayar) :
                                                    if ($bayar['id_daftar'] == $daftar['id_daftar']) { ?>
                                                     <a target="_blank" href="<?= base_url() ?>ppdb_pendaftar/cetak_pembayaran/<?= $daftar['id_daftar'] ?>">Rp <?= number_format($bayar['total'], 0, ",", "."); ?></a>
                                                 <?php  } else { ?>
                                                     <a target="_blank" href="<?= base_url() ?>ppdb_pendaftar/cetak_pembayaran/<?= $daftar['id_daftar'] ?>" type="button" class="badge badge-danger">belum</a>
                                             <?php }
                                                endforeach ?>

                                         </td> -->
                                        <td>
                                            <?php if ($daftar['status'] == 1) { ?>
                                                <span class="badge bg-success">diterima</span>
                                            <?php } elseif ($daftar['status'] == 2) { ?>
                                                <span class="badge bg-danger">Cadang </span>
                                            <?php } else { ?>
                                                <span class="badge bg-warning">pending</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-warning btn-edit" data-id="<?= $daftar['id_daftar'] ?>">
                                                <i class=" fas fa-edit"></i>
                                            </button>
                                            <a target="_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="detail siswa" href="<?= base_url() . $this->uri->segment(1, 0) ?>/mpdf_cetak/<?= $daftar['id_daftar'] ?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                            <a href="<?= base_url() . $this->uri->segment(1, 0) ?>/deldata_pendaftar/<?= $daftar['id_daftar'] ?>" class="btn btn-sm btn-danger btn-hapus"><i class="fa fa-trash-alt"></i> </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    <br>
    <!-- /.content-wrapper -->
</main>