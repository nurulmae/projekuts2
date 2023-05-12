<?php
require_once 'db/dbconnection.php';
$_nama_kategori = $_POST['nama_kategori'];
$_proses = $_POST['proses'];

$ar_data = [
    $_nama_kategori
];

if ($_proses == "Simpan") {
    $sql = "INSERT INTO kategori (nama_kategori) VALUES (?)";
} else if ($_proses == "Update") {
    $ar_data[] = $_POST['idedit'];
    $sql = "UPDATE kategori SET nama_kategori=? WHERE id=?";
}
if (isset($sql)) {
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
}

echo "<script>alert('Data Berhasil Disimpan');location.href='categories.php';</script>";
