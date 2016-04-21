<?php
include "conexion.php";


$especialidad = $_POST['especialidad'];

$sql="SELECT users.id, users.nombre, users.apellido from users INNER JOIN especialidad_user ON users.id = especialidad_user.user_id 
/**/				      INNER JOIN especialidad ON especialidad.id = especialidad_user.especialidad_id
/**/					  WHERE especialidad.id = $especialidad";

$result = pg_query($sql);
$datos = array();

while ($row = pg_fetch_array($result))
{
	$datos[] = array(
		'id'		=> $row['id'],
		'nombre'		=> $row['nombre'],
		'apellido'		=> $row['apellido']
		); 
}

//echo json_encode($datos);
print json_encode($datos);
?>