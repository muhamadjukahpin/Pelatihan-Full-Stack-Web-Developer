<?php

$servername = "localhost";
$dbname = 'db_products';
$username = "root";
$password = NULL;

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function getAll($conn)
{
    $array = [];
    $result = $conn->query("SELECT * FROM tbl_products");
    $i = 0;
    while ($row = $result->fetch_assoc()) {
        $array[$i]['product_id'] = $row['product_id'];
        $array[$i]['name'] = $row['name'];
        $array[$i]['category'] = $row['category'];
        $array[$i]['price'] = $row['price'];
        $array[$i]['qty'] = $row['qty'];
        $i++;
    }

    return $array;
}

function insert($conn, $data)
{
    $query = "INSERT INTO tbl_products (name, category, price, qty) VALUES ('" . $data["name"] . "', '" . $data["category"] . "', '" . $data["price"] . "','" . $data['qty'] . "')";
    return $conn->query($query);
}

function delete($conn, $id)
{
    $query = "DELETE FROM tbl_products WHERE product_id=$id";
    return $conn->query($query);
}

function check($data)
{

    $errors = [];
    if (!preg_match('/[a-zA-Z]/', $data['name'])) {
        $errors[] = "Nama Produk harus mengandung huruf dan harus di isi";
    }
    if (!preg_match('/[a-zA-Z]/', $data['category'])) {
        $errors[] = "Kategori harus mengandung huruf dan harus di isi";
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
