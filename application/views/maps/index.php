<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 my-5  text-gray-800"><?= $title; ?></h1>

</div>
<!-- /.container-fluid -->
<div class="row m-3">
    <div class="col-lg">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">

                        <div id="map" style="width: 100%; height: 550px"></div>
                        <script>
                            // 13 itu tingkat zoom,jika makin besar nilainya maka zoom nya makin rendah
                            var map = L.map('map').setView([-6.349332082829346, 108.32104308133881], 13);

                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                            }).addTo(map);

                            // L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                            //     maxZoom: 20,
                            //     attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                            //         'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                            //     id: 'mapbox/streets-v11',
                            //     // tileSize: 512,
                            //     // zoomOffset: -1
                            // }).addTo(map);

                            //jika ingin tambah icon baru
                            // var icon1 = L.icon({
                            //     iconUrl: "<?= base_url('hm.png'); ?>",
                            //     iconSize: [38, 95], // size of the icon
                            //     iconAnchor: [22, 94], // point of the icon which will correspond to marker's location

                            // });
                            //tambah ikon baru
                            // var lokasi1 = L.marker([-6.35163272479026, 108.32309353901088], {
                            //     icon: icon1
                            // }).bindPopup("<b>Ini Masjid</b><br>Islamic Center").addTo(map).openPopup();
                            <?php foreach ($maps as $key => $value) { ?>
                                L.marker([<?= $value->latitude; ?>, <?= $value->longitude; ?>]).addTo(map)
                                    .bindPopup("<img src='<?= base_url('img/' . $value->img) ?>' width='100%'>" +
                                        "<b>Nama Produk : <?= $value->nama_produk; ?></b><br>" +
                                        "Alamat : <?= $value->alamat; ?></br>" +
                                        "Nama Penyedia : <?= $value->nama_penyedia; ?></br>" +
                                        "Keterangan : <?= $value->ket; ?></br>" +
                                        "<a href='<?= base_url('home/detail/' . $value->id_penyedia); ?>' class='btn btn-default'>Detail</a>"
                                    );
                            <?php } ?>


                            // var lokasi1 = L.marker([-6.35163272479026, 108.32309353901088]).bindPopup("<b>Ini Masjid</b><br>Islamic Center").addTo(map).openPopup();
                            // var lokasi2 = L.marker([-6.352374647297848, 108.32500589668287]).addTo(map);
                            // var lokasi3 = L.marker([-6.510703021443245, 108.33637207691352]).addTo(map);
                            // var lokasi4 = L.marker([-6.408229942560945, 108.28146682340349]).addTo(map);
                            // var lokasi5 = L.marker([-6.3228013306134505, 108.32108603292566]).addTo(map);
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->