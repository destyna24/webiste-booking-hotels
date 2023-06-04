<?php 

include('connection.php');
if (!$_SESSION['login']){
  header("location: signin.php");
}

$username = $_SESSION['username'];
$statement = oci_parse($connection, "SELECT * FROM TB_ULASAN WHERE DEL_FLAGE=0");
oci_execute($statement);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php') ?>
</head>
<body>
<div class="container" style="margin-top: 150px; ">
  <div class="pt-9">
            <h3 class="text-center" ><b style="font-size: 3vw;" >Semua Ulasan</b></h3> <br>
            <?php if(!empty($_SESSION['message'])) {
                echo $_SESSION['message'];
                $_SESSION['message'] = null;
            } ?>
            <form>
    <div class="col-8 col-sm-8 col-md-8 mx-auto">
      <?php
        while($row = oci_fetch_array($statement)) {
        $username3 = $row['USERNAME'];
        $ulasan = $row['ULASAN']; 
    
      ?>
        <div class="card text-left">
          <div class="card-header bg-dark">
            <h6 style="color: #F6F1E3; font-size: 1.5vw;" >
            <!-- <input id="username3" name="username3" type="username3" class="form-control bg-dark" style="color: #F6F1E3;font-size: 1.2vw; background-size: 1.2vw;"  placeholder="Masukan Username..." value="<?php echo $username3; ?>" disabled> -->
            <p><?= $username3 ?></p></h6>
          </div>
          <div class="card-body">
            <h5 style="font-size: 1.5vw;" class="card-title">
            <!-- <input id="ulasan" name="ulasan" type="text" style="font-size: 1.2vw; background-size: 1.2vw;" class="form-control " placeholder="Masukan Ulasan..." value="<?php echo $ulasan; ?>" disabled> -->
            <p><?= $ulasan ?></p>
            </h5>
          </div>
          <div class="col-6 col-sm-6 col-md-6">
            <?php
            if ($row['USERNAME'] == $_SESSION['username']) {
            ?>
          <a href="hapus_ulasan_cus.php?id=<?= $row['ID_ULAS'];?>" style="font-size: 1.2vw; background-size: 1.2vw;" class="btn btn-danger" style="font-size: 1.5vw;"onclick="return confirm('Apakah anda yakin?')">Hapus
          <?php
            }
            ?>
            </a> 
          </div> <br>
          <div class="card-footer text-muted">
                <?php echo substr($row['CREATED_AT'], 0, 9) ?> 
          </div> 
        </div>
        <?php
        }
        ?>
      </div>
  </div>
</div>
</div> <br>
<?php include_once('footer.php'); ?>
</body>
</html>
 

