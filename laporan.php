<?php
include_once 'library.php';
akses();
include_once 'atas.php';
include_once 'menu.php';
?>
<h2 class="page-header">
	Laporan Pembayaran
</h2>
<div class="table-responsive">

<form action="" class="form-inline" method="post">
	<select name="id_jenis" class="form-control" onchange="this.form.submit()">
		<option value="">-pilih jenis-</option>
		<?php
		$sJ="SELECT * FROM jenis ORDER BY nama_jenis ASC";
		$qJ=$dbConn->prepare($sJ);
		$qJ->execute();
		while($rJ=$qJ->fetch(PDO::FETCH_OBJ)) {
		?>
		<option value="<?=$rJ->id_jenis;?>"><?=$rJ->nama_jenis;?></option>
		<?php
		}
		?>
	</select>
	<select name="id_tempat" class="form-control" onchange="this.form.submit()">
		<option value="">-pilih tempat-</option>
		<?php
		$sT="SELECT * FROM tempat ORDER BY nama_tempat ASC";
		$qT=$dbConn->prepare($sT);
		$qT->execute();
		while($rT=$qT->fetch(PDO::FETCH_OBJ)) {
		?>
		<option value="<?=$rT->id_tempat;?>"><?=$rT->nama_tempat;?></option>
		<?php
		}
		?>
	</select>
	<select name="semester" class="form-control" onchange="this.form.submit()">
		<option value="">-pilih semester-</option>
		<?php
		$sS="SELECT DISTINCT(semester) AS semester FROM transaksi ORDER BY semester ASC";
		$qS=$dbConn->prepare($sS);
		$qS->execute();
		while($rS=$qS->fetch(PDO::FETCH_OBJ)) {
		?>
		<option value="<?=$rS->semester;?>"><?=$rS->semester;?></option>
		<?php
		}
		?>
	</select>
	<select name="tanggal_bayar" class="form-control" onchange="this.form.submit()">
		<option value="">-pilih tanggal-</option>
		<?php
		$sD="SELECT DISTINCT(tanggal_bayar) AS tanggal_bayar FROM transaksi ORDER BY tanggal_bayar ASC";
		$qD=$dbConn->prepare($sD);
		$qD->execute();
		while($rD=$qD->fetch(PDO::FETCH_OBJ)) {
		?>
		<option value="<?=$rD->tanggal_bayar;?>"><?=$rD->tanggal_bayar;?></option>
		<?php
		}
		?>
	</select>
</form>
	
	<table class="table table-condensed table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Tanggal</th>
				<th>Jenis</th>
				<th>Tempat</th>
				<th>Jumlah</th>
				<th>Semester</th>
				<th>Keterangan</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$klausa=""; 
		
		$id_jenis= isset ($_POST['id_jenis'])?$_POST['id_jenis']:'' ;
		if($id_jenis) {
			$klausa="WHERE id_jenis=$id_jenis";
		}
		$id_tempat=isset ($_POST['id_tempat'])?$_POST['id_tempat']:'';
		if($id_tempat) {
			$klausa="WHERE id_tempat=$id_tempat";
		}
		$semester=isset ($_POST['semester'])?$_POST['semester']:'';
		if($semester) {
			$klausa="WHERE semester=$semester";
		}
		$tanggal_bayar=isset ($_POST['tanggal_bayar'])?$_POST['tanggal_bayar']:'';
		if($tanggal_bayar) {
			$klausa="WHERE tanggal_bayar='$tanggal_bayar'";
		}
		$sC="SELECT * FROM view_transaksi $klausa ORDER BY tanggal_bayar ASC";
		//echo $sC;
		$qC=$dbConn->prepare($sC);
		$qC->execute();
		// inisial jumlah
		$jumlah=0;
		while($rC=$qC->fetch(PDO::FETCH_OBJ)) {
		?>
			<tr>
				<td><?=tanggal($rC->tanggal_bayar);?></td>
				<td><?=$rC->nama_jenis;?></td>
				<td><?=$rC->nama_tempat;?></td>
				<td><?=satuan($rC->jumlah);?></td>
				<td><?=$rC->semester;?></td>
				<td><?=$rC->keterangan;?></td>
			</tr>
		<?php
		$jumlah=$jumlah+$rC->jumlah;
		}
		?>
		</tbody>
		<thead>
			<tr>
				<th colspan="3">Jumlah</th>
				<th><?=satuan($jumlah);?></th>
				<th colspan="2">-</th>
			</tr>
		</thead>
	</table>
</div>
<?php
include_once 'bawah.php';
?>