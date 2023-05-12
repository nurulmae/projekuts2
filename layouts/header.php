<?php
require_once('db/dbconnection.php') ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Clothing E-Commmerce</title>
    <!-- link css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/carousel.css" rel="stylesheet">
    <link href="assets/css/sticky-footer-navbar.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- jQuery Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Owl Carousel JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link href="assets/css/style.css" rel="stylesheet">

<body>

    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Clothing E-Commmerce</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>

                        <?php
                        if (isset($_SESSION['email'])) { ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Products
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="product.php">All Product</a></li>
                                    <li><a class="dropdown-item" href="form-product.php">Add Product</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Categories
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="categories.php">All Categories</a></li>
                                    <li><a class="dropdown-item" href="form-category.php">Add Category</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <?php
                                    $query = "SELECT * FROM kategori";
                                    $stmt = $dbh->query($query);
                                    $stmt = $stmt->fetchAll();
                                    foreach ($stmt as $row) {
                                    ?>
                                        <li><a class="dropdown-item" href="product.php?kategori_id=<?= $row['id'] ?>"><?= $row['nama_kategori'] ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active " aria-current="page" href="order.php">Order</a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a class="nav-link active " aria-current="page" href="product.php">Products</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Categories
                                </a>
                                <ul class="dropdown-menu">
                                    <?php
                                    $query = "SELECT * FROM kategori";
                                    $stmt = $dbh->query($query);
                                    $stmt = $stmt->fetchAll();
                                    foreach ($stmt as $row) {
                                    ?>
                                        <li><a class="dropdown-item" href="product.php?kategori_id=<?= $row['id'] ?>"><?= $row['nama_kategori'] ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>
                    </ul>
                    <?php
                    if (isset($_SESSION['email'])) {
                        echo '<a class="btn btn-outline-success" href="login.php?logout">Logout</a>';
                    } else {
                        echo '<a class="btn btn-outline-success" href="login.php">Login</a>';
                    }
                    ?>
                </div>
            </div>
        </nav>
    </header>