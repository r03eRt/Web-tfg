<?php

$servername = "mysql.hostinger.es";
$username = "u109200527_secbe";
$password = "S3cberry";
$db ="u109200527_secbe";

// Activar errores
	ini_set('display_errors', 'On');
	ini_set('display_errors', 1);

/*
$servername = "mysql.hostinger.es";
$username = "u109200527_secbe";
$password = "S3cberry";
$db ="u109200527_secbe";
*/

// Create connection
$mysqli = new mysqli("$servername", "$username", "$password", "$db");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 


	/*Conexion para el entorno de producción*/
/*
	$con = mysql_connect("mysql.hostinger.es","u109200527_secbe","S3cberry") or
die("Error en conexión al servidor MySQL: ".mysql_error()); 

	mysql_select_db("u109200527_secbe",$con)or
die ("Error: No se puede usar la base de datos. ".mysql_error());
*/

	/*Conexion para el entorno de desarrollo*/

/*
$con = mysql_connect("localhost","root","") or
die("Error en conexión al servidor MySQL: ".mysql_error()); 

	mysql_select_db("secberry",$con)or
die ("Error: No se puede usar la base de datos. ".mysql_error());
*/

?>