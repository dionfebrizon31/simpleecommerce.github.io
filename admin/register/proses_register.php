<?php
include "../koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];
$nama_lengkap = $_POST['nama_lengkap'];

//ambil data file
$namafile = $_FILES['foto']['name'];
$namasementara = $_FILES['foto']['tmp_name'];
// pindah file
$terupload = move_uploaded_file($namasementara, '../assets/images/user/user/' . $namafile);

$register = mysqli_query($koneksi, "INSERT INTO USER (`username`, `password`, `nama_lengkap`,`level`,`foto`) VALUES ('$username','$password', '$nama_lengkap','member','$namafile')");

if ($register) {

    echo "<script>
    alert('data user berhasil registerasi')
    window.location.href = '../login/index.php';
    </script>";
} else {
    echo "
    <script>
    alert('data user gagal ditambahkan')
    window.location.href = 'index.php';
    </script>
";
}
