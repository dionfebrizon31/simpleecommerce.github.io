<?php
include "../koneksi.php";
session_start();
$_SESSION['berhasil'] = 'Data User Berhasil Dihapus';

$data = $_GET['data'];
$deletedata = mysqli_query($koneksi, "DELETE FROM user WHERE `user`.`id_user` = '$data'");

if ($deletedata) {
    echo "<script>
    
    window.location.href = '../?page=user/index';
    </script>";
} else {
    unset($_SESSION['berhasil']);
    echo "
    <script>
    window.location.href = 'tambah.php?data=$data   ';
    </script>";

}