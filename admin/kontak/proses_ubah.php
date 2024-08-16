<?php
include "../koneksi.php";



$judul = $_POST['judul'];
$isi = $_POST['isi'];
$iddata = $_POST['id_kontak'];

$ubah = mysqli_query($koneksi, "UPDATE `kontak` SET `judul`='$judul',`isi`='$isi' WHERE `id_kontak` = $iddata");
//ambil data filemysqli_query("UPDATE `kategori` SET `nama_kategori`='[value-2]' WHERE `user`.`id_user` = $iddata");

if ($ubah) {
    echo "<script>
        alert('data kontak berhasil diubah')
        window.location.href = 'index.php';
        </script>";
} else {
    echo "
        <script>
        alert('data kontak gagal diubah')
        window.location.href = 'tambah.php';
        </script>
    ";
}
