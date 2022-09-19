<?php
include_once 'library.php';
akses();
$id_jenis=$_POST['id_jenis'];
$nama_jenis=$_POST['nama_jenis'];
$s="UPDATE jenis SET nama_jenis=:nama_jenis WHERE id_jenis=:id_jenis";
$q=$dbConn->prepare($s);
$q->bindparam(':id_jenis', $id_jenis);
$q->bindparam(':nama_jenis', $nama_jenis);
$q->execute();
header('location:jenis.php');
?>