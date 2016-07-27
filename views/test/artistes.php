<!DOCTYPE html>
<html>
	<head>
		<title>Spotifaïe</title>
		<meta charset="UTF-8">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script type="text/javascript" src="mustache.js"></script>
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/style.css">
		<script type="text/javascript" src="getartist.js"></script>
	</head>

	<body>
		<?php include('nav.php'); ?>
		<div class="main" id="content">
		 	<div class="jumbotron blue">
		 		<div class="container">
	    			<h1>Artistes</h1>
	    			<p>Retrouvez ici tous les artistes disponible sur Spotifaïe.</p>
    			</div>
    		</div>
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
					{{# artist }}
						<div class="artiste" style="background-image: url('{{ photo }}')">
							<a href="detailartiste.php?artist={{ id }}">{{ name }}</a>
						</div>
					{{/ artist }}
						
					</div>
				</div>
			</div>
		</div>
	</body>
</html>