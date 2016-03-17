<?php
	
	define('_HOST_NAME','localhost');
	define('_DATABASE_NAME','dbtest');
	define('_DATABASE_USER_NAME','root');
	define('_DATABASE_PASSWORD','');
	
	$MySQLi = new MySQLi(_HOST_NAME, _DATABASE_USER_NAME, _DATABASE_PASSWORD, _DATABASE_NAME);
	
	if($MySQLi->connect_errno){
		die('Error en la conexión:' . $MySQLi->connect_error ); 
	}
	
?>