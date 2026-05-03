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

<title>Info Rute - SIG Angkot Bogor</title>

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
href="assets/css/info-rute.css">

</head>

<body>

<!-- HEADER -->
<div class="map-header">

    <a href="index.php" class="back-btn">
        <i class="bi bi-arrow-left"></i>
    </a>

    <div>

        <div class="map-title">
            Info Rute
        </div>

        <small>
            Cari informasi trayek angkot
        </small>

    </div>

</div>

<!-- SEARCH -->
<div class="search-box">

    <input type="text"
    id="searchRoute"
    class="form-control"
    placeholder="Cari nama atau kode trayek...">

</div>

<!-- MAP -->
<div id="map"></div>

<!-- INFO FLOAT -->
<div class="floating-info">

    <div class="info-dot"></div>

    <span>
        Pilih trayek untuk melihat detail rute
    </span>

</div>

<!-- BOTTOM SHEET -->
<div class="route-sheet">

    <div class="sheet-handle"></div>

    <div class="sheet-top">

        <h6 class="fw-bold mb-1">
            Daftar Info Rute
        </h6>

        <small>
            Informasi lengkap trayek angkot
        </small>

    </div>

    <div id="routeList">

    <?php
    $q=mysqli_query($conn,"SELECT * FROM trayek ORDER BY kode ASC");

    while($d=mysqli_fetch_array($q)){
    ?>

    <div class="route-card"

    data-route="<?= strtolower($d['nama'].' '.$d['kode']); ?>"

    onclick="showRoute(
    <?= $d['id']; ?>,
    '<?= $d['warna']; ?>',
    '<?= $d['nama']; ?>',
    '<?= $d['kode']; ?>'
    )">

        <div class="route-left">

            <div class="route-badge">
                <?= $d['kode']; ?>
            </div>

            <div>

                <div class="route-title">
                    <?= $d['nama']; ?>
                </div>

                <small>
                    Trayek Angkot Kota Bogor
                </small>

            </div>

        </div>

        <i class="bi bi-chevron-right"></i>

    </div>

    <?php } ?>

    </div>

</div>

<!-- ROUTE DATA -->
<script>

const routeData = [

<?php

$q=mysqli_query($conn,"SELECT * FROM trayek");

while($d=mysqli_fetch_array($q)){

?>

{
id: <?= $d['id']; ?>,
warna: '<?= $d['warna']; ?>',
nama: '<?= $d['nama']; ?>',
kode: '<?= $d['kode']; ?>'
},

<?php } ?>

];

</script>

<!-- LEAFLET -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<!-- JS -->
<script src="assets/js/info-rute.js"></script>

</body>
</html>