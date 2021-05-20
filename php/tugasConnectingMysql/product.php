<?php
session_start();
require('function.php');

$products = getAll($conn);

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

    <!-- Btn insert -->
    <div class="row mb-3">
        <div class="col">
            <form action="" method="GET">
                <input type="hidden" name="insert" value="true">
                <button type="submit" class="btn btn-sm btn-outline-primary">INSERT</button>
            </form>
        </div>
    </div>
    <!-- End Btn Insert -->

    <!-- Content Row form-->
    <?php if (isset($_GET['insert']) && $_GET['insert'] === 'true') : ?>
        <div class="row">
            <div class="col">
                <form action="http://localhost/kelas/jukahpin/php/tugasConnectingMysql/insert_proses.php" method="POST">
                    <input type="hidden" name="session" value="true">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Nama Produk</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control <?php echo (isset($_SESSION['error_name'])) ?  'is-invalid' : ''; ?>" id="name" name="name" required>
                            <div class="invalid-feedback">
                                <?php echo $_SESSION['error_name'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="category" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control <?php echo (isset($_SESSION['error_category'])) ?  'is-invalid' : ''; ?>" id="category" name="category" required>
                            <div class="invalid-feedback">
                                <?php echo $_SESSION['error_category'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="price" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control <?php echo (isset($_SESSION['error_price'])) ?  'is-invalid' : ''; ?>" id="price" name="price" required>
                            <div class="invalid-feedback">
                                <?php echo $_SESSION['error_price'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="qty" class="col-sm-2 col-form-label">Jumlah</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control <?php echo (isset($_SESSION['error_qty'])) ?  'is-invalid' : ''; ?>" id="qty" name="qty" required>
                            <div class="invalid-feedback">
                                <?php echo $_SESSION['error_qty'] ?>
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
    <!-- End Content Row Form -->

    <!-- Content Row Table-->
    <div class="row">
        <div class="col overflow-auto">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as  $i => $product) : ?>
                        <tr>
                            <td><?php echo ++$i ?></td>
                            <td><?php echo strtoupper($product['name']) ?></td>
                            <td><?php echo ucwords($product['category']) ?></td>
                            <td>Rp.<?php echo number_format($product['price'], 2, ",", "."); ?></td>
                            <td><?php echo $product['qty'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- End Content Row Table -->

</div>
<!-- /.container-fluid -->

<?php require('../tugasFunctionSession/layout/footer.php') ?>