<?php
session_start();
// cek jika blom login
if (!isset($_SESSION['username']) && (isset($_SESSION['username']))) {
    echo "<script>
    alert('Harap Login Terlebih Dahulu Dex!');
    window.location.href = 'login/index.php';
    </script>";
} else {

    include "koneksi.php";
    include "layout/header.php";
    include "layout/navbar.php";
    // include "layout/index.php";
    include "content.php";
    include "layout/footer.php";
}