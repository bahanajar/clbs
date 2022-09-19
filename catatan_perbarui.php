<?php
include_once 'library.php';
akses();
$id_jenis=$_POST['id_jenis'];
$id_tempat=$_POST['id_tempat'];
$tanggal_bayar=$_POST['tanggal_bayar'];
$jumlah=$_POST['jumlah'];
$semester=$_POST['semester'];
$keterangan=$_POST['keterangan'];
$id_transaksi=$_POST['id_transaksi'];
$s="UPDATE transaksi SET id_jenis=:id_jenis, id_tempat=:id_tempat, tanggal_bayar=:tanggal_bayar, jumlah=:jumlah, semester=:semester, keterangan=:keterangan WHERE id_transaksi=:id_transaksi";
$q=$dbConn->prepare($s);
$q->bindparam(':id_jenis', $id_jenis);
$q->bindparam(':id_tempat', $id_tempat);
$q->bindparam(':tanggal_bayar', $tanggal_bayar);
$q->bindparam(':jumlah', $jumlah);
$q->bindparam(':semester', $semester);
$q->bindparam(':keterangan', $keterangan);
$q->bindparam(':id_transaksi', $id_transaksi);
$q->execute();
header('location:catatan.php');
?>