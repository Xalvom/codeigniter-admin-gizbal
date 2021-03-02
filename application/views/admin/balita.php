<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-10">
        </div>
        <!-- <div class="col-md-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Tambah Balita
            </button>
        </div> -->
    </div>
    </br>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <h6 class=" col-md-8 m-0 font-weight-bold text-primary py-1">Data Balita</h6>
                    <div class="justify-content-end ml-auto mr-3 py-1">
                        Bidan :
                        <select name="" id="filter">
                            <option value="0">Show All</option>
                            <!-- <option value="13">Himman Husaina</option> -->
                            <?php foreach ($user as $u) { ?>
                                <?php if ($u['level_user'] == 2 && $u['is_aktif'] == 1) { ?>
                                    <option value="<?php echo $u['id_user']; ?>"><?= $u['nama_user']; ?></option>
                            <?php  }
                            } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="balita" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Balita</th>
                                <th>Orang Tua</th>
                                <th>Alamat</th>
                                <th>Tanggal Lahir</th>
                                <th>Kelamin</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <?php $i = 1; ?>
                            <?php foreach ($balita as $b) { ?>
                                <tr>
                                    <th><?= $i++; ?></th>
                                    <td><?= $b['nama_balita']; ?></td>
                                    <td><?= $b['nama_orangtua']; ?></td>
                                    <td><?= "RT: " . $b['rt_balita'] . " RW: " . $b['rw_balita'] . " Dusun: "  . $b['alamat_balita']; ?></td>
                                    <td><?= $b['tgllahir_balita']; ?></td>
                                    <td><?php if ($b['kelamin_balita'] == 'L') {
                                            echo 'Laki-Laki';
                                        } else {
                                            echo 'Perempuan';
                                        } ?></td>
                                    <td>
                                        <a data-toggle="modal" data-target="#modalEdit<?php echo $b['id_balita']; ?>"><button class="badge badge-info"> Ubah</button></a> | <a class="badge badge-danger" href="<?php echo base_url('balita/deleteBalita?id_balita=' . $b['id_balita'] . ''); ?>" role="button">Hapus</a>
                                    </td>
                                </tr>
                            <?php } ?> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<!-- modal
<div class=" modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Balita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url('balita/addBalita'); ?>">
                    <div class="form-group row">
                        <label for="Nama Balita" class="col-sm-2 col-form-label">Nama Balita</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_balita" name="nama_balita">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Nama Balita" class="col-sm-2 col-form-label">Nama Orang Tua</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_ortu" name="nama_ortu">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Nama Balita" class="col-sm-2 col-form-label">Nama User</label>
                        <div class="col-sm-10">
                            <select class="custom-select" id="inputGroupSelect01" name="id_user">
                                <option selected>Pilih User</option>
                                <?php foreach ($user as $u) { ?>
                                    <?php if ($u['is_aktif'] == 1 && $u['level_user'] == 2) { ?>
                                        <option value="<?php echo $u['id_user']; ?>"><?php echo $u['nama_user']; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Alamat Balita</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat_balita" name="alamat_balita">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tgllahir_balita" name="tgllahir_balita">
                        </div>
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Kelamin Balita</legend>
                            <div class="col-sm-10">
                                <?php if ($b['kelamin_balita'] == 'L') { ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kelamin_balita" id="kelamin_balita" value="<?php echo $b['kelamin_balita']; ?>" checked>
                                        <label class="form-check-label" for="gridRadios1">
                                            Laki-Laki
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kelamin_balita" id="kelamin_balita" value="<?php echo $b['kelamin_balita']; ?>">
                                        <label class="form-check-label" for="gridRadios2">
                                            Perempuan
                                        </label>
                                    </div>
                                <?php } else { ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kelamin_balita" id="kelamin_balita" value="<?php echo $b['kelamin_balita']; ?>">
                                        <label class="form-check-label" for="gridRadios1">
                                            Laki-Laki
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kelamin_balita" id="kelamin_balita" value="<?php echo $b['kelamin_balita']; ?>" checked>
                                        <label class="form-check-label" for="gridRadios2">
                                            Perempuan
                                        </label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </fieldset>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add Balita</button>
            </div>
            </form>
        </div>
    </div>
</div> -->


<!-- Modal Edit -->
<?php foreach ($balita as $b) { ?>
    <div class="modal fade" id="modalEdit<?php echo $b['id_balita']; ?>" tabindex=" -1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Balita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo base_url('balita/editBalita'); ?>">
                        <div class="form-group row">
                            <label for="Nama Balita" class="col-sm-2 col-form-label">Nama Balita</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo $b['nama_balita']; ?>" id="nama_balita" name="nama_balita">
                                <input type="text" class="form-control" value="<?php echo $b['id_balita']; ?>" id="id_balita" name="id_balita" hidden>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Nama Balita" class="col-sm-2 col-form-label">Nama Orang Tua</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_orangtua" value="<?php echo $b['nama_orangtua']; ?>" name="nama_orangtua">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Nama Balita" class="col-sm-2 col-form-label">Nama User</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo $b['nama_user']; ?>" id="nama_user" name="nama_user" disabled>
                                <input type="text" class="form-control" value="<?php echo $b['id_user']; ?>" id="id_user" name="id_user" hidden>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Alamat Balita</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="alamat_balita" name="alamat_balita" value="<?php echo $b['alamat_balita']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="tgllahir_balita" name="tgllahir_balita" value="<?php echo $b['tgllahir_balita']; ?>">
                            </div>
                        </div>
                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-2 pt-0">Kelamin Balita</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kelamin_balita" id="kelamin_balita" value="L" checked>
                                        <label class="form-check-label" for="gridRadios1">
                                            Laki-Laki
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kelamin_balita" id="kelamin_balita" value="P">
                                        <label class="form-check-label" for="gridRadios2">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Edit Balita</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

</div>
<!-- End of Main Content -->