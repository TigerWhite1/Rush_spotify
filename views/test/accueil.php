<!DOCTYPE html>
<html>
<head>
	<title>Spotifaïe</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script type="text/javascript" src="mustache.js"></script>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
		<script type="text/javascript" src="gethome.js"></script>
</head>

<body>
	<?php include('nav.php'); ?>
	<div class="main" id="content">
		<div class="jumbotron">
			<div class="container">
				<h1>Bienvenue sur Spotifaïe</h1>
				<p>Voici quelques albums choisis juste pour vous.</p>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
				{{# album }}
					<div class="album" style="background-image: url('{{ cover }}')">
						<a href="detailalbum.php?album={{ albumId }}">{{ albumName }}</a>
						<p>{{ artistName }}</p>
					</div>
				{{/ album }}
				</div>
			</div>
		</div>
	</div>
</body>
</html>