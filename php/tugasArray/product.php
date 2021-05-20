<?php

$products = [
    ["nama" => "matematika", "harga" => 10000, "kategori" => "buku", "jumlah" => 1],
    ["nama" => "IPA", "harga" => 10000, "kategori" => "buku", "jumlah" => 5],
    ["nama" => "IPS", "harga" => 10000, "kategori" => "buku", "jumlah" => 10],
    ["nama" => 'B.Inggris', "harga" => 10000, "kategori" => "buku", "jumlah" => 15],
    ["nama" => 'ALGORITMA DAN PEMROGRAMAN', "harga" => 100000, "kategori" => "buku", "jumlah" => 1],
    ["nama" => 'Struktur Data', "harga" => 100000, "kategori" => "buku", "jumlah" => 11],
    ["nama" => 'HARDDISK 1TB', "harga" => 500000, "kategori" => "komputer", "jumlah" => 2],
    ["nama" => 'RAM 8GB', "harga" => 200000, "kategori" => "komputer", "jumlah" => 4],
    ["nama" => 'Processor CORE I3', "harga" => 1000000, "kategori" => "komputer", "jumlah" => 4],
    ["nama" => 'Monitor', "harga" => 100000, "kategori" => "komputer", "jumlah" => 7],
];

?>

<?php require('../tugasFunctionSession/layout/header.php') ?>
<?php require('layout/sidebar.php') ?>
<?php require('../tugasFunctionSession/layout/topbar.php') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 title">Data Product</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col overflow-auto">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as  $i => $product) : ?>
                        <tr>
                            <td><?php echo ++$i ?></td>
                            <td><?php echo strtoupper($product['nama']) ?></td>
                            <td>Rp.<?php echo number_format($product['harga'], 2, ",", "."); ?></td>
                            <td><?php echo ucwords($product['kategori']) ?></td>
                            <td><?php echo $product['jumlah'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php require('../tugasFunctionSession/layout/footer.php') ?>