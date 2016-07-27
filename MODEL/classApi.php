<?php
class API {
	private $_req;
	private $_methode;
	private $_param;
	public function __construct() {
		require_once 'test_bdd.php';
		$this->_req = Database::getInstance();
		$this->_methode = $_SERVER['REQUEST_METHOD'];
		$this->_param = $_SERVER['QUERY_STRING'];
	}
	public function get($get) {
		
		if (isset($get['albums']) && $get['albums'] == 'all') {
			$albums = $this->_req->query('SELECT albums.cover_small as "albumCover", albums.name AS  "albumName", artists.name AS  "artistName", albums.id, (
				SELECT GROUP_CONCAT( genres.name ) AS  "genre1"
				FROM genres
				INNER JOIN genres_albums ON genres_albums.genre_id = genres.id
				WHERE genres_albums.album_id = albums.id
				) AS  "genre"
			FROM albums
			INNER JOIN artists ON albums.artist_id = artists.id LIMIT 0,100', array());
			$albums = $albums->fetchAll(PDO::FETCH_OBJ);
			$albums = json_encode(array($albums, JSON_PRETTY_PRINT), 100000);
			echo $albums;
			return true;
		}
		if (isset($get['album']) && preg_match('#^[0-9]*$#', $get['album'])) {
			$album = $this->_req->query('SELECT DATE_FORMAT(FROM_UNIXTIME(albums.release_date), "%e %b %Y") AS "release_date", albums.cover_small AS "albumCover",
				albums.description, artists.name AS "artistName", albums.name AS "albumName", albums.popularity,
				(SELECT GROUP_CONCAT( genres.name ) AS  "genre1"
					FROM genres
					INNER JOIN genres_albums ON genres_albums.genre_id = genres.id
					WHERE genres_albums.album_id = albums.id
					) AS  "genre"
				FROM albums INNER JOIN artists ON artists.id = albums.artist_id WHERE albums.id = :id', array('id' => $get['album']));
			$tracks = $this->_req->query('SELECT * FROM tracks WHERE tracks.album_id = :id', array('id' => $get['album']));
			$album = $album->fetchAll(PDO::FETCH_OBJ);
			$tracks = $tracks->fetchAll(PDO::FETCH_OBJ);
			$albjson = json_encode(array($album, $tracks, JSON_PRETTY_PRINT), 100000);
			echo $albjson;
			return true;
		}
		if (isset($get['home']) && $get['home'] == 'home') {
			$home = $this->_req->query('SELECT albums.id AS "albumId", albums.cover_small AS "cover", albums.name AS "albumName", artists.name AS "artistName", (
				SELECT GROUP_CONCAT( genres.name ) AS  "genre1"
				FROM genres
				INNER JOIN genres_albums ON genres_albums.genre_id = genres.id
				WHERE genres_albums.album_id = albums.id
				) AS  "genre" FROM albums INNER JOIN artists ON albums.artist_id = artists.id ORDER BY RAND() LIMIT 0,10', array());
			$home = $home->fetchAll(PDO::FETCH_OBJ);
			$home = json_encode(array($home, JSON_PRETTY_PRINT), 100000);
			echo $home;
			return true;
		}
		if (isset($get['artists']) && $get['artists'] == 'all') {
			$artists = $this->_req->query('SELECT * FROM artists', array());
			$artists = $artists->fetchAll(PDO::FETCH_OBJ);
			$artists = json_encode(array($artists, JSON_PRETTY_PRINT), 100000);
			echo $artists;
			return true;
		}
		if (isset($get['artist']) && preg_match('#^[0-9]*$#', $get['artist'])) {
			$artistinfo = $this->_req->query('SELECT artists.name, artists.bio, artists.photo, artists.description FROM artists WHERE artists.id = :artist_id', array('artist_id' => $get['artist']));
			$albums = $this->_req->query('SELECT * FROM albums WHERE artist_id = :artist_id', array('artist_id' => $get['artist']));
			$artistinfo = $artistinfo->fetchAll(PDO::FETCH_OBJ);
			$albums = $albums->fetchAll(PDO::FETCH_OBJ);
			$artist = json_encode(array($artistinfo, $albums, JSON_PRETTY_PRINT), 100000);
			echo $artist;
			return true;
		}
		if (isset($get['search'])) {
			$search1 = $this->_req->query('SELECT * FROM artists WHERE name LIKE :name', array('name' => $get['search'] . '%'));
			$search2 = $this->_req->query('SELECT albums.name AS  "albumName", artists.name AS  "artistName", albums.id, (
				SELECT GROUP_CONCAT( genres.name ) AS  "genre1"
				FROM genres
				INNER JOIN genres_albums ON genres_albums.genre_id = genres.id
				WHERE genres_albums.album_id = albums.id
				) AS  "genre"
			FROM albums
			INNER JOIN artists ON albums.artist_id = artists.id
			WHERE albums.name LIKE :name', array('name' => $get['search'] . '%'));
			$search3 = $this->_req->query('SELECT tracks.name, albums.id FROM tracks INNER JOIN albums ON tracks.album_id = albums.id WHERE tracks.name LIKE :name', array('name' => $get['search'] . '%'));
			$search1 = $search1->fetchAll(PDO::FETCH_OBJ);
			$search2 = $search2->fetchAll(PDO::FETCH_OBJ);
			$search3 = $search3->fetchAll(PDO::FETCH_OBJ);
			$search = json_encode(array($search1, $search2, $search3, JSON_PRETTY_PRINT), 100000);
			echo $search;
			return true;
		}
		if(isset($get['home']) && $get['home'] == 'home') {
			$home = $this->_req->query('SELECT artists.name AS "artistName", (
				SELECT GROUP_CONCAT( genres.name ) AS  "genre1"
				FROM genres
				INNER JOIN genres_albums ON genres_albums.genre_id = genres.id
				WHERE genres_albums.album_id = albums.id
				) AS  "genre" FROM albums INNER JOIN artists ON albums.artist_id = artists.id ORDER BY RAND() LIMIT 0,10', array());
			$home = $home->fetchAll(PDO::FETCH_OBJ);
			$home = json_encode(array($home, JSON_PRETTY_PRINT), 100000);
			echo $home;
			return true;
		}
		if (isset($get['genres']) && $get['genres'] == 'all') {
			$artists = $this->_req->query('SELECT * FROM genres', array());
			$artists = $artists->fetchAll(PDO::FETCH_OBJ);
			$artists = json_encode(array($artists, JSON_PRETTY_PRINT), 100000);
			echo $artists;
			return true;
		}
		if (isset($get['genre']) && preg_match('#^[0-9]*$#', $get['genre'])) {

			$artists = $this->_req->query('SELECT albums.*, artists.name AS "artistName" FROM albums INNER JOIN genres_albums ON genres_albums.album_id = albums.id
				INNER JOIN artists ON artists.id = albums.artist_id WHERE genres_albums.genre_id = :genreId', array('genreId' => $get['genre']));
			$genreN = $this->_req->query('SELECT genres.name AS "genreName" FROM genres WHERE genres.id = :genreId', array('genreId' => $get['genre']));
			$artists = $artists->fetchAll(PDO::FETCH_OBJ);
			$genreN = $genreN->fetchAll(PDO::FETCH_OBJ);
			$res = json_encode(array($artists, $genreN));
			echo $res;
			return true;
		}
	}
	public function post($post) {
		$champ = null;
		$variable = null;
		$tbl = $post;
		unset($tbl[0]);
		foreach ($tbl as $key => $value) {
			$champ .= "$key, ";
			$variable .= ":$key, ";
		}
		$champ_sub = strlen($champ)-2;
		$champ = substr($champ, 0, $champ_sub);
		$variable_sub = strlen($variable)-2;
		$variable = substr($variable, 0, $variable_sub);
		if (!empty($post['artist']) && $post['artist'] == 'artist') {
			$album = $this->_req->query("INSERT INTO artists ($champ) VALUES ($variable)", $tbl);
		}
		if (!empty($post['album']) && $post['album'] == 'album') {
			$album = $this->_req->query("INSERT INTO albums ($champ) VALUES ($variable)", $tbl);
		}
		if (!empty($post['track']) && $post['track'] == 'track') {
			$album = $this->_req->query("INSERT INTO tracks ($champ) VALUES ($variable)", $tbl);
		}
		if (!empty($post['genre']) && $post['genre'] == 'genre') {
			$album = $this->_req->query("INSERT INTO genres ($champ) VALUES ($variable)", $tbl);
		}
	}
	public function put($put) {
		$champ = null;
		$variable = null;
		$tbl = $put;
		unset($tbl[0]);
		foreach ($tbl as $key => $value) {
			$champ .= "$key = :$key, ";
		}
		$champ_sub = strlen($champ)-2;
		$champ = substr($champ, 0, $champ_sub);
		if (!empty($put['artist']) && $put['artist'] == 'artist') {
			$album = $this->_req->query("UPDATE artists SET  $champ WHERE id = :id", $tbl);
		}
		if (!empty($put['album']) && $put['album'] == 'album') {
			$album = $this->_req->query("UPDATE albums SET  $champ WHERE id = :id", $tbl);
		}
		if (!empty($put['track']) && $put['track'] == 'track') {
			$album = $this->_req->query("UPDATE tracks SET  $champ WHERE id = :id", $tbl);
		}
		if (!empty($put['genre']) && $put['genre'] == 'genre') {
			$album = $this->_req->query("UPDATE genres SET  $champ WHERE id = :id", $tbl);
		}
	}
	public function delete($delete) {
		$tbl = $delete;
		unset($tbl[0]);
		if (!empty($delete['artist']) && $delete['artist'] == 'artist') {
			$album = $this->_req->query("DELETE FROM artists WHERE id = :id", $tbl);
		}
		if (!empty($delete['album']) && $delete['album'] == 'album') {
			$album = $this->_req->query("DELETE FROM albums WHERE id = :id", $tbl);
		}
		if (!empty($delete['track']) && $delete['track'] == 'track') {
			$album = $this->_req->query("DELETE FROM tracks WHERE id = :id", $tbl);
		}
		if (!empty($delete['genre']) && $delete['genre'] == 'genre') {
			$album = $this->_req->query("DELETE FROM genre WHERE id = :id", $tbl);
		}
	}
}
?>