var url = window.location.href;
url = url.split("?");
$.ajax({
	url: '/../API/CONTROLEUR/testput.php?'+url[1],
	type: "get",
				dataType: 'json', // JSON
				success: function(json) {
					var tpl = $('#content').html();
					$('#content').html(Mustache.render(tpl, {artist : json[0], album : json[1], track : json[2]}));

				}
			});