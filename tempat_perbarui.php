<?php
include_once 'library.php';
akses();
$id_tempat=$_POST['id_tempat'];
$nama_tempat=$_POST['nama_tempat'];
$s="UPDATE tempat SET nama_tempat=:nama_tempat WHERE id_tempat=:id_tempat";
$q=$dbConn->prepare($s);
$q->bindparam(':id_tempat', $id_tempat);
$q->bindparam(':nama_tempat', $nama_tempat);
$q->execute();
header('location:tempat.php');
?>