<?php


$idkategoribox = $_POST['idkategoribox'];
$nama_produk = $_POST['nama_produk'];
$deskripsi = $_POST['deskripsi'];
$Harga = $_POST['Harga'];


//ambil data file
$namafile = $_FILES['foto']['name'];
$namasementara = $_FILES['foto']['tmp_name'];
// pindah file
$terupload = move_uploaded_file($namasementara, 'assets/images/user/produk/' . $namafile);
$tambah = mysqli_query($koneksi, "INSERT INTO `produk`( `id_kategori`, `nama_produk`,`deskripsi`, `harga`, `gambar_produk`)
 VALUES ('$idkategoribox','$nama_produk','$deskripsi','$Harga','$namafile')");
if ($tambah) {

    echo "<script>
    alert('data produk sukses ditambahkan')
    window.location.href = '?page=produk/index';
    </script>";
} else {

    echo "
    <script>
    alert('data gagal ditambahkan')
    window.location.href = 'tambah.php';
    </script>
";
}
