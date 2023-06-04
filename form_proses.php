<?php
include('connection.php');

if (isset($_POST['submit'])){
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $room = $_POST['room'];
    $destinasi = ($_POST['destinasi']);
    $room1 = $_POST['room1'];
    $chekin = date('Y-m-d H:i:s');
    $chekout = date('Y-m-d H:i:s');
    $nama_rek = $_POST['nama_rek'];
    $created_at = date('Y-m-d H:i:s');
    $username = $_SESSION['username'];
    $can_flage = 0;
    $statement = oci_parse($connection, "INSERT INTO CO(EMAIL,NAMA,ALAMAT,NO_HP,ROOM,DESTINASI,ROOM1,CHEKIN,CHEKOUT,NAMA_REK,CREATED_AT,CAN_FLAGE,USERNAME) VALUES 
        ('$email','$nama','$alamat','$no_hp','$room','$destinasi','$room1',to_date('$chekin','yyyy-mm-dd hh24:mi:ss'),to_date('$chekout','yyyy-mm-dd hh24:mi:ss'),'$nama_rek',to_date('$created_at','yyyy-mm-dd hh24:mi:ss'),'$can_flage','$username')");
    if (oci_execute($statement)) {
        $_SESSION['message'] = '<div class="alert alert-succes" role="alert">Berhasil Membuat Pesanan</div>';
        header("location: detailco.php");
        
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Gagal Membuat Pesanan</div>';
        header("location: formco.php");
    }
}
?>