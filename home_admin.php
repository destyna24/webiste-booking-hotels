<?php

include('connection.php');
if(!$_SESSION['login']) {
    header("location: signin.php");
}
$statement = oci_parse($connection, "SELECT * FROM HOTEL WHERE DEL_FLAGE=0 ORDER BY ID_HOTEL");
oci_execute($statement);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head_admin.php'); ?>
</head>
<body>
    <div class="container" style="margin-top: 100px; margin-bottom: 100px;">
        <div class="pt-5">
            <h3 class="text-center"><b style="font-size: 3vw;" >Daftar HOTEL</b></h3>
            <?php if(!empty($_SESSION['message'])) {
                echo $_SESSION['message'];
                $_SESSION['message']= null;
            } ?>
        </div>
        <div class="card mt-5">
            <div class="card-header">
                <a class="btn btn-primary float-right" href="tambah.php" style="font-size: 1.5vw;"><i class="fas fa-plus"></i>Tambah Hotel</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered" >
                    <thead>
                        <tr>
                            <td>ID Hotel</td>
                            <td>Gambar</td>
                            <td>Nama Hotel</td>
                            <td>Alamat</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        while($row = oci_fetch_array($statement)): ?>
                         <tr>
                             <td><?= $row['ID_HOTEL']; ?></td>
                             <td><?= "<img class='img-fluid rounded-start' src='./upload/" . $row['GAMBAR']. "'>" ?></td><!-- 
                             <img src=uploads/basis-data.jpg' -->
                             <td><?= $row['NAMA_HOTEL']; ?></td>
                             <td><?= $row['ALAMAT']; ?></td>
                             <td>
                                 <a href="ubah.php?id=<?= $row['ID_HOTEL'];?>" class="btn btn-primary btn-block" style="font-size: 1.5vw;">Ubah</a>
                                 <a href="detail.php?id=<?= $row['ID_HOTEL'];?>" class="btn btn-secondary btn-block" style="font-size: 1.5vw;">Detail</a>
                                 <a href="hapus.php?id=<?= $row['ID_HOTEL'];?>" class="btn btn-danger btn-block" style="font-size: 1.5vw;"onclick="return confirm('Apakah anda yakin?')">Hapus</a>
                             </td>
                         </tr>
                         <?php endwhile;?>
                   </tbody>
                </table>
            </div>
        </div>
    </div>
<?php include('footer.php');?>
</body>
</html>