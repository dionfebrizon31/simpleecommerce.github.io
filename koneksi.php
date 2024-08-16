<?php
$koneksi = mysqli_connect("localhost", "root", "", "ecommerce");
function get_first_50_words($text)
{
    $words = explode(' ', $text);
    $first_50_words = array_slice($words, 0, 10);
    return implode(' ', $first_50_words);
}
function frist_panjang($panjang, $text)
{
    $words = explode(' ', $text);
    $first_50_words = array_slice($words, 0, $panjang);
    return implode(' ', $first_50_words);
}
