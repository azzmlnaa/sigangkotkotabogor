<?php
include "../config/koneksi.php";

$id = $_GET['id'];
$lat = $_GET['lat'];
$lng = $_GET['lng'];

$q = mysqli_query($conn,"SELECT MAX(urutan) as maxurut FROM koordinat WHERE trayek_id='$id'");
$d = mysqli_fetch_array($q);

$urut = $d['maxurut'] + 1;

mysqli_query($conn,"INSERT INTO koordinat(trayek_id,latitude,longitude,urutan)
VALUES('$id','$lat','$lng','$urut')");
?>