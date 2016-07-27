<!DOCTYPE html>
<html>
<head>
	<title>Spotifaïe</title>
	<meta charset="UTF-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script type="text/javascript" src="mustache.js"></script>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<script type="text/javascript" src="getartist2.js"></script>
</head>

<body>
	<?php include('nav.php'); ?>
	<div class="main" id="content">
		<div class="jumbotron blue">
			<div class="container">
				<img class="pull-right imgcover" src="{{ photo }}" alt="photoartiste">
				<h1>{{ name }}</h1>
				<p>Un artiste qu'il est bien</p>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-8 ">
					{{# album  }}
					<div class="album album-3" style="background-image: url('{{ cover_small }}')">
						<a href="detailalbum.php?album={{ id }}">{{ name }}</a>
					</div>
					{{/ album }}
				</div>
				<div class="col-sm-4">
					{{# artist }}
					<h3>Biographie</h3>
					<p>{{ bio }}</p>
					{{/ artist }}
				</div>
			</div>
		</div>
	</div>
</body>
</html>