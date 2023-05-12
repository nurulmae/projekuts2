<?php
require_once 'db/dbconnection.php';
// insert idpesanan	order_number	tanggal	nama_cust	alamat	produk_id	qty	
$_order_number = $_POST['order_number'];
$_nama_cust = $_POST['nama_cust'];
$_alamat = $_POST['alamat'];
$_produk_id = $_POST['produk_id'];
$_qty = $_POST['qty'];
$_proses = $_POST['proses'];

$ar_data = [
    $_order_number, $_nama_cust, $_alamat, $_produk_id, $_qty
];

if ($_proses == "Simpan") {
    $sql = "INSERT INTO pesanan (order_number,nama_cust,alamat,produk_id,qty) VALUES (?,?,?,?,?)";
} else if ($_proses == "Update") {
    $ar_data[] = $_POST['idedit'];
    $sql = "UPDATE pesanan SET order_number=?,tanggal=?,nama_cust=?,alamat=?,produk_id=?,qty=? WHERE id=?";
}
if (isset($sql)) {
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
}

echo "<script>alert('Data Berhasil Disimpan');location.href='form-order.php?order_number=$_order_number';</script>";
