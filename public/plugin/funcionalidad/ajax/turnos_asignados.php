<?php
include "conexion.php";


$id = $_POST['id'];

$sql="SELECT * from turno INNER JOIN periodo_turno ON turno.id_periodo = periodo_turno.id WHERE turno.id_periodo = $id";

$result = pg_query($sql);
$datos = array();

while ($row = pg_fetch_array($result))
{
	$datos[] = array(
		'id'		=> $row['id'],
		'id_periodo'		=> $row['id_periodo'],
		'estado'		=> $row['estado'],
		'ruta'			=> $row['ruta'],
		'periodo'			=> $row['periodo'],
		'ano'				=> $row['ano']
		); 
}

echo json_encode($datos);

?>