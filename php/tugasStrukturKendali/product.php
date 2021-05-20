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
        <div class="col-md-6">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Produk</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo "Komputer " . $i; ?></td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php require('../tugasFunctionSession/layout/footer.php') ?>