<?php
session_start();

require('function.php');
$delete = delete($conn, $_GET['id']);

if ($delete === true) {
    $_SESSION['message_success'] = "Anda berhasil menghapus data";
    header('Location: http://localhost/kelas/jukahpin/php/tugasInsertDelete/product.php');
} else {
    $_SESSION['message_failed'] = "Anda gagal menghapus data";
    header('Location: http://localhost/kelas/jukahpin/php/tugasInsertDelete/product.php');
}
