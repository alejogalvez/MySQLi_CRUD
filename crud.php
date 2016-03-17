<?php
	include_once 'db.php';
	//Código para insertar los datos.
	if(isset($_POST['save']))
	{
		$fn = $MySQLi->real_escape_string($_POST['fn']);
		$ln = $MySQLi->real_escape_string($_POST['ln']);
		//MiSQLy con declaraciones
		$SQL = $MySQLi->prepare("INSERT INTO data(fn,ln) VALUES(?,?)");
		$SQL->bind_param("ss",$fn,$ln);
		$SQL->execute();

		if(!$SQL)
		{
			echo $MySQLi->error;
		}
	}

	//Código para el borrado de datos.
	if(isset($_GET['del']))
	{
		//MiSQLy con declaraciones
		$SQL = $MySQLi->prepare("DELETE FROM data WHERE id = " . $_GET['del']);
		$SQL->bind_param("i",$_GET['del']);
		$SQL->execute();
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
		//MiSQLy con declaraciones
		$SQL = $MySQLi->prepare("UPDATE data SET fn=?, ln=? WHERE id=?");
		$SQL->bind_param("ssi", $_POST['fn'], $_POST['ln'], $_GET['edit']);
		$SQL->execute();
		header("Location: index.php");
	}
?>
