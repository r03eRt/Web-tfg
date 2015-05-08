<?php session_start();
	/*$servername = "mysql.hostinger.es";
	$username = "u109200527_secbe";
	$password = "S3cberry";
	$db ="u109200527_secbe";
	error_reporting(E_ALL);
	// Conectando, seleccionando la base de datos
	$link = mysql_connect('mysql.hostinger.es', 'u109200527_secbe', 'S3cberry')
	    or die('No se pudo conectar: ' . mysql_error());
	echo 'Connected successfully';
	mysql_select_db('u109200527_secbe') or die('No se pudo seleccionar la base de datos');*/
	include("conexion.php");
	

	$id_user=4;

	$query_fecha_numCada="SELECT DATE_FORMAT(fecha, '%Y-%m-%d')AS fecha_col,COUNT(*) num_reg   FROM historial WHERE id_usuario=4 GROUP BY DATE_FORMAT(fecha, '%Y-%m-%d') DESC";
	//$query_cada_dia="SELECT * FROM historial WHERE id_usuario='$id_user' AND  DATE_FORMAT(fecha, '%Y-%m-%d')= '$num_reg_dia' ORDER BY fecha ASC";
	$resultado=$mysqli->query($query_fecha_numCada); 
	/*$cont_fila = mysql_fetch_array($resultado);*/
	$numero_fechas = $resultado->num_rows;
	echo '$numero_fechas'.$numero_fechas.'<br>';

	
	while($cont_fila = $resultado->fetch_assoc()) {
		echo '<h1>fecha_col '.$cont_fila['fecha_col'].'  ';
		echo ' num_reg '.$cont_fila['num_reg'].'</h1><br>';
		$num_reg_dia=$cont_fila['fecha_col'];
		$resultado2=$mysqli->query("SELECT * FROM historial WHERE id_usuario='$id_user' AND  DATE_FORMAT(fecha, '%Y-%m-%d')= '$num_reg_dia' ORDER BY fecha DESC");
		while($cont_cada_dia =$resultado2->fetch_assoc()) {
			echo 'id_historial '.$cont_cada_dia['id_historial'].' ';
			echo 'id_usuario '.$cont_cada_dia['id_usuario'].' ';
			echo 'id_comando '.$cont_cada_dia['id_comando'].' ';
			echo 'fecha '.$cont_cada_dia['fecha'].' <br>';


		} 

   }
   
/*v2

	$id_user=4;

	$query_fecha_numCada="SELECT DATE_FORMAT(fecha, '%Y-%m-%d')AS fecha_col,COUNT(*) num_reg   FROM historial WHERE id_usuario=4 GROUP BY DATE_FORMAT(fecha, '%Y-%m-%d') DESC";
	//$query_cada_dia="SELECT * FROM historial WHERE id_usuario='$id_user' AND  DATE_FORMAT(fecha, '%Y-%m-%d')= '$num_reg_dia' ORDER BY fecha ASC";
	$resultado=mysql_query($query_fecha_numCada); 
	$numero_fechas = mysql_num_rows($resultado);
	echo '$numero_fechas'.$numero_fechas.'<br>';

	
	while($cont_fila = mysql_fetch_array($resultado)) {
		echo '<h1>fecha_col '.$cont_fila['fecha_col'].'  ';
		echo ' num_reg '.$cont_fila['num_reg'].'</h1><br>';
		$num_reg_dia=$cont_fila['fecha_col'];
		$resultado2=mysql_query("SELECT * FROM historial WHERE id_usuario='$id_user' AND  DATE_FORMAT(fecha, '%Y-%m-%d')= '$num_reg_dia' ORDER BY fecha DESC");
		while($cont_cada_dia = mysql_fetch_array($resultado2)) {
			echo 'id_historial '.$cont_cada_dia['id_historial'].' ';
			echo 'id_usuario '.$cont_cada_dia['id_usuario'].' ';
			echo 'id_comando '.$cont_cada_dia['id_comando'].' ';
			echo 'fecha '.$cont_cada_dia['fecha'].' <br>';


		} 

   }
   


*/


/*V1
	for ($fila_act=0; $fila_act <$numero_fechas; $fila_act++) { 
		echo 'fecha_col'.$cont_fila['fecha_col'].'<br>';
	}
	*/
/*
	$query2 = "SELECT * FROM usuario WHERE correo='$email'";
	$resultado2=mysql_query($query2); 
	$row = mysql_fetch_array($resultado2);
	$ip_publica=$row['ip_publica'];
	echo "ip publica".$row['ip_publica']."<br>";
	if($ip_publica!=null){
		header("Location: http://".$ip_publica."/SecBerry/");
	}else{
		header("Location: http://morgadoluengo.com/secberry/index.html");
	}
*/
	
	
	
	?>