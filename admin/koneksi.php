<?php
$koneksi = mysqli_connect("localhost", "root", "", "ecommerce");
function get_first_5_words($text)
{
    $words = explode(' ', $text);
    $first_50_words = array_slice($words, 0, 5);
    return implode(' ', $first_50_words);
}
