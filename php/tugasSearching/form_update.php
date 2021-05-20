<?php
session_start();

require('function.php');
$product = getByWhere($conn, 'product_id', $_GET['id']);
if ($product === NULL) {
    header('Location: http://localhost/kelas/jukahpin/php/tugasSearching/product.php');
    exit;
}

?>

<?php require('../tugasFunctionSession/layout/header.php') ?>
<?php require('layout/sidebar.php') ?>
<?php require('../tugasFunctionSession/layout/topbar.php') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 title">Form Edit Data</h1>
    </div>

    <!-- Message Error validation -->
    <?php if (isset($_SESSION['errors'])) : ?>
        <div class="row">
            <div class="col-md-8">
                <div class="alert alert-danger" role="alert">
                    <ul style="margin-bottom: 0;">
                        <?php foreach ($_SESSION['errors'] as $error) : ?>
                            <li><?php echo $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!--  End Message Error validation-->

    <!-- Content Row form-->
    <div class="row">
        <div class="col">
            <form action="update_proses.php" method="POST">
                <input type="hidden" name="session" value="true">
                <input type="hidden" name="product_id" value="<?php echo $product['product_id'] ?>">
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Nama Produk</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $product['name'] ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="category" class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="category" name="category" value="<?php echo $product['category'] ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-7">
                        <input type="number" class="form-control" id="price" name="price" value="<?php echo $product['price'] ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="qty" class="col-sm-2 col-form-label">Jumlah</label>
                    <div class="col-sm-7">
                        <input type="number" class="form-control" id="qty" name="qty" value="<?php echo $product['qty'] ?>" required>
                    </div>
                </div>
                <div class="form-group row d-flex justify-content-end">
                    <div class="col-sm-10">
                        <a href="http://localhost/kelas/jukahpin/php/tugasSearching/product.php" class="btn btn-sm btn-secondary">Back</a>
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Content Row Form -->

    <?php session_destroy() ?>
</div>
<!-- /.container-fluid -->




<?php require('../tugasFunctionSession/layout/footer.php') ?>