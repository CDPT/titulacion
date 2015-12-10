<?php session_start(); if($_SESSION['estatus']=='1'){ 

include("../../../../Scripts/conexion.php");
$id=$_GET['id'];

$consulta_cuota_tabla=mysql_query("SELECT * FROM grupos_cat WHERE nombre_grupo='$id' ");


         $filacuota=mysql_fetch_array($consulta_cuota_tabla);
         	$monto_cuota=$filacuota['total'];
         	$capacidad=$filacuota['capacidad'];

  		$disponibles=$capacidad-$monto_cuota;

  		print $disponibles;
?>



<?php
}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=("../../../index.html? var=0");
  </script>
<?php } ?>