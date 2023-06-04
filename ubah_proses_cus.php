<?php

include('connection.php');

if(isset($_POST['submit'])) {
    $id_cust = $_GET['id'];
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $username1 = $_POST['username1'];
    $password1 = $_POST['password1'];
    $updated_at = date('Y-m-d H:i:s');

    
    $statement = oci_parse($connection, "UPDATE CUST SET NIK='$nik', NAMA='$nama', JK='$jk', NO_HP='$no_hp', ALAMAT='$alamat', EMAIL='$email',USERNAME='$username1', PASSWORD='$password1',
        UPDATED_AT=TO_DATE('$updated_at','yyyy-mm-dd hh24:mi:ss') WHERE ID_CUST='$id_cust'");
    if (oci_execute($statement)) {
        $_SESSION['message'] = '<div class="alert alert-succes" role="alert">Berhasil Mengubah Data</div>';
        $_SESSION['username'] = $username1;
        header("location: profil_cust.php");
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Gagal Mengubah Data</div>';
        header("location: ubah_cust.php");
    }
}
?>
