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
                    <!-- <?php if ($cek_akses['role_id'] == 1) : ?>
                         <button type="button" class="btn btn-primary mb-3 btn-action">
                             <span class="fa fa-plus"></span> Tambah Data
                         </button>
                     <?php endif ?> -->
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
                                            <i class="fab fa-whatsapp text-success   "></i>
                                            <a target="_blank" href="https://api.whatsapp.com/send?phone=62<?= $daftar['no_hp'] ?>"><?= $daftar['no_hp'] ?></a>
                                        </td>
                                        <td>
                                            <?php if ($daftar['status'] == 1) { ?>
                                                <span class="badge bg-success">diterima</span>
                                            <?php } else { ?>
                                                <span class="badge bg-danger">Cadangan</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a target="_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="detail siswa" href="<?= base_url() ?>psb_pendaftar/mpdf_cetak/<?= $daftar['id_daftar'] ?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i> Detail</a>
                                            <button data-id="<?= $daftar['id_daftar'] ?>" class="btn-sm btn btn-danger btn-batal"><i class="fas fa-times"></i> Cancel</button>
                                        </td>
                                        <!-- <td>
                                             <a data-toggle="tooltip" data-placement="top" title="" data-original-title="detail siswa" href="<?= $daftar['id_daftar'] ?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                             <a href="<?= base_url() ?>psb_operator/deldata_pendaftar/<?= $daftar['id_daftar'] ?>" class="btn btn-sm btn-danger btn-hapus"><i class="fa fa-trash-alt"></i> </a>
                                             <button type="button" class="btn btn-sm btn-warning btn-edit" data-id="<?= $daftar['id_daftar'] ?>">
                                                 <i class=" fas fa-edit"></i>
                                             </button>
                                         </td> -->
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

</main>
<!-- /.content-wrapper -->