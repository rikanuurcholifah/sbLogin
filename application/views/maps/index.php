<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

</div>
<!-- /.container-fluid -->
<div id="map" style="width: 700px; height: 500px"></div>
<script>
    // 13 itu tingkat zoom,jika makin besar nilainya maka zoom nya makin rendah
    var map = L.map('map').setView([-6.349332082829346, 108.32104308133881], 13);

    // L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    //     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    // }).addTo(map);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        // tileSize: 512,
        // zoomOffset: -1
    }).addTo(map);

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

    var lokasi1 = L.marker([-6.35163272479026, 108.32309353901088]).bindPopup("<b>Ini Masjid</b><br>Islamic Center").addTo(map).openPopup();
    var lokasi2 = L.marker([-6.352374647297848, 108.32500589668287]).addTo(map);
    var lokasi3 = L.marker([-6.510703021443245, 108.33637207691352]).addTo(map);
    var lokasi4 = L.marker([-6.408229942560945, 108.28146682340349]).addTo(map);
    var lokasi5 = L.marker([-6.3228013306134505, 108.32108603292566]).addTo(map);
</script>
</div>
<!-- End of Main Content -->