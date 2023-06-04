<?php

include('connection.php');

if (isset($_GET['id'])){
    $id_co = $_GET['id'];
    $canceled_at = date('Y-m-d H:i:s');
    $can_flage = 1;
    $statement = oci_parse($connection, "UPDATE CO SET CANCELED_AT=TO_DATE('$canceled_at',
        'yyyy-mm-dd hh24:mi:ss'), CAN_FLAGE='$can_flage' WHERE ID_CO='$id_co'");
    if (oci_execute($statement)) {
        $_SESSION['message'] = '<div class="alert alert-succes" role="alert">Berhasil Membatalkan Pesanan</div>';
        header("location: formco.php");
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Gagal Membatalkan Pesanan</div>';
        header("location: detailco.php");
        
    }
}
?>
