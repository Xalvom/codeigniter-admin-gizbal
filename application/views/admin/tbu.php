<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-10">
        </div>
        <!-- <div class="col-md-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Tambah Gizi
            </button>
        </div> -->
    </div>
    </br>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?= $judul; ?></h6>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link " href="<?php echo base_url('admin/bbu'); ?>">Berat Badan / Umur</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo base_url('admin/tbu'); ?>">Tinggi Badan / Umur</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('admin/bbtb'); ?>">Berat Badan / Tinggi Badan</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Tinggi Badan</th>
                                <th scope="col">Umur</th>
                                <th scope="col">Status TB / U</th>
                                <th scope="col">Update</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($gizi as $b) { ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $b['nama_balita']; ?></td>
                                    <td><?= $b['tinggi_badan']; ?> /cm</td>
                                    <td><?= $b['umur']; ?> Bulan</td>
                                    <td><?php if ($b['z-score'] == 'Normal') {
                                            echo '<span class="badge badge-success">' . 'Normal' . '</span>';
                                        } else if ($b['z-score'] == 'Tinggi') {
                                            echo '<span class="badge badge-primary">' . 'Tinggi' . '</span>';
                                        } else if ($b['z-score'] == 'Pendek') {
                                            echo '<span class="badge badge-warning">' . 'Pendek' . '</span>';
                                        } else {
                                            echo '<span class="badge badge-danger">' . 'Sangat Pendek' . '</span>';
                                        } ?></td>
                                    <td><?= $b['update_tbu']; ?></td>
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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Gizi Balita TB / U</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url('balita/addTbu'); ?>">
                    <div class="form-group row">
                        <label for="Nama Balita" class="col-sm-2 col-form-label">Nama Balita</label>
                        <div class="col-sm-10">
                            <select onchange="autofill()" class="custom-select" id="id_balita" name="id_balita">
                                <option selected>Pilih Balita</option>
                                <?php foreach ($balita as $u) { ?>
                                    <option value="<?php echo $u['id_balita']; ?>"><?php echo $u['nama_balita']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kelamin" class="col-sm-2 col-form-label">Kelamin</label>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="kelamin" id="kelamin" value="L" checked>
                                <label class="form-check-label" for="gridRadios1">
                                    Laki-Laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="kelamin" id="kelamin" value="P">
                                <label class="form-check-label" for="gridRadios2">
                                    Perempuan
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="umur" class="col-sm-2 col-form-label">Umur</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="umur" name="umur" placeholder="Umur(Bulan)">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tinggi_badan" class="col-sm-2 col-form-label">Tinggi Badan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tinggi_badan" name="tinggi_badan" placeholder="Tinggi Badan(cm)">
                        </div>
                        <div>
                            <input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" id="update_tbu" name="update_tbu" hidden>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Tambah Gizi</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
    function autofill() {
        var id_balita = $("#id_balita").val();
        $.ajax({
            url: "<?php echo base_url('balita/cariBalita'); ?>",
            data: "id_balita=" + id_balita,
        }).success(function(data) {
            var json = data,
                obj = JSON.parse(json);
            $('#umur').val(obj.umur);

            var $kelamin = $('#kelamin');
            if (obj.kelamin == 'L') {
                $jenis_kelamin.filter('[value=laki-laki]');
            } else {
                $jenis_kelamin.filter('[value=perempuan]');
            }
        });
    }
</script>
</div>
<!-- End of Main Content -->