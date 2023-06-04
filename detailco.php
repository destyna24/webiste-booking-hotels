<?php 

include("connection.php");
if(!$_SESSION['login']) {
    header("location: signin.php");
}

$username = $_SESSION['username'];
$statement = oci_parse($connection, "SELECT * FROM CO WHERE USERNAME='$username' AND CAN_FLAGE=0");
oci_execute($statement);
    if($row = oci_fetch_array($statement)){
        $email = $row['EMAIL'];
        $nama = $row['NAMA'];
        $alamat = $row['ALAMAT'];
        $no_hp = $row['NO_HP'];
        $room = $row['ROOM'];
        $destinasi = $row['DESTINASI'];
        $room1 = $row['ROOM1'];
        $chekin = $row['CHEKIN'];
        $chekout = $row['CHEKOUT'];
        $nama_rek = $row['NAMA_REK'];
        $id_co = $row['ID_CO'];
    }else{
        header('location: co.php');
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php') ?>
</head>
<body>
<div class="container" style="margin-top: 100px; margin-bottom: 100px;">
    <div class="pt-5">
        <h3 class="text-center" ><b style="font-size: 3vw;" >Detail Pesanan</b></h3>
        <?php if(!empty($_SESSION['message'])) {
            echo $_SESSION['message'];
            $_SESSION['message'] = null;
        } ?>
    </div>
    <div class="card border-0 mt-5">
        <form method="POST" action="form_proses.php">
            <div class="row">
                <div class="col-8 col-sm-8 col-md-8 mx-auto">
                  <div class="card text-left">
                    <div class="card-header bg-dark">
                      <h6 style="color: #F6F1E3; font-size: 1.5vw;" >Detail Guest</h6>
                    </div>
                    <div class="card-body">
                            <div class="form-row">
                                <div class="col-6 col-sm-6 col-md-6">
                                    <div class="form-group ">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" style="font-size: 1.2vw;" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="nama">Your Name</label>
                                        <input type="text" class="form-control" style="font-size: 1.2vw;" name="nama" id="nama" placeholder="Name" value="<?php echo $nama; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="alamat">Your Address</label>
                                        <input type="text" class="form-control" style="font-size: 1.2vw;" name="alamat" id="alamat" placeholder="Address" value="<?php echo $alamat; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="no">Your Phone</label>
                                        <input type="number" class="form-control" style="font-size: 1.2vw;" name="no_hp" id="no_hp" placeholder="+62" value="<?php echo $no_hp; ?>" disabled> <br>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="room">Room</label>
                                            <select style="font-size: 1.2vw;" class="form-control" name="room" id="room" value="<?php echo $room; ?>" disabled>
                                                <option>ROOM 1</option>
                                                <option>ROOM 2</option>
                                                <option>ROOM 3</option>
                                                <option>ROOM 4</option>
                                                <option>ROOM 5</option>
                                            </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-muted">
                        Isi data anda dengan benar
                        </div> 
                    </div>
                    </div></div>
        <div class="row">
            <div class="col-8 col-sm-8 col-md-8 mx-auto">
              <div class="card text-left">
                <div class="card-header bg-dark">
                  <h6 style="color: #F6F1E3; font-size: 1.5vw;" >Reservasi</h6>
                </div>
                <div class="card-body">
                        <div class="form-row">
                            <div class="col-6 col-sm-6 col-md-6" style="font-size: 1.2vw;">
                                <div class="form-group ">
                                    <label for="destinasi" >Search your Destination</label>
                                    <select style="font-size: 1.2vw;" class="form-control" name="destinasi" id="destinasi" value="<?php echo $destinasi; ?>" disabled>
                                        <option>HOTEL DOMINIC BALI</option>
                                        <option>HOTEL DOMINIC KUTA</option>
                                        <option>ROOM JAWA</option>
                                        <option>ROOM KALIMANTAN</option>
                                        <option>ROOM SULAWESI</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="room1">Room</label>
                                        <select style="font-size: 1.2vw;" class="form-control" name="room1" id="room1" value="<?php echo $room1; ?>" disabled>
                                            <option>Superior Room 1 Bed Big</option>
                                                <option>Superior (2 Bed / Twin Bed)</option>
                                                <option>Superior Room 1 Bed Big</option>
                                                <option>Superior Room 1 Bed Medium</option>
                                                <option>Superior (2 Bed / Twin Bed)</option>
                                                <option>Superior Room 1 Bed Big</option>
                                                <option>Superior Room 2 Bed Big</option>
                                                <option>Superior Room 1 Bed Big</option>
                                                <option>Superior Room Living Room</option>
                                        </select>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="chekin">Check In</label>
                                    <input type="date" class="form-control"  style="font-size: 1.2vw;" id="chekin" name="chekin" value="<?php echo $chekin; ?>" disabled> <br>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="chekout">Check Out</label>
                                    <input type="date" class="form-control"  style="font-size: 1.2vw;"id="chekout" name="chekout" value="<?php echo $chekout; ?>" disabled>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                    Note : 1 Room Max 2 Orang
                    </div> 
                </div>  
                </div>
                <div class="row">
                    <div class="col-8 col-sm-8 col-md-8 mx-auto">
                      <div class="card text-left">
                        <div class="card-header bg-dark">
                          <h6 style="color: #F6F1E3; font-size: 1.5vw;" >Metode Pembayaran</h6>
                        </div>
                        <div class="card-body">
                                <div class="form-row">
                                    <div class="row">
                                        <div class="col-4 col-sm-4 col-md-4" >
                                            <a href="co.php"><img class="img-fluid" src="./img/bri.png" alt=""></a>
                                        </div>
                                        <div class="col-4 col-sm-4 col-md-4" >
                                            <a href="co.php"><img class="img-fluid" src="./img/bni.gif" alt=""></a>
                                        </div>
                                        <div class="col-4 col-sm-4 col-md-4" >
                                            <a href="co.php"><img class="img-fluid" src="./img/bca.png" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <label for="inputNama">Nama Pemilik Rekening</label>
                                                <input type="text" class="form-control" style="font-size: 1.2vw;" id="nama_rek" name="nama_rek" placeholder="Pemilik Rekening" value="<?php echo $nama_rek; ?>" disabled>
                                            <br> 
                                            <p style="font-size: 1.5vw;">Silakan melakukan pembayaran melalui Bank Transfer ke akun Dominic (akun akan diinformasikan setelah Anda meng-klik tombol "BAYAR" di bawah) sebelum batas waktu yang ditentukan untuk menghindari pembatalan transaksi secara otomatis.</p>
                                                <a href="batal_co.php?id=<?= $id_co;?>" style="font-size: 1.2vw; background-size: 1.2vw;" class="btn btn-danger" style="font-size: 1.5vw;">Batal</a> 
                                                <button class="btn border-dark bg-dark" type="submit" name="submit" style="font-size: 1.2vw; background-size: 1.2vw; color: #F6F1E3;" onclick="return confirm('Apakah anda yakin?')">BAYAR </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        </div> 
                            <div class="card-footer text-muted">
                                Note : Pembayaran akan diverifikasi 10 menit setelah transaksi
                            </div> <br> <br> <br>
                    </div> 
                    </div>
    </div>