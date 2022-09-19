<?php
include_once 'library.php';
akses();
$nama_tempat=$_POST['nama_tempat'];
$s="INSERT INTO tempat (nama_tempat) VALUES (:nama_tempat)";
$q=$dbConn->prepare($s);
$q->bindparam(':nama_tempat', $nama_tempat);
$q->execute();
header('location:tempat.php');
?>