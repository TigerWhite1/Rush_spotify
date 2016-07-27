<?php
class Database{

	private $pdo;
	private static $_instance;

	public function __construct($login, $password = '', $database_name, $host = 'localhost'){
		$this->pdo = new PDO("mysql:dbname=$database_name;host=$host", $login, $password);
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	}

	public function query($query, $params = false, $data_type = false){
		if ($data_type == "int") {
			$data_type = PDO::PARAM_INT;
		} else {
			$data_type = PDO::PARAM_STR;
		}
		if($params){
			$req = $this->pdo->prepare($query);
			foreach ($params as $key => $value) {
				$req->bindValue($key, $value, $data_type);
			}
			$req->execute();
		}else{
			$req = $this->pdo->query($query);
		}
		return $req;
	}

	public static function getInstance() {
		if (is_null(self::$_instance)) {
			self::$_instance = new Database('wacrush2', 'wacrush2', 'music', 'odinduclos.me');
		}
		return self::$_instance;
	}


}
// $test = Database::getInstance();
// foreach($test->query('SELECT * FROM tp_fiche_personne WHERE id_perso = :id', array('id' => 276), "int") as $value) {
// 	echo "$value->nom\n";
// 	echo utf8_encode($value->prenom);
// }
?>
