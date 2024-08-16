<?php
include "../koneksi.php";

session_start();
$_SESSION['berhasil'] = 'Data Kontak Berhasil Dihapus';

$data = $_GET['data'];
$deletedata = mysqli_query($koneksi, "DELETE FROM kontak WHERE `id_kontak` = '$data'");

if ($deletedata) {
    echo "<script>
    alert('data Kontak Berhasi Dihapus')
    window.location.href = 'index.php';
    </script>";
} else {
    echo "
    <script>
    alert('data Kontak Gagal Dihapus')
    window.location.href = 'tambah.php';
    </script>
";
}