<?php
include "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_pesanan = $_POST['id_pesanan'];
    $id_user = $_POST['id_userpesan'];
    $status_pesanan = $_POST['status_pesanan'];

    // Validasi input
    if (!empty($id_pesanan) && !empty($status_pesanan)) {
        // Update status pesanan di database
        $query = "UPDATE pesanan SET status_pesanan = '$status_pesanan' WHERE id_pesanan = '$id_pesanan'and id_user ='$id_user'";
        if (mysqli_query($koneksi, $query)) {
            echo json_encode(['status' => 'success', 'message' => 'Status pesanan berhasil diupdate']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal mengupdate status pesanan']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Data tidak lengkap']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>