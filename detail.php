<?php 

include('connection.php');
if (!$_SESSION['login']){
    header("location: signin.php");
}
$statement = oci_parse($connection, "SELECT * FROM HOTEL WHERE ID_HOTEL = ".$_GET['id']);
oci_execute($statement);
while($row = oci_fetch_array($statement)) {
    $id_hotel = $row['ID_HOTEL'];
    $gambar = $row['GAMBAR'];
    $nama_hotel = $row['NAMA_HOTEL'];
    $alamat = $row['ALAMAT'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head_admin.php') ?>
</head>
<body>
    <div class="container" style="margin-top: 100px; margin-bottom: 100px;">
        <div class="pt-5">
            <h3 class="text-center" ><b style="font-size: 3vw;" >Detail HOTEL</b></h3>
        </div>
        <div class="card mt-5">
            <form>
                <div class="card=body">
                    <div class="form-group">
                        <label for="exampleInputEmail">ID HOTEL</label>
                        <input style="font-size: 1.5vw;" type="number" name="id_hotel" id="id_hotel" class="form-control" style="font-size: 1.5vw;" value="<?php echo $id_hotel; ?> "  disabled>
                    </div>
                    <div class="form-group">
                        <label for="foto_hotel">Foto HOTEL</label>
                        <?php echo "<img class='img-fluid rounded-start' src='./upload/$gambar'>"; ?>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama HOTEL</label>
                        <input style="font-size: 1.5vw;" type="text" name="nama_hotel" id="nama_hotel" class="form-control" style="font-size: 1.5vw;" value="<?php echo $nama_hotel; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input style="font-size: 1.5vw;" name="alamat" id="alamat" class="form-control" style="font-size: 1.5vw;" value="<?php echo $alamat; ?>" disabled>
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>
<?php include('footer.php'); ?>
</body>
</html>