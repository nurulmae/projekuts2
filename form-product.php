<?php
session_start();
include_once('layouts/header.php');
if (!isset($_SESSION['email'])) {
    header('location:index.php');
}
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
    echo "<script>alert('Data Berhasil Dihapus');location.href='product.php';</script>";
}

?>

<section class="py-5">
    <div class="container">
        <div class="card">
            <div class="card-header bg-white">
                Form Product
            </div>
            <div class="card-body">
                <form method="post" action="proses-produk.php" enctype="multipart/form-data">
                    <div class="form-group row mb-3">
                        <label for="sku" class="col-4 col-form-label">SKU</label>
                        <div class="col-8">
                            <input type="text" class="form-control" id="sku" name="sku" value="<?php if (!empty($_GET['idedit'])) {
                                                                                                    echo $row['sku'];
                                                                                                } ?>" required>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="nama_produk" class="col-4 col-form-label">Nama Produk</label>
                        <div class="col-8">
                            <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?php if (!empty($_GET['idedit'])) {
                                                                                                                    echo $row['nama_produk'];
                                                                                                                } ?>" required>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="harga" class="col-4 col-form-label">Harga</label>
                        <div class="col-8">
                            <input type="text" class="form-control" id="harga" name="harga" value="<?php if (!empty($_GET['idedit'])) {
                                                                                                        echo $row['harga'];
                                                                                                    } ?>" required>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="stok" class="col-4 col-form-label">Stok</label>
                        <div class="col-8">
                            <input type="text" class="form-control" id="stok" name="stok" value="<?php if (!empty($_GET['idedit'])) {
                                                                                                        echo $row['stok'];
                                                                                                    } ?>" required>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="kategori_id" class="col-4 col-form-label">Kategori ID</label>
                        <div class="col-8">
                            <!-- select pdo table kategori. select opt tertentu jika ada get idedit -->
                            <select class="form-control" id="kategori_id" name="kategori_id" required>
                                <option value="">Pilih Kategori</option>
                                <?php
                                $sql2 = "SELECT * FROM kategori";
                                $st2 = $dbh->prepare($sql2);
                                $st2->execute();
                                while ($row2 = $st2->fetch()) {
                                    if (!empty($_GET['idedit'])) {
                                        if ($row['kategori_id'] == $row2['id']) {
                                            echo "<option value='$row2[id]' selected>$row2[nama_kategori]</option>";
                                        }
                                    } else {
                                        echo "<option value='$row2[id]'>$row2[nama_kategori]</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="deskripsi" class="col-4 col-form-label">Deskripsi</label>
                        <div class="col-8">
                            <textarea class="form-control" id="deskripsi" name="deskripsi" value="<?php if (!empty($_GET['idedit'])) {
                                                                                                        echo $row['deskripsi'];
                                                                                                    } ?>" required rows="3"><?php if (!empty($_GET['idedit'])) {
                                                                                                                                echo $row['deskripsi'];
                                                                                                                            } ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="thumbnail" class="col-4 col-form-label">Thumbnail</label>
                        <div class="col-8">
                            <input type="file" class="form-control-file" id="thumbnail" name="thumbnail" value="<?php if (!empty($_GET['idedit'])) {
                                                                                                                    echo $row['thumbnail'];
                                                                                                                } ?>">
                            <input type="hidden" name="proses" value="<?php if (!empty($_GET['idedit'])) {
                                                                            echo "Update";
                                                                        } else {
                                                                            echo "Simpan";
                                                                        } ?>">
                            <input type="hidden" name="idedit" value="<?php if (!empty($_GET['idedit'])) {
                                                                            echo $_GET['idedit'];
                                                                        } ?>">
                            <input type="hidden" name="thumbnail_lama" value="<?php if (!empty($_GET['idedit'])) {
                                                                            echo $row['thumbnail'];
                                                                        } ?>">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-8 offset-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="index.php" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include_once('layouts/footer.php') ?>