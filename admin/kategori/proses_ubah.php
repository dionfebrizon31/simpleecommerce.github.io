<?php
include "../koneksi.php";
$iddata = $_POST['id_kategori'];
$search = mysqli_query($koneksi, "SELECT * FROM `kategori` WHERE `id_kategori` = '$iddata'");
$data = mysqli_fetch_array($search);





$namakategori = $_POST['namakategori'];

$ubah = mysqli_query($koneksi, "UPDATE `kategori` SET `nama_kategori`='$namakategori' WHERE `id_kategori` = $iddata");

if ($ubah) {

    echo "<script>

        window.location.href = '../?page=home/index';
        </script>";
} else {

    echo "
        <script>
        window.location.href = 'tambah.php';
        </script>
    ";
}
