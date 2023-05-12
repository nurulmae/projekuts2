<?php
require_once 'db/dbconnection.php';
if (isset($_POST['email']) && isset($_POST['password'])) {
  session_start();
  $_email = $_POST['email'];
  $_password = $_POST['password'];

  if ($_email == "admin@admin.com" && $_password == "admin123") {
    // berhasil login
    $_SESSION['email'] = $_email;
    $_SESSION['status'] = 'login';

    // alert
    echo "<script>alert('Login Berhasil')</script>";
    echo "<script>window.location.replace('index.php')</script>";
  } else {
    // alert
    echo "<script>alert('Login gagal')</script>";
    echo "<script>window.location.replace('login.php')</script>";
  }
} elseif (isset($_GET['logout'])) {
  session_start();
  session_destroy();
  // alert
  echo "<script>alert('logout berhasil')</script>";
  echo "<script>window.location.replace('login.php')</script>";
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <title>Clothing E-Commmerce</title>
  <!-- link css -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">

  <!-- Owl Carousel JavaScript -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/signin.css" rel="stylesheet">

<body class="text-center bg-light">
  <main class="form-signin">
    <div class="card shadow">
      <div class="card-body">
        <form method="post">
          <img class="mb-4" src="https://img.freepik.com/premium-vector/clothing-store-logo-design-inspiration-vector-illustration_500223-477.jpg?w=740" alt="" height="100">
          <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

          <div class="form-floating">
            <input type="email" class="form-control" name="email" id="floatingInput" value="admin@admin.com" required>
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingPassword" value="admin123" required>
            <label for="floatingPassword">Password</label>
          </div>

          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
          <a class="w-100 btn btn-lg btn-secondary mt-3" href="index.php">Back</a>
          <p class="mt-5 mb-3 text-muted">&copy; <?= date('Y') ?></p>
        </form>
      </div>
    </div>
  </main>



</body>

</html>