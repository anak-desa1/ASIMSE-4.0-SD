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
                <div class="card-body">
                    <br>
                    <?php if ($cek_akses['role_id'] == 1) : ?> <a class="btn btn-success mb-3" href="<?= base_url() . $this->uri->segment(1, 0) ?>/export_excel_diterima"><i class="fa fa-download"></i> Export Excel</a>
                    <?php endif ?>
                    <div class="table-responsive">
                        <table class="table datatable table-striped table-sm" style="font-size: 14px">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>NISN</th>
                                    <th>Nama Pendaftar</th>
                                    <th>Asal Sekolah</th>
                                    <th>No Hp</th>
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
                                        <td><?= $daftar['nisn'] ?></td>
                                        <td><?= $daftar['nama'] ?></td>
                                        <td><?= $daftar['asal_sekolah'] ?></td>
                                        <td>
                                            <?php
                                            foreach ($sch as $s) :
                                                if ($s['kd_sekolah'] == $daftar['kd_sekolah']) { ?>
                                                    <i class="fab fa-whatsapp text-success   "></i>
                                                    <a target="_blank" href="https://api.whatsapp.com/send?phone=62<?= $daftar['no_hp'] ?>&text=Terima%20kasih%20sudah%20mendaftar%20di%20<?= $s['nama_sekolah'] ?>%2C%0AHarap%20segera%20melunasi%20pembayaran.%20%28abaikan%20jika%20sudah%20lunas%29%0AInfo%20lebih%20lanjut%20silahkan%20kunjungi%20website%20www.oel.sch.id%0ASilahkan%20login%20dan%20lengkapi%20data%20formulirnya.%20%0Ausername%20%3A%20%2A<?= $daftar['no_daftar'] ?>%2A%0Apassword%20%3A%20%2A<?= $daftar['password_x'] ?>%2A"><?= $daftar['no_hp'] ?>
                                                    </a>
                                            <?php }
                                            endforeach ?>
                                        </td>
                                        <td>
                                            <?php if ($daftar['status'] == 1) { ?>
                                                <span class="badge bg-success">diterima</span>
                                            <?php } else { ?>
                                                <span class="badge bg-warning">pending</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a target="_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="detail siswa" href="<?= base_url() . $this->uri->segment(1, 0) ?>/mpdf_cetak/<?= $daftar['id_daftar'] ?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                            <button data-id="<?= $daftar['id_daftar'] ?>" class="btn-sm btn btn-danger btn-batal"><i class="fas fa-times"></i> </button>
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

</main>
<!-- /.content-wrapper -->