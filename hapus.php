<?php

include('connection.php');

if (isset($_GET['id'])){
    $id_hotel = $_GET['id'];
    $deleted_at = date('Y-m-d H:i:s');
    $del_flage = 1;
    $statement = oci_parse($connection, "UPDATE HOTEL SET DELETED_AT=TO_DATE('$deleted_at',
        'yyyy-mm-dd hh24:mi:ss'), DEL_FLAGE='$del_flage' WHERE ID_HOTEL='$id_hotel'");
    if (oci_execute($statement)) {
        $_SESSION['message'] = '<div class="alert alert-succes" role="alert">Berhasil Menghapus Data</div>';
        header("location: home_admin.php");
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Gagal Menghapus Data</div>';
        header("location: home_admin.php");
    }
}
?>
