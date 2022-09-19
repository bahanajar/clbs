<?php
include_once 'library.php';
akses();
?>
<h2>Tambah Catatan Pembayaran</h2>
<hr>
<form action="catatan_simpan.php" method="post" class="form-horizontal">
	<div class="form-group">
		<label class="col-sm-4 control-label">Jenis</label>
		<div class="col-sm-8">
			<select name="id_jenis" class="form-control" required>
				<option value="">--pilih jenis--</option>
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
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Tempat</label>
		<div class="col-sm-8">
			<select name="id_tempat" class="form-control" required>
				<option value="">--pilih tempat--</option>
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
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Tanggal Bayar</label>
		<div class="col-sm-8">
			<input type="text" name="tanggal_bayar" maxlength="10" placeholder="YYYY-MM-DD" required class="form-control" id="tgl">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Jumlah Bayar</label>
		<div class="col-sm-8">
			<input type="text" name="jumlah" class="form-control" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Semester</label>
		<div class="col-sm-8">
			<input type="text" name="semester" size="3" maxlength="2" required class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Keterangan</label>
		<div class="col-sm-8">
			<input type="text" name="keterangan" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
		  <input type="submit" class="btn btn-success" value="Simpan">
		</div>
	</div>
</form>

<link rel="stylesheet" href="inc/css/datepicker.css" />
<script src="inc/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
$('#tgl').datepicker({
	autoclose:true,
	format:'yyyy-mm-dd'
});
</script>