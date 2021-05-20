<?php

session_start();

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

<?php require('layout/header.php') ?>
<?php require('layout/sidebar.php') ?>
<?php require('layout/topbar.php') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 title">Data Product</h1>
    </div>

    <!-- btn insert -->
    <div class="row mb-3">
        <div class="col">
            <form action="" method="GET">
                <input type="hidden" name="insert" value="true">
                <button type="submit" class="btn btn-sm btn-outline-primary">INSERT</button>
            </form>
        </div>
    </div>
    <!-- Content Row -->
    <?php if (isset($_GET['insert']) && $_GET['insert'] === 'true') : ?>
        <div class="row">
            <div class="col">
                <form action="http://localhost/kelas/jukahpin/php/tugasFunctionSession/insert_proses.php" method="POST">
                    <input type="hidden" name="session" value="true">
                    <div class="form-group row">
                        <label for="namaProduk" class="col-sm-2 col-form-label">Nama Produk</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control <?php echo (isset($_SESSION['error_namaProduk'])) ?  'is-invalid' : ''; ?>" id="namaProduk" name="namaProduk" required>
                            <div class="invalid-feedback">
                                <?php echo $_SESSION['error_namaProduk'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control <?php echo (isset($_SESSION['error_kategori'])) ?  'is-invalid' : ''; ?>" id="kategori" name="kategori" required>
                            <div class="invalid-feedback">
                                <?php echo $_SESSION['error_kategori'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control <?php echo (isset($_SESSION['error_harga'])) ?  'is-invalid' : ''; ?>" id="harga" name="harga" required>
                            <div class="invalid-feedback">
                                <?php echo $_SESSION['error_harga'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control <?php echo (isset($_SESSION['error_jumlah'])) ?  'is-invalid' : ''; ?>" id="jumlah" name="jumlah" required>
                            <div class="invalid-feedback">
                                <?php echo $_SESSION['error_jumlah'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row d-flex justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
                <?php session_destroy(); ?>
            </div>
        </div>
    <?php endif; ?>

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

<?php require('layout/footer.php') ?>