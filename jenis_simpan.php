<?php
include_once 'library.php';
akses();
$nama_jenis=$_POST['nama_jenis'];
$s="INSERT INTO jenis (nama_jenis) VALUES (:nama_jenis)";
$q=$dbConn->prepare($s);
$q->bindparam(':nama_jenis', $nama_jenis);
$q->execute();
header('location:jenis.php');
?>