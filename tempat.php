<?php
include_once 'library.php';
akses();
include_once 'atas.php';
include_once 'menu.php';
?>
<h2 class="page-header">
	Daftar Tempat Pembayaran
	<span class="pull-right">
		<a href="#" class="btn btn-success btn-xs" onclick="kotakModal('tempat_tambah.php')">
			<span class="glyphicon glyphicon-plus"></span>
		</a>
	</span>
</h2>
<div class="table-responsive">
	<table class="table table-condensed table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Tempat Pembayaran</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$sT="SELECT * FROM tempat";
		$qT=$dbConn->prepare($sT);
		$qT->execute();
		while($rT=$qT->fetch(PDO::FETCH_OBJ)) {
		?>
			<tr>
				<td><?=$rT->id_tempat;?></td>
				<td><?=$rT->nama_tempat;?></td>
				<td>
					<a href="#" onclick="kotakModal('tempat_ubah.php?id_tempat=<?=$rT->id_tempat;?>')" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-edit"></span></a>
					<a href="tempat_hapus.php?id_tempat=<?=$rT->id_tempat;?>" onclick="return confirm('PERHATIAN!!. Menghapus tempat pembayaran juga akan\nmenghapus semua catatan pembayaran yang terkait\ndengan tempat pembayaran ini!\n\nYakin ingin menghapus tempat pembayaran ini?')" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
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