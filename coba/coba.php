<?php
$text = "asdftyguhijok Kabupaten Garut Provinsi Jawa Barat Kode Pos 44126 jne JTR; 115000; 9-10 Hari";

// Split string berdasarkan karakter ';'
$parts = explode(';', $text);

// Ambil nilai yang ada di bagian kedua array (nilai di index 1)
if (isset($parts[1])) {
    $nilai = trim($parts[1]); // Trim untuk menghilangkan spasi di sekitar nilai
    echo "Nilai yang diambil adalah: $nilai";
} else {
    echo "Tidak ada nilai yang ditemukan.";
}
?>