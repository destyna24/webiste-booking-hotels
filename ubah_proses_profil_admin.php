<?php

include('connection.php');

if(isset($_POST['submit'])) {
    $id_admin = $_POST['id_admin'];
    $username1 = $_POST['username1'];
    $password1 = $_POST['password1'];
    $updated_at = date('Y-m-d H:i:s');


    $statement = oci_parse($connection, "UPDATE TB_ADMIN SET ID_ADMIN='$id_admin', USERNAME='$username1', PASSWORD='$password1',
        UPDATED_AT=TO_DATE('$updated_at','yyyy-mm-dd hh24:mi:ss') WHERE ID_ADMIN='$id_admin'");
    if (oci_execute($statement)) {
        $_SESSION['message'] = '<div class="alert alert-succes" role="alert">Berhasil Mengubah Data</div>';
        header("location: profil_admin.php?id=1");
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Gagal Mengubah Data</div>';
        header("location: ubah_profil_admin.php?id=1");
    }
}
?>
