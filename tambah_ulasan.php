<?php 

include('connection.php');
if (!$_SESSION['login']){
    header("location: signin.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php') ?>
</head>
<body>
    <div class="container" style="margin-top: 150px; ">
        <div class="pt-9">
            <h3 class="text-center" ><b style="font-size: 3vw;" >Tambah Ulasan</b></h3>
        </div>
        <br>
                    <form method="POST" action="tambah_proses_ulasan.php" enctype="multipart/form-data">
                        <div class="col-8 col-sm-8 col-md-8 mx-auto" >
                            <div class="card text-left"">
                              <div class="card-header bg-dark">
                                <h6 style="color: #F6F1E3; font-size: 1.5vw;" >
                                <input id="username1" name="username1" type="username1" class="form-control bg-dark" style="color: #F6F1E3;font-size: 1.2vw; background-size: 1.2vw;"  value="<?= $_SESSION ['username']; ?>"></h6>
                              </div>
                              <div class="card-body">
                                <h5 style="font-size: 1.5vw;" class="card-title">
                                <input id="ulasan" name="ulasan" type="text" style=" font-size: 1.2vw; background-size: 1.2vw;" class="form-control " placeholder="Masukan Ulasan..." required>
                                <br></h5>
                              </div>
                              <div class="card-footer text-muted"">
                                    <button style="font-size: 1.5vw;" type="button" class="btn btn-danger" onclick="history.back()">Batal</button>
                                    <input style="font-size: 1.5vw;" type="submit" name="submit" class="btn btn-succes" value="SIMPAN" onclick="return confirm('Apakah anda yakin?')"/>
                              </div> 
                            </div>
                          </div>
                    </form>
        </div>
    </div> <br>
    <?php include('footer.php');?>
</body>
</html>