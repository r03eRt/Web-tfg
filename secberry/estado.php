<?php
	session_start(); 
	include("conexion.php");

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
     
	  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>

	<script type="text/javascript">

		// Note: This example requires that you consent to location sharing when
		// prompted by your browser. If you see a blank space instead of the map, this
		// is probably because you have denied permission for location sharing.

		var map;

		function initialize() {
		  var mapOptions = {
		    zoom: 6
		  };
		  map = new google.maps.Map(document.getElementById('map-canvas'),
		      mapOptions);

		  // Try HTML5 geolocation
		  if(navigator.geolocation) {
		    navigator.geolocation.getCurrentPosition(function(position) {
		      var pos = new google.maps.LatLng(position.coords.latitude,
		                                       position.coords.longitude);

		      var infowindow = new google.maps.InfoWindow({
		        map: map,
		        position: pos,
		        content: 'Location found using HTML5.'
		      });

		      map.setCenter(pos);
		    }, function() {
		      handleNoGeolocation(true);
		    });
		  } else {
		    // Browser doesn't support Geolocation
		    handleNoGeolocation(false);
		  }
		}

		function handleNoGeolocation(errorFlag) {
		  if (errorFlag) {
		    var content = 'Error: The Geolocation service failed.';
		  } else {
		    var content = 'Error: Your browser doesn\'t support geolocation.';
		  }

		  var options = {
		    map: map,
		    position: new google.maps.LatLng(60, 105),
		    content: content
		  };

		  var infowindow = new google.maps.InfoWindow(options);
		  map.setCenter(options.position);
		}

		google.maps.event.addDomListener(window, 'load', initialize);					
	</script>


    </head>
    <body class="blue">


		 <nav>
		    <div class="nav-wrapper  blue lighten-1">
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
			    </div>ç

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
$query_opciones="SELECT * FROM opciones WHERE id_usuario=2";
$resultado_opciones=$mysqli->query($query_opciones);
$fila_opciones = $resultado_opciones->fetch_assoc();


?>

		  <div><!--container-->
			<div class="row" id="no-resp">
				<div class="col m3 l3 " style="background:;margin-top:10%">
					<div class="row">
						<div class="col m12 l8 offset-l2 white-text " style="text-align:center">
							<div class="blue lighten-1 z-depth-2 " style="background:red">
								<h5 style="margin-bottom:0px;;padding-top:8px"><i class="mdi-maps-my-location "></i>Orientación</h5>
								<p style="margin-top:0px;padding-bottom:8px"><?php echo $fila_opciones['rotation'];?></p>
							</div>
	 						<div class="blue lighten-1 z-depth-2 " style="background:red">
								<h5 style="margin-bottom:0px;;padding-top:8px"><i class="mdi-image-camera-alt "></i>Fotos</h5>
								<p style="margin-top:0px;padding-bottom:8px"><?php echo $fila_opciones['image_width'].'x'.$fila_opciones['image_height'];?></p>
							</div>
	 						<div class="blue lighten-1 z-depth-2 " style="background:red">
								<h5 style="margin-bottom:0px;;padding-top:8px"><i class="mdi-av-videocam"></i>Vídeos</h5>
								<p style="margin-top:0px;padding-bottom:8px"><?php echo $fila_opciones['video_width'].'x'.$fila_opciones['video_height'];?></p>
							</div>
	 						<div class="blue lighten-1 z-depth-2 " style="background:red">
								<h5 style="margin-bottom:0px;;padding-top:8px"><i class="mdi-communication-phone"></i>Teléfono</h5>
								<p style="margin-top:0px;padding-bottom:8px"><?php echo $fila['telefono']?></p>
							</div>
						</div>
					</div>
				</div>
				<div id="map-canvas" class="col m6 l6" style="height:600px;margin-top:5%">
					
				</div>
				<div class="col m3 l3" style="margin-top:10%">
					<div class="row">
						<div class="col m12 l8 offset-l2 white-text " style="text-align:center">
							<div class="blue lighten-1 z-depth-2 " style="background:red">
								<h5 style="margin-bottom:0px;padding-top:8px"><i class="mdi-device-signal-cellular-0-bar"></i>Estado Señal</h5>
								<p style="margin-top:0px;padding-bottom:8px">100%</p>
							</div>
	 						<div class="blue lighten-1 z-depth-2 " style="background:red">
								<h5 style="margin-bottom:0px;padding-top:8px"><i class="mdi-device-access-alarms "></i>Estado Alarma</h5>
								<p style="margin-top:0px;padding-bottom:8px"><?php echo $fila_opciones['motion_detection'];?></p>
							</div>
	 						<div class="blue lighten-1 z-depth-2 " style="background:red">
								<h5 style="margin-bottom:0px;padding-top:8px"><i class="mdi-device-sd-storage"></i>Estado Local</h5>
								<p style="margin-top:0px;padding-bottom:8px"><?php echo $fila_opciones['motion_detection'];?></p>
							</div>
	 						<div class="blue lighten-1 z-depth-2 " style="background:red">
								<h5 style="margin-bottom:0px;padding-top:8px"><i class="mdi-file-cloud-upload"></i>Espacio externo</h5>
								<p style="margin-top:0px;padding-bottom:8px"><?php  disk_free_space("C:");?></p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<style>
			.grays:hover{
				background-color: rgb(186, 224, 255);
				-webkit-transition: all 0.2s ease 0s;                 
			    -moz-transition: all 0.2s ease 0s;                
			    -o-transition: all 0.2s ease 0s;  
			    -ms-transition: all 0.2s ease 0s;         
			    transition: all 0.2s ease 0s;
			}

			.grays{
				background-color:white;
				-webkit-transition: all 0.2s ease 0s;                 
			    -moz-transition: all 0.2s ease 0s;                
			    -o-transition: all 0.2s ease 0s;  
			    -ms-transition: all 0.2s ease 0s;         
			    transition: all 0.2s ease 0s;

			}
			</style>

			<div class="row" id="resp" >
				<div class="col s12 l6 offset-l3 z-depth-2 " >
					<ul class="collection blue">
					    <li class="collection-header  white-text" style="text-align:center"  style="text-align:center"><h4>Estado</h4></li>
					    <li class="collection-item avatar grays" >
		   			      <i class="mdi-maps-my-location circle blue" style="margin-left:20%" ></i>
					      <span class="title" style="margin-left:25%">Orientación</span>
					      <p style="margin-left:25%" style="margin-left:25%">19:22</p>
					      <!--Lado derecho en color
					      <a href="#!" class="secondary-content"><i class="mdi-action-grade"></i></a>-->
					    </li>
					    <li class="collection-item avatar grays">
		   			      <i class="mdi-image-camera-alt circle blue" style="margin-left:20%"></i>
					      <span class="title" style="margin-left:25%">Fotos</span>
					      <p style="margin-left:25%">19:22</p>
					      <!--Lado derecho en color
					      <a href="#!" class="secondary-content"><i class="mdi-action-grade"></i></a>-->
					    </li>
					    <li class="collection-item avatar grays">
		   			      <i class="mdi-av-videocam circle blue" style="margin-left:20%"></i>
					      <span class="title" style="margin-left:25%">Vídeos</span>
					      <p style="margin-left:25%">19:22</p>
					      <!--Lado derecho en color
					      <a href="#!" class="secondary-content"><i class="mdi-action-grade"></i></a>-->
					    </li>
					    <li class="collection-item avatar grays">
		   			      <i class="mdi-communication-phone circle blue" style="margin-left:20%"></i>
					      <span class="title" style="margin-left:25%">Teléfono</span>
					      <p style="margin-left:25%">19:22</p>
					      <!--Lado derecho en color
					      <a href="#!" class="secondary-content"><i class="mdi-action-grade"></i></a>-->
					    </li>
					    <li class="collection-item avatar grays">
		   			      <i class="mdi-device-signal-cellular-0-bar circle blue" style="margin-left:20%"></i>
					      <span class="title" style="margin-left:25%">Estado Señal</span>
					      <p style="margin-left:25%">19:22</p>
					      <!--Lado derecho en color
					      <a href="#!" class="secondary-content"><i class="mdi-action-grade"></i></a>-->
					    </li>
					    <li class="collection-item avatar grays">
		   			      <i class="mdi-device-access-alarms circle blue" style="margin-left:20%"></i>
					      <span class="title" style="margin-left:25%">Estado Alarma</span>
					      <p style="margin-left:25%">19:22</p>
					      <!--Lado derecho en color
					      <a href="#!" class="secondary-content"><i class="mdi-action-grade"></i></a>-->
					    </li>
					    <li class="collection-item avatar grays">
		   			      <i class="mdi-device-sd-storage circle blue" style="margin-left:20%"></i>
					      <span class="title" style="margin-left:25%">Espacio Local</span>
					      <p style="margin-left:25%">19:22</p>
					      <!--Lado derecho en color
					      <a href="#!" class="secondary-content"><i class="mdi-action-grade"></i></a>-->
					    </li>
					    <li class="collection-item avatar grays">
		   			      <i class="mdi-file-cloud-upload circle blue" style="margin-left:20%"></i>
					      <span class="title" style="margin-left:25%">Espacio Externo</span>
					      <p style="margin-left:25%">19:22</p>
					      <!--Lado derecho en color
					      <a href="#!" class="secondary-content"><i class="mdi-action-grade"></i></a>-->
					    </li>
					 </ul>
				</div>
			</div>
  		 </div><!--container-->
    </body>
  </html>