<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

</div>
<!-- /.container-fluid -->

<div class="row m-2">
    <div class="col-md-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 bg-primary">
                <h6 class="m-0 font-weight-bold text-white">Pemetaan</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div id="map" style="width: 100%; height: 550px"></div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 bg-primary">
                <h6 class="m-0 font-weight-bold text-white">Input Penyedia</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <?= $this->session->flashdata('message'); ?>
                <?php

                // echo validation_errors('<div class="alert alert-primary" role="alert">
                // ', '</div>');
                //Data berhasil disimpan
                if ($this->session->set_flashdata('message')) {
                    echo '<div class="alert alert-primary" role="alert">';
                    echo $this->session->flashdata('message');
                    echo '</div>';
                }
                // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                // Data Berhasil ditambah</div>');
                // //     redirect('maps/input');
                echo form_open('maps/edit/' . $maps->id_penyedia);

                ?>

                <form>
                    <div class="mb-3">
                        <label>Nama Produk</label>
                        <input name="nama_produk" class="form-control" id="nama_produk" value="<?= $maps->nama_produk; ?>" placeholder="Masukkan Nama Produk">
                        <?= form_error('nama_produk', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label>Alamat</label>
                        <input name="alamat" class="form-control" id="alamat" value="<?= $maps->alamat; ?>" placeholder="Masukkan Alamat">
                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label>Nama Penyedia</label>
                        <input name="nama_penyedia" class="form-control" id="nama_penyedia" value="<?= $maps->nama_penyedia; ?>" placeholder="Masukkan Nama Penyedia">
                        <?= form_error('nama_penyedia', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label>Latitude</label>
                        <input id="Latitude" name="latitude" class="form-control" value="<?= $maps->latitude; ?>" placeholder="Latitude" readonly>
                        <?= form_error('latitude', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label>Longitude</label>
                        <input id="Longitude" name="longitude" class="form-control" value="<?= $maps->longitude; ?>" placeholder="Longitude" readonly>
                        <?= form_error('longitude', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label>Keterangan</label>
                        <input name="ket" class="form-control" id="ket" value="<?= $maps->ket; ?>" placeholder="Keterangan">
                        <?= form_error('ket', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="submit" class="btn btn-danger">Reset</button>
                </form>


                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>

<script>
    var curLocation = [0, 0];
    if (curLocation[0] == 0 && curLocation[1] == 0) {
        curLocation = [<?= $maps->latitude; ?>, <?= $maps->longitude; ?>];
    }

    var map = L.map('map').setView([<?= $maps->latitude; ?>, <?= $maps->longitude; ?>], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    map.attributionControl.setPrefix(false);
    var marker = new L.marker(curLocation, {
        draggable: 'true'
    });

    marker.on('dragend', function(event) {
        var position = marker.getLatLng();
        marker.setLatLng(position, {
            draggable: 'true'
        }).bindPopup(position).update();
        $("#Latitude").val(position.lat);
        $("#Longitude").val(position.lng).keyup();
    });

    $("#Latitude, #Longitude").change(function() {
        var position = [parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
        marker.setLatLng(position, {
            draggable: 'true'
        }).bindPopup(position).update();
        map.panTo(position);
    });
    map.addLayer(marker);

    // L.tileLayer('https://api.mapbox.com/styles/v1/mapbox/streets-v10/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWVnYTYzODIiLCJhIjoiY2ozbXpsZHgxMDAzNjJxbndweDQ4am5mZyJ9.uHEjtQhnIuva7f6pAfrdTw', {
    //     maxZoom: 18,
    //     attribution: 'Map data &copy; <a href="http://openstreetmap.org/"> OpenStreetMap </a> contributors, ' +
    //         '<a href="http://creativecommons.org/"> CC-BY-SA </a>, ' +
    //         'Imagery © <a href="http://mapbox.com">Mapbox</a>',
    //     id: 'examples.map-i875mjb7'
    // }).addTo(map);

    // function putDraggable() {
    //     draggableMarker = L.marker([map.getCenter().lat, map.getCenter().lng], {
    //         draggable: true,
    //         zIndexOffset: 900
    //     }).addTo(map);

    //     draggableMarker.on('dragend', function(e) {
    //         $("#lat").val(this.getLatLng().lat);
    //         $("#lng").val(this.getLatLng().lng);
    //     });
    // }


    // $(document).ready(function() {
    //     putDraggable();
    // });
</script>
</div>
<!-- End of Main Content -->