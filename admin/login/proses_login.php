<?php
include "../koneksi.php";

$username = $_POST['username'];
$password = $_POST['Password'];

// cek data apakah ada data yang di input sesuai dengan database
$user = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");

// cekcek data yang masuk dari query

if (mysqli_num_rows($user) > 0) {
    $data = mysqli_fetch_array($user);
    // simpan data ke session
    session_start();
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['nama_lengkap'] = $data['nama_lengkap'];
    $_SESSION['foto'] = $data['foto'];
    $_SESSION['level'] = $data['level'];
    if ($data['level'] == 'admin') {
        echo "<script>
        alert('login berhasil ');
        window.location.href= '../index.php';
    </script>";
    } else {
        echo "<script>
        alert('login berhasil ');
        window.location.href= '../../index.php?page=shop/index';
    </script>";
    }

} else {
    echo "<script>
    
    alert('login gagal ');
    window.location.href= 'index.php';
</script>";


}