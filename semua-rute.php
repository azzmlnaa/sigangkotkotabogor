<?php include "config/koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width,
initial-scale=1,
maximum-scale=1,
user-scalable=no">

<title>Semua Rute - SIG Angkot Bogor</title>

<!-- Bootstrap -->
<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

<!-- Bootstrap Icons -->
<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<!-- Leaflet -->
<link rel="stylesheet"
href="https://unpkg.com/leaflet/dist/leaflet.css"/>

<!-- CSS -->
<link rel="stylesheet"
href="assets/css/semua-rute.css">

</head>

<body>

<!-- HEADER -->
<div class="map-header">

    <a href="index.php" class="back-btn">
        <i class="bi bi-arrow-left"></i>
    </a>

    <div>

        <div class="map-title">
            Semua Rute
        </div>

        <small>
            Visualisasi seluruh trayek angkot Kota Bogor
        </small>

    </div>

</div>

<!-- INFO -->
<div class="floating-info">

    <div class="info-dot"></div>

    <span>
        Semua trayek ditampilkan pada peta
    </span>

</div>

<!-- MAP -->
<div id="map"></div>

<!-- BOTTOM SHEET -->
<div class="route-info-sheet">

    <div class="sheet-handle"></div>

    <h6 class="fw-bold mb-3">
        Informasi Trayek
    </h6>

    <div class="route-legend">

    <?php
    $q=mysqli_query($conn,"SELECT * FROM trayek ORDER BY kode ASC");

    while($d=mysqli_fetch_array($q)){
    ?>

    <div class="legend-item">

        <div class="legend-left">

            <div class="legend-color"
            style="background:<?= $d['warna']; ?>">
            </div>

            <div>

                <div class="legend-title">
                    <?= $d['kode']; ?>
                </div>

                <small>
                    <?= $d['nama']; ?>
                </small>

            </div>

        </div>

    </div>

    <?php } ?>

    </div>

</div>

<!-- DATA ROUTE -->
<script>

const trayekData = [

<?php

$q=mysqli_query($conn,"SELECT * FROM trayek");

while($d=mysqli_fetch_array($q)){

?>

{
id: <?= $d['id']; ?>,
warna: '<?= $d['warna']; ?>'
},

<?php } ?>

];

</script>

<!-- LEAFLET -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<!-- JS -->
<script src="assets/js/semua-rute.js"></script>

</body>
</html>