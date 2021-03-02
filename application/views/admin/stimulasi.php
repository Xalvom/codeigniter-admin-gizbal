<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-10">
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Tambah Stimulasi
            </button>
        </div>
    </div>
    </br>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Stimulasi</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kategori Umur</th>
                                <th>Isi Stimulasi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($stimulasi as $b) { ?>
                                <tr>
                                    <th><?= $i++; ?></th>
                                    <td><?php if ($b['kat_umur'] == 1) {
                                            echo "0 - 3 Bulan";
                                        } else if ($b['kat_umur'] == 2) {
                                            echo "3 - 6 Bulan";
                                        } else if ($b['kat_umur'] == 3) {
                                            echo "6 - 12 Bulan";
                                        } else if ($b['kat_umur'] == 4) {
                                            echo "1 - 2 Tahun";
                                        } else if ($b['kat_umur'] == 5) {
                                            echo "2 - 3 Tahun";
                                        } else if ($b['kat_umur'] == 6) {
                                            echo "3 - 5 Tahun";
                                        } else if ($b['kat_umur'] == 7) {
                                            echo "5 - 6 Tahun";
                                        }
                                        ?></td>
                                    <td><?= $b['isi_stimulasi']; ?></td>
                                    <td>
                                        <a class="badge badge-danger" href="<?php echo base_url('balita/deleteStimulasi?id_stimulasi=' . $b['id_stimulasi'] . ''); ?>" role="button">Hapus</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Stimulasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url('admin/postStimulasi'); ?>">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <select class="custom-select" id="inputGroupSelect01" name="kat_umur">
                                <option selected>Pilih Kategori Umur</option>
                                <option value="1">Umur 0 - 3 Bulan</option>
                                <option value="2">Umur 3 - 6 Bulan</option>
                                <option value="3">Umur 6 - 12 Bulan</option>
                                <option value="4">Umur 1 - 2 Tahun</option>
                                <option value="5">Umur 2 - 3 Tahun</option>
                                <option value="6">Umur 3 - 5 Tahun</option>
                                <option value="7">Umur 5 - 6 Tahun</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <textarea type="text" class="form-control" id="ckeditor" name="isi_stimulasi"></textarea>
                        </div>
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
<!-- <?php foreach ($artikel as $b) { ?>
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
<?php } ?> -->

</div>
<!-- End of Main Content -->