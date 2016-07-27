var url = window.location.href;
url = url.split("?");
$.ajax({
	url: '/../API/CONTROLEUR/testput.php?'+url[1],
	type: "get",
				dataType: 'json', // JSON
				success: function(json) {
					var tpl = $('#content').html();
					$('#content').html(Mustache.render(tpl, {artist : json[0], name : json[0][0].name, photo : json[0][0].photo, album : json[1]}));

				}
			});