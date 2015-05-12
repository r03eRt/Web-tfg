<?php 
$first_name = 'asdadsdsasad'; 
$last_name= 'aasdads asddsaasd'; 
$email = 'holka'; 
$msg='mensajdeadsdsasdaasddsaasddsd asdd'; 
$header = 'From: ' . $mail; 
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n"; 
$header .= "Mime-Version: 1.0 \r\n"; 
$header .= "Content-Type: text/plain"; 

$mensaje = "Este mensaje fue enviado por " . $first_name ." ".$last_name. " \r\n"; 
$mensaje .= "Su e-mail es: " . $email . " \r\n"; 
$mensaje .= "El mensaje es: ".$msg;
$mensaje .= "Enviado el " . date('d/m/Y', time()); 

$para = 'morgadoluengo@gmail.com'; 
$asunto = 'el usuario: '.$first_name.'quiere contactar contigo'; 

mail($para, $asunto, utf8_decode($mensaje), $header); 

echo 'mensaje enviado correctamente'; 

?> 