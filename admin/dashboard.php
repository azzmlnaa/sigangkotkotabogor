<?php
session_start();
include "../config/koneksi.php";

if(!isset($_SESSION['admin'])){
    header("location:login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dashboard Admin</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

<style>
body{
    background:#f5f7fa;
}

.card-box{
    background:white;
    border-radius:15px;
    padding:20px;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
}

.table td, .table th{
    vertical-align:middle;
}
</style>

</head>

<body>

<div class="container mt-4">

<div class="card-box">

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-0">Dashboard Admin</h2>

    <div>
        <a href="tambah_trayek.php" class="btn btn-success">
            + Tambah Trayek
        </a>

        <a href="logout.php" class="btn btn-danger">
            Logout
        </a>
    </div>
</div>

<table class="table table-bordered table-hover">

<tr class="table-primary">
    <th width="60">No</th>
    <th width="100">Kode</th>
    <th>Nama Trayek</th>
    <th width="280">Aksi</th>
</tr>

<?php
$no = 1;
$q = mysqli_query($conn,"SELECT * FROM trayek ORDER BY id DESC");

while($d = mysqli_fetch_array($q)){
?>

<tr>
    <td><?= $no++ ?></td>
    <td><?= $d['kode'] ?></td>
    <td><?= $d['nama'] ?></td>
    <td>

        <a href="edit_trayek.php?id=<?= $d['id'] ?>" class="btn btn-warning btn-sm">
            Edit
        </a>

        <a href="koordinat.php?id=<?= $d['id'] ?>" class="btn btn-info btn-sm">
            Jalur
        </a>

        <a href="hapus_trayek.php?id=<?= $d['id'] ?>"
           class="btn btn-danger btn-sm"
           onclick="return confirm('Yakin hapus data ini?')">
           Hapus
        </a>

    </td>
</tr>

<?php } ?>

</table>

</div>
</div>

</body>
</html>