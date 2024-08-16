<?php
include "../koneksi.php";



$data = $_GET['data'];
$deletedata = mysqli_query($koneksi, "DELETE FROM produk WHERE `id_produk` = '$data'");

if ($deletedata) {
    echo "<script>
    alert('data Berhasil Didelete')

    window.location.href = '../?page=produk/index';
    </script>";
} else {
    echo "
    <script>
    alert('data gagal Didelete')
    window.location.href = 'tambah.php';
    </script>
";
}