$.ajax({
	url: '/../API/CONTROLEUR/testput.php?artists=all',
	type: "get",
				dataType: 'json', // JSON
				success: function(json) {
					var tpl = $('#content').html();
					// console.log(json[0])
					$('#content').html(Mustache.render(tpl, {artist : json[0]}));

				}
			});