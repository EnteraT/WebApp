<?php

include_once('class.Soporte.php');

$login = new Login();

if(isset($_POST['UserLogin']) and (isset($_POST['PassLogin']))){

	$user = $_POST['UserLogin'];
	$pass = $_POST['PassLogin'];

	if($user!=null and $pass!=null){
		echo $login->checkLogin($user, $pass);
	}
	else{
		echo $login->getJSONError('LOGIN','Usuario o contrase�a incorrecta');
	}
}
else{
	echo $login->getJSONError('LOGIN','Error en el env�o de datos');
}
?>