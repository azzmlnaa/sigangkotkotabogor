<?php
include "../config/koneksi.php";

$id=$_GET['id'];

mysqli_query($conn,"DELETE FROM koordinat WHERE trayek_id='$id'");
?>