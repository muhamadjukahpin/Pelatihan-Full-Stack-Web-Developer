<?php
session_start();

require('function.php');
$product = getByWhere($conn, 'product_id', $_GET['id']);
if ($product === NULL) {
    header('Location: http://localhost/kelas/jukahpin/php/tugasUpdate/product.php');
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
        <h1 class="h3 mb-0 text-gray-800 title">Detail Product</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="card" style="width: 20rem;">
            <div class="card-body">
                <h5 class="card-title mb-0 font-weight-bold"><?php echo ucwords($product['name']); ?></h5>
                <div class="d-flex justify-content-between" style="font-size: 12px; margin-top:3px;">
                    <span class="text-muted">Rp.<?php echo number_format($product['price'], '2', ',', '.'); ?></span>
                    <span class="text-muted">Qty: <?php echo $product['qty']; ?></span>
                </div>
                <p class="card-text mt-3">Kategori : <?php echo $product['category']; ?></p>
                <a href="http://localhost/kelas/jukahpin/php/tugasUpdate/product.php" class="card-link">Back</a>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

<?php require('../tugasFunctionSession/layout/footer.php') ?>