<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body>
	<form method="PUT" action="">
		<input type="submit" value"valide" id="loginform">
	</form>
	<script type="text/javascript">
		$('#loginform').on('click', function(e) {
		e.preventDefault(); 
		$.ajax({
			url: 'testput.php?albums=albums',
			type: "get",
			data: $(this).serialize(),
				dataType: 'json', // JSON
				success: function(json) {
					for (var i = 0; i < json.length; i++) {
						for (var b = 0; b < json[i].length; b++) {
							console.log(json[i][b].description)
							
						};
						
					};
				}
			});
	});

	</script>
</body>
</html>