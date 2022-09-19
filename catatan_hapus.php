<?php
include_once 'library.php';
akses();
// tangkap data id_transaksi
$id_transaksi=$_GET['id_transaksi'];
// hapus data transaksi
$sC="DELETE FROM transaksi WHERE id_transaksi=:id_transaksi";
$qC=$dbConn->prepare($sC);
$qC->bindparam(':id_transaksi', $id_transaksi);
$qC->execute();
// kembali ke catatan.php
header('location:catatan.php');
?>