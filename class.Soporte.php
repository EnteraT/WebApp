<?php
class Config{

	public static function getDBServer() {
		return 'sql102.eshost.es';
	}

	public static function getDBName(){
		return  'eshos_14026197_prova';
	}

	public static function getDBUser(){
		return 'eshos_14026197';
	}
	public static function getDBPwd(){
		return 'android';
	}
}

class DBAdmin{
	public function getLink()
	{
		$link = mysqli_connect(config::getDBServer(), config::getDBUser(), config::getDBPwd());
	
		if (!$link)
		{
			die('Could not connect: ' . mysql_error());
		}

		$link->select_db(config::getDBName());
		return $link;
	}

	public function executeQuery($sql){
		$link = $this->getLink();

		$result = $link->query($sql);

		$link->close();
		return $result;
	}
}

class Login{

	public function getJSONLogin($user, $pass){
		$result = $this->comprobarLogin($user, $pass);
		$json = $this->formateaJSON($result);
		return $json;
	}

	private function checkLogin($alias, $clave){
		
		$sql = "SELECT id, Tipo ";
		$sql .= "FROM Usuarios ";
		$sql .= "WHERE Usuario LIKE '".$alias."' AND Password LIKE '".$clave."'";
		$db = new DBAdmin();
		return $db->executeQuery($sql);
	}
}

class JSON{
	public function SQLtoJSON($sql){
		
		$encode = json_encode($sql);
		return $encode;
	}
	
	public function fromJSON($json){
		$decode=json_decode($json);
		return $decode;
	}
	
	public function getJSONError($tag, $errormsg){
		$response = array("tag" => $tag, "error_msg" => $errormsg);
		return json_encode($response);
	}
	
}
?>