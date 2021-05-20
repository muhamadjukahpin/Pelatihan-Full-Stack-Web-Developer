<?php
session_start();
require('function.php');
$products = getAll($conn);

if (isset($_GET['sort'])) {
    $products = getBySortPrice($conn, $_GET['sort']);
}

if (isset($_POST['search'])) {
    $sort = isset($_GET['sort']) ? $_GET['sort'] : '';
    $products = search($conn, htmlspecialchars($_POST['keyword']), $sort);
}

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
        <div class="row">
            <div class="col">
                <form action="insert.php" method="POST">
                    <input type="hidden" name="session" value="true">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Nama Produk</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="category" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="category" name="category" required>
                            <div class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="price" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" id="price" name="price" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="qty" class="col-sm-2 col-form-label">Jumlah</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" id="qty" name="qty" required>
                        </div>
                    </div>
                    <div class="form-group row d-flex justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php endif; ?>
    <!-- End Content Row Form -->

    <!-- Message -->
    <?php if (isset($_SESSION['message_success']) || isset($_SESSION['message_failed'])) : ?>
        <div class="row">
            <div class="col-md-7">
                <div class="alert alert-<?php echo (isset($_SESSION['message_success'])) ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert">
                    <?php echo (isset($_SESSION['message_success'])) ? $_SESSION['message_success'] : $_SESSION['message_failed']  ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- End Message -->

    <!-- Content Row Sort and Search-->
    <div class="row mb-3">
        <!-- Btn Sort -->
        <div class="col-4 col-sm-2 col-md-2 col-lg-1 d-flex align-items-center">
            <div class="btn-group">
                <a href="http://localhost/kelas/jukahpin/php/tugasSearching/product.php" type="button" class="btn btn-sm btn-primary">sort</a>
                <button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only"></span>
                </button>
                <div class="dropdown-menu">
                    <form action="" method="GET">
                        <button class="dropdown-item" name="sort" value="ASC">Harga Terendah</button>
                        <button class="dropdown-item" name="sort" value="DESC">Harga Tertinggi</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Btn Sort -->
        <!-- Btn Search -->
        <div class="col col-sm-7 col-md-7 col-lg-5">
            <form action="" method="POST">
                <div class="input-group">
                    <input type="text" class="form-control small" placeholder="Search for..." name="keyword" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" name="search">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- End Btn Search -->
    </div>
    <!-- End Content Row Sort and Search-->


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
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as  $i => $product) : ?>
                        <tr>
                            <td><?php echo ++$i ?></td>
                            <td><?php echo strtoupper($product['name']) ?></td>
                            <td><?php echo ucwords($product['category']) ?></td>
                            <td><?php echo number_format($product['price'], 0, '', '.') ?></td>
                            <td>
                                <a href="detail.php?id=<?php echo $product['product_id'] ?>" class="text-success">
                                    <span class="fas fa-eye"></span>
                                </a>
                                <a href="form_update.php?id=<?php echo $product['product_id'] ?>" class="text-warning">
                                    <span class="fas fa-edit"></span>
                                </a>
                                <a href="hapus.php?id=<?php echo $product['product_id'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus?')" class="text-danger">
                                    <span class="fas fa-trash-alt"></span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- End Content Row Table -->

    <?php session_destroy(); ?>


</div>
<!-- /.container-fluid -->

<?php require('../tugasFunctionSession/layout/footer.php') ?>