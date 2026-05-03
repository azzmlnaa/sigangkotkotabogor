<?php
session_start();

include "../config/koneksi.php";

if(!isset($_SESSION['admin'])){
    header("location:login.php");
    exit;
}

/* TOTAL DATA */
$totalTrayek = mysqli_num_rows(
mysqli_query($conn,"
SELECT * FROM trayek
")
);

$totalMasukkan = mysqli_num_rows(
mysqli_query($conn,"
SELECT * FROM masukkan
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

<title>Dashboard Admin</title>

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

    padding:20px;

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

/* CARD COLORS */
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

/* ACTION CARD */
.action-card{
    background:white;

    border-radius:28px;

    padding:22px;

    box-shadow:
    0 12px 35px rgba(15,23,42,.06);

    margin-top:24px;
}

/* BUTTON */
.btn-modern{
    border:none;

    border-radius:18px;

    padding:14px 18px;

    font-weight:600;

    width:100%;

    display:flex;
    align-items:center;
    justify-content:center;

    gap:10px;

    margin-bottom:14px;

    transition:.25s;
}

.btn-modern:hover{
    transform:translateY(-2px);
}

/* TABLE CARD */
.table-card{
    background:white;

    border-radius:28px;

    padding:22px;

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

    font-size:14px;

    padding:16px;
}

.table tbody td{
    padding:16px;

    vertical-align:middle;

    border-color:#f1f5f9;
}

/* BADGE */
.route-badge{
    background:#dbeafe;

    color:#1d4ed8;

    padding:8px 12px;

    border-radius:12px;

    font-size:13px;
    font-weight:600;
}

/* ACTION BUTTON */
.btn-action{
    border:none;

    padding:10px 14px;

    border-radius:12px;

    color:white;

    font-size:13px;

    text-decoration:none;

    margin-right:5px;

    display:inline-flex;
    align-items:center;
    gap:6px;
}

.edit{
    background:#f59e0b;
}

.route{
    background:#0ea5e9;
}

.delete{
    background:#ef4444;
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
                Dashboard Admin
            </div>

            <div class="page-subtitle">
                SIG Trayek Angkot Kota Bogor
            </div>

        </div>

        <a href="logout.php"
        class="btn btn-danger rounded-pill px-4">

            <i class="bi bi-box-arrow-right"></i>
            Logout

        </a>

    </div>

</div>
</div>

<div class="container">

<!-- STAT -->
<div class="row g-4">

    <!-- TRAYEK -->
    <div class="col-md-6">

        <div class="stat-card blue">

            <div class="stat-icon">
                <i class="bi bi-map-fill"></i>
            </div>

            <div class="stat-number">
                <?= $totalTrayek ?>
            </div>

            <div class="stat-label">
                Total Trayek Angkot
            </div>

        </div>

    </div>

    <!-- MASUKKAN -->
    <div class="col-md-6">

        <div class="stat-card green">

            <div class="stat-icon">
                <i class="bi bi-chat-dots-fill"></i>
            </div>

            <div class="stat-number">
                <?= $totalMasukkan ?>
            </div>

            <div class="stat-label">
                Total Masukkan Pengguna
            </div>

        </div>

    </div>

</div>

<!-- ACTION -->
<div class="action-card">

    <h5 class="fw-bold mb-4">
        Menu Admin
    </h5>

    <div class="row">

        <div class="col-md-6">

            <a href="tambah_trayek.php"
            class="btn-modern btn btn-success">

                <i class="bi bi-plus-circle-fill"></i>

                Tambah Trayek

            </a>

        </div>

        <div class="col-md-6">

            <a href="masukkan.php"
            class="btn-modern btn btn-primary">

                <i class="bi bi-chat-left-text-fill"></i>

                Masukkan Pengguna

            </a>

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
            Data Trayek
        </h5>

        <span class="text-muted">
            <?= $totalTrayek ?> trayek
        </span>

    </div>

    <div class="table-responsive">

        <table class="table align-middle">

            <thead>

            <tr>

                <th width="70">
                    No
                </th>

                <th width="120">
                    Kode
                </th>

                <th>
                    Nama Trayek
                </th>

                <th width="320">
                    Aksi
                </th>

            </tr>

            </thead>

            <tbody>

            <?php

            $no = 1;

            $q = mysqli_query($conn,"
            SELECT * FROM trayek
            ORDER BY id DESC
            ");

            while($d = mysqli_fetch_array($q)){

            ?>

            <tr>

                <td>
                    <?= $no++ ?>
                </td>

                <td>

                    <span class="route-badge">
                        <?= $d['kode'] ?>
                    </span>

                </td>

                <td>
                    <?= $d['nama'] ?>
                </td>

                <td>

                    <a href="
                    edit_trayek.php?id=<?= $d['id'] ?>
                    "
                    class="btn-action edit">

                        <i class="bi bi-pencil-fill"></i>

                        Edit

                    </a>

                    <a href="
                    koordinat.php?id=<?= $d['id'] ?>
                    "
                    class="btn-action route">

                        <i class="bi bi-geo-alt-fill"></i>

                        Jalur

                    </a>

                    <a href="
                    hapus_trayek.php?id=<?= $d['id'] ?>
                    "
                    class="btn-action delete"

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

</div>

</div>

</body>
</html>