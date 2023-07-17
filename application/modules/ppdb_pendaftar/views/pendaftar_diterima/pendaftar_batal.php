<div class="modal fade modal-batal" id="modal-lg">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-lg">
                <div class="card card-primary card-outline">
                    <div class="modal-header">
                        <h5 class="modal-title">Pembatalan Penerimaan Siswa Baru</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- /.card-header -->
                    <div class="modal-body text-center">
                        <i class="far fa-times-circle"></i><br>
                        Apa anda yakin?<br>
                        akan membatalkan proses penerimaan siswa baru!
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                        <a href="<?= base_url() . $this->uri->segment(1, 0) ?>/simpan_batal/<?= $daftar['id_daftar'] ?>" class="btn btn-danger">Ya</a>
                    </div>
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