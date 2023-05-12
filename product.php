<?php
session_start();
include_once('layouts/header.php') ?>
<main>

    <section class="container mb-5">
        <h2 class="pb-2 border-bottom text-center">All Products <?php if (isset($_GET['kategori_id'])) {
                                                                    echo "category";
                                                                } ?></h2>
        <?php
        if (isset($_SESSION['email'])) { ?>
            <a href="form-product.php" class="btn btn-primary">Add Data</a>
        <?php } ?>
        <div class="pt-2 row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 justify-content-center">
            <?php
            if (isset($_GET['kategori_id'])) {
                $kategori_id = $_GET['kategori_id'];
                $query = "SELECT * FROM produk WHERE kategori_id = $kategori_id";
            } else {
                $query = "SELECT * FROM produk ORDER BY rand()";
            }
            $stmt = $dbh->query($query);
            $stmt = $stmt->fetchAll();
            foreach ($stmt as $row) {
            ?>
                <div class="col-md-3">
                    <div class="card shadow">
                        <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="assets/img/product/<?= $row['thumbnail'] ?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                        </img>

                        <div class="card-body">
                            <h5 class="text-center"><a href="detail-product.php?id=<?= $row['id'] ?>" class="text-dark text-decoration-none"><?= $row['nama_produk'] ?></a></h5>
                            <h6 class="card-text text-dark text-center">Rp.<?= number_format($row['harga']) ?></h6>
                            <div class="container">
                                <div class="d-flex justify-content-between align-items-center btn-group">
                                    <?php
                                    if (isset($_SESSION['email'])) {
                                    ?>
                                        <a href="form-order.php?produk_id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-info"><i class="fas fa-cart-shopping"></i></a>
                                        <a href="detail-product.php?sku=<?= $row['sku'] ?>" class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i></a>
                                        <a href="form-product.php?idedit=<?= $row['id'] ?>" class="btn btn-sm btn-outline-warning"><i class="fas fa-pen"></i></a>
                                        <a href="form-product.php?iddel=<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></a>
                                    <?php } else { ?>
                                        <a href="form-order.php?produk_id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-info"><i class="fas fa-cart-shopping"></i></a>
                                        <a href="detail-product.php?sku=<?= $row['sku'] ?>" class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
    <?php include_once('layouts/footer.php') ?>