<?php
include('connection.php');

if (isset($_POST['submit'])){
    $username1 = $_POST['username1'];
    $ulasan = $_POST['ulasan'];
    $created_at = date('Y-m-d H:i:s');
    $del_flage = 0;
    $statement = oci_parse($connection, "INSERT INTO TB_ULASAN(USERNAME,ULASAN,CREATED_AT,DEL_FLAGE) VALUES 
        ('$username1','$ulasan',to_date('$created_at','yyyy-mm-dd hh24:mi:ss'),'$del_flage')");
    if (oci_execute($statement)) {
        $_SESSION['message'] = '<div class="alert alert-succes" role="alert">Berhasil Menambahkan Ulasan</div>';
        header("location: tampil_ulasan.php");
        
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Gagal Menambahkan Ulasan/div>';
        header("location: tambah_ulasan.php");
        
    }
}
?>