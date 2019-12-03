<?php
include '../conexion.php';
$conexion=conectar();
/*************************************************/
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

/*************************************************/
$cedula        =  $_POST['cedula'];
$nombre	       =  strtoupper($_POST['nombre']);
$apellido      =  strtoupper($_POST['apellido']);
$telefono      =  $_POST['telefono'];
$celular       =  $_POST['celular'];
$email         =  strtoupper($_POST['email']);
$estado        =  $_POST['estado'];
$municipio     =  $_POST['municipio'];
$parroquia     =  $_POST['parroquia']; 
//$eje         =  $_POST['eje']; 
//$sector      =  $_POST['sector']; 
$movimiento    =  strtoupper($_POST['movimiento']); 
$espacio       =  $_POST['espacio']; 
//$tipo_proyecto =  $_POST['tipo_proyecto'];
$electricidad  =  $_POST['luz'];
$internet      =  $_POST['internet'];
$agua 		   =  $_POST['agua'];
/*************************************************/
$sql1="SELECT * FROM asamblea WHERE cedula='$cedula'";
$query1=pg_query($conexion,$sql1);
		$d=pg_fetch_array($query1);	
			$s=$d['cedula'];
if (!$s) {
	$sql="INSERT into asamblea(cedula,nombre,apellido,telefono,celular,email,estado,municipio,parroquia,movimiento,espacio,luz,internet,agua) VALUES ('$cedula','$nombre','$apellido','$telefono','$celular','$email','$estado','$municipio','$parroquia','$movimiento','$espacio','$electricidad','$internet','$agua')";
		$query=pg_query($conexion,$sql);
			if ($query) {
				$mail = new PHPMailer(true);
				try {
									//Server settings
									$mail->SMTPDebug = 0;                                       // Enable verbose debug output
									$mail->isSMTP();                                            // Set mailer to use SMTP
									$mail->Host       = 'smtp.gmail.com';  						// Specify main and backup SMTP servers
									$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
									$mail->Username   = 'agroproductivo.gmsyt@gmail.com';       // SMTP username
									$mail->Password   = 'ja.010203';                            // SMTP password
									$mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
									$mail->Port       = 587;                                    // TCP port to connect to
									//Recipients
									$mail->setFrom('agroproductivo.gmsyt@gmail.com', 'Fundacion Gran Mision Saber y Trabajo');
									$mail->addAddress($email, $nombre);     // Add a recipient
									// Content
									$mail->isHTML(true);                                  // Set email format to HTML
									$mail->Subject = 'Registro en la Primera Asamblea de Emprendedores Completado';
									$mail->Body    = 'Felicidades su registro en la 1° Asamblea de emprendedores fue Exitoso Te esperamos" Por la  Soberania Alimentaria Juntos Podemos"';
									$mail->send();
									echo 'Mesnsaje Enviado';
								} catch (Exception $e) {
									echo " Error: {$mail->ErrorInfo}";
								}
							
/*********************************************************************************************/		
echo '  <script type="text/javascript">
			alert("Su Registro en la Primera Asamble de Emprendedores fue Completado con Exito");
			document.location.href ="../index.html";
		</script>';					
			}
}else{
	echo '  <script type="text/javascript">
     		 alert("Usted ya se encuentra en la Primera Asamblea de Emprendedores");
        	 document.location.href ="../index.html";
        </script>';	
}
/*


if ($query) {
			
								*/

?>