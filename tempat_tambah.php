<?php
include_once "library.php";
akses();
?>
<h2>Tambah Tempat Pembayaran</h2>
<hr>
<form action="tempat_simpan.php" method="post" class="form-horizontal">
	<div class="form-group">
		<label class="col-sm-4 control-label">Tempat</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="nama_tempat" required>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
		  <input type="submit" class="btn btn-success" value="Simpan">
		</div>
	</div>
</form>
