<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-10">
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Tambah User
            </button>
        </div>
    </div>
    </br>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?= $judul; ?></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Status</th>
                                <th scope="col">Level</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($user as $b) { ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $b['nama_user']; ?></td>
                                    <td><?= $b['email_user']; ?></td>
                                    <td><?php if ($b['is_aktif'] == '1') {
                                            echo '<span class="badge badge-success ">' . 'Aktif' . '</span>';
                                        } else {
                                            echo '<span class="badge badge-warning text-dark">' . 'Nonaktif' . '</span>';
                                        } ?></td>
                                    <td><?= $b['nama_role']; ?></td>
                                    <td>
                                        <a data-toggle="modal" data-target="#modalEdit<?php echo $b['id_user']; ?>"><button class="badge badge-info"> Ubah</button></a> | <a class="badge badge-danger" href="<?php echo base_url('admin/deleteUser?id_user=' . $b['id_user'] . ''); ?>" role="button">Hapus</a>
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url('admin/addUser'); ?>">
                    <div class="form-group row">
                        <label for="Nama User" class="col-sm-2 col-form-label">Nama User</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_user" name="nama_user">
                            <?= form_error('nama_user', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Email User" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email_user" name="email_user">
                            <?= form_error('email_user', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="level user" class="col-sm-2 col-form-label">Level User</label>
                        <div class="col-sm-10">
                            <select class="custom-select" id="level_user" name="level_user">
                                <option selected>Pilih...</option>
                                <option value="1">Administrator</option>
                                <option value="2">Member</option>
                            </select>
                            <?= form_error('level_user', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password1" name="password_user">
                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="re-password" class="col-sm-2 col-form-label">Re-Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password2" name="password2">
                            <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Tambah User</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<?php foreach ($user as $b) { ?>
    <div class="modal fade" id="modalEdit<?php echo $b['id_user']; ?>" tabindex=" -1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo base_url('admin/editUser'); ?>">
                        <div class="form-group row">
                            <label for="Nama User" class="col-sm-2 col-form-label">Nama User</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo $b['nama_user']; ?>" id="nama_user" name="nama_user">
                                <?= form_error('nama_user', '<small class="text-danger pl-3">', '</small>'); ?>
                                <input type="text" class="form-control" value="<?php echo $b['id_user']; ?>" id="id_user" name="id_user" hidden>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Email User" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control email_user" id="email_user" value="<?php echo $b['email_user']; ?>" name="email_user">
                                <?= form_error('email_user', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="level user" class="col-sm-2 col-form-label">Level User</label>
                            <div class="col-sm-10">
                                <select class="custom-select" id="level_user" name="level_user">
                                    <?php if ($b['level_user'] == 1) { ?>
                                        <option selected value="1">Administrator</option>
                                        <option value="2">Member</option>
                                    <?php } else { ?>
                                        <option value="1">Administrator</option>
                                        <option selected value="2">Member</option>
                                    <?php } ?>
                                </select>
                                <?= form_error('level_user', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Edit User</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

</div>

<!-- End of Main Content -->