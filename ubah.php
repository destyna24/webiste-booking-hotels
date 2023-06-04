<?php 
include('connection.php');
if(!$_SESSION['login']) {
    header("location: home_admin.php");
}
$statement = oci_parse($connection, "SELECT * FROM HOTEL WHERE ID_HOTEL = ".$_GET['id']);
oci_execute($statement);
while($row = oci_fetch_array($statement)){
    $id_hotel = $row['ID_HOTEL'];
    $foto_hotel = $row['GAMBAR'];
    $nama_hotel = $row['NAMA_HOTEL'];
    $alamat = $row['ALAMAT'];
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
            <h3 class="text-center" ><b style="font-size: 3vw;" >Ubah HOTEL</b></h3>
            <?php if(!empty($_SESSION['message'])) {
                echo $_SESSION['message'];
                $_SESSION['message'] = null;
            } ?>
        </div>
        <div class="card mt-5">
            <form method="POST" action="ubah_proses.php" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail">ID HOTEL</label>
                        <input style="font-size: 1.5vw;" type="number" name="id_hotel" id="id_hotel" class="form-control" placeholder="Masukkan ID HOTEL..." value="<?php echo $id_hotel; ?>" required>
                        <input type="hidden" name="id_hotel" id="id_hotel" value="<?php echo $id_hotel; ?>" >
                    </div>
                    <div class="form-group">
                        <label for="foto_hotel">Foto HOTEL</label>
                        <input style="font-size: 1.5vw;" type="file" name="foto_hotel" id="foto_hotel" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama HOTEL</label>
                        <input style="font-size: 1.5vw;" type="text" name="nama_hotel" id="nama_hotel" class="form-control" placeholder="Masukkan Nama..." value="<?php echo $nama_hotel; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input style="font-size: 1.5vw;" name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat..." value="<?php echo $alamat; ?>" required>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button style="font-size: 1.5vw;" type="button" class="btn btn-danger" onclick="history.back()">Batal</button>
                    <input style="font-size: 1.5vw;"type="submit" name="submit" class="btn btn-succes" value="SIMPAN" onclick="return confirm('Apakah anda yakin?')"/>
                </div>
            </form>
        </div>
    </div>
<?php include('footer.php'); ?>
</body>
</html>