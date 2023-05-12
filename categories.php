<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('location:index.php');
}
include_once('layouts/header.php') ?>
<main>

    <section class="container mb-5">
        <h2 class="pb-2 border-bottom text-center">All Categories</h2>
        <div class="card">
            <div class="card-body">
                <a href="form-category.php" class="btn btn-primary">Add Data</a>
                <table class="table table-responsive table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $query = "SELECT * FROM kategori ORDER by id ASC";
                        $stmt = $dbh->query($query);
                        $stmt = $stmt->fetchAll();
                        foreach ($stmt as $row) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['nama_kategori'] ?></td>
                                <td>
                                    <a href="product.php?kategori_id=<?= $row['id'] ?>" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                    <a href="form-category.php?idedit=<?= $row['id'] ?>" class="btn btn-sm btn-warning"><i class="fas fa-pen"></i></a>
                                    <a href="form-category.php?iddel=<?= $row['id'] ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <?php include_once('layouts/footer.php') ?>