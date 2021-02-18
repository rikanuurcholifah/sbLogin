<!-- Begin Page Content -->
<div class="container-fluid">



</div>
<!-- /.container-fluid -->

<!-- DataTales Example -->
<div class="card shadow m-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Penyedia Reklame</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Alamat</th>
                        <th>Nama Penyedia</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($maps as $key => $value) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value->nama_produk ?></td>
                            <td><?= $value->alamat ?></td>
                            <td><?= $value->nama_penyedia ?></td>
                            <td><?= $value->latitude ?></td>
                            <td><?= $value->longitude ?></td>
                            <td><?= $value->ket ?></td>
                            <td>
                                <button type="submit" class="btn btn-warning">Edit</button>
                                <button type="submit" class="btn btn-danger">Hapus</button>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->