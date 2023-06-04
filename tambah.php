<?php 

include('connection.php');
if (!$_SESSION['login']){
    header("location: signin.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head_admin.php') ?>
</head>
<body>
    <div class="container" style="margin-top: 100px; ">
        <div class="pt-9">
            <h3 class="text-center" ><b style="font-size: 3vw;" >Tambah Hotel</b></h3>
            <?php if(!empty($_SESSION['message'])) {
                echo $_SESSION['message'];
                $_SESSION['message'] = null;
            } ?>
        </div>
        <div class="card mt-5">
            <form method="POST" action="tambah_proses.php" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail">ID HOTEL</label>
                        <input style="font-size: 1.5vw;" type="number" name="id_hotel" id="id_hotel" class="form-controlplaceholder="Masukkan ID_HOTEL..." required>
                    </div>
                    <div class="form-group">
                        <label for="foto_hotel">Foto HOTEL</label>
                        <input style="font-size: 1.5vw;" type="file" name="foto_hotel" id="foto_hotel" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama HOTEL</label>
                        <input style="font-size: 1.5vw;" type="text" name="nama_hotel" id="nama_hotel" class="form-control" placeholder="Masukkan Nama HOTEL..." required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat HOTEL</label>
                        <input style="font-size: 1.5vw;" name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat HOTEL..." required>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button style="font-size: 1.5vw;" type="button" class="btn btn-danger" onclick="history.back()">Batal</button>
                    <input style="font-size: 1.5vw;" type="submit" name="submit" class="btn btn-succes" value="SIMPAN" onclick="return confirm('Apakah anda yakin?')"/>
                </div>
            </form>
        </div>
    </div> <br>
    <?php include('footer.php');?>
</body>
</html>