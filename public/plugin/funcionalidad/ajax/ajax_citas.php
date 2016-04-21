<?php 
include "conexion.php";

if($_GET['action'] == 'listar')
{
	
	
	$sql = "SELECT * from cita";	

	$sql1 = "SELECT * from periodo_cita";

	// Vericamos si hay algun filtro
	//$sql .= ($vnom != '')      ? " where nombre LIKE '%$vnom%'" : "";
	//$sql .= ($vape != '')      ? " where apellido LIKE '%$vape%'" : "";
	$periodo=$_POST['periodo'];

	$fecha_cita=$_POST['fecha_cita'];

	$fecha = date("Y/m/d",strtotime($fecha_cita));

	$sql .= ($periodo != '')      ? " where id_periodo = '$periodo'" : "";

	$sql1 .= ($periodo != '')      ? " where id = '$periodo'" : "";
	// Vericamos si hay algun filtro

	// Ordenar por
	$vorder = $_POST['orderby'];
	$sql .= " ORDER BY fecha, hora";
	/*if($vorder != ''){
		$sql .= " ORDER BY ".$vorder;
	}else if($vorder == ''){
		$sql .= " ORDER BY cedula asc";		
	}*/
	
	//$consulta = "SELECT * FROM propietario";

	////$sql = "SELECT * FROM peridoemple";	
	$result = pg_query($sql);
	$datos = array();
	
	while ($row = pg_fetch_array($result)){ 

		$datos[] = array(
			'id'          => $row['id'],
			'id_periodo'      => $row['id_periodo'],
			'cedula_medico'       => $row['cedula_medico'],
			'cedula_paciente'          => $row['cedula_paciente'],
			'fecha'      => $row['fecha'],
			'hora'      => $row['hora'],
			'estado'       => $row['estado']		
			);
	}

	$result1 = pg_query($sql1);
	$datos1 = array();
	while ($row = pg_fetch_array($result1)){ 

		$datos1[] = array(
			'id'      		=>	$row['id'],
			'ano'      		=>	$row['ano'],
			'periodo'       =>	$row['periodo'],
			'dias'       	=>	$row['dias'],
			'fechas'      	=>	$row['fechas'],
			'aux_fecha'		=>	'Hola'		
			);
	}
	// convertimos el array de datos a formato json
	//echo json_encode($datos, $datos1);

	echo json_encode(array_merge($datos1, $datos));

	//echo mysql_error();
}

?>