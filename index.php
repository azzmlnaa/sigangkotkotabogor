<?php include "config/koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SIG Trayek Angkot Bogor</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>

<style>
body{
    background:#eef3f8;
    font-family:Arial, sans-serif;
}

/* NAVBAR */
.navbar{
    background:linear-gradient(90deg,#0d6efd,#0b5ed7);
    box-shadow:0 6px 20px rgba(0,0,0,.08);
}

/* SIDEBAR */
.sidebar{
    background:#ffffff;
    border-radius:22px;
    padding:22px;
    box-shadow:0 12px 30px rgba(0,0,0,.08);
    height:640px;
    overflow:auto;
}

/* MAP */
#map{
    height:640px;
    border-radius:22px;
    box-shadow:0 12px 30px rgba(0,0,0,.08);
}

/* TITLE */
.section-title{
    font-size:18px;
    font-weight:700;
    margin-bottom:6px;
}

.small-text{
    font-size:13px;
    color:#777;
    margin-bottom:12px;
}

/* INPUT */
.form-control{
    border-radius:14px;
    padding:11px;
}

/* BUTTON */
.btn{
    border-radius:14px;
    padding:10px;
    font-weight:600;
}

/* CARD TRAYEK */
.route-item{
    padding:14px;
    border-radius:16px;
    margin-bottom:12px;
    cursor:pointer;
    border:1px solid #ececec;
    transition:.25s ease;
    background:#fff;
}

.route-item:hover{
    background:#0d6efd;
    color:#fff;
    transform:translateY(-3px);
    box-shadow:0 10px 20px rgba(13,110,253,.20);
}

.badge-kode{
    font-size:13px;
    padding:7px 10px;
    margin-right:8px;
}

/* FOOTER */
.footer{
    margin-top:20px;
    text-align:center;
    font-size:14px;
    color:#777;
}

hr{
    opacity:.12;
}
</style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark">
<div class="container">
<a class="navbar-brand fw-bold" href="#">
<i class="bi bi-bus-front-fill"></i>
SIG Angkot Bogor
</a>

<div class="ms-auto text-white small">
Sistem Informasi Geografis Trayek Angkot
</div>
</div>
</nav>

<div class="container mt-4">
<div class="row g-4">

<!-- SIDEBAR -->
<div class="col-lg-4">
<div class="sidebar">

<!-- CARI RUTE -->
<div class="section-title">
<i class="bi bi-signpost-split-fill text-primary"></i>
Cari Rute
</div>

<div class="small-text">
Masukkan lokasi asal dan tujuan
</div>

<form method="GET">

<input type="text"
name="asal"
class="form-control mb-2"
placeholder="Contoh: Ciawi">

<input type="text"
name="tujuan"
class="form-control mb-3"
placeholder="Contoh: Baranangsiang">

<button class="btn btn-primary w-100 mb-3">
<i class="bi bi-search"></i>
Cari Rute
</button>

</form>

<?php
if(isset($_GET['asal']) && isset($_GET['tujuan'])){

$asal   = mysqli_real_escape_string($conn,$_GET['asal']);
$tujuan = mysqli_real_escape_string($conn,$_GET['tujuan']);

$cari = mysqli_query($conn,"
SELECT * FROM trayek
WHERE asal LIKE '%$asal%'
AND tujuan LIKE '%$tujuan%'
");

if(mysqli_num_rows($cari)>0){

echo "<div class='alert alert-success'>";
echo "<b>Rute ditemukan:</b><br><br>";

while($r=mysqli_fetch_array($cari)){

echo "
<div class='route-item'
onclick=\"loadRoute($r[id],'$r[warna]')\">

<span class='badge bg-success badge-kode'>
$r[kode]
</span>

$r[nama]

</div>
";

}

echo "</div>";

}else{

echo "<div class='alert alert-danger'>Rute tidak ditemukan</div>";

}
}
?>

<hr>

<!-- GPS -->
<div class="section-title">
<i class="bi bi-geo-alt-fill text-success"></i>
Lokasi Saya
</div>

<div class="small-text">
Gunakan GPS perangkat Anda
</div>

<button onclick="getLocation()" class="btn btn-success w-100 mb-3">
<i class="bi bi-crosshair"></i>
Gunakan Lokasi Saya
</button>

<div id="infoLokasi"></div>

<hr>

<!-- SEARCH -->
<div class="section-title">
<i class="bi bi-bus-front-fill text-warning"></i>
Daftar Trayek
</div>

<div class="small-text">
Cari trayek angkot Kota Bogor
</div>

<input type="text"
id="search"
class="form-control mb-3"
placeholder="Cari trayek...">

<div id="trayekList">

<?php
$q=mysqli_query($conn,"SELECT * FROM trayek ORDER BY kode ASC");

while($d=mysqli_fetch_array($q)){
?>

<div class="route-item"
onclick="loadRoute(<?= $d['id']; ?>,'<?= $d['warna']; ?>')">

<span class="badge bg-primary badge-kode">
<?= $d['kode']; ?>
</span>

<?= $d['nama']; ?>

</div>

<?php } ?>

</div>

</div>
</div>

<!-- MAP -->
<div class="col-lg-8">
<div id="map"></div>
</div>

</div>

<div class="footer">
SIG Trayek Angkot Bogor • Dibuat oleh Aziz Maulana • 2026
</div>

</div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
var map = L.map('map').setView([-6.5950,106.8166],13);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{
maxZoom:19
}).addTo(map);

var polyline;
var userMarker;

/* LOAD ROUTE */
function loadRoute(id, warna){

fetch('trayek.php?id='+id)
.then(response => response.json())
.then(data => {

var points=[];

for(var i=0;i<data.length;i++){
points.push([
parseFloat(data[i].latitude),
parseFloat(data[i].longitude)
]);
}

if(polyline){
map.removeLayer(polyline);
}

polyline = L.polyline(points,{
color:warna,
weight:8,
opacity:.95,
smoothFactor:2
}).addTo(map);

map.fitBounds(polyline.getBounds());

});

}

/* SEARCH */
document.getElementById("search").addEventListener("keyup", function(){

let filter = this.value.toLowerCase();
let items = document.querySelectorAll(".route-item");

items.forEach(function(item){

if(item.innerText.toLowerCase().includes(filter)){
item.style.display="block";
}else{
item.style.display="none";
}

});

});

/* GPS */
function getLocation(){

if(navigator.geolocation){

navigator.geolocation.getCurrentPosition(showPosition, showError);

}else{

document.getElementById("infoLokasi").innerHTML =
"<div class='alert alert-danger'>Browser tidak mendukung GPS</div>";

}

}

function showPosition(position){

let lat = position.coords.latitude;
let lng = position.coords.longitude;

if(userMarker){
map.removeLayer(userMarker);
}

userMarker = L.marker([lat,lng]).addTo(map)
.bindPopup("📍 Lokasi Anda")
.openPopup();

map.setView([lat,lng],15);

document.getElementById("infoLokasi").innerHTML =
"<div class='alert alert-success'>Lokasi berhasil ditemukan</div>";

}

function showError(){

document.getElementById("infoLokasi").innerHTML =
"<div class='alert alert-danger'>Lokasi tidak diizinkan</div>";

}
</script>

</body>
</html>