
<?php
	require ('../conexion.php');
	$con=conectar();	
	$id_municipio = $_POST['id_municipio'];
	
	$query = "SELECT * FROM parroquias WHERE id_municipio = '$id_municipio' ORDER BY parroquias";

	$resultado=pg_query($con,$query);   
	
	while($row = pg_fetch_assoc($resultado))
	{
		$html.= "<option value='".$row['id_parroquia']."'>".$row['parroquia']."</option>";
	}
	echo $html;
?>
