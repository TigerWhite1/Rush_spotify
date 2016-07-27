var url = window.location.href;
url = url.split("?");
$.ajax({
	url: '/../API/CONTROLEUR/testput.php?'+url[1],
	type: "get",
				dataType: 'json', // JSON
				success: function(json) {
					var tpl = $('#content').html();
					$('#content').html(Mustache.render(tpl, {album : json[1], descri : json[0], head : json[0]}));

				}
			});