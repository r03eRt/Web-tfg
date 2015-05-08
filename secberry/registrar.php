<?php
	
	session_start();
	include("conexion.php");
	
	$alias=htmlspecialchars(trim(strip_tags($_POST['alias'])));
	$password=htmlspecialchars(trim(strip_tags($_POST['password'])));
	$password2=htmlspecialchars(trim(strip_tags($_POST['password2'])));
	$ip_publica=htmlspecialchars(trim(strip_tags($_POST['ip-publica'])));
	$nombre=htmlspecialchars(trim(strip_tags($_POST['nombre'])));
	$apellidos=htmlspecialchars(trim(strip_tags($_POST['apellidos'])));
	$correo=htmlspecialchars(trim(strip_tags($_POST['correo'])));
	$telefono=$_POST['telefono'];
	$foto = $_FILES['foto']['name'];
	$clave_producto=htmlspecialchars(trim(strip_tags($_POST['clave-producto'])));

	if(isset($_POST['boton-registro']))//para saber si el botón registrar fue presionado.
	{

		if(!empty($alias) && !empty($password) && !empty($password2) && !empty($correo) && !empty($ip_publica)){

			if($password==$password2){

				//FECHA REGISTRADO

				$fecha_registrado = date("Y-m-d H:i:s");
				
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
								header("Location: registroUsuario.html");
							}
						} else {
							//echo $_FILES['foto']['name'] . ", este archivo existe";
							header("Location: registroUsuario.html");
						}
					} else {
						//echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
						header("Location: registroUsuario.html");
					}
				}

				$passwordCifrada=cifrarPasswordSHA1($password);

				$query1 = "INSERT INTO usuario (alias, password,ip_publica, nombre,apellidos,telefono,correo,fecha_registrado,foto,clave_producto)VALUES ('$alias', '$passwordCifrada','$ip_publica', '$nombre','$apellidos','$telefono','$correo','$fecha_registrado','$foto','$clave_producto')";
				$mysqli->query($query1);
				
				$id_usuario= $mysqli->insert_id;
				$_SESSION['id_usuario']=$id_usuario;

				$query2 = "INSERT INTO opciones (id_usuario, id_tamanio_foto, id_formato_foto,id_tamanio_video,id_formato_video,id_duracion_video,id_sensibilidad_giro_cam,id_subida_auto)VALUES ('$id_usuario',3,1,2,1,2,1,0)";
				$mysqli->query($query2);


				header("Location: http://$ip_publica/SecBerry");
			}

		}
	}

function cifrarPasswordSHA1($pass_) {

	$hashed=sha1($pass_);
	return $hashed;
}

?>