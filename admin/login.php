<?php
session_start();
include "../config/koneksi.php";

if(isset($_POST['login'])){

$user = $_POST['username'];
$pass = $_POST['password'];

$q = mysqli_query($conn,"SELECT * FROM admin
WHERE username='$user' AND password='$pass'");

if(mysqli_num_rows($q)>0){
$_SESSION['admin']=true;
header("location:dashboard.php");
}else{
$error="Login gagal";
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login Admin</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">

<div class="container mt-5">
<div class="row justify-content-center">
<div class="col-md-4">

<div class="card shadow">
<div class="card-body">

<h3 class="text-center mb-4">Login Admin</h3>

<?php if(isset($error)){ ?>
<div class="alert alert-danger"><?= $error ?></div>
<?php } ?>

<form method="post">

<input type="text" name="username" class="form-control mb-3" placeholder="Username">

<input type="password" name="password" class="form-control mb-3" placeholder="Password">

<button name="login" class="btn btn-primary w-100">
Login
</button>

</form>

</div>
</div>

</div>
</div>
</div>

</body>
</html>