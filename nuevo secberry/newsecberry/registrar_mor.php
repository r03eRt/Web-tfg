<?php
	
	$servername = "mysql.hostinger.es";
	$username = "u109200527_secbe";
	$password = "S3cberry";
	$db ="u109200527_secbe";
	error_reporting(-1);
	// Conectando, seleccionando la base de datos
	$link = mysql_connect('mysql.hostinger.es', 'u109200527_secbe', 'S3cberry')
	    or die('No se pudo conectar: ' . mysql_error());
	echo 'Connected successfully';
	mysql_select_db('u109200527_secbe') or die('No se pudo seleccionar la base de datos');

	
	$alias=$_POST['alias'];
	$password=$_POST['password'];
	$password2=$_POST['password2'];
	$ip_publica=$_POST['ip_publica'];
	$nombre=$_POST['nombre'];
	$apellidos=$_POST['apellidos'];
	$correo=$_POST['correo'];
	$telefono=$_POST['telefono'];
	$foto = $_FILES['foto']['name'];
	$clave_producto=$_POST['clave_producto'];

	echo "hola<br>";
	echo $alias." alias<br>";
	echo $password." password<br>";
	echo $password2." password2<br>";
	echo $ip_publica." ip_publica<br>";
	echo $nombre." nombre<br>";
	echo $apellidos." apellidos<br>";
	echo $correo." correo<br>";
	echo $telefono." telefono<br>";
	echo $clave_producto." clave_producto<br>";
	echo $foto."FOTO<br>";
	$fecha_registrado = date("Y-m-d H:i:s");
	echo $fecha_registrado."fecha_registrado<br>";



echo "Tu dirección IP externa es: ", $_SERVER['REMOTE_ADDR'];			


		if(!empty($alias) && !empty($password) && !empty($password2) && !empty($correo) && !empty($ip_publica)){

			if($password==$password2){

				//FECHA REGISTRADO

				$fecha_registrado = date("Y-m-d H:i:s");
				echo $fecharegistrado." $fecharegistrado<br>";
				//FOTO PERFIL

				//comprobamos si ha ocurrido un error.
				if ($_FILES["foto"]["error"] > 0){
					echo "ha ocurrido un error";
				} else {
					//ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
					//y que el tamano del archivo no exceda los 100kb
					$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
					$limite_kb = 100;

					if (in_array($_FILES['foto']['type'], $permitidos) && $_FILES['foto']['size'] <= $limite_kb * 1024){
						//esta es la ruta donde copiaremos la imagen
						//recuerden que deben crear un directorio con este mismo nombre
						//en el mismo lugar donde se encuentra el archivo subir.php
						$ruta = "fotosPerfil/" . $_FILES['foto']['name'];
						//comprobamos si este archivo existe para no volverlo a copiar.
						//pero si quieren pueden obviar esto si no es necesario.
						//o pueden darle otro nombre para que no sobreescriba el actual.
						if (!file_exists($ruta)){
							//aqui movemos el archivo desde la ruta temporal a nuestra ruta
							//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
							//almacenara true o false
							$resul = @move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta);
							if ($resul){
								//$nombre = $_FILES['foto']['name'];
								//@mysql_query("INSERT INTO imagenes (imagen) VALUES ('$nombre')") ;
								//echo "el archivo ha sido movido exitosamente";
							} else {
								//echo "ocurrio un error al mover el archivo.";
								//header("Location: registroUsuario.html");
							}
						} else {
							//echo $_FILES['foto']['name'] . ", este archivo existe";
							//header("Location: registroUsuario.html");
						}
					} else {
						//echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
						//header("Location: registroUsuario.html");
					}
				}

				$passwordCifrada=cifrarPasswordSHA1($password);


				$query_key="SELECT * FROM claves WHERE used=0";
				echo $query_key;
				$resultado=mysql_query($query_key);
				$num_row=mysql_fetch_assoc($resultado);
				$found=false;
				while ($num_row) {
					if($num_row['key']==$clave_producto){
						$found=true;
					}
				}
				echo $found;

				if($found){


					$query1 = "INSERT INTO usuario (alias, password,ip_publica, nombre,apellidos,telefono,correo,fecha_registrado,clave_producto,foto) VALUES ('$alias','$password','$ip_publica','$nombre','$apellidos','$telefono','$correo','$fecha_registrado','$clave_producto','$foto')";
					$resultado1=mysql_query($query1);
					$last_user=mysql_insert_id();


					$query_activation="UPDATE claves SET used=1 and activated=CURDATE() WHERE id_user='$last_user'";
					$resultado3=mysql_query($query_activation);


					header("Location:".$_SERVER['REMOTE_ADDR']."/SecBerry");
				}else{
					header("Location:singup.html");
				}

				$query1 = "INSERT INTO usuario (alias, password,ip_publica, nombre,apellidos,telefono,correo,fecha_registrado,foto,clave_producto)VALUES ('$alias', '$passwordCifrada','$ip_publica', '$nombre','$apellidos','$telefono','$correo','$fecha_registrado','$foto','$clave_producto')";
				$mysqli->query($query1);
				
				$id_usuario= $mysqli->insert_id;
				$_SESSION['id_usuario']=$id_usuario;

				$query2 = "INSERT INTO opciones (id_usuario, id_tamanio_foto, id_formato_foto,id_tamanio_video,id_formato_video,id_duracion_video,id_sensibilidad_giro_cam,id_subida_auto)VALUES ('$id_usuario',3,1,2,1,2,1,0)";
				$mysqli->query($query2);*/


				header("Location: http://$ip_publica/SecBerry");
			}

		}
	

	

function cifrarPasswordSHA1($pass_) {

	$hashed=sha1($pass_);
	return $hashed;
}

?>