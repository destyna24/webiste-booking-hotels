<?php
include('connection.php');

if (isset($_POST['submit'])){
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $created_at = date('Y-m-d H:i:s');
    $del_flage = 0;
    $statement = oci_parse($connection, "INSERT INTO CUST(NIK,NAMA,JK,NO_HP,ALAMAT,EMAIL,USERNAME,PASSWORD,CREATED_AT,DEL_FLAGE) VALUES 
        ('$nik','$nama','$jk','$no_hp','$alamat','$email','$username','$password',to_date('$created_at','yyyy-mm-dd hh24:mi:ss'),'$del_flage')");
    if (oci_execute($statement)) {
        $_SESSION['message'] = '<div class="alert alert-succes" role="alert">Berhasil Membuat Akun</div>';
        header("location: signin.php");
        
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Gagal Membuat Akun</div>';
        header("location: daftar_cust.php");
    }
}
?>