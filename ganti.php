<?php
include_once 'library.php';
akses();
include_once 'atas.php';
include_once 'menu.php';
?>
<h2 class="page-header">
	Ganti Sandi
</h2>

<?php
if(isset($_POST['ganti'])) {
	$s1 = $_POST['sandi_baru_1'];
	$s2 = $_POST['sandi_baru_2'];
	$sl = $_POST['sandi_lama'];
	ganti_sandi($s1, $s2, $sl);
}
?>

<form action="" method="post" class="horizontal-form">
	<div class="form-group">
		<label class="control-label col-sm-4">Sandi Baru</label>
		<div class="col-sm-8">
			<input type="password" name="sandi_baru_1" class="form-control" required>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-4">Sandi Baru (lagi)</label>
		<div class="col-sm-8">
			<input type="password" name="sandi_baru_2" class="form-control" required>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-4">Sandi Lama</label>
		<div class="col-sm-8">
			<input type="password" name="sandi_lama" class="form-control" required>
		</div>
	</div>
	<div class="form-group">
		<div class="col-offset-sm-4 col-sm-8">
			<input type="submit" name="ganti" class="btn btn-primary" value="Ganti Sandi">
		</div>
	</div>
</form>

<?php
include_once 'bawah.php';
?>