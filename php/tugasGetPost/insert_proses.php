<?php

if (!isset($_POST['session'])) {
    header('Location: http://localhost/kelas/jukahpin/php/tugasGetPost/product.php');
    exit;
}

echo "<h1>Berhasil Memasukan data</h1>";

echo "Nama : " . $_POST['namaProduk'] . "<br>";
echo "Kategori: " .  $_POST['kategori'] . "<br>";
echo "Harga : " . number_format($_POST['harga'], '0', '', '.') . "<br>";
echo "Jumlah : " . $_POST['jumlah'] . "<br>";
