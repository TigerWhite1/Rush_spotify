<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<ul class="nav navbar-nav">
			<li><a href="accueil.php">ACCUEIL</a></li>
	      	<li><a href="artistes.php">ARTISTES</a></li>
	      	<li><a href="genres.php">GENRES</a></li>
	      	<li><a href="albums.php">ALBUMS</a></li>
			</ul>
	    <form action="search.php" method="GET" class="navbar-form navbar-right">
	    		<select name="type" id="type" class="form-control">
	          		<option value="artistes">Artistes</option>
	          		<option value="genres">Genres</option>
	          		<option value="albums">Albums</option>
	          	</select>
			<div class="input-group">
	          	<input type="text" class="form-control" placeholder="Search for..." name="search" required/>
	            <span class="input-group-btn">
	            <button class="btn btn-default" type="submit">Go!</button>
	            </span>
	        </div>
	    </form>
	</div>
</nav>