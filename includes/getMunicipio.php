
<?php
	require ('../conexion.php');
	$con=conectar();
	$id_estado = $_POST['id_estado'];
	
	$queryM = "SELECT id_municipio, municipio FROM municipios WHERE id_estado = '$id_estado'";
	$resultadoM =pg_query($con,$queryM);
	
	$html= "<option value='0'>Seleccionar Municipio</option>";
	
	while($rowM = pg_fetch_assoc($resultadoM))
	{
		$html.= "<option value='".$rowM['id_municipio']."'>".$rowM['municipio']."</option>";
	}
	
	echo $html;
?>

