<?php
session_start();
$url = "Location: http://localhost/kelas/jukahpin/php/tugasUpdate/product.php";

require('function.php');
$delete = delete($conn, $_GET['id']);

if ($delete === true) {
    $_SESSION['message_success'] = "Anda berhasil menghapus data";
    header($url);
} else {
    $_SESSION['message_failed'] = "Anda gagal menghapus data";
    header($url);
}
