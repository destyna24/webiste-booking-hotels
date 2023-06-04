<?php 
include('connection.php');
if(!$_SESSION['login']) {
    header("location: signin.php");
}
$statement = oci_parse($connection, "SELECT * FROM TB_ADMIN WHERE ID_ADMIN = ".$_GET['id']);
oci_execute($statement);
while($row = oci_fetch_array($statement)){
    $id_admin = $row['ID_ADMIN'];
    $username1 = $row['USERNAME'];
    $password1 = $row['PASSWORD'];

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head_admin.php'); ?>
</head>
<body>
    <div class="container" style="margin-top: 100px; margin-bottom: 100px;">
        <div class="pt-5">
            <h3 class="text-center" ><b style="font-size: 3vw;" >Ubah Profil Admin</b></h3>
            <?php if(!empty($_SESSION['message'])) {
                echo $_SESSION['message'];
                $_SESSION['message'] = null;
            } ?>
        </div>
        <div class="container" >
            <div class="row-center" style="margin-top: 80px;" align="center" >
                <div class="card-center" style="width: 6rem;" >
                    <img src="./img/profil.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text"style="font-size: 1.5vw;">Admin</p>
                        </div>
                </div>
            </div>
        <div class="card mt-5">
            <form method="POST" action="ubah_proses_profil_admin.php" >
            
            <div class="row" >
                <div class="col-12 col-sm-12 col-md-12" >
                  <div class="card text-left">
                    <div class="card-header bg-dark">
                      <h6 style="color: #F6F1E3; font-size: 1.5vw;" >Profil Anda</h6>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-row">
                                <div class="col-12 col-sm-12 col-md-6">
                                    <div class="form-group ">
                                        <label for="exampleInputEmail">ID ADMIN</label>
                                        <input style="font-size: 1.5vw;" type="number" name="id_admin" id="id_admin" class="form-control" placeholder="Masukkan ID ADMIN..." value="<?php echo $id_admin; ?>" required>
                                        <input type="hidden" name="id_admin" id="id_admin" value="<?php echo $id_admin; ?>" >
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6">
                                    <div class="form-group ">
                                        <label for="inputUsername">Username</label>
                                        <input type="username" class="form-control" style="font-size: 1.2vw;" id="username1" name="username1" placeholder="Username" value="<?php echo $username1; ?>" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="inputPassword4">Password</label>
                                        <input type="password" class="form-control" style="font-size: 1.2vw;" id="password1" name="password1" placeholder="Password" value="<?php echo $password1; ?>" required>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                        <div class="card-footer text-right">
                            <button style="font-size: 1.5vw;" type="button" class="btn btn-danger" onclick="history.back()">Batal</button>
                            <input style="font-size: 1.5vw;"type="submit" name="submit" class="btn btn-succes" value="SIMPAN" onclick="return confirm('Apakah anda yakin?')"/>
                        </div>
                    </div>
                </div>  
            </div>
        </div> 
        <div style="margin-top: 100px;">
    </div>
    </div> 
    </div> 
<?php include_once('footer.php'); ?>
</body>
</html>