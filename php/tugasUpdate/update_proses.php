<?php
session_start();
$url = "Location: http://localhost/kelas/jukahpin/php/tugasUpdate/product.php";

if (!isset($_POST['session'])) {
    header($url);
    exit;
}

require('function.php');

$data = [
    'product_id' => $_POST['product_id'],
    'name' => $_POST['name'],
    'category' => $_POST['category'],
    'price' => $_POST['price'],
    'qty' => $_POST['qty']
];

if (check($data) === false) {
    header("Location: http://localhost/kelas/jukahpin/php/tugasUpdate/form_update.php?id=" . $_POST['product_id']);
    exit;
}

if (update($conn, $data) === true) {
    $_SESSION['message_success'] = "Anda berhasil mengubah data";
    header($url);
} else {
    $_SESSION['message_failed'] = "Anda gagal mengubah data";
    header($url);
}
