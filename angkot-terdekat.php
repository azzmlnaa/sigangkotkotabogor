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

<title>Angkot Terdekat - SIG Angkot Bogor</title>

<!-- Bootstrap -->
<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

<!-- Bootstrap Icons -->
<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<!-- Leaflet -->
<link rel="stylesheet"
href="https://unpkg.com/leaflet/dist/leaflet.css"/>

<!-- Leaflet Routing Machine -->
<link rel="stylesheet"
href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css"/>

<!-- CSS -->
<link rel="stylesheet"
href="assets/css/angkot-terdekat.css">

</head>

<body>

<!-- HEADER -->
<div class="map-header">

    <a href="index.php" class="back-btn">
        <i class="bi bi-arrow-left"></i>
    </a>

    <div>

        <div class="map-title">
            Angkot Terdekat
        </div>

        <small>
            Temukan trayek terdekat dari lokasi Anda
        </small>

    </div>

</div>

<!-- STATUS -->
<div class="status-box">

    <div class="status-dot"></div>

    <span id="statusText">
        Sedang mendeteksi lokasi pengguna...
    </span>

</div>

<!-- MAP -->
<div id="map"></div>

<!-- GPS BUTTON -->
<button onclick="getUserLocation()" class="gps-btn">

    <i class="bi bi-crosshair"></i>

</button>

<!-- BOTTOM SHEET -->
<div class="nearby-sheet">

    <div class="sheet-handle"></div>

    <div class="sheet-top">

        <h6 class="fw-bold mb-1">
            Pilih Trayek
        </h6>

        <small>
            Klik trayek untuk melihat navigasi jalan nyata
        </small>

    </div>

    <!-- ROUTE LIST -->
    <div id="trayekList">

    <?php

    $q=mysqli_query($conn,"SELECT * FROM trayek ORDER BY kode ASC");

    while($d=mysqli_fetch_array($q)){
    ?>

    <div class="angkot-card"

    onclick="loadNearestRoute(
    <?= $d['id']; ?>,
    '<?= $d['warna']; ?>',
    '<?= $d['nama']; ?>'
    )">

        <div class="angkot-left">

            <div class="angkot-icon">
                <i class="bi bi-bus-front-fill"></i>
            </div>

            <div>

                <div class="angkot-title">
                    <?= $d['kode']; ?>
                </div>

                <small>
                    <?= $d['nama']; ?>
                </small>

            </div>

        </div>

        <div class="distance-badge">
            Navigasi
        </div>

    </div>

    <?php } ?>

    </div>

</div>

<!-- LEAFLET -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<!-- ROUTING -->
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

<!-- JS -->
<script src="assets/js/angkot-terdekat.js"></script>

</body>
</html>