<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-9">
            <h1 class="h4 mb-4 text-gray-800">Perkembangan Balita</h1>
        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Tambah Perkembangan
            </button>
        </div>
    </div>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Perkembangan Balita</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kategori Umur</th>
                                <th>Perkembangan Anak</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($perkembangan as $b) { ?>
                                <tr>
                                    <th><?= $i++; ?></th>
                                    <td><?php if ($b['kat_umur'] == 1) {
                                            echo "0 - 1 Bulan";
                                        } else if ($b['kat_umur'] == 3) {
                                            echo "1 - 3 Bulan";
                                        } else if ($b['kat_umur'] == 6) {
                                            echo "3 - 6 Bulan";
                                        } else if ($b['kat_umur'] == 9) {
                                            echo "6 - 9 Bulan";
                                        } else if ($b['kat_umur'] == 12) {
                                            echo "10 - 12 Bulan";
                                        } else if ($b['kat_umur'] == 24) {
                                            echo "1 - 2 Tahun";
                                        } else if ($b['kat_umur'] == 36) {
                                            echo "2 - 3 Tahun";
                                        } else if ($b['kat_umur'] == 48) {
                                            echo "3 - 5 Tahun";
                                        } else if ($b['kat_umur'] == 60) {
                                            echo "5 - 6 Tahun";
                                        }
                                        ?></td>
                                    <td><?= $b['isi_perkembangan']; ?></td>
                                    <td><a class="badge badge-danger" href="<?php echo base_url('balita/deletePerkembangan?id_perkembangan=' . $b['id_perkembangan'] . ''); ?>" role="button">Hapus</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<!-- /.container-fluid -->
<!-- modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Perkembangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url('balita/addPerkembangan'); ?>">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <select class="custom-select" id="inputGroupSelect01" name="kat_umur">
                                <option selected>Pilih Kategori Umur</option>
                                <option value="1">Umur 0 - 1 Bulan</option>
                                <option value="3">Umur 1 - 3 Bulan</option>
                                <option value="6">Umur 3 - 6 Bulan</option>
                                <option value="9">Umur 6 - 9 Bulan</option>
                                <option value="12">Umur 9 - 12 Bulan</option>
                                <option value="24">Umur 1 - 2 Tahun</option>
                                <option value="36">Umur 2 - 3 Tahun</option>
                                <option value="48">Umur 3 - 5 Tahun</option>
                                <option value="60">Umur 5 - 6 Tahun</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="isi_perkembangan" name="isi_perkembangan" placeholder="Isi Perkembangan">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add Perkembangan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->