<?php
include_once 'library.php';
akses();
$id_jenis=$_GET['id_jenis'];
$sJ="DELETE FROM jenis WHERE id_jenis=:id_jenis";
$qJ=$dbConn->prepare($sJ);
$qJ->bindparam(':id_jenis', $id_jenis);
$qJ->execute();
$sC="DELETE FROM transaksi WHERE id_jenis=:id_jenis";
$qC=$dbConn->prepare($sC);
$qC->bindparam(':id_jenis', $id_jenis);
$qC->execute();
header('location:jenis.php');
?>