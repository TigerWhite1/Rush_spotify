<!DOCTYPE html>
<html>
<head>
	<title>Spotifaïe</title>
	<meta charset="UTF-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script type="text/javascript" src="mustache.js"></script>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<script type="text/javascript" src="getsearch.js"></script>
</head>

<body>
	<?php include('nav.php'); ?>
	<div class="main" id="content">
		<div class="jumbotron">
			<div class="container">
				<h1>Recherche</h1>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h2>Artiste</h2>
					<table class="table">
						<tbody>
							<hr>
							{{# artist }}
							<tr>
								<a href="detailartiste.php?artist={{ id }}">{{ name }}</a><br/>
							</tr>
							{{/ artist }}
						</tbody>
					</table>
					<h2>Albums</h2>
					<table class="table">
						<tbody>
						<hr>
						{{# album }}
							<tr>
								<a href="detailalbum.php?album={{ id }}">{{ albumName }}</a><br/>
							</tr>
						{{/ album }}
						</tbody>
					</table>
					<h2>Musique</h2>
					<table class="table">
						<tbody>
						<hr>
						{{# track }}
							<tr>
								<a href="detailalbum.php?album={{ id }}">{{ name }}</a><br/>
							</tr>
						{{/ track }}	
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>