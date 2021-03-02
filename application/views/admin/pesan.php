<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-10">
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Balas Pesan
            </button>
        </div>
    </div>
    </br>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Kotak Konsultasi</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Pengirim</th>
                                <th>Judul</th>
                                <th>Pertanyaan</th>
                                <th>Jawaban</th>
                                <th>Nama Penjawab</th>
                                <th>Tanggal Pesan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pesan as $b) { ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?php if ($b['nama_user'] == $this->session->userdata('nama')) {
                                            echo '<p class="text-primary"><b>' . $b['nama_user'] . '</b></p>';
                                        } else {
                                            echo $b['nama_user'];
                                        } ?></td>
                                    <td><?= $b['judul_pesan']; ?></td>
                                    <td><?= $b['pertanyaan']; ?></td>
                                    <td><?php if ($b['jawaban'] == "-") {
                                            echo '<p class="text-primary"><b>Pesan belum di jawab</b></p>';
                                        } else {
                                            echo $b['jawaban'];
                                        } ?></td>
                                    <td><?php if ($b['penjawab'] == "-") {
                                            echo '<p class="text-primary"><b>Penjawab belum ada</b></p>';
                                        } else {
                                            echo $b['penjawab'];
                                        } ?></td>
                                    <td><?= $b['tanggal_pesan']; ?></td>
                                    <td>
                                        <a data-toggle="modal" data-target="#modalEdit<?php echo $b['id_pesan']; ?>"><button class="badge badge-info"> Balas</button></a> | <a class="badge badge-danger" href="<?php echo base_url('user/deletePesan?id_pesan=' . $b['id_pesan'] . ''); ?>" role="button">Hapus</a>

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
<!-- <div class=" modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Balas Pesan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url('admin/b_pesan'); ?>">
                    <div class="form-group row">
                        <label for="Judul Pesan" class="col-sm-2 col-form-label">Nama Penerima</label>
                        <div class="col-sm-10">
                            <select class="custom-select" id="inputGroupSelect01" name="id_penerima">
                                <option selected>- Nama Penerima -</option>
                                <?php foreach ($pesan as $u) { ?>
                                    <option value="<?php echo $u['id_pengirim']; ?>"><?php echo $u['nama_user']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Judul Pesan" class="col-sm-2 col-form-label">Judul</label>
                        <div class="col-sm-10">
                            <select class="custom-select" id="inputGroupSelect01" name="judul_pesan">
                                <option selected>- Pilih Judul Pesan -</option>
                                <?php foreach ($pesan as $u) { ?>
                                    <option value="<?php echo $u['judul_pesan']; ?>"><?php echo $u['judul_pesan']; ?></option>
                                <?php } ?>
                            </select>
                            <input type="text" class="form-control" value="<?= $this->session->userdata('id_user'); ?>" id="id_pengirim" name="id_pengirim" hidden>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Pertanyaan </label>
                        <div class="col-sm-10">
                            <select class="custom-select" id="inputGroupSelect01" name="pertanyaan_sebelumnya">
                                <option selected>- Pertanyaan -</option>
                                <?php foreach ($pesan as $u) { ?>
                                    <option value="<?php echo $u['isi_pesan']; ?>"><?php echo $u['isi_pesan']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Jawab</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control" id="isi_pesan" name="isi_pesan"></textarea>
                        </div>
                    </div>
                    <input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" id="tanggal_pesan" name="tanggal_pesan" hidden>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Balas Pesan</button>
            </div>
            </form>
        </div>
    </div>
</div> -->


<!-- Modal Edit -->
<?php foreach ($pesan as $b) { ?>
    <div class="modal fade" id="modalEdit<?php echo $b['id_pesan']; ?>" tabindex=" -1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Balas Pesan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo base_url('admin/b_pesan'); ?>">
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo $b['id_pengirim']; ?>" id="id_pengirim" name="id_pengirim" hidden>
                                <input type="text" class="form-control" value="<?php echo $this->session->userdata('nama'); ?>" id="penjawab" name="penjawab" hidden>
                                <input type="text" class="form-control" value="<?php echo $b['id_pesan']; ?>" id="id_pesan" name="id_pesan" hidden>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Judul Pesan" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo $b['judul_pesan']; ?>" id="judul_pesan" name="judul_pesan" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Pertanyaan" class="col-sm-2 col-form-label">Pertanyaan</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="5" name="pertanyaan" value="<?php echo $b['pertanyaan']; ?>" disabled><?php echo $b['pertanyaan']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Jawaban</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" id="jawaban" name="jawaban" rows="5"><?php echo $b['jawaban']; ?></textarea>
                            </div>
                        </div>
                        <input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" id="tanggal_pesan" name="tanggal_pesan" hidden>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Balas Pesan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
<!-- End of Main Content -->