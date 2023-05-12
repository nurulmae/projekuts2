<?php
require_once 'db/dbconnection.php';
$_sku = $_POST['sku'];
$_nama_produk = $_POST['nama_produk'];
$_harga = $_POST['harga'];
$_stok = $_POST['stok'];
$_kategori_id = $_POST['kategori_id'];
$_deskripsi = $_POST['deskripsi'];

// kalo ada file yang diupload
$_namafile = $_FILES['thumbnail']['name'];
$_tmpfile = $_FILES['thumbnail']['tmp_name'];
$_path = "assets/img/product/$_namafile";
move_uploaded_file($_tmpfile, $_path);
$_thumbnail = $_namafile;
// kalo ga ada file yang diupload
if (empty($_namafile)) {
    $_thumbnail = $_POST['thumbnail_lama'];
}
$_proses = $_POST['proses'];

$ar_data = [
    $_sku, $_nama_produk, $_harga, $_stok,  $_kategori_id, $_deskripsi, $_thumbnail
];

if ($_proses == "Simpan") {
    $sql = "INSERT INTO produk (sku,nama_produk,harga,stok,kategori_id,deskripsi,thumbnail) VALUES (?,?,?,?,?,?,?)";
} else if ($_proses == "Update") {
    $ar_data[] = $_POST['idedit'];
    $sql = "UPDATE produk SET sku=?,nama_produk=?,harga=?,stok=?,kategori_id=?,deskripsi=?,thumbnail=? WHERE id=?";
}
if (isset($sql)) {
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
}

echo "<script>alert('Data Berhasil Disimpan');location.href='product.php';</script>";
