<?php
include "../config/koneksi.php";

$id = $_GET['id'];
$data = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM trayek WHERE id='$id'"));

if(isset($_POST['update'])){

mysqli_query($conn,"UPDATE trayek SET
kode='$_POST[kode]',
nama='$_POST[nama]',
asal='$_POST[asal]',
tujuan='$_POST[tujuan]',
warna='$_POST[warna]'
WHERE id='$id'");

header("location:dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Trayek</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
<div class="container mt-4">

<h3>Edit Trayek</h3>

<form method="post">

<input type="text" name="kode" value="<?= $data['kode'] ?>" class="form-control mb-2">

<input type="text" name="nama" value="<?= $data['nama'] ?>" class="form-control mb-2">

<input type="text" name="asal" value="<?= $data['asal'] ?>" class="form-control mb-2">

<input type="text" name="tujuan" value="<?= $data['tujuan'] ?>" class="form-control mb-2">

<input type="text" name="warna" value="<?= $data['warna'] ?>" class="form-control mb-2">

<button name="update" class="btn btn-primary">Update</button>

<a href="dashboard.php" class="btn btn-secondary">Kembali</a>

</form>

</div>
</body>
</html>