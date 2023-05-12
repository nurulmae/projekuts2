<?php
session_start();
include_once('layouts/header.php') ?>
<main>

  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="bd-placeholder-img" width="100%" height="100%" src="https://img.freepik.com/free-photo/stylish-happy-girl-shopping-portrait-modern-woman-with-shop-bag-laughing-smiling-satisfied_1258-119361.jpg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
        </img>

        <div class="container">
          <div class="carousel-caption text-start text-dark">
            <h1>Unleash Your Inner Fashionista with <br> Our Bold Clothing Line</h1>
            <p>Make a statement with our bold and daring clothing collection.</p>
            <p><a class="btn btn-lg btn-primary" href="order.php">Order now</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="bd-placeholder-img" height="100%" src="https://img.freepik.com/free-photo/exited-attractive-woman-stylish-colorful-outfit-holding-shopping-bags-with-exited-happy-face-expression-emotional-pink-yellow-background-polo-neck-striped-mini-skirt-sale-discout-shopaholic_285396-2423.jpg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
        </img>
        <div class="container">
          <div class="carousel-caption">
            <h1>Elevate Your Wardrobe with Our Sustainable Clothing Collection</h1>
            <p>Join the movement towards sustainable fashion with our eco-friendly clothing collection.</p>
            <p><a class="btn btn-lg btn-primary" href="order.php">Order now</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="bd-placeholder-img" width="100%" height="100%" src="https://img.freepik.com/free-photo/stylish-asian-senior-woman-going-shopping-wearing-trendy-clothes-sunglasses-holding-store-bags-w_1258-158236.jpg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
        </img>
        <div class="container">
          <div class="carousel-caption text-end">
            <h1>Get Ready for Summer with <br>Our Latest Collection</h1>
            <p>Shop now and get ready to make a splash this season!</p>
            <p><a class="btn btn-lg btn-primary" href="order.php">Order now</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="container px-4 py-5 bg-light" id="featured-3">
    <h2 class="pb-2 border-bottom text-center">Why Our?</h2>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
      <div class="feature col">
        <h2>Selection of High-Quality Products</h2>
        <p>Our store offers a wide range of high-quality clothing products, from casual wear to formal attire, for
          both men and
          women. Our collection includes trendy and stylish designs that cater to all fashion preferences.</p>
      </div>
      <div class="feature col">
        <h2>Excellent Customer Service</h2>
        <p>Our team of friendly and knowledgeable customer service representatives is always ready to assist you with
          any queries
          or concerns you may have. We prioritize our customers' satisfaction and work hard to ensure that you have a
          smooth and
          enjoyable shopping experience with us.</p>

      </div>
      <div class="feature col">
        <h2>Convenient Online Shopping</h2>
        <p>Our online store allows you to shop for your favorite clothing items from the comfort of your own home. We
          offer a
          user-friendly interface and secure payment options to make your online shopping experience hassle-free and
          convenient.
          Plus, we offer fast and reliable shipping to ensure that your purchases arrive at your doorstep in no time.
        </p>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="text-center">
      <h2 class="pb-2 border-bottom text-center">Categories</h2>
      <small><i class="text-center">side slide</i></small>
    </div>
    <div class="pt-2 owl-carousel owl-theme">
      <?php
      $query = "SELECT * FROM kategori";
      $stmt = $dbh->query($query);
      $stmt = $stmt->fetchAll();
      foreach ($stmt as $row) {
      ?>
        <div class="item">
          <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow" style="background-image: url('assets/img/unsplash-photo-2.jpg');">
            <div class="d-flex flex-column h-100 p-5 text-white text-shadow-1">
              <h2 class="pt-5  display-8 lh-1 fw-bold text-center"><a href="product.php?kategori_id=<?= $row['id'] ?>" class="text-light text-decoration-none"><?= $row['nama_kategori'] ?></a></h2>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>

  <section class="container mb-5">
    <h2 class="pb-2 border-bottom text-center">Top Products</h2>
    <div class="pt-2 row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 justify-content-center">
      <?php
      $query = "SELECT * FROM produk ORDER BY rand() LIMIT 8";
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