<?php
session_start();
include_once('layouts/header.php');
if (!empty($_GET['idedit'])) {
    $_idedit = $_GET['idedit'];
    $sql = "SELECT * FROM produk WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$_idedit]);
    $row = $st->fetch();
}
if (isset($_GET['iddel'])) {
    $sql = "DELETE FROM produk WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$_GET['iddel']]);
    echo "<script>alert('Data Berhasil Dihapus');location.href='order.php';</script>";
}
?>
<section class="py-5">
    <div class="container">
        <div class="card">
            <div class="card-header bg-white">
                <?php
                if (isset($_GET['order_number'])) {
                    echo '<h2 class="text-center pt-3 mb-2">Order Detail</h2>';
                } else {
                    echo '<h2 class="text-center pt-3 mb-2">Form Order</h2>';
                } ?>
            </div>
            <div class="card-body">
                <?php
                if (isset($_GET['order_number'])) { ?>
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $query = "SELECT * FROM pesanan INNER JOIN produk ON produk.id = pesanan.produk_id WHERE order_number = '$_GET[order_number]'";
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
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } else {
                ?>
                    <form method="post" action="proses-order.php" enctype="multipart/form-data">
                        <div class="form-group row mb-3">
                            <label for="order_number" class="col-4 col-form-label">Order Number</label>
                            <div class="col-8">
                                <?php
                                $query = "SELECT * FROM pesanan ORDER by idpesanan DESC LIMIT 1";
                                $stmt = $dbh->query($query);
                                $stmt = $stmt->fetch();
                                $order_number = $stmt['order_number'];
                                $order_number = substr($order_number, 3, 4);
                                $order_number = $order_number + 1;
                                $order_number = "ORD" . sprintf("%04s", $order_number);
                                ?>
                                <input type="text" class="form-control" id="order_number" name="order_number" placeholder="enter order number" value="<?= $order_number ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="nama_cust" class="col-4 col-form-label">Customer</label>
                            <div class="col-8">
                                <input type="text" class="form-control" id="nama_cust" name="nama_cust" placeholder="enter Customer" required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="alamat" class="col-4 col-form-label">Address</label>
                            <div class="col-8">
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="enter Adress" required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="produk_id" class="col-4 col-form-label">Produk ID</label>
                            <div class="col-8">
                                <select class="form-control" id="produk_id" name="produk_id" required>
                                    <option value="">Pilih Produk</option>
                                    <?php
                                    $sql2 = "SELECT * FROM produk";
                                    $st2 = $dbh->prepare($sql2);
                                    $st2->execute();
                                    while ($row2 = $st2->fetch()) {
                                        if (!empty($_GET['produk_id']) && $_GET['produk_id'] == $row2['id']) {
                                            echo "<option value='$row2[id]' selected>$row2[nama_produk]</option>";
                                        } else {
                                            echo "<option value='$row2[id]'>$row2[nama_produk]</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="qty" class="col-4 col-form-label">Quantity</label>
                            <div class="col-8">
                                <input type="text" class="form-control" min="1" id="qty" name="qty" value="1" required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-8 offset-4">
                                <input type="hidden" name="proses" value="<?php if (!empty($_GET['idedit'])) {
                                                                                echo "Update";
                                                                            } else {
                                                                                echo "Simpan";
                                                                            } ?>">
                                <input type="hidden" name="idedit" value="<?php if (!empty($_GET['idedit'])) {
                                                                                echo $_GET['idedit'];
                                                                            } ?>">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="product.php" class="btn btn-secondary">Back</a>
                            </div>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<?php include_once('layouts/footer.php') ?>