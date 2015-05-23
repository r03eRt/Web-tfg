<?php session_start();
	$servername = "mysql.hostinger.es";
	$username = "u109200527_secbe";
	$password = "S3cberry";
	$db ="u109200527_secbe";
	error_reporting(E_ALL);
	// Conectando, seleccionando la base de datos
	$link = mysql_connect('mysql.hostinger.es', 'u109200527_secbe', 'S3cberry')
	    or die('No se pudo conectar: ' . mysql_error());
	echo 'Connected successfully';
	mysql_select_db('u109200527_secbe') or die('No se pudo seleccionar la base de datos');
	
	$email_login=$_POST['email_login'];
	echo $email_login;


	$query2 = "SELECT * FROM usuario WHERE correo='$email_login'";
	$resultado2=mysql_query($query2); 
	$row = mysql_fetch_array($resultado2);
	$ip_publica=$row['ip_publica'];
	echo "ip publica".$row['ip_publica']."<br>";
	if($ip_publica!=null){
		header("Location: http://".$ip_publica."/SecBerry/");
	}else{
		header("Location: http://morgadoluengo.com/secberry/nuevo_secberry/index.html");
	}

	?>