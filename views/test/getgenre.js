$.ajax({
	url: '/../API/CONTROLEUR/testput.php?genres=all',
	type: "get",
				dataType: 'json', // JSON
				success: function(json) {
					var tpl = $('#content').html();
					$('#content').html(Mustache.render(tpl, {genre : json[0]}));

				}
			});