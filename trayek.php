<?php
include "config/koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($conn,"SELECT * FROM koordinat 
WHERE trayek_id='$id'
ORDER BY urutan ASC");

$result = [];

while($d=mysqli_fetch_assoc($data)){
$result[]=$d;
}

echo json_encode($result);
?>