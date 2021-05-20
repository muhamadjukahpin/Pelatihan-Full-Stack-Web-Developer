<?php

// inheritance
class Connection
{
    private $servername = "localhost",
        $dbname = 'db_products',
        $username = "root",
        $password = NULL;

    protected $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
}

class Product extends Connection
{
    public function getAll()
    {
        return $this->conn->query("SELECT * FROM tbl_products");
    }
}

class User extends Connection
{
    public function getAll()
    {
        return $this->conn->query("SELECT * FROM tbl_users");
    }
}

$products = new Product();
$users = new User();
$result_products = $products->getAll();
$result_users = $users->getAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }

        td {
            padding: 10px;
        }
    </style>
    <title>inheritance</title>
</head>

<body>
    <table>
        <caption>Data Users</caption>
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            while ($user = $result_users->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo strtoupper($user['name']) ?></td>
                    <td><?php echo ucwords($user['email']) ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <hr>
    <table>
        <caption>Data Produk</caption>
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Kategori</th>
                <th scope="col">Harga</th>
                <th scope="col">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            while ($product = $result_products->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo strtoupper($product['name']) ?></td>
                    <td><?php echo ucwords($product['category']) ?></td>
                    <td>Rp.<?php echo number_format($product['price'], 2, ",", "."); ?></td>
                    <td><?php echo $product['qty'] ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</body>

</html>