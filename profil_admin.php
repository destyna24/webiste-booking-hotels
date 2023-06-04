<?php 

include('connection.php');
if (!$_SESSION['login']){
    header("location: signin.php");
}
$statement = oci_parse($connection, "SELECT * FROM TB_ADMIN WHERE ID_ADMIN = ".$_GET['id']);
oci_execute($statement);
while($row = oci_fetch_array($statement)) {
    $username1 = $row['USERNAME'];
    $password1 = $row['PASSWORD']; 
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head_admin.php') ?>
</head>
<body>
        <div class="container" >
            <div class="row-center" style="margin-top: 80px;" align="center" >
                <div class="card-center" style="width: 6rem;" >
                    <img src="./img/profil.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text"style="font-size: 1.5vw;">Admin</p>
                        </div>
                </div>
            </div>
            <div class="row" >
            <?php if(!empty($_SESSION['message'])) {
                echo $_SESSION['message'];
                $_SESSION['message'] = null;
            } ?>
                <div class="col-12 col-sm-12 col-md-12" style="margin-top: 40px;" >
                  <div class="card text-left">
                    <div class="card-header bg-dark">
                      <h6 style="color: #F6F1E3; font-size: 1.5vw;" >Profil Anda</h6>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-row">
                                <div class="col-12 col-sm-12 col-md-6">
                                    <div class="form-group ">
                                        <label for="inputUsername">Username</label>
                                        <input type="username" class="form-control" style="font-size: 1.2vw;" id="username1" name="username1" placeholder="Username" value="<?php echo $username1; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="inputPassword4">Password</label>
                                        <input type="password" class="form-control" style="font-size: 1.2vw;" id="password1" name="password1" placeholder="Password" value="<?php echo $password1; ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                        <div class="card-footer text-muted">
                        Ubah Profil? <a href="ubah_profil_admin.php?id=1">Ubah</a>
                        </div> 
                    </div>
                </div>  
            </div>
        </div> 
        <div style="margin-top: 50px;"></div>
<?php include_once('footer.php'); ?>
</body>
</html>
 

