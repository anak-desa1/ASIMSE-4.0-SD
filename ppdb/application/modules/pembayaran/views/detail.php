<div class="modal fade modal-action" >
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Bukti Bayar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="bukti"><b>ID : <?= $bayar['id_bayar'] ?></b></label><br>
                    <img src="bukti_transaksi/<?= $bayar['bukti'] ?>" class="img-fluid" style="width: 100rem;" alt="banner psb">
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>