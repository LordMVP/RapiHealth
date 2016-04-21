<?php
include "conexion.php";
$ano = $_POST['ano'];
$periodo = $_POST['periodo'];
$sql="SELECT cod_periodo from periodo where estado = 'Activo' and ano = '$ano' and periodo = '$periodo';";
$result = pg_query ($cnx, $sql ) or die("Error en la consulta SQL");
while ($row = pg_fetch_array($result))
  {
        $aux =$row['cod_periodo'];
       
  }
  if(empty($aux)){
  	 echo "ok";
  }else{
  	echo "error";
  }


 ?>