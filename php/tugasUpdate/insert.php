<?php
session_start();
$url = "Location: http://localhost/kelas/jukahpin/php/tugasUpdate/product.php";

if (!isset($_POST['session'])) {
    header($url);
    exit;
}

require('function.php');

$data = [
    'name' => $_POST['name'],
    'category' => $_POST['category'],
    'price' => $_POST['price'],
    'qty' => $_POST['qty']
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
