<?php
include "../koneksi.php";

$data = $_GET['data'];
$deletedata = mysqli_query($koneksi, "DELETE FROM pesanan WHERE `id_pesanan`='$data'");
$deletedata = mysqli_query($koneksi, "DELETE FROM detail_pesanan WHERE detail_pesanan.`id_pesanan`='$data'");
// $deletedetail = mysqli_query($koneksi, "DELETE FROM detail_pesanan WHERE `id_pesanan ` = '$data'");



if ($deletedata && $deletedetail) {
    echo "<script>
    alert('data pesanan berhasil dihapus')
    window.location.href = '?page=home/index';
    </script>";
} else {
    echo "
    <script>
    alert('data pesanan gagal dihapus')
    window.location.href = 'tambah.php';
    </script>
";
}