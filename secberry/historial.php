<?php
	session_start(); 
	include("conexion.php");


function nombremes($mes){
 setlocale(LC_TIME, 'spanish');  
 $nombre=strftime("%B",mktime(0, 0, 0, $mes, 1, 2000)); 
 return $nombre;
}

?>

<!DOCTYPE html>
<html lang="en">
<html>
    <head>
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/mystyle.css"  />
	  
      <meta charset="utf-8">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
       <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.js"></script>
      <script type="text/javascript" src="js/jquery-scrollspy.js"></script>
	  <script type="text/javascript" src="js/smooth-scroll.js"></script>

      <script>
      	$(document).ready(function(){
      		$(".dropdown-button").dropdown({hover: false});
      		  $('.slider').slider({
      		  	indicators:false,
      		  	height:550,
      		  	interval:3000
      		  });

      		$(window).scroll(function() {

      			 if ($(document).scrollTop() == 300 ) {
      			 	 $('#features_all').fadeIn("6000");
      			 }
      			 if ($(document).scrollTop() == 2500 ) {
      			 	 $('#show1').fadeIn("6000");
      			 	 $('#show2').fadeIn("6000");
      			 }
      			
			});
			$('.parallax').parallax();
			$('.materialboxed').materialbox();
			$('.scrollspy').scrollSpy();
			$(".button-collapse").sideNav();
			 $('select').material_select();	
      	});


      	

      </script>

	<script type="text/javascript">
			
	</script>

    </head>
    <body class="blue">


		 <nav>
		    <div class="nav-wrapper  blue lighten-1 ">
		      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
			  
			  <ul class="left">
				<li class="li-especial"><a href="streaming.php"><img src="images/Secberry_logo.png" alt="" height="56px" width="85px" ></a></li>
			  </ul>
			  <ul class="left hide-on-med-and-down">
				<?php $consul = "SELECT * FROM usuario WHERE id_usuario='".$_SESSION['id-usuario-logueado']."'"; 
							$res = $mysqli->query($consul);
							$reg = $res->fetch_assoc(); ?>
							
				<li class="li-especial li-especial-text"><i class="mdi-social-person"></i> <?php echo $reg['nombre']?></a></li>
				<li class="li-especial li-especial-text"><i class="mdi-action-info-outline"></i> <?php echo $reg['clave_producto']?></a></li>
			  </ul>
		      <ul class="right hide-on-med-and-down">
			  
			    <li><a href="streaming.php"><i class="mdi-action-visibility"></i> Streaming</a></li>
				<li><a href="galeria.php"><i class="mdi-device-now-wallpaper"></i> Galeria</a></li>	
		        <li><a href="registro.php"><i class="mdi-action-alarm"></i> Registro</a></li>
		        <li><a href="estado.php"><i class="mdi-action-assignment"></i> Estado</a></li>
		        <li><a href="ajustes.php"><i class="small mdi-action-settings"></i> Ajustes</a></li>
		        <li><a href="#"><i class="mdi-action-help"></i> Ayuda</a></li>
		        <li><a href="logout.php"><i class="mdi-action-exit-to-app"></i> Salir</a></li>
		      </ul>
		      <ul class="side-nav" id="mobile-demo" >
		        <li id="Perfil" style="display:inline-block">
		        <div>
					<?php $query1 = "SELECT * FROM usuario WHERE id_usuario='".$_SESSION['id-usuario-logueado']."'"; 
							$resul = $mysqli->query($query1);
							$fila = $resul->fetch_assoc(); ?>
			        <div style="width:100%;text-align:center">
			        	<img class="circle" style="margin-top:7%" src="fotosPerfil/<?php echo $fila['foto'] ?>" alt="" width="40%" height="40%">
			        </div>
			        <div style="line-height:20px;margin-bottom:22px;text-align:center">			  						
							<p>Nombre: <?php echo $fila['nombre']?></p>
							<p>ID: <?php echo $fila['clave_producto']?></p>
			        </div>
			    </div>
		        </li>
		        <li id="Streaming"><i class="mdi-action-visibility"></i><a href="streaming.php">Streaming</a></li>
				<li id="Galeria"><i class="mdi-device-now-wallpaper"></i><a href="galeria.php">Galeria</a></li>
		        <li id="Registro"><i class="mdi-action-alarm"></i><a href="registro.php">Registro</a></li>
		        <li id="Estado"><i class="mdi-action-assignment"></i><a href="estado.php">Estado</a></li>
		        <li id="Ajustes"><i class="small mdi-action-settings"></i><a href="ajustes.php">Ajustes</a></li>
		        <li id="Ayuda"><i class="mdi-action-help"></i><a href="@">Ayuda</a></li>
		        <li id="Salir"><i class="mdi-action-exit-to-app"></i><a href="logout.php">Salir</a></li>
		      </ul>
		    </div>
		  </nav>

<?php
	error_reporting(E_ALL);

	$id_user=4;

	$query_fecha_numCada="SELECT DATE_FORMAT(fecha, '%Y-%m-%d')AS fecha_col,COUNT(*) num_reg   FROM historial WHERE id_usuario=4 GROUP BY DATE_FORMAT(fecha, '%Y-%m-%d') DESC";
	//$query_cada_dia="SELECT * FROM historial WHERE id_usuario='$id_user' AND  DATE_FORMAT(fecha, '%Y-%m-%d')= '$num_reg_dia' ORDER BY fecha ASC";
	$resultado=$mysqli->query($query_fecha_numCada); 
	/*$cont_fila = mysql_fetch_array($resultado);*/
	$numero_fechas = $resultado->num_rows;
	echo '$numero_fechas'.$numero_fechas.'<br>';
?>


		<div><!--container-->
			<div class="row">
				<div class="col s12 l6 offset-l3 z-depth-2 " >
					<ul class="collection blue ">
<?php
	
while($cont_fila = $resultado->fetch_assoc()) {
	//echo '<h1>fecha_col '.$cont_fila['fecha_col'].'  ';
	//echo ' num_reg '.$cont_fila['num_reg'].'</h1><br>';
	$num_reg_dia=$cont_fila['fecha_col'];

?>
					    <li class="collection-header  white-text" style="text-align:center"  style="text-align:center"><h4>
					    <?php echo date("d",strtotime($cont_fila['fecha_col'])).' de '.nombremes(date("m",strtotime($cont_fila['fecha_col']))).' de '
					    .date("y",strtotime($cont_fila['fecha_col']));?>
					    </h4></li>
<?php
	$resultado2=$mysqli->query("SELECT * FROM historial NATURAL JOIN comando_historial WHERE id_usuario='$id_user' AND  DATE_FORMAT(fecha, '%Y-%m-%d')= '$num_reg_dia' ORDER BY fecha DESC");
	while($cont_cada_dia =$resultado2->fetch_assoc()) { 
?>
					    <li class="collection-item avatar">
		   			      <i class="mdi-file-folder circle"></i>
					      <span class="title"><?php echo $cont_cada_dia['comando'].' '; ?></span>
					      <p><?php echo date("H:m:s",strtotime($cont_cada_dia['fecha'])).'<br>'.date("d/m/Y",strtotime($cont_cada_dia['fecha'])); ; ?>
					      </p>
					      <a href="#!" class="secondary-content"><i class="mdi-action-grade"></i></a>
					    </li>
<?php
			
		} 
   }

?>
				    
					 </ul>
				</div>
			</div>
  		</div><!--container-->
    </body>
  </html>