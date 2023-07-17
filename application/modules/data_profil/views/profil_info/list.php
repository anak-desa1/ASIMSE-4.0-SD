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
    <section class="section dashboard">
        <div class="row">

            <div class="col-12">
                <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <?= $this->session->flashdata('message'); ?>
                <div class="card">
                    <div class="card-body">
                        <div class="info-box">
                            <h3 class="card-title"><?= $subtitle; ?></h3>
                        </div>

                        <!--begin::Table-->
                        <form action="<?= base_url('data_profil/profil_info'); ?>" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <input type="hidden" name="id" value="<?= $sch['id'] ?>">
                                <label for="">Pengumuman</label>
                                <div class="mb-3">
                                    <textarea id="ckeditor1" class="summernote" name="text_info" placeholder="Pengumuman" style="height: 100px"><?= $sch['text_info'] ?></textarea>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Save</button>
                            </div>
                        </form>
                        <!--end::Table-->
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

        </div>
    </section>

</main>

<script src="<?= base_url() ?>panel/plugins/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('ckeditor1');
</script>