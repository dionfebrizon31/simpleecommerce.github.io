<?php
include "../koneksi.php";

session_start();



$nama_tim = $_POST['nama_tim'];
$jabatan = $_POST['jabatan'];

//ambil data file
$namafile = $_FILES['foto']['name'];
$namasementara = $_FILES['foto']['tmp_name'];
// pindah file
$terupload = move_uploaded_file($namasementara, '../assets/images/user/tim/' . $namafile);
$tambah = mysqli_query($koneksi, "INSERT INTO tim (nama_tim, jabatan,foto) 
values ('$nama_tim','$jabatan','$namafile')");
if ($tambah) {
    $_SESSION['berhasil'] = 'Data Tim Berhasil ditambahkan';
    echo "<script>
 
    window.location.href = 'index.php';
    </script>";
} else {
    $_SESSION['berhasil'] = 'Data Tim Gagal ditambahkan';
    echo "
    <script>

    window.location.href = 'tambah.php';
    </script>
";
}