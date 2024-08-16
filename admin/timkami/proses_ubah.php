<?php
include "../koneksi.php";
session_start();
$_SESSION['berhasil'] = 'Data user Berhasil diubah';


$nama_tim = $_POST['nama_tim'];
$jabatan = $_POST['jabatan'];

$iddata = $_POST['id_tim'];
if ($_FILES['foto']['name'] == '') {
    $namafile = $_POST['foto_lama'];
} else {

    //ambil data file
    $namafile = $_FILES['foto']['name'];
    $namasementara = $_FILES['foto']['tmp_name'];
    // pindah file
    $terupload = move_uploaded_file($namasementara, '../assets/images/user/tim/' . $namafile);

}
$update = mysqli_query($koneksi, "UPDATE `tim` SET 
    `nama_tim` = '$nama_tim',
    `jabatan` = '$jabatan',
    `foto` = '$namafile' 
      WHERE `id_tim` = $iddata");


if ($update) {
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

