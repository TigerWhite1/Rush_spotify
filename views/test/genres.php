<!DOCTYPE html>
<html>
	<head>
		<title>Spotifaïe</title>
		<meta charset="UTF-8">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script type="text/javascript" src="mustache.js"></script>
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/style.css">
		<script type="text/javascript" src="getgenre.js"></script>
	</head>

	<body>
		<?php include('nav.php'); ?>
		<div class="main" id="content">
		 	<div class="jumbotron">
		 		<div class="container">
	    			<h1>Genres</h1>
	    			<p>Tous les genres de musiques sont disponibles sur Spotifaïe.</p>
    			</div>
    		</div>
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
					{{# genre }}
						<div class="genre">
							<a href="detailgenre.php?genre={{ id }}">{{ name }}</a>
						</div>
					{{/ genre }}
					</div>
				</div>
			</div>
		</div>
	</body>
</html>