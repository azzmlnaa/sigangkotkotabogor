<?php
session_start();
include "../config/koneksi.php";

/* Cek login admin */
if(!isset($_SESSION['admin'])){
    header("location:login.php");
    exit;
}

/* Validasi id */
if(!isset($_GET['id']) || empty($_GET['id'])){
    header("location:dashboard.php");
    exit;
}

$id = (int) $_GET['id'];

/* Hapus koordinat jalur dulu */
mysqli_query($conn, "DELETE FROM koordinat WHERE trayek_id='$id'");

/* Hapus data trayek */
mysqli_query($conn, "DELETE FROM trayek WHERE id='$id'");

/* Kembali ke dashboard */
header("location:dashboard.php");
exit;
?>