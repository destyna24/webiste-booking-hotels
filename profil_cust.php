<?php 

include('connection.php');
if (!$_SESSION['login']){
    header("location: signin.php");
}
$username = $_SESSION['username'];
$statement = oci_parse($connection, "SELECT * FROM CUST WHERE USERNAME='$username'");
oci_execute($statement);
while($row = oci_fetch_array($statement)) {
    $nik = $row['NIK'];
    $nama = $row['NAMA'];
    $jk = $row['JK'];
    $no_hp = $row['NO_HP'];
    $alamat = $row['ALAMAT'];
    $email = $row['EMAIL'];
    $username1 = $row['USERNAME'];
    $password1 = $row['PASSWORD']; 
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php') ?>
</head>
<body>
        <div class="container" >
            <div class="row-center" style="margin-top: 80px;" align="center" >
                <div class="card-center" style="width: 6rem;" >
                    <img src="./img/profil.jpg" class="card-img-top" alt="...">
                </div>
            </div>
            <?php if(!empty($_SESSION['message'])) {
                echo $_SESSION['message'];
                $_SESSION['message'] = null;
            } ?>
            <div class="row" >
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
                                        <label for="nik">NIK</label>
                                        <input type="nik" class="form-control" style="font-size: 1.4vw;" id="nik" name="nik" placeholder="NIK" value="<?php echo $nik; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6">
                                    <div class="form-group ">
                                        <label for="nama">Nama</label>
                                        <input type="nama" class="form-control" style="font-size: 1.4vw;" id="nama" name="nama" placeholder="Nama" value="<?php echo $nama; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6">
                                    <div class="form-group ">
                                        <label for="jk">Jenis Kelamin</label>
                                        <input type="text" name="jk" id="jk" class="form-control" value="<?php echo $jk; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6">
                                    <div class="form-group ">
                                        <label for="no_hp">No HP</label>
                                        <input type="number" name="no_hp" id="no_hp" class="form-control" placeholder="Masukkan No HP..." style="font-size: 1.4vw;" value="<?php echo $no_hp; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6">
                                    <div class="form-group ">
                                        <label for="alamat">Alamat</label>
                                        <input  name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat..." value="<?php echo $alamat; ?>" style="font-size: 1.4vw;"  disabled>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6">
                                    <div class="form-group ">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan Email..." style="font-size: 1.4vw;" value="<?php echo $email; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6">
                                    <div class="form-group ">
                                        <label for="nama">Username</label>
                                        <input type="nama" class="form-control" style="font-size: 1.2vw;" id="nama" name="nama" placeholder="Nama" value="<?php echo $username1; ?>" style="font-size: 1.4vw;" disabled>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="inputPassword4">Password</label>
                                        <input type="password" class="form-control" style="font-size: 1.2vw;" id="password1" name="password1" placeholder="Password" value="<?php echo $password1; ?>" style="font-size: 1.4vw;" disabled>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                        <div class="card-footer text-muted">
                        Ubah Profil? <a href="ubah_cust.php">Ubah</a>
                        </div> 
                    </div>
                </div>  
            </div>
        </div> 
        <div style="margin-top: 100px;"></div>
<?php include_once('footer.php'); ?>
</body>
</html>
 

