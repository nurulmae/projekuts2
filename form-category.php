<?php include_once('layouts/header.php');
session_start();
if (!isset($_SESSION['email'])) {
    header('location:index.php');
}
if (!empty($_GET['idedit'])) {
    $_idedit = $_GET['idedit'];
    $sql = "SELECT * FROM kategori WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$_idedit]);
    $row = $st->fetch();
}
if (isset($_GET['iddel'])) {
    $sql = "DELETE FROM kategori WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$_GET['iddel']]);
    echo "<script>alert('Data Berhasil Dihapus');location.href='categories.php';</script>";
}

?>

<section class="py-5">
    <div class="container">
        <div class="card">
            <div class="card-header bg-white">
                Form Category
            </div>
            <div class="card-body">
                <form method="post" action="proses-kategori.php" enctype="multipart/form-data">
                    <div class="form-group row mb-3">
                        <label for="nama_kategori" class="col-4 col-form-label">Category</label>
                        <div class="col-8">
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?php if (!empty($_GET['idedit'])) {
                                                                                                                        echo $row['nama_kategori'];
                                                                                                                    } ?>" required>
                            <input type="hidden" name="proses" value="<?php if (!empty($_GET['idedit'])) {
                                                                            echo "Update";
                                                                        } else {
                                                                            echo "Simpan";
                                                                        } ?>">
                            <input type="hidden" name="idedit" value="<?php if (!empty($_GET['idedit'])) {
                                                                            echo $_GET['idedit'];
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