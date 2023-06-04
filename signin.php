<?php 
include("connection.php");
if(isset($_SESSION['login'])) {
    header("location: index.php");
}
$pesan = NULL;
if(isset($_GET['pesan'])) {
    if($_GET['pesan']=="gagal"){
        $pesan = '<div class="alert alert-danger" role="alert">Login Gagal! Username atau Password Salah!</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php'); ?>
    <link rel="stylesheet" type="text/css" href="./assets/custom/signin.css">
</head>
<body class="text-center">
    <form class="form-signin" method="POST" action="signin_proses.php">
        <?php echo $pesan; ?>
        <img class="mb-4" src="./img/dominic.jpg" alt="" width="120" height="50">
        <h1 class="h3 mb-3 font-weight-normal" style="font-size: 3vw;">Please sign in</h1>
        <label for="inputUsername" class="sr-only">Username</label>
        <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Username...">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="password..."> <br>
        <input type="submit" name="login" value="login" class="btn border-dark bg-dark" style="font-size: 1.5vw; background-size: 1.2vw; color: #F6F1E3;" placeholder="password...">
        <p style="font-size: 2vw;">Belum punya akun? <a href="daftar_cust.php">Register</a></p>
        <p class="mt-5 mb-3 text-muted">&copy;Dominic_Hotels 2021</p>

    </form>
</body>
</html>
