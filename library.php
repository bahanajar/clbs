<?php
session_start();
ob_start();
$dbHost = 'localhost';
$dbName = 'clbs';
$dbUser = 'root';
$dbPass = '';
try {
    $dbConn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch(PDOException $e) {
    echo $e->getMessage();
}

function login($user, $pass) {
	global $dbConn;
	$s="SELECT * FROM pengguna WHERE id_user=:id_user AND sandi=:sandi";
	$q=$dbConn->prepare($s);
	$q->bindparam('id_user', $user);
	$q->bindValue('sandi', md5($pass));
	$q->execute();
	$r=$q->fetch(PDO::FETCH_OBJ);
	if($r->id_user===$user) {
		$_SESSION['id_user'] = $user;
		$_SESSION['kode'] = TRUE;
		$_SESSION['terserah'] = "smk1buntok";
		header('location:ringkasan.php');
	}
	else {
		echo '<div class="text-danger">Gagal login!</div>';
	}
}

function akses() {
	if(($_SESSION['kode']<>TRUE) && ($_SESSION['terserah']<>"smk1buntok")) {
		header('location:index.php');
	}
}

function jumlah_record($tabel, $kolom) {
	global $dbConn;
	$s="SELECT COUNT($kolom) AS hasil FROM $tabel";
	$q=$dbConn->prepare($s);
	$q->execute();
	$r=$q->fetch(PDO::FETCH_OBJ);
	return $r->hasil;
}

// fungsi format tanggal
function tanggal($tanggal) { // 2018-03-04
	$tgl = substr($tanggal, 8, 2); // 04
	$bln = substr($tanggal, 5, 2); // 10
	$thn = substr($tanggal, 0, 4); // 2018
	$bulan = array('Januari', 'Pebruari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'Nopember', 'Desember');
	$tanggal = $tgl.' '.$bulan[$bln-1].' '.$thn;
	return $tanggal;
}
// fungsi satuan bilangan
function satuan($jumlah) {
	$jumlah=number_format($jumlah, 0, ',', '.');
	return $jumlah;
}
// fungsi menghitung jumlah pembayaran
function total() {
	global $dbConn;
	$s="SELECT SUM(jumlah) AS total FROM transaksi";
	$q=$dbConn->prepare($s);
	$q->execute();
	if($r=$q->fetch(PDO::FETCH_OBJ)) {
		return $r->total;
	}
	else {
		return 0;
	}
}

function ganti_sandi($s1, $s2, $sl) {
	global $dbConn;
	if($s1==$s2) { 
		$s="SELECT * FROM pengguna WHERE id_user=:id_user";
		$q=$dbConn->prepare($s);
		$q->bindparam(':id_user', $_SESSION['id_user']);
		$q->execute();
		$r=$q->fetch(PDO::FETCH_OBJ);
		if($r->sandi==md5($sl)) {
			$sX="UPDATE pengguna SET sandi=:sandi WHERE id_user=:id_user";
			$qX=$dbConn->prepare($sX);
			$qX->bindparam(':sandi', md5($s1));
			$qX->bindparam(':id_user', $_SESSION['id_user']);
			$qX->execute();
			//echo "Sandi berhasil diganti!";
			header('location:logout.php');
		}
		else {
			echo "Sandi lama salah!";
		}
	}
	else {
		echo "Sandi baru tidak sama!";
	}
}

?>