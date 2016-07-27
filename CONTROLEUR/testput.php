<?php
require_once'../MODEL/classApi.php';
$get = new API;
$methode = $_SERVER['REQUEST_METHOD'];


if (!empty($_GET)) {
	$get->get($_GET);
	
}
if (!empty($_POST)) {
	$get->post($_POST);
}
if ($methode == "PUT") {
	$_PUT = array();
	$put = $_SERVER['QUERY_STRING'];
	parse_str($put, $_PUT);
	$get->put($_PUT);	
}
if ($methode == "DELETE") {
	$delete = $_SERVER['QUERY_STRING'];
	$_DELETE = array();
	parse_str($delete, $_DELETE);
	$get->put($_DELETE);	
}
?>