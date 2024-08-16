<?php


$nama_produk = $_POST['nama_produk'];
$idkategoribox = $_POST['idkategoribox'];

$deskripsi = $_POST['deskripsi'];

$Harga = $_POST['Harga'];
$iddata = $_POST['id_produk'];
if ($_FILES['foto']['name'] == '') {
    $namafile = $_POST['foto_lama'];
} else {

    //ambil data file
    $namafile = $_FILES['foto']['name'];
    $namasementara = $_FILES['foto']['tmp_name'];
    // pindah file
    $terupload = move_uploaded_file($namasementara, 'assets/images/user/produk/' . $namafile);

}


$ubah = mysqli_query($koneksi, "UPDATE `produk` 
SET 
`id_kategori`='$idkategoribox',
`nama_produk`='$nama_produk',
`deskripsi`=' $deskripsi ',
`harga`=' $Harga',
`gambar_produk`='$namafile' 
WHERE `id_produk` = $iddata");


if ($ubah) {
    echo "<script>
    window.location.href = 'index.php';
    </script>";
} else {
    echo "
    <script>
    window.location.href = 'tambah.php';
    </script>
";
}