<?php
include "conexion.php";


$id = $_POST['id'];

$sql="SELECT * from especialidad WHERE id = $id";

$result = pg_query($sql);
$datos = array();

while ($row = pg_fetch_array($result))
{
	$datos[] = array(
		'id'		=> $row['id'],
		'nombre'		=> $row['nombre']
		); 
}

//echo json_encode($datos);
print json_encode($datos);
?>