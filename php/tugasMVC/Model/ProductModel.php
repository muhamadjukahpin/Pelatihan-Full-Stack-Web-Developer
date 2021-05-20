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

function getByWhere($conn, $key, $value)
{
    return $conn->query("SELECT * FROM tbl_products WHERE $key='$value'")->fetch_assoc();
}

function getBySortPrice($conn, $sort)
{
    $array = [];
    $result = $conn->query("SELECT * FROM tbl_products ORDER BY price $sort");
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

function search($conn, $keyword, $sort)
{
    $array = [];
    if ($sort == '') {
        $query = "SELECT * FROM tbl_products WHERE name LIKE '%$keyword%' OR category LIKE '%$keyword%'";
    } else {
        $query = "SELECT * FROM tbl_products WHERE name LIKE '%$keyword%' OR category LIKE '%$keyword%' ORDER BY price $sort";
    }
    $result = $conn->query($query);
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
    $query = "INSERT INTO tbl_products (name, category, price, qty) VALUES ('" . $data["name"] . "','" . $data["category"] . "','" . $data["price"] . "','" . $data["qty"] . "')";
    return $conn->query($query);
}

function delete($conn, $id)
{
    $query = "DELETE FROM tbl_products WHERE product_id=$id";
    return $conn->query($query);
}

function update($conn, $data)
{
    $query = "UPDATE tbl_products SET 
                name='" . $data["name"] . "', 
                category='" . $data["category"] . "', 
                price='" . $data["price"] . "', 
                qty='" . $data["qty"] . "' 
                WHERE 
                product_id=" . $data["product_id"];

    return $conn->query($query);
}
