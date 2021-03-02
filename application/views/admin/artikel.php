<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-10">
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Tambah Artikel
            </button>
        </div>
    </div>
    </br>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Artikel</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Judul Artikel</th>
                                <th>Isi Artikel</th>
                                <th>Penulis</th>
                                <th>Tanggal Rilis</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php $b = 5;
                        $a = -2;
                        $j = 0;
                        $tambah = 0; ?>
                        <?php if ($a < $j && $b < $j) { ?>
                            <?php for ($i = 0; $i > $a; $i--) { ?>
                                <?php echo $b . " - ";
                                $tambah = $tambah - $b;
                                ?>
                            <?php } ?>
                        <?php } else if ($a < $j) { ?>
                            <?php for ($i = 0; $i > $a; $i--) { ?>
                                <?php echo $b . " + ";
                                $tambah = $tambah - $b;
                                ?>
                            <?php } ?>
                        <?php } ?>
                        <?php echo " /n = " . $tambah; ?>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($artikel as $b) { ?>
                                <tr>

                                    <th><?= $i++; ?></th>
                                    <td><?= $b['judul_artikel']; ?></td>
                                    <td><?= $b['isi_artikel']; ?></td>
                                    <td><?= $b['nama_user']; ?></td>
                                    <td><?= $b['created_at']; ?></td>
                                    <td>
                                        <a data-toggle="modal" data-target="#modalEdit<?php echo $b['id_artikel']; ?>"><button class="badge badge-info"> Ubah</button></a> | <a class="badge badge-danger" href="<?php echo base_url('admin/deleteArtikel?id_artikel=' . $b['id_artikel'] . ''); ?>" role="button">Hapus</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<!-- modal -->
<div class=" modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Artikel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url('admin/postArtikel'); ?>">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="judul_artikel" name="judul_artikel" placeholder="Judul Artikel">
                            <input type="text" class="form-control" value="<?php echo $this->session->userdata('id_user'); ?>" id="id_author" name="id_author" hidden>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <textarea type="text" class="form-control" id="ckeditor" name="isi_artikel"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" id="created_at" name="created_at" hidden>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah Artikel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Edit -->
<?php foreach ($artikel as $b) { ?>
    <div class="modal fade" id="modalEdit<?php echo $b['id_artikel']; ?>" tabindex=" -1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Artikel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo base_url('admin/putArtikel'); ?>">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="judul_artikel" name="judul_artikel" value="<?php echo $b['judul_artikel']; ?>" placeholder="Judul Artikel">
                                <input type="text" class="form-control" value="<?php echo $b['id_author']; ?>" id="id_author" name="id_author" hidden>
                                <input type="text" class="form-control" value="<?php echo $b['id_artikel']; ?>" id="id_artikel" name="id_artikel" hidden>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <textarea type="text" class="form-control" id="ckeditor" rows="5" name="isi_artikel"><?php echo $b['isi_artikel']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" id="created_at" name="created_at" hidden>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Edit Artikel</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

</div>
<!-- End of Main Content -->