<?php
session_start();

include "../config/koneksi.php";

if(isset($_POST['login'])){

$user = $_POST['username'];
$pass = $_POST['password'];

$q = mysqli_query($conn,"
SELECT * FROM admin
WHERE username='$user'
AND password='$pass'
");

if(mysqli_num_rows($q)>0){

$_SESSION['admin'] = true;

header("location:dashboard.php");

}else{

$error = "Username atau password salah";

}

}
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width,
initial-scale=1">

<title>Login Admin</title>

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

    min-height:100vh;

    background:
    linear-gradient(
    135deg,
    #2563eb,
    #1d4ed8
    );

    display:flex;
    justify-content:center;
    align-items:center;

    overflow:hidden;

    position:relative;
}

/* BG BLUR */
.bg-circle{
    position:absolute;

    border-radius:50%;

    background:rgba(255,255,255,.08);

    filter:blur(10px);
}

.circle1{
    width:250px;
    height:250px;

    top:-60px;
    left:-60px;
}

.circle2{
    width:300px;
    height:300px;

    bottom:-100px;
    right:-100px;
}

/* LOGIN CARD */
.login-card{
    width:92%;
    max-width:420px;

    background:rgba(255,255,255,.95);

    backdrop-filter:blur(20px);

    border-radius:34px;

    padding:32px 28px;

    box-shadow:
    0 20px 50px rgba(0,0,0,.18);

    position:relative;
    z-index:10;

    animation:fadeUp .6s ease;
}

/* ANIMATION */
@keyframes fadeUp{

from{
    opacity:0;
    transform:translateY(20px);
}

to{
    opacity:1;
    transform:translateY(0);
}

}

/* LOGO */
.logo-box{
    width:90px;
    height:90px;

    margin:auto;
    margin-bottom:20px;

    border-radius:28px;

    background:
    linear-gradient(
    135deg,
    #2563eb,
    #1d4ed8
    );

    display:flex;
    align-items:center;
    justify-content:center;

    color:white;

    font-size:38px;

    box-shadow:
    0 15px 35px rgba(37,99,235,.30);
}

/* TITLE */
.title{
    text-align:center;

    font-size:28px;
    font-weight:700;

    color:#0f172a;

    margin-bottom:8px;
}

.subtitle{
    text-align:center;

    color:#64748b;

    font-size:14px;

    margin-bottom:28px;
}

/* ALERT */
.alert{
    border:none;

    border-radius:18px;

    font-size:14px;
}

/* INPUT */
.input-group{
    margin-bottom:18px;
}

.input-group-text{
    border:none;

    background:#f1f5f9;

    border-radius:18px 0 0 18px;

    padding:16px;

    color:#64748b;
}

.form-control{
    border:none;

    background:#f1f5f9;

    height:56px;

    border-radius:0 18px 18px 0;

    font-size:14px;

    box-shadow:none !important;
}

.form-control:focus{
    background:#eff6ff;
}

/* BUTTON */
.login-btn{
    width:100%;
    height:58px;

    border:none;

    border-radius:20px;

    background:
    linear-gradient(
    135deg,
    #2563eb,
    #1d4ed8
    );

    color:white;

    font-size:15px;
    font-weight:700;

    margin-top:10px;

    transition:.25s;

    box-shadow:
    0 15px 35px rgba(37,99,235,.25);
}

.login-btn:hover{
    transform:translateY(-2px);
}

.login-btn:active{
    transform:scale(.98);
}

/* FOOTER */
.footer-text{
    text-align:center;

    margin-top:24px;

    color:#94a3b8;

    font-size:13px;
}

/* LOADING */
.spinner-border{
    width:20px;
    height:20px;
}

</style>

</head>

<body>

<!-- BG -->
<div class="bg-circle circle1"></div>
<div class="bg-circle circle2"></div>

<!-- CARD -->
<div class="login-card">

    <!-- LOGO -->
    <div class="logo-box">
        <i class="bi bi-shield-lock-fill"></i>
    </div>

    <!-- TITLE -->
    <div class="title">
        Login Admin
    </div>

    <div class="subtitle">
        SIG Trayek Angkot Kota Bogor
    </div>

    <!-- ERROR -->
    <?php if(isset($error)){ ?>

    <div class="alert alert-danger">
        <i class="bi bi-exclamation-circle-fill"></i>
        <?= $error ?>
    </div>

    <?php } ?>

    <!-- FORM -->
    <form method="POST" id="loginForm">

        <!-- USERNAME -->
        <div class="input-group">

            <span class="input-group-text">
                <i class="bi bi-person-fill"></i>
            </span>

            <input type="text"
            name="username"
            class="form-control"
            placeholder="Masukkan username"
            required>

        </div>

        <!-- PASSWORD -->
        <div class="input-group">

            <span class="input-group-text">
                <i class="bi bi-lock-fill"></i>
            </span>

            <input type="password"
            name="password"
            id="password"
            class="form-control"
            placeholder="Masukkan password"
            required>

        </div>

        <!-- SHOW PASSWORD -->
        <div class="form-check mb-3">

            <input class="form-check-input"
            type="checkbox"
            id="showPassword">

            <label class="form-check-label"
            for="showPassword">

                Tampilkan Password

            </label>

        </div>

        <!-- BUTTON -->
        <button type="submit"
        name="login"
        class="login-btn"
        id="loginButton">

            <span id="btnText">
                Login Sekarang
            </span>

        </button>

    </form>

    <!-- FOOTER -->
    <div class="footer-text">
        © 2026 SIG Angkot Bogor
    </div>

</div>

<script>

/* SHOW PASSWORD */
document.getElementById("showPassword")
.addEventListener("change", function(){

const password =
document.getElementById("password");

if(this.checked){

password.type = "text";

}else{

password.type = "password";

}

});

/* LOADING BUTTON */
document.getElementById("loginForm")
.addEventListener("submit", function(){

document.getElementById("btnText")
.innerHTML = `
<span class="spinner-border spinner-border-sm"></span>
 Memproses...
`;

});

</script>

</body>
</html>