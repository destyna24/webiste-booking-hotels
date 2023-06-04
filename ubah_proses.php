<?php

include('connection.php');

if(isset($_POST['submit'])) {
    $gambar = $_FILES['foto_hotel'];
    $id_hotel = $_POST['id_hotel'];
    $nama_hotel = $_POST['nama_hotel'];
    $alamat = $_POST['alamat'];
    $updated_at = date('Y-m-d H:i:s');
    $namagambar = $gambar['name'];

    $upload = move_uploaded_file($gambar['tmp_name'], './upload/'.$gambar['name']);
    $statement = oci_parse($connection, "UPDATE HOTEL SET ID_HOTEL='$id_hotel', NAMA_HOTEL='$nama_hotel', ALAMAT='$alamat',
        UPDATED_AT=TO_DATE('$updated_at','yyyy-mm-dd hh24:mi:ss'), GAMBAR='$namagambar' WHERE ID_HOTEL='$id_hotel'");
    if (oci_execute($statement)) {
        $_SESSION['message'] = '<div class="alert alert-succes" role="alert">Berhasil Mengubah Data</div>';
        header("location: home_admin.php");
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Gagal Mengubah Data</div>';
        header("location: ubah.php?id=1");
    }
}
?>
