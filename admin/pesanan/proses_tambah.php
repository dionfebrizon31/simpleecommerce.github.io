<?php
include "../koneksi.php";
session_start();

$nama_armada = $_POST['nama_armada'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
//ambil data file
$namafile = $_FILES['foto']['name'];
$namasementara = $_FILES['foto']['tmp_name'];
// pindah file
$terupload = move_uploaded_file($namasementara, '../assets/images/user/armada/' . $namafile);

$tambah = mysqli_query($koneksi, "INSERT INTO `armada`( `nama_armada`, `harga`, `deskripsi`,`gambar`) VALUES ('$nama_armada','$harga','$deskripsi','$namafile')");
if ($tambah) {
    $_SESSION['berhasil'] = 'Data Armada Berhasil Ditambah';
    echo "<script>
    
    window.location.href = 'index.php';
    </script>";
} else {
    $_SESSION['berhasil'] = 'Data Armada Gagal Ditambah';
    echo "
    <script>
    
    window.location.href = 'tambah.php';
    </script>
";
}
?>