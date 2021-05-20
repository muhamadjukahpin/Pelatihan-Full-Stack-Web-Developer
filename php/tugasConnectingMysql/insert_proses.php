<?php

session_start();

if (!isset($_POST['session'])) {
    header('Location: http://localhost/kelas/jukahpin/php/tugasConnectingMysql/product.php');
    exit;
}

function check($nama, $kategori, $harga, $jumlah)
{
    if (!preg_match('/[a-zA-Z]/', $nama)) {
        $_SESSION['error_name'] = "Nama Produk harus mengandung huruf dan harus di isi";
    }
    if (!preg_match('/[a-zA-Z]/', $kategori)) {
        $_SESSION['error_category'] = "Kategori harus mengandung huruf dan harus di isi";
    }
    if (!is_numeric($harga)) {
        $_SESSION['error_price'] = "Harga harus angka dan harus di isi";
    }
    if (!is_numeric($jumlah)) {
        $_SESSION['error_qty'] = "jumlah harus angka dan harus di isi";
    }

    return (empty($_SESSION)) ? true : header('Location: http://localhost/kelas/jukahpin/php/tugasConnectingMysql/product.php?insert=true');
}

function rupiah($harga)
{
    return "Rp." . number_format($harga, 0, "", ".");
}

check($_POST['name'], $_POST['category'], $_POST['price'], $_POST['qty']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Proses</title>
</head>

<body>
    <h1>Berhasil Memasukkan Data</h1>
    <table border="1" cellpadding="5px">
        <thead style="background-color: black; color:white; font-weight:bold;">
            <tr>
                <th scope="col">Nama Produk</th>
                <th scope="col">Harga</th>
                <th scope="col">Kategori</th>
                <th scope="col">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo strtoupper($_POST['name']) ?></td>
                <td><?php echo rupiah($_POST['price']) ?></td>
                <td><?php echo ucwords($_POST['category']) ?></td>
                <td><?php echo $_POST['qty'] ?></td>
            </tr>
        </tbody>
    </table>
    <a href="http://localhost/kelas/jukahpin/php/tugasConnectingMysql/product.php?insert=true" style="margin: 20px; display:inline-block;">Back</a>
</body>

</html>