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
