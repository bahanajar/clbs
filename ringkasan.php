<?php
include_once 'library.php';
akses();
include_once 'atas.php';
include_once 'menu.php';
?>
<h2 class="page-header">
	Ringkasan
</h2>
<div class="table-responsive">
	<table class="table table-condensed table-striped table-bordered table-hover">
		<tbody>
			<tr>
				<td><?php=jumlah_record('jenis', 'id_jenis');?></td>
				<td><?php=jumlah_record('tempat', 'id_tempat');?></td>
				<td><?php=jumlah_record('transaksi', 'id_transaksi');?></td>
			</tr>
			<tr>
				<td>Jenis Pembayaran</td>
				<td>Tempat Pembayaran</td>
				<td>Transaksi Pembayaran</td>
			</tr>
			<tr>
				<td colspan="3">Rp <?php=satuan(total());?></td>
			</tr>
			<tr>
				<td colspan="3">Total Pembayaran</td>
			</tr>
		</tbody>
	</table>
</div>
<?php
include_once 'bawah.php';
?>