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
$sexo          =  $_POST['sexo'];
$email         =  strtoupper($_POST['email']);
$estado        =  $_POST['estado'];
$municipio     =  $_POST['municipio'];
$parroquia     =  $_POST['parroquia']; 

$profesion     =  $_POST['profesion']; 
$oficio        =  strtoupper($_POST['oficio']);

/*************************************************/
$sql1="SELECT * FROM captacion WHERE cedula='$cedula'";
$query1=pg_query($conexion,$sql1);
		$d=pg_fetch_array($query1);	
			$s=$d['cedula'];
if (!$s) {
	$sql="INSERT into captacion(cedula,nombre,apellido,telefono,email,sexo,estado,municipio,parroquia,profesion,oficio) VALUES ('$cedula','$nombre','$apellido','$telefono','$email','$sexo','$estado','$municipio','$parroquia','$profesion','$oficio')";
		$query=pg_query($conexion,$sql);
			if ($query) {
				$mail = new PHPMailer(true);
				try {
									//Server settings
									$mail->SMTPDebug = 0;                                       // Enable verbose debug output
									$mail->isSMTP();                                            // Set mailer to use SMTP
									$mail->Host       = 'smtp.gmail.com';  						// Specify main and backup SMTP servers
									$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
									$mail->Username   = 'captacion.gmsyt@gmail.com';              // SMTP username
									$mail->Password   = 'ja.010203';                            // SMTP password
									$mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
									$mail->Port       = 587;                                    // TCP port to connect to
									//Recipients
									$mail->setFrom('captacion.gmsyt@gmail.com', 'Fundacion Gran Mision Saber y Trabajo');
									$mail->addAddress($email,$nombre);     // Add a recipient
									// Content
									$mail->isHTML(true);                                  // Set email format to HTML
									$mail->Subject = 'Su Registro fue Completado';
									$mail->Body    = 'Felicidades su Registro fue Exitoso en los proximos dias sera contactado por nuestro Personal " Por Nuestra Soberania  Juntos Podemos"';
									$mail->send();
									echo 'Mesnsaje Enviado';
								} catch (Exception $e) {
									echo " Error: {$mail->ErrorInfo}";
								}
							
/*********************************************************************************************/		
echo '  <script type="text/javascript">
			alert("Su Registro  fue Completado con Exito");
			document.location.href ="../index.html";
		</script>';					
			}
}else{
	echo '  <script type="text/javascript">
     		 alert("Usted ya se encuentra Registrado ");
        	 document.location.href ="../index.html";
        </script>';	
}
/*


if ($query) {
			
								*/

?>