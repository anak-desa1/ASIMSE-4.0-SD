    <!-- Main content -->
    <section class="content">
        <div class="col-12">
            <!-- <div class="card" style="border-top: 8px solid #035AA6;border-bottom: 8px solid #035AA6;border-right: 4px solid #035AA6;border-top-left-radius: 16px;border-bottom-left-radius: 16px;box-shadow: 0px 3px 6px 0px #222;"> -->
            <div>
                <div class='col-md-12'>
                    <div class='box box-info'>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form action="<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') . 'print' ?>" target="_Blank" method="post" class="form-horizontal" role="form">
                                <button type="submit" class="pull-right btn btn-flat bg-purple"><i class="fa fa-print"></i> CETAK KARTU PELAJAR LANDSCAPE</button><br>
                                <hr>
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead class="bg-navy">
                                            <tr>
                                                <th>
                                                    <Center>No.</Center>
                                                </th>
                                                <th width="50px">Foto</th>
                                                <th>NIS/NISN</th>
                                                <th>NAMA</th>
                                                <th>Tempat</th>
                                                <th>TTL</th>
                                                <th>
                                                    <Center>Pilih</Center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1 ?>
                                            <?php foreach ($siswa as $s) :
                                            ?>
                                                <tr>
                                                    <td style='text-align:center'><?= $no++ ?></td>
                                                    <td>
                                                        <center><img class='img-thumbnail' src='<?= base_url() ?>/panel/assets/img/foto/<?= $s['folder'] ?>/<?= $s['nis'] ?>.png' width=40 height=20></center>
                                                        <center><img class='img-thumbnail' src='<?= base_url() ?>/panel/assets/img/qrcode/<?= $s['nis'] ?>code.png' width=40 height=20></center>
                                                    </td>
                                                    <td><span class='label bg-red'><?= $s['nis'] ?>/<?= $s['nisn'] ?></span></td>
                                                    <td><?= $s['nm_siswa'] ?></td>
                                                    <td><?= $s['tmp_lahir'] ?></td>
                                                    <td><?= $s['tgl_lahir'] ?></td>
                                                    <td>
                                                        <center>
                                                            <input name='selector[]' type='checkbox' class='minimal flat' value=<?= $s['nis'] ?>>
                                                        </center>
                                                    </td>
                                                </tr>
                                            <?php
                                            endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>