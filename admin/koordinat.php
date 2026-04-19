<?php
include "../config/koneksi.php";
$id = $_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Input Jalur Trayek</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>

<style>
body{background:#f5f7fa;}
#map{
height:560px;
border-radius:16px;
box-shadow:0 10px 25px rgba(0,0,0,.08);
}
</style>

</head>
<body>

<div class="container mt-4">

<div class="d-flex justify-content-between align-items-center mb-3">
<div>
<h3 class="mb-0">Kelola Jalur Trayek</h3>
<small class="text-muted">Klik peta untuk menambahkan titik jalur</small>
</div>

<div>
<a href="dashboard.php" class="btn btn-secondary">Kembali</a>
<button onclick="undoPoint()" class="btn btn-warning">Undo</button>
<button onclick="resetRoute()" class="btn btn-danger">Reset</button>
</div>
</div>

<div id="map"></div>

</div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
var trayekId = <?= $id ?>;

var map = L.map('map').setView([-6.5950,106.8166],13);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{
maxZoom:19
}).addTo(map);

var points = [];
var markers = [];
var line = null;

function redraw(){

if(line){
map.removeLayer(line);
}

markers.forEach(m => map.removeLayer(m));
markers = [];

if(points.length > 0){

let start = L.marker(points[0]).addTo(map)
.bindPopup("START");

markers.push(start);

if(points.length > 1){

let end = L.marker(points[points.length-1]).addTo(map)
.bindPopup("FINISH");

markers.push(end);
}

line = L.polyline(points,{
color:'blue',
weight:6
}).addTo(map);
}

}

map.on('click', function(e){

let lat = e.latlng.lat;
let lng = e.latlng.lng;

points.push([lat,lng]);

fetch('simpan_koordinat.php?id='+trayekId+'&lat='+lat+'&lng='+lng);

redraw();

});

function undoPoint(){

if(points.length == 0) return;

points.pop();

fetch('undo_koordinat.php?id='+trayekId);

redraw();

}

function resetRoute(){

if(confirm('Hapus semua jalur?')){

points=[];

fetch('reset_koordinat.php?id='+trayekId);

redraw();

}

}
</script>

</body>
</html>