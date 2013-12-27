<?php

include_once('class.Soporte.php');

if(isset($_POST['DBName']) and (isset($_POST['TableName'])) and (isset($_POST['FieldName'])) and (isset($_POST['ValueName']))){

	//$DB = $_POST['DBName'];
	$Table = $_POST['TableName'];
	$Field = $_POST['FieldName'];
	$Value = $_POST['ValueName'];
	
	//Falta terminar instruccion
	$sql ="INSERT INTO ".$Table." [] ".$Field." VALUES '".$Value."'";
	
	$db = new DBAdmin();
	$json= new JSON();
	
	$result = $db->executeQuery($sql);
	
	echo $json->SQLtoJSON($result);
}
else{
	echo $json->getJSONError('SQL','Error en la consulta');
}
?>