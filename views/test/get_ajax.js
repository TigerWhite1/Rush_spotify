$.ajax({
	url: '/../API/CONTROLEUR/testput.php?albums=all',
	type: "get",
	data: $(this).serialize(),
				dataType: 'json', // JSON
				success: function(json) {
					var tpl = $('#content').html();
					$('#content').html(Mustache.render(tpl, {albums : json[0]}));
				}
			});
