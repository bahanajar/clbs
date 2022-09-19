<?php
include_once 'library.php';
akses();
include_once 'atas.php';
include_once 'menu.php';
?>
<h2 class="page-header">
	Daftar Catatan Pembayaran
	<span class="pull-right">
		<a href="#" class="btn btn-success btn-xs" onclick="kotakModal('catatan_tambah.php')">
			<span class="glyphicon glyphicon-plus"></span>
		</a>
	</span>
</h2>
<div class="table-responsive">
	<table class="table table-condensed table-striped table-bordered table-hover" id="dt">
		<thead>
			<tr>
				<th>Tanggal</th>
				<th>Jenis</th>
				<th>Tempat</th>
				<th>Jumlah</th>
				<th>Semester</th>
				<th>Keterangan</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$sC="SELECT * FROM view_transaksi ORDER BY tanggal_bayar ASC";
		$qC=$dbConn->prepare($sC);
		$qC->execute();
		while($rC=$qC->fetch(PDO::FETCH_OBJ)) {
		?>
			<tr>
				<td><?=tanggal($rC->tanggal_bayar);?></td>
				<td><?=$rC->nama_jenis;?></td>
				<td><?=$rC->nama_tempat;?></td>
				<td><?=satuan($rC->jumlah);?></td>
				<td><?=$rC->semester;?></td>
				<td><?=$rC->keterangan;?></td>
				<td>
					<a href="#" onclick="kotakModal('catatan_ubah.php?id_transaksi=<?=$rC->id_transaksi;?>')" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-edit"></span></a>
					<a href="catatan_hapus.php?id_transaksi=<?=$rC->id_transaksi;?>" onclick="return confirm('Yakin ingin menghapus catatan pembayaran ini?')" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
				</td>
			</tr>
		<?php
		}
		?>
		</tbody>
	</table>
</div>
<?php
include_once 'bawah.php';
?>