<?php
session_start();
$url = "Location: http://localhost/kelas/jukahpin/php/tugasSearching/product.php";

if (!isset($_POST['session'])) {
    header($url);
    exit;
}

require('function.php');

$data = [
    'name' => htmlspecialchars($_POST['name']),
    'category' => htmlspecialchars($_POST['category']),
    'price' => htmlspecialchars($_POST['price']),
    'qty' => htmlspecialchars($_POST['qty'])
];

if (check($data) === false) {
    header($url . '?insert=true');
    exit;
}

if (insert($conn, $data) === true) {
    $_SESSION['message_success'] = "Anda berhasil memasukkan data";
    header($url);
} else {
    $_SESSION['message_failed'] = "Anda gagal memasukkan data";
    header($url);
}
