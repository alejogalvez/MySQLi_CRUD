<?php

	include_once 'db.php';

	//Código para insertar los datos.
	if(isset($_POST['save']))
	{
		$fn = $MySQLi->real_escape_string($_POST['fn']);
		$ln = $MySQLi->real_escape_string($_POST['ln']);

		$SQL = $MySQLi->query("INSERT INTO data(fn,ln) VALUES('$fn','$ln')");

		if(!$SQL)
		{
			echo $MySQLi->error;
		}
	}

	//Código para el borrado de datos.
	if(isset($_GET['del']))
	{
		$SQL = $MySQLi->query("DELETE FROM data WHERE id = " . $_GET['del']);
		header("Location: index.php");
	}

	//Código para la actualización de datos.
	if(isset($_GET['edit']))
	{
		$SQL = $MySQLi->query("SELECT * FROM data WHERE id = " . $_GET['edit']);
		$getROW = $SQL->fetch_array();
	}
	if(isset($_POST['update']))
	{

		$SQL = $MySQLi->query("UPDATE data SET fn='".$_POST['fn']."', ln='".$_POST['ln']."' WHERE id=".$_GET['edit']);
		header("Location: index.php");
	}

?>
