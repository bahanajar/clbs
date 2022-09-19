<?php
include_once 'library.php';
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CLBS - SMKN 1 Buntok</title>
	<link href="inc/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

	<div class="row" style="width:270px; margin:15% auto;">
		<div class="alert alert-info">
			<h2 style="font-size:80px; font-weight:bold; text-shadow:3px 3px 7px #000000; color:#FFF; text-align:center;">CLBS</h2>
			
			<?php
			if(isset($_POST['login'])) {
				$id_user=$_POST['id_user'];
				$sandi=$_POST['sandi'];
				login($id_user, $sandi);
			}
			?>
			
			<form action="" method="post" class="horizontal-form">
				<input type="text" name="id_user" class="form-control" placeholder="ID User" required>
				<input type="password" name="sandi" class="form-control" placeholder="Sandi" required>
				<input type="submit" name="login" value="Login" class="btn btn-md btn-primary btn-block">
			</form>
		</div>
	</div>
		
<script src="inc/js/jquery.min.js"></script>
<script src="inc/js/bootstrap.min.js"></script>
</body>
</html>