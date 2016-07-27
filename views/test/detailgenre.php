<!DOCTYPE html>
<html>
<head>
	<title>Spotifaïe</title>
	<meta charset="UTF-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script type="text/javascript" src="mustache.js"></script>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<script type="text/javascript" src="getgenre2.js"></script>
</head>

<body>
	<?php include('nav.php'); ?>
	<div class="main" id="content">
		<div class="jumbotron">
			<div class="container">
				<h1>ROCK</h1>
				<p>Tous les albums disponibles de ce genre.</p>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
						{{# genre }}
					<div class="album" style="background-image: url('{{ cover_small }}')">
						<a href="detailalbum.php?album={{ id }}">{{ name }}</a>
						<p>{{ artistName }}</p>
					</div>
						{{/ genre }}
				</div>
			</div>
		</div>
	</div>
</body>
</html>