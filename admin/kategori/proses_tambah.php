<?php
include "../koneksi.php";

$namakategori = $_POST['namakategori'];

$tambah = mysqli_query($koneksi, "INSERT INTO `kategori`(`nama_kategori`) VALUES ('$namakategori')");
if ($tambah) {
    $_SESSION['berhasil'] = 'Data Kategori Berhasil Ditambah';
    echo "<script>
    alert('data kategori ditambahkan')
      window.location.href = '../?page=kategori/index';
    </script>";
} else {
    $_SESSION['berhasil'] = 'Data Kategori Gagal Ditambah';
    echo "
    <script>
    window.location.href = 'tambah.php';
    </script>
";
}
