<?php


$_SESSION['berhasil'] = 'Data user Berhasil diubah';

$iddata = $_POST['id_user'];
$username = $_POST['username'];
$password = $_POST['password'];
$namalengkap = $_POST['nama_lengkap'];
$level = $_POST['level'];
if ($_FILES['foto']['name'] == '') {
    $namafile = $_POST['foto_lama'];
} else {

    //ambil data file
    $namafile = $_FILES['foto']['name'];
    $namasementara = $_FILES['foto']['tmp_name'];
    // pindah file
    $terupload = move_uploaded_file($namasementara, 'assets/images/user/user/' . $namafile);

}
$tambah = mysqli_query($koneksi, "UPDATE `user` SET 
    `username` = '$username',
    `password` = '$password',
    `nama_lengkap` = '$namalengkap',
    `level` = '$level',
    `foto` = '$namafile' 
      WHERE `id_user` = $iddata");


if ($tambah) {
    echo "<script>
        window.location.href = '?page=user/index';
        </script>";
} else {
    echo "
        <script>
        window.location.href = 'ubah.php?data=$iddata';
        </script>
    ";
}