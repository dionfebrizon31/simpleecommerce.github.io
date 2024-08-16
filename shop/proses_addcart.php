<?php
session_start();
include "../koneksi.php";

if (!isset($_SESSION['id_user'])) {
  echo "<script>
    alert('Login Dulu Dex !');
    window.location.href = '../admin/login/index.php';
    </script>";
}

$idproduk = $_POST['id_produk'];
$kuantitas = $_POST['kuantitas'];
$iduser = $_SESSION['id_user'];

$search = mysqli_query($koneksi, "SELECT * FROM keranjang WHERE id_user='$iduser' AND id_produk='$idproduk'");

if (mysqli_num_rows($search) > 0) {
  $arkeranjang = mysqli_fetch_array($search);
  $dbkuantitas = $arkeranjang['kuantitas'];
  $dbkuantitas += $kuantitas;
  $update = mysqli_query($koneksi, "UPDATE keranjang SET kuantitas='$dbkuantitas' WHERE id_user='$iduser' AND id_produk='$idproduk'");

  if ($update) {
    echo "<script>
        alert('Produk Sudah Ada dan Sudah Ditambah');
        window.location.href = '../?page=shop/detail_produk&idproduk=$idproduk';
        </script>";
  } else {
    echo "<script>
        alert('Gagal mengupdate data');
        window.location.href = '../?page=shop/index';
        </script>";
  }
} else {
  $keranjang = mysqli_query($koneksi, "INSERT INTO keranjang (id_user, id_produk, kuantitas) VALUES ('$iduser', '$idproduk', '$kuantitas')");

  if ($keranjang) {
    echo "<script>
        alert('Produk Sudah Ditambah dalam keranjang');
        window.location.href = '../?page=shop/detail_produk&idproduk=$idproduk';
        </script>";
  } else {
    echo "<script>
        alert('Gagal menambahkan data');
        window.location.href = 'tambah.php';
        </script>";
  }
}
?>