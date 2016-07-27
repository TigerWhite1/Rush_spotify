<!DOCTYPE html>
<html>
<head>
	<title>Spotifaïe</title>
	<meta charset="UTF-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script type="text/javascript" src="mustache.js"></script>

	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<script type="text/javascript" src="get_ajax.js"></script>	
	<script type="text/javascript" src="pagination.js"></script>
</head>

<body>
	<?php include('nav.php'); ?>
	<div class="main">
		<div class="jumbotron blue">
			<div class="container">
				<h1>Albums</h1>
				<p>Les albums de tous vos artistes préférés.</p>
			</div>
		</div>
		<div class="demo1">
		<div class="container">
			<div class="row">
			<div id="output"></div>
				<div class="col-sm-12" id="content">
				<div id="loader">
					{{# albums }}
					<div class="album" style="background-image: url('{{ albumCover }}')">

						<a href="detailalbum.php?album={{ id }}">{{ albumName }}</a>
						<p>{{ artistName }}</p>
					</div>
					{{/ albums }}
				</div>
				</div>
			</div>
			</div>
			<div class="content"></div>
		</div>
	</div>
</body>
</html>