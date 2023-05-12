<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('location:index.php');
}
include_once('layouts/header.php') ?>
<main>

    <section class="container mb-5">
        <h2 class="pb-2 border-bottom text-center">All Order</h2>
        <a href="form-order.php" class="btn btn-primary mb-3">Add Data</a>
        <div class="card">
            <div class="card-body">
                <table class="table table-responsive table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Date</th>
                            <th>Order Number</th>
                            <th>Customer</th>
                            <th>Address</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $query = "SELECT * FROM pesanan INNER JOIN produk ON produk.id = pesanan.produk_id";
                        $stmt = $dbh->query($query);
                        $stmt = $stmt->fetchAll();
                        foreach ($stmt as $row) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= date('d F Y', strtotime($row['tanggal'])); ?></td>
                                <td><?= $row['order_number'] ?></td>
                                <td><?= $row['nama_cust'] ?></td>
                                <td><?= $row['alamat'] ?></td>
                                <td><?= $row['nama_produk'] ?></td>
                                <td>Rp.<?= number_format($row['harga']) ?></td>
                                <td><?= $row['qty'] ?></td>
                                <td>Rp.<?= number_format($row['harga'] * $row['qty']) ?></td>
                                <td>
                                    <a href="form-order.php?iddel=<?= $row['id'] ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <?php include_once('layouts/footer.php') ?>