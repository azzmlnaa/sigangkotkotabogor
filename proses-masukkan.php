<?php

include "config/koneksi.php";

$nama   = $_POST['nama'];
$email  = $_POST['email'];
$jenis  = $_POST['jenis'];
$pesan  = $_POST['pesan'];

mysqli_query($conn,"
INSERT INTO masukkan
(
nama,
email,
jenis,
pesan
)

VALUES
(
'$nama',
'$email',
'$jenis',
'$pesan'
)
");

?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width,
initial-scale=1">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

<style>

body{
    background:#f1f5f9;
    font-family:Arial;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

.card-box{
    background:white;
    padding:30px;
    border-radius:24px;
    text-align:center;
    width:90%;
    max-width:400px;

    box-shadow:
    0 15px 40px rgba(0,0,0,.08);
}

.success-icon{
    font-size:60px;
    margin-bottom:20px;
}

.btn-home{
    background:#2563eb;
    color:white;
    padding:12px 20px;
    border-radius:14px;
    text-decoration:none;
    display:inline-block;
    margin-top:20px;
}

</style>

</head>

<body>

<div class="card-box">

    <div class="success-icon">
        ✅
    </div>

    <h4 class="fw-bold">
        Masukkan Berhasil Dikirim
    </h4>

    <p class="text-muted">
        Terima kasih atas kritik dan saran Anda.
    </p>

    <a href="index.php" class="btn-home">
        Kembali ke Dashboard
    </a>

</div>

</body>
</html>