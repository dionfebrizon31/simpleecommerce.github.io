<?php
include "../koneksi.php";

session_start();
$_SESSION['berhasil'] = 'Data Tim Berhasil Dihapuskan';
$data = $_GET['data'];
$deletedata = mysqli_query($koneksi, "DELETE FROM tim WHERE `id_tim` = '$data'");

if ($deletedata) {
    echo "<script>
    alert('data Tim berhasil Dihapus')
    window.location.href = 'index.php';
    </script>";
} else {
    echo "
    <script>
    alert('data Tim gagal ditambahkan')
    window.location.href = 'tambah.php';
    </script>
";
}