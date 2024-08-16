<?php
//memulai session
session_start();
// menghapus data session
session_destroy();
echo "<script>
    
alert('berhasil logout ');
window.location.href= 'index.php';
</script>";

