<!DOCTYPE html>
<html>
<head>
	<title>Spotifaïe</title>
	<meta charset="UTF-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script type="text/javascript" src="mustache.js"></script>
	<script type="text/javascript" src="getalbums.js"></script>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
</head>

<body>
	<?php include('nav.php'); ?>
	<div class="main" id="content">
		<div class="jumbotron blue">
			<div class="container">
			{{# head }}
				<img class="pull-right imgcover" src="{{ albumCover }}">
				<h1>{{ albumName }}</h1>
				<p>{{ artistName }}</p>
			{{/ head }}
			</div>
		</div>
<div id="test"></div>
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<table class="table">
					{{# album }}
	
						<thead>
							<tr>
							<th>Titre</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>{{ track_no }}</td>
								<td>{{ name }}</td>
								<td>
									<audio controls="controls" src="{{ mp3 }}"></audio>
								</td>
							</tr>
						</tbody>
					</table>
							{{/ album }}
				</div>





				<div class="col-sm-6 description">
				{{# descri }}
					<h3>Description</h3>
					<p>{{ release_date }}</p>
					<p>{{ genre }}</p>
					<p>Popularité: {{ popularity }}</p>
					<p>{{ description }}</p>
				{{/ descri }}
				</div>
			</div>
		</div>
	</div>
</body>
</html>