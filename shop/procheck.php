<?php
session_start();
include "../koneksi.php";
$iduser = $_SESSION['id_user'];
$nomortujuan = $_POST['nomortujuan'];
$alamattujuan = $_POST['alamattujuan'];
// $alamatprov = $_POST['alamatku'];
$realalamat = $_POST['alamatsaya'];
$alamatlengkap = $alamattujuan . " " . $realalamat;

// Check variabel total harga
// echo $alamatlengkap;
date_default_timezone_set('Asia/Jakarta');

// Mendapatkan tanggal saat ini dalam format 'd-m-Y'
$date = date('Y-m-d');

//ambil data file
$namafile = $_FILES['foto']['name'];
$namasementara = $_FILES['foto']['tmp_name'];
// pindah file
$terupload = move_uploaded_file($namasementara, '../admin/assets/images/user/buktipembayaran/' . $namafile);
$keranjangdata = "SELECT * FROM keranjang join produk on produk.id_produk = keranjang.id_keranjang where";
$pesanan = mysqli_query($koneksi, "INSERT INTO `pesanan`(`id_user`,  `tgl_pesanan`, `no_tujuan`, `alamat_tujuan`, `bukti_bayar`, `status_pesanan`) 
                            VALUES ('$iduser','$date','$nomortujuan','$alamatlengkap','$namafile','pending')");

$datapesanan = mysqli_query($koneksi, "SELECT * FROM pesanan ORDER BY id_pesanan DESC LIMIT 1");
$arrpesanan = mysqli_fetch_array($datapesanan);


$datakeranjang = mysqli_query($koneksi, "SELECT * FROM keranjang 
join produk on keranjang.id_produk= produk.id_produk where id_user = '$iduser'");
$totalharga = 0;
while ($keranjang = mysqli_fetch_array($datakeranjang)) {
    $totalharga += $keranjang['harga'] * $keranjang['kuantitas'];
    $detailpesanan = mysqli_query($koneksi, "INSERT INTO `detail_pesanan`(`id_pesanan`, `id_produk`, `kuantitas`, `total_harga`) 
                                                     VALUES ('$arrpesanan[id_pesanan]','$keranjang[id_produk]','$keranjang[kuantitas]','$totalharga')");

}
$deletequery = mysqli_query($koneksi, "DELETE FROM keranjang where id_user='$iduser'");
if ($deletequery) {
    echo "<script>
    alert('Berhasil Check out keranjang ')
    window.location.href = '../?page=shop/index';
    </script>";
} else {

    echo "<script>
     alert('Gagal Check out keranjang ')
    window.location.href = '../?page=shop/index';
    </script>";

}

?>