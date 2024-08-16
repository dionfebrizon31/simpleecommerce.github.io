<?php
include "../koneksi.php";

session_start();


$judul = $_POST['judul'];
$isi = $_POST['isi'];

$tambah = mysqli_query($koneksi, "INSERT INTO `kontak`(`judul`,`isi`) VALUES ('$judul','$isi')");
if ($tambah) {
    $_SESSION['berhasil'] = 'Data Kontak Berhasil Ditambahkan';
    echo "<script>

    window.location.href = 'index.php';
    </script>";
} else {
    $_SESSION['berhasil'] = 'Data Kontak Gagal Ditambahkan';
    echo "
    <script>
    
    window.location.href = 'tambah.php';
    </script>
";
}
?>