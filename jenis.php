<?php
include_once 'library.php';
akses();
include_once 'atas.php';
include_once 'menu.php';
?>
<h2 class="page-header">
	Daftar Jenis Pembayaran
	<span class="pull-right">
		<a href="#" class="btn btn-success btn-xs" onclick="kotakModal('jenis_tambah.php')">
			<span class="glyphicon glyphicon-plus"></span>
		</a>
	</span>
</h2>
<div class="table-responsive">
	<table class="table table-condensed table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Jenis Pembayaran</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$aJ="SELECT * FROM jenis";
		$bJ=$dbConn->prepare($aJ);
		$bJ->execute();
		while($rJ=$bJ->fetch(PDO::FETCH_OBJ)) {
			$sCT="SELECT COUNT(id_transaksi) AS sCT FROM transaksi WHERE id_jenis=:id_jenis";
			$qCT=$dbConn->prepare($sCT);
			$qCT->bindparam(':id_jenis', $rJ->id_jenis);
			$qCT->execute();
			$rCT=$qCT->fetch(PDO::FETCH_OBJ);
		?>
			<tr>
				<td><?=$rJ->id_jenis;?></td>
				<td><?=$rJ->nama_jenis;?> (<?=$rCT->sCT;?>)</td>
				<td>
					<a href="#" onclick="kotakModal('jenis_ubah.php?id_jenis=<?=$rJ->id_jenis;?>')" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-edit"></span></a>
					<a href="jenis_hapus.php?id_jenis=<?=$rJ->id_jenis;?>" onclick="return confirm('PERHATIAN!!. Menghapus jenis pembayaran juga akan\nmenghapus semua catatan pembayaran yang terkait\ndengan jenis pembayaran ini!\n\nYakin ingin menghapus jenis pembayaran ini?')" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
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