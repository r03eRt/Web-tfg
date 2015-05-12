<?php
	
	$servername = "mysql.hostinger.es";
	$username = "u109200527_secbe";
	$password = "S3cberry";
	$db ="u109200527_secbe";
	//error_reporting(-1);
	// Conectando, seleccionando la base de datos
	$link = mysql_connect('mysql.hostinger.es', 'u109200527_secbe', 'S3cberry')
	    or die('No se pudo conectar: ' . mysql_error());
	mysql_select_db('u109200527_secbe') or die('No se pudo seleccionar la base de datos');
	$clave_get_md5=$_GET['cla'];
	$correo_get=$_GET['cor'];
	$password_get=$_GET['pas'];

	$query_usada_clave="SELECT * FROM claves c WHERE  MD5(c.clave) = '$clave_get_md5' AND c.usada=0";
	$resultado_usada=mysql_query($query_usada_clave);
	$num_row_usada=mysql_num_rows($resultado_usada);
	$num_row_libre=mysql_fetch_assoc($resultado_usada);


	if($num_row_usada>0){//esta la clave que he pasado y no se ha usado
		//echo "esta la clave que quiero activar";
		//activo la clave
		$query_clave_activar="UPDATE claves c SET c.usada=1, c.activada_dia=CURDATE(),c.correo_usuario='$correo_get' where MD5(c.clave)='$clave_get_md5'";
		//echo '<br>'.$query_clave_activar.'<br>';
		$resultado_de_activar=mysql_query($query_clave_activar);
		$query_devolver="SELECT * FROM usuario u WHERE u.correo = '$correo_get'";
		$resultado_devolver=mysql_query($query_devolver);
		$row_devolver=mysql_fetch_assoc($resultado_devolver);
		$acierto=1;
	}else{
		$acierto=0;
		//echo "nose ha encontrado esa clave que deseas activar o ya esta usada";
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Responsive Onepage HTML Template | Multi</title>
	<!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.transitions.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

    <style>
		#pricing ul.pricing.featured li.plan-header {
		  
		  background: white!important;
		}
		.plan-purchase{
		}

		#pricing ul.pricing.featured{
			border:1px solid #777;
			background: white!important;
			color:#777!important;
			box-shadow: 0 12px 15px 0 rgba(0, 0, 0, 0.24);
		}

		#pricing ul.pricing.featured li.plan-header {
		  background: white!important;
		  color:#777!important;
		}    

		#pricing ul.pricing li.plan-header .price-duration > span.price {
		  font-weight: 700;
		  margin-top: 17px!important;
		}
		.price-duration_si{
			background: #71C341 !important;
			border-color: #71C341!important;
		}

		.price-duration_no{
			background: red !important;
			border-color: red!important;
		}
		
		#pricing ul.pricing li.plan-header {
			  background: #eee;
			  border-radius: 4px 4px 0 0;
			  margin: -15px -15px 10px;
			  padding: 0px;
			  border: 0;
			}
		</style>
</head><!--/head-->

	<body style="background:dodgerblue">

			<section id="pricing" style="padding-top:50px;background:dodgerblue">
                <div class="col-sm-6 col-md-offset-3 col-md-6 col-lg-4 col-lg-offset-4" id="div-success">
                    <div class="wow bounceInDown center animated" >
                        <ul class="pricing featured">
                            <li class="plan-header" id="success-header">

                                <div class="price-duration <?php if($acierto) echo 'price-duration_si';else print 'price-duration_no'?> wow zoomIn animated" data-wow-duration="600ms" data-wow-delay="400ms" style="visibility: visible; -webkit-animation-delay: 0.5s;">
                                    <span class="price">
                                       <i class="fa <?php if($acierto) echo 'fa-check';else print 'fa-remove'?> fa-3x fa-fw" ></i>
                                    </span>
                                    <span class="duration">
                                    </span>
                                </div>

                                
                            </li>
                            
                            <li class="plan-purchase" style="min-height:250px">
	                            <div class="col-lg-12" >
									<h1 style="color:#777!important;margin-top:0px"><?php if($acierto) echo 'ENHORABUENA';else print 'ALGO SALIÓ MAL'?></h1>
									<?php if($acierto) 
									echo 'La activación de tu producto Secberry se ha realizado correctamente,ya puedes empezar a usar tu producto.
									puedes logearte en la web con los siguientes datos:<br>
									Usuario: <strong>'.$row_devolver['alias'].'</strong>
									<br>
									Contraseña:<strong>'.$password_get.'</strong>';

									else print 'La activación del producto NO se ha realizado correctamente,puede que la clave ya haya sido registrada o que sea una clave erronea,vuelve a intentarlo más tarde o cantacta con nuestro servicio técnico aquí: <a href="mailto:secberry2015@gmail.com">secberry2015@gmail.com</a>'?>
									
								</div>
								<a href="http://morgadoluengo.com/secberry/nuevo_secberry/newsecberry/index.html"><button type="submit" style="padding:10px;margin-top:15px"class="col-md-offset-2 col-md-8 col-lg-8 col-lg-offset-2 btn <?php if($acierto) echo 'btn-success';else print 'btn-danger'?>" >VOLVER
	                        	</button>
                            
                            </li>
                        </ul>
                    </div>
                </div>
    </section>
		
	</body>
</html>
