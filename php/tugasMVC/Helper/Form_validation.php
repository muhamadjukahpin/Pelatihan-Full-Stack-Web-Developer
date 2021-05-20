<?php

// function validation
function check($data)
{
    $errors = [];
    if (!preg_match('/[a-zA-Z]/', $data['name'])) {
        $errors[] = "Nama Produk harus mengandung huruf dan harus di isi";
    }
    if (!preg_match('/^[a-zA-Z\s]+$/', $data['category'])) {
        $errors[] = "Kategori harus huruf dan harus di isi";
    }
    if (!is_numeric($data['price'])) {
        $errors[] = "Harga harus angka dan harus di isi";
    }
    if (!is_numeric($data['qty'])) {
        $errors[] = "jumlah harus angka dan harus di isi";
    }

    $_SESSION['errors'] = $errors;

    return (empty($_SESSION['errors'])) ? true : false;
}
