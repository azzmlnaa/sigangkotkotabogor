<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width,
initial-scale=1,
maximum-scale=1,
user-scalable=no">

<title>Tentang Aplikasi</title>

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

    min-height:100vh;

    padding:20px;
}

/* CONTAINER */
.about-container{
    max-width:520px;
    margin:auto;
}

/* HEADER */
.top-header{
    display:flex;
    align-items:center;
    gap:14px;

    margin-bottom:24px;
}

/* BACK */
.back-btn{
    width:50px;
    height:50px;

    border-radius:18px;

    background:white;

    display:flex;
    align-items:center;
    justify-content:center;

    text-decoration:none;

    color:#0f172a;

    font-size:20px;

    box-shadow:
    0 10px 25px rgba(15,23,42,.08);
}

/* TITLE */
.page-title{
    font-size:22px;
    font-weight:700;
    color:#0f172a;
}

.top-header small{
    color:#64748b;
}

/* HERO */
.hero-card{
    background:
    linear-gradient(
    135deg,
    #2563eb,
    #1d4ed8
    );

    color:white;

    border-radius:34px;

    padding:30px;

    margin-bottom:24px;

    box-shadow:
    0 20px 40px rgba(37,99,235,.25);

    position:relative;

    overflow:hidden;
}

.hero-card::before{
    content:'';

    position:absolute;

    width:180px;
    height:180px;

    border-radius:50%;

    background:rgba(255,255,255,.10);

    right:-60px;
    top:-60px;
}

/* LOGO */
.hero-icon{
    width:80px;
    height:80px;

    border-radius:28px;

    background:rgba(255,255,255,.15);

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:34px;

    margin-bottom:22px;
}

.hero-card h3{
    font-weight:700;
    margin-bottom:10px;
}

.hero-card p{
    font-size:14px;
    line-height:1.8;

    opacity:.95;
}

/* INFO CARD */
.info-card{
    background:white;

    border-radius:28px;

    padding:22px;

    margin-bottom:18px;

    box-shadow:
    0 12px 35px rgba(15,23,42,.05);
}

/* INFO HEADER */
.info-header{
    display:flex;
    align-items:center;

    gap:14px;

    margin-bottom:16px;
}

/* ICON */
.info-icon{
    width:58px;
    height:58px;

    border-radius:20px;

    display:flex;
    align-items:center;
    justify-content:center;

    color:white;

    font-size:24px;
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

.orange{
    background:
    linear-gradient(
    135deg,
    #f59e0b,
    #d97706
    );
}

.purple{
    background:
    linear-gradient(
    135deg,
    #9333ea,
    #7e22ce
    );
}

/* TEXT */
.info-title{
    font-size:17px;
    font-weight:700;

    color:#0f172a;
}

.info-card p{
    font-size:14px;

    color:#64748b;

    line-height:1.8;

    margin:0;
}

/* LIST */
.feature-list{
    list-style:none;

    padding:0;

    margin-top:12px;
}

.feature-list li{
    display:flex;

    gap:10px;

    margin-bottom:12px;

    font-size:14px;

    color:#475569;
}

.feature-list i{
    color:#2563eb;
}

/* FOOTER */
.footer-box{
    margin-top:28px;

    background:#ffffff;

    border-radius:24px;

    padding:20px;

    text-align:center;

    box-shadow:
    0 10px 30px rgba(15,23,42,.05);
}

.footer-box h6{
    font-weight:700;
    margin-bottom:8px;
}

.footer-box p{
    font-size:13px;

    color:#64748b;

    margin:0;
}

/* VERSION */
.version-badge{
    display:inline-block;

    margin-top:12px;

    background:#dbeafe;

    color:#1d4ed8;

    padding:8px 14px;

    border-radius:14px;

    font-size:13px;
    font-weight:600;
}

</style>

</head>

<body>

<div class="about-container">

    <!-- HEADER -->
    <div class="top-header">

        <a href="index.php" class="back-btn">
            <i class="bi bi-arrow-left"></i>
        </a>

        <div>

            <div class="page-title">
                Tentang Aplikasi
            </div>

            <small>
                Informasi sistem SIG Angkot Bogor
            </small>

        </div>

    </div>

    <!-- HERO -->
    <div class="hero-card">

        <div class="hero-icon">
            <i class="bi bi-bus-front-fill"></i>
        </div>

        <h3>
            SIG Trayek Angkot Bogor
        </h3>

        <p>
            Sistem Informasi Geografis berbasis web mobile
            yang dirancang untuk membantu masyarakat
            mengetahui informasi trayek angkot
            Kota Bogor secara realtime menggunakan
            teknologi GPS dan peta digital.
        </p>

    </div>

    <!-- TUJUAN -->
    <div class="info-card">

        <div class="info-header">

            <div class="info-icon blue">
                <i class="bi bi-bullseye"></i>
            </div>

            <div class="info-title">
                Tujuan Sistem
            </div>

        </div>

        <p>
            Mempermudah masyarakat dalam mencari
            informasi trayek angkot, rute perjalanan,
            serta navigasi menuju jalur angkot
            secara cepat dan efisien.
        </p>

    </div>

    <!-- FITUR -->
    <div class="info-card">

        <div class="info-header">

            <div class="info-icon green">
                <i class="bi bi-stars"></i>
            </div>

            <div class="info-title">
                Fitur Utama
            </div>

        </div>

        <ul class="feature-list">

            <li>
                <i class="bi bi-check-circle-fill"></i>
                Menampilkan seluruh trayek angkot Bogor
            </li>

            <li>
                <i class="bi bi-check-circle-fill"></i>
                Navigasi realtime berbasis GPS
            </li>

            <li>
                <i class="bi bi-check-circle-fill"></i>
                Informasi detail rute angkot
            </li>

            <li>
                <i class="bi bi-check-circle-fill"></i>
                Tracking lokasi pengguna realtime
            </li>

            <li>
                <i class="bi bi-check-circle-fill"></i>
                Sistem masukkan pengguna
            </li>

        </ul>

    </div>

    <!-- TEKNOLOGI -->
    <div class="info-card">

        <div class="info-header">

            <div class="info-icon orange">
                <i class="bi bi-cpu-fill"></i>
            </div>

            <div class="info-title">
                Teknologi Sistem
            </div>

        </div>

        <p>
            Aplikasi dibangun menggunakan
            PHP Native, MySQL Database,
            Bootstrap 5, Leaflet JS,
            OpenStreetMap, dan Geolocation API
            untuk menampilkan data geografis
            secara realtime.
        </p>

    </div>

    <!-- PENELITIAN -->
    <div class="info-card">

        <div class="info-header">

            <div class="info-icon purple">
                <i class="bi bi-mortarboard-fill"></i>
            </div>

            <div class="info-title">
                Informasi Penelitian
            </div>

        </div>

        <p>
            Aplikasi ini dibuat sebagai
            proyek penelitian skripsi
            Program Studi Informatika
            STIKOM El Rahma
            mengenai Sistem Informasi Geografis
            trayek angkot Kota Bogor.
        </p>

    </div>

    <!-- FOOTER -->
    <div class="footer-box">

        <h6>
            Dibuat Oleh
        </h6>

        <p>
            Aziz Maulana
        </p>

        <div class="version-badge">
            Version 1.0
        </div>

    </div>

</div>

</body>
</html>