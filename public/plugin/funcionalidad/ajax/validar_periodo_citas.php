<?php
include "conexion.php";


$ano = $_POST['ano'];
$periodo = $_POST['periodo'];
////$sql="SELECT cod_periodo from peridoemple where pagado = '0' and ano = '$ano' and periodo = '$periodo';";
$sql="SELECT id from periodo_cita where ano = '$ano' and periodo = '$periodo';";

$result = pg_query($sql);
$datos = array();

while ($row = pg_fetch_array($result))
{
	$aux =$row['id'];

}

if(empty($aux)){
	echo "ok";
}else{
	echo "error";
}

?>