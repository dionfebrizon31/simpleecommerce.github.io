<?php
include "../koneksi.php";


$data = $_GET['data'];
$deletedata = mysqli_query($koneksi, "DELETE FROM kategori WHERE `id_kategori` = '$data'");

if ($deletedata) {
    echo "<script>

    window.location.href = '../?page=kategori/index';
    </script>";
} else {

    echo "
    <script>
    window.location.href = 'tambah.php';
    </script>
";
}