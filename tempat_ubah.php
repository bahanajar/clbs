<?php
include_once 'library.php';
akses();
$id_tempat=$_GET['id_tempat'];
$s="SELECT * FROM tempat WHERE id_tempat=:id_tempat";
$q=$dbConn->prepare($s);
$q->bindparam(':id_tempat', $id_tempat);
$q->execute();
$r=$q->fetch(PDO::FETCH_OBJ);
?>
<h2>Ubah Tempat Pembayaran</h2>
<hr>
<form action="tempat_perbarui.php" method="post" class="form-horizontal">
	<div class="form-group">
		<label class="col-sm-4 control-label">Tempat</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="nama_tempat" value="<?=$r->nama_tempat;?>" required>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
		  <input type="submit" class="btn btn-primary" value="Ubah">
		  <input type="hidden" name="id_tempat" value="<?=$r->id_tempat;?>">
		</div>
	</div>
</form>
