<?php
include('connection.php');

if (isset($_POST['submit'])){
    $gambar = $_FILES['foto_hotel'];
    $id_hotel = $_POST['id_hotel'];
    $nama_hotel = $_POST['nama_hotel'];
    $alamat = $_POST['alamat'];
    $created_at = date('Y-m-d H:i:s');
    $del_flage = 0;
    $namagambar = $gambar['name'];

    $upload = move_uploaded_file($gambar['tmp_name'], './upload/'.$gambar['name']);
    if($upload){
        $statement = oci_parse($connection, "INSERT INTO HOTEL(ID_HOTEL,NAMA_HOTEL,ALAMAT,CREATED_AT,DEL_FLAGE,GAMBAR) VALUES 
        ('$id_hotel','$nama_hotel','$alamat',to_date('$created_at','yyyy-mm-dd hh24:mi:ss'),'$del_flage','$namagambar')");
    if (oci_execute($statement)) {
        $_SESSION['message'] = '<div class="alert alert-succes" role="alert">Berhasil Menambahkan Data</div>';
        header("location: home_admin.php");
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Gagal Menambahkan Data</div>';
        header("location: tambah.php");
    }
    }
    
}
?>