<?php
include_once 'library.php';
akses();
$id_jenis=$_GET['id_jenis'];
$s="SELECT * FROM jenis WHERE id_jenis=:id_jenis";
$q=$dbConn->prepare($s);
$q->bindparam(':id_jenis', $id_jenis);
$q->execute();
$r=$q->fetch(PDO::FETCH_OBJ);
?>
<h2>Ubah Jenis Pembayaran</h2>
<hr>
<form action="jenis_perbarui.php" method="post" class="form-horizontal">
	<div class="form-group">
		<label class="col-sm-4 control-label">Jenis</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="nama_jenis" value="<?=$r->nama_jenis;?>" required>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
		  <input type="submit" class="btn btn-primary" value="Ubah">
		  <input type="hidden" name="id_jenis" value="<?=$r->id_jenis;?>">
		</div>
	</div>
</form>
