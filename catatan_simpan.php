<?php
include_once 'library.php';
akses();
$id_jenis=$_POST['id_jenis'];
$id_tempat=$_POST['id_tempat'];
$tanggal_bayar=$_POST['tanggal_bayar'];
$jumlah=$_POST['jumlah'];
$semester=$_POST['semester'];
$keterangan=$_POST['keterangan'];
$s="INSERT INTO transaksi (id_jenis, id_tempat, tanggal_bayar, jumlah, semester, keterangan) VALUES (:id_jenis, :id_tempat, :tanggal_bayar, :jumlah, :semester, :keterangan)";
$q=$dbConn->prepare($s);
$q->bindparam(':id_jenis', $id_jenis);
$q->bindparam(':id_tempat', $id_tempat);
$q->bindparam(':tanggal_bayar', $tanggal_bayar);
$q->bindparam(':jumlah', $jumlah);
$q->bindparam(':semester', $semester);
$q->bindparam(':keterangan', $keterangan);
$q->execute();
header('location:catatan.php');
?>