<?php
session_start();

require('../Helper/Url.php');

$location = "Location: ";
if (empty($_GET['action'])) {
    header($location . url('product'));
    exit;
}
require('../Model/ProductModel.php');
require('../Helper/Form_validation.php');

// jika actioonnya detail
if ($_GET['action'] == 'detail') {
    $_SESSION['product_detail'] = getByWhere($conn, 'product_id', $_GET["id"]);
    if (empty($_SESSION['product_detail'])) {
        header($location . url('product'));
        exit;
    }
    header($location . url('product/detail.php'));
    exit;
}

// jika actionnya insert
if ($_GET['action'] == 'insert') {
    $data = [
        'name' => htmlspecialchars($_POST['name']),
        'category' => htmlspecialchars($_POST['category']),
        'price' => htmlspecialchars($_POST['price']),
        'qty' => htmlspecialchars($_POST['qty'])
    ];

    if (empty($data)) {
        header($location . url('product'));
        exit;
    }

    if (check($data) === false) {
        header("Location:" . url('product?insert=true'));
        exit;
    }

    if (insert($conn, $data) === true) {
        $_SESSION['message_success'] = "Anda berhasil memasukkan data";
        header($location . url('product'));
        exit;
    } else {
        $_SESSION['message_failed'] = "Anda gagal memasukkan data";
        header($location . url('product'));
        exit;
    }
}


// jika actionnya edit
if ($_GET['action'] == 'edit') {
    $_SESSION['product_edit'] = getByWhere($conn, 'product_id', $_GET["id"]);
    if (empty($_SESSION['product_edit'])) {
        header($location . url('product'));
        exit;
    }
    header($location . url('product/form_update.php?id=' . $_GET["id"]));
    exit;
}


// jika actionnya update
if ($_GET['action'] == 'update') {
    $data = [
        'product_id' => htmlspecialchars($_POST['product_id']),
        'name' => htmlspecialchars($_POST['name']),
        'category' => htmlspecialchars($_POST['category']),
        'price' => htmlspecialchars($_POST['price']),
        'qty' => htmlspecialchars($_POST['qty'])
    ];

    if (empty($data)) {
        header($location . url('product'));
        exit;
    }

    if (check($data) === false) {
        header($location . url('product/form_update.php?id=') . $_POST['product_id']);
        exit;
    }

    if (update($conn, $data) === true) {
        $_SESSION['message_success'] = "Anda berhasil mengubah data";
        header($location . url('product'));
        exit;
    } else {
        $_SESSION['message_failed'] = "Anda gagal mengubah data";
        header($location . url('product'));
        exit;
    }
}

// jika actionnya delete
if ($_GET['action'] == 'delete') {
    if (delete($conn, $_GET['id']) === true) {
        $_SESSION['message_success'] = "Anda berhasil menghapus data";
        header($location . url('product'));
        exit;
    } else {
        $_SESSION['message_failed'] = "Anda gagal menghapus data";
        header($location . url('product'));
        exit;
    }
}

$_SESSION['message_failed'] = "Tidak ada action";
header($location . url('product'));
