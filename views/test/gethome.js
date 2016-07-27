$.ajax({
	url: '/../API/CONTROLEUR/testput.php?home=home',
	type: "get",
				dataType: 'json', // JSON
				success: function(json) {
					var tpl = $('#content').html();
					$('#content').html(Mustache.render(tpl, {album : json[0]}));

				}
			});