<?php
include_once 'library.php';
akses();
// tangkap data id_tempat
$id_tempat=$_GET['id_tempat'];
// hapus data tempat
$sT="DELETE FROM tempat WHERE id_tempat=:id_tempat";
$qT=$dbConn->prepare($sT);
$qT->bindparam(':id_tempat', $id_tempat);
$qT->execute();
// hapus data transaksi
$sC="DELETE FROM transaksi WHERE id_tempat=:id_tempat";
$qC=$dbConn->prepare($sC);
$qC->bindparam(':id_tempat', $id_tempat);
$qC->execute();
// kembali ke tempat.php
header('location:tempat.php');
?>