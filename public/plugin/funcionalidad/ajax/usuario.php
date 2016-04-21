<?php
include "conexion.php";


$id = $_POST['id'];

$sql="SELECT * from users WHERE id = $id";

$result = pg_query($sql);
$datos = array();

while ($row = pg_fetch_array($result))
{
	$datos[] = array(
		'id'		=> $row['id'],
		'nombre'		=> $row['nombre'],
		'apellido'		=> $row['apellido'],
		'direccion'		=> $row['direccion'],
		'telefono'		=> $row['telefono'],
		'email'		=> $row['email'],
		'imagen'		=> $row['imagen']
		); 
}

//echo json_encode($datos);
print json_encode($datos);
?>