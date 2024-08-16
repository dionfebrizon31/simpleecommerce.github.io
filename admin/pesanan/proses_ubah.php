<?php
include "../koneksi.php";
$iddata = $_POST['id_armada'];
$nama_armada = $_POST['nama_armada'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];


if ($_FILES['foto']['name'] == '') {
    $namafile = $_POST['foto_lama'];
} else {

    //ambil data file
    $namafile = $_FILES['foto']['name'];
    $namasementara = $_FILES['foto']['tmp_name'];
    // pindah file
    $terupload = move_uploaded_file($namasementara, '../assets/images/user/armada/' . $namafile);

}
$update = mysqli_query($koneksi, "UPDATE `armada` 
SET 

`nama_armada`='$nama_armada',
`harga`=' $harga',
`deskripsi`=' $deskripsi ',
`gambar`='$namafile' 
WHERE `id_armada` = $iddata");


if ($update) {
    echo "<script>
    alert('data armada berhasil di ubah')
    window.location.href = 'index.php';
    </script>";
} else {
    echo "
    <script>
    alert('data armada gagal diubah')
    window.location.href = 'tambah.php';
    </script>
";
}