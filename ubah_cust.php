<?php 
include('connection.php');
if(!$_SESSION['login']) {
    header("location: signin.php");
}
$username = $_SESSION['username'];
$statement = oci_parse($connection, "SELECT * FROM CUST WHERE USERNAME='$username'");
oci_execute($statement);
while($row = oci_fetch_array($statement)){
    $id_cust = $row['ID_CUST'];
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
    <?php include('head.php'); ?>
</head>
<body>
    <div class="container" style="margin-top: 100px; margin-bottom: 80px;">
        <div class="pt-5">
            <h3 class="text-center" ><b style="font-size: 3vw;" >Ubah Profil</b></h3>
            <?php if(!empty($_SESSION['message'])) {
                echo $_SESSION['message'];
                $_SESSION['message'] = null;
            } ?>
        </div>
        <div class="container" >
            <div class="row-center" style="margin-top: 80px;" align="center" >
                <div class="card-center" style="width: 6rem;" >
                    <img src="./img/profil.jpg" class="card-img-top" alt="...">
                </div>
            </div>
        <div class="card mt-5">
            <form method="POST" action="ubah_proses_cus.php?id=<?= $id_cust ?>" >
            
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
                                        <label for="exampleInputEmail">ID </label>
                                        <input style="font-size: 1.5vw;" type="text" name="id_cust" id="id_cust" class="form-control" placeholder="Masukkan ID..." value="<?php echo $id_cust; ?>" disabled>
                                        
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6">
                                    <div class="form-group ">
                                        <label for="nik">NIK</label>
                                        <input type="nik" class="form-control" style="font-size: 1.4vw;" id="nik" name="nik" placeholder="NIK" value="<?php echo $nik; ?>" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6">
                                    <div class="form-group ">
                                        <label for="nama">Nama</label>
                                        <input type="nama" class="form-control" style="font-size: 1.4vw;" id="nama" name="nama" placeholder="Nama" value="<?php echo $nama; ?>" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6">
                                    <div class="form-group " >
                                        <label for="jk">Jenis Kelamin</label>
                                        <select name="jk" id="jk" class="form-control" style="font-size: 1.4vw;" required>
                                            <option value="Laki-laki" <?php echo $jk=="Laki-laki" ? "selected" :"";?>>Laki-laki</option>
                                            <option value="Perempuan" <?php echo $jk=="Perempuan" ? "selected" :"";?>>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6">
                                    <div class="form-group ">
                                        <label for="no_hp">No HP</label>
                                        <input type="number" name="no_hp" id="no_hp" class="form-control" placeholder="Masukkan No HP..." style="font-size: 1.4vw;" value="<?php echo $no_hp; ?>" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6">
                                    <div class="form-group ">
                                        <label for="alamat">Alamat</label>
                                        <input  name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat..." value="<?php echo $alamat; ?>" style="font-size: 1.4vw;"  required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6">
                                    <div class="form-group ">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan Email..." style="font-size: 1.4vw;" value="<?php echo $email; ?>" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6">
                                    <div class="form-group ">
                                        <label for="nama">Username</label>
                                        <input type="nama" class="form-control" style="font-size: 1.2vw;" id="username1" name="username1" placeholder="Username" value="<?php echo $username1; ?>" style="font-size: 1.4vw;" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="inputPassword4">Password</label>
                                        <input type="password" class="form-control" style="font-size: 1.2vw;" id="password1" name="password1" placeholder="Password" value="<?php echo $password1; ?>" style="font-size: 1.4vw;" required>
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