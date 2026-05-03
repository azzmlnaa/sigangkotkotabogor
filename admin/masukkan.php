<?php
session_start();

include "../config/koneksi.php";

if(!isset($_SESSION['admin'])){
    header("location:login.php");
    exit;
}

/* TOTAL */
$totalMasukkan = mysqli_num_rows(
mysqli_query($conn,"
SELECT * FROM masukkan
")
);

$totalKritik = mysqli_num_rows(
mysqli_query($conn,"
SELECT * FROM masukkan
WHERE jenis='Kritik'
")
);

$totalSaran = mysqli_num_rows(
mysqli_query($conn,"
SELECT * FROM masukkan
WHERE jenis='Saran'
")
);

?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width,
initial-scale=1">

<title>Masukkan Pengguna</title>

<!-- Bootstrap -->
<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

<!-- Bootstrap Icons -->
<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<style>

/* FONT */
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'Inter',sans-serif;

    background:#f1f5f9;

    color:#0f172a;
}

/* HEADER */
.topbar{
    background:white;

    padding:22px;

    border-bottom-left-radius:30px;
    border-bottom-right-radius:30px;

    box-shadow:
    0 10px 30px rgba(15,23,42,.05);

    margin-bottom:24px;
}

/* TITLE */
.page-title{
    font-size:26px;
    font-weight:700;
}

.page-subtitle{
    color:#64748b;
    font-size:14px;
}

/* CARD */
.stat-card{
    border:none;

    border-radius:28px;

    padding:24px;

    color:white;

    position:relative;

    overflow:hidden;

    min-height:150px;

    box-shadow:
    0 15px 35px rgba(0,0,0,.08);
}

.stat-card::before{
    content:'';

    position:absolute;

    width:140px;
    height:140px;

    border-radius:50%;

    background:rgba(255,255,255,.10);

    right:-40px;
    top:-40px;
}

/* COLORS */
.blue{
    background:
    linear-gradient(
    135deg,
    #2563eb,
    #1d4ed8
    );
}

.green{
    background:
    linear-gradient(
    135deg,
    #16a34a,
    #15803d
    );
}

.red{
    background:
    linear-gradient(
    135deg,
    #ef4444,
    #dc2626
    );
}

/* ICON */
.stat-icon{
    width:65px;
    height:65px;

    border-radius:22px;

    background:rgba(255,255,255,.15);

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:28px;

    margin-bottom:18px;
}

/* STAT */
.stat-number{
    font-size:34px;
    font-weight:700;
}

.stat-label{
    opacity:.9;
    font-size:14px;
}

/* TABLE CARD */
.table-card{
    background:white;

    border-radius:30px;

    padding:24px;

    box-shadow:
    0 12px 35px rgba(15,23,42,.06);

    margin-top:24px;
}

/* TABLE */
.table{
    margin:0;
}

.table thead th{
    background:#eff6ff !important;

    color:#1d4ed8;

    border:none;

    padding:16px;

    font-size:14px;
}

.table tbody td{
    padding:16px;

    vertical-align:middle;

    border-color:#f1f5f9;
}

/* USER */
.user-box{
    display:flex;
    align-items:center;
    gap:12px;
}

.user-avatar{
    width:48px;
    height:48px;

    border-radius:16px;

    background:
    linear-gradient(
    135deg,
    #2563eb,
    #1d4ed8
    );

    color:white;

    display:flex;
    align-items:center;
    justify-content:center;

    font-weight:700;
}

/* EMAIL */
.email-text{
    font-size:13px;
    color:#64748b;
}

/* BADGE */
.custom-badge{
    padding:8px 14px;

    border-radius:12px;

    font-size:13px;
    font-weight:600;
}

.badge-danger{
    background:#fee2e2;
    color:#dc2626;
}

.badge-success{
    background:#dcfce7;
    color:#15803d;
}

.badge-warning{
    background:#fef3c7;
    color:#d97706;
}

/* MESSAGE */
.message-box{
    background:#f8fafc;

    border-radius:16px;

    padding:14px;

    font-size:14px;

    line-height:1.7;

    color:#334155;
}

/* BUTTON */
.btn-delete{
    border:none;

    background:#ef4444;

    color:white;

    padding:10px 14px;

    border-radius:14px;

    font-size:13px;
    font-weight:600;

    display:flex;
    align-items:center;
    gap:6px;

    transition:.25s;
}

.btn-delete:hover{
    transform:translateY(-2px);

    background:#dc2626;
}

/* BACK */
.back-btn{
    border-radius:16px;

    padding:10px 18px;

    font-weight:600;
}

/* EMPTY */
.empty-box{
    text-align:center;

    padding:50px 20px;

    color:#94a3b8;
}

/* MOBILE */
@media(max-width:768px){

.page-title{
    font-size:22px;
}

.stat-number{
    font-size:28px;
}

.table-card{
    overflow-x:auto;
}

}

</style>

</head>

<body>

<!-- HEADER -->
<div class="topbar">

<div class="container">

<div class="d-flex
justify-content-between
align-items-center">

    <div>

        <div class="page-title">
            Masukkan Pengguna
        </div>

        <div class="page-subtitle">
            Kritik dan saran dari pengguna aplikasi
        </div>

    </div>

    <a href="dashboard.php"
    class="btn btn-secondary back-btn">

        <i class="bi bi-arrow-left"></i>

        Kembali

    </a>

</div>

</div>
</div>

<div class="container">

<!-- STAT -->
<div class="row g-4">

    <!-- TOTAL -->
    <div class="col-md-4">

        <div class="stat-card blue">

            <div class="stat-icon">
                <i class="bi bi-chat-dots-fill"></i>
            </div>

            <div class="stat-number">
                <?= $totalMasukkan ?>
            </div>

            <div class="stat-label">
                Total Masukkan
            </div>

        </div>

    </div>

    <!-- KRITIK -->
    <div class="col-md-4">

        <div class="stat-card red">

            <div class="stat-icon">
                <i class="bi bi-exclamation-circle-fill"></i>
            </div>

            <div class="stat-number">
                <?= $totalKritik ?>
            </div>

            <div class="stat-label">
                Kritik Pengguna
            </div>

        </div>

    </div>

    <!-- SARAN -->
    <div class="col-md-4">

        <div class="stat-card green">

            <div class="stat-icon">
                <i class="bi bi-lightbulb-fill"></i>
            </div>

            <div class="stat-number">
                <?= $totalSaran ?>
            </div>

            <div class="stat-label">
                Saran Pengguna
            </div>

        </div>

    </div>

</div>

<!-- TABLE -->
<div class="table-card">

<div class="d-flex
justify-content-between
align-items-center
mb-4">

    <h5 class="fw-bold mb-0">
        Data Masukkan Pengguna
    </h5>

    <span class="text-muted">
        <?= $totalMasukkan ?> data
    </span>

</div>

<?php

$q = mysqli_query($conn,"
SELECT * FROM masukkan
ORDER BY id DESC
");

if(mysqli_num_rows($q)>0){

?>

<div class="table-responsive">

<table class="table align-middle">

<thead>

<tr>

    <th width="70">
        No
    </th>

    <th width="250">
        Pengguna
    </th>

    <th width="140">
        Jenis
    </th>

    <th>
        Pesan
    </th>

    <th width="180">
        Tanggal
    </th>

    <th width="120">
        Aksi
    </th>

</tr>

</thead>

<tbody>

<?php

$no = 1;

while($d = mysqli_fetch_array($q)){

?>

<tr>

    <td>
        <?= $no++; ?>
    </td>

    <!-- USER -->
    <td>

        <div class="user-box">

            <div class="user-avatar">

                <?= strtoupper(substr($d['nama'],0,1)); ?>

            </div>

            <div>

                <div class="fw-semibold">
                    <?= $d['nama']; ?>
                </div>

                <div class="email-text">
                    <?= $d['email']; ?>
                </div>

            </div>

        </div>

    </td>

    <!-- JENIS -->
    <td>

        <?php

        if($d['jenis']=="Kritik"){

            echo "
            <span class='custom-badge badge-danger'>
            Kritik
            </span>
            ";

        }

        elseif($d['jenis']=="Saran"){

            echo "
            <span class='custom-badge badge-success'>
            Saran
            </span>
            ";

        }

        else{

            echo "
            <span class='custom-badge badge-warning'>
            Laporan
            </span>
            ";

        }

        ?>

    </td>

    <!-- PESAN -->
    <td>

        <div class="message-box">

            <?= $d['pesan']; ?>

        </div>

    </td>

    <!-- TANGGAL -->
    <td>

        <?= date(
        'd M Y H:i',
        strtotime($d['tanggal'])
        ); ?>

    </td>

    <!-- AKSI -->
    <td>

        <a href="
        hapus_masukkan.php?id=<?= $d['id']; ?>
        "

        class="btn-delete text-decoration-none"

        onclick="
        return confirm(
        'Yakin ingin menghapus data ini?'
        )
        ">

            <i class="bi bi-trash-fill"></i>

            Hapus

        </a>

    </td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

<?php }else{ ?>

<div class="empty-box">

    <i class="bi bi-chat-square-text"
    style="
    font-size:60px;
    margin-bottom:14px;
    display:block;
    "></i>

    <h5>
        Belum Ada Masukkan
    </h5>

    <p>
        Kritik dan saran pengguna akan muncul di sini.
    </p>

</div>

<?php } ?>

</div>

</div>

</body>
</html>