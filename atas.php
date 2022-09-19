<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link href="inc/css/bootstrap.min.css" rel="stylesheet">
	<link href="inc/css/jquery.dataTables.css" rel="stylesheet">
	<link href="inc/css/dashboard.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">CLBS ~ <small>SMKN 1 Buntok</small></a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="ringkasan.php"><span class="glyphicon glyphicon-signal"></span> Ringkasan</a></li>
				<li><a href="catatan.php"><span class="glyphicon glyphicon-usd"></span> Catatan</a></li>
				<li><a href="laporan.php"><span class="glyphicon glyphicon-file"></span> Laporan</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog"></span> Data Master <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="jenis.php"><span class="glyphicon glyphicon-list"></span> Jenis Pembayaran</a></li>
						<li><a href="tempat.php"><span class="glyphicon glyphicon-home"></span> Tempat Pembayaran</a></li>
					</ul>
				</li>
				<li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
			</ul>
		</div>
	</div>
</nav>

<div class="container-fluid">
	<div class="row">
