<?php
include "../koneksi.php";

session_start();



$username = $_POST['username'];
$password = $_POST['password'];
$namalengkap = $_POST['nama_lengkap'];
$level = $_POST['level'];

//ambil data file
$namafile = $_FILES['foto']['name'];
$namasementara = $_FILES['foto']['tmp_name'];
// pindah file
$terupload = move_uploaded_file($namasementara, '../assets/images/user/user/' . $namafile);
$tambah = mysqli_query($koneksi, "INSERT INTO user (username, password, nama_lengkap,level,foto) 
values ('$username','$password','$namalengkap','$level','$namafile')");
if ($tambah) {
    $_SESSION['berhasil'] = 'Data user Berhasil ditambahkan';
    echo "<script>
    window.location.href = '../?page=user/index';
    </script>";
} else {
    $_SESSION['berhasil'] = 'Data user Gagal ditambahkan';
    echo "
    <script>
    alert('data user gagal ditambahkan')
    window.location.href = 'tambah.php';
    </script>
";
}
