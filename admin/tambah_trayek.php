<?php
include "../config/koneksi.php";

if(isset($_POST['simpan'])){

mysqli_query($conn,"INSERT INTO trayek(kode,nama,asal,tujuan,warna)
VALUES(
'$_POST[kode]',
'$_POST[nama]',
'$_POST[asal]',
'$_POST[tujuan]',
'$_POST[warna]'
)");

header("location:dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Tambah Trayek</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>

<div class="container mt-4">

<h3>Tambah Trayek</h3>

<form method="post">

<input type="text" name="kode" class="form-control mb-2" placeholder="Kode">

<input type="text" name="nama" class="form-control mb-2" placeholder="Nama">

<input type="text" name="asal" class="form-control mb-2" placeholder="Asal">

<input type="text" name="tujuan" class="form-control mb-2" placeholder="Tujuan">

<input type="text" name="warna" class="form-control mb-2" placeholder="Warna">

<button name="simpan" class="btn btn-primary">
Simpan
</button>

</form>

</div>
</body>
</html>