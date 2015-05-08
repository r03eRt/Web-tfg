<?php 

	session_start();
	$mysqli = new mysqli("mysql.hostinger.es", "u109200527_secbe", "S3cberry", "u109200527_secbe");
	if ($mysqli->connect_errno) {
		echo "Fallo al contenctar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	
	$email=$_POST['email'];
	echo $email;

	//$query = "SELECT * FROM usuario WHERE correo=".$email.'"';
	
	$query = "SELECT * FROM usuario WHERE correo='$email'"; 
	$resul = $mysqli->query($query);
	echo $resul."<br>";

	if($resul==1){
		echo "OK";
	}else {
		echo "no ok";
	}
	?>