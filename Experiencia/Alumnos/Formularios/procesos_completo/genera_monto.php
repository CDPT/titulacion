<?php session_start(); if($_SESSION['estatus']=='1'){ ?>
  <link href="../../../../Estilos/estilo_global.css" rel="stylesheet" type="text/css"/>
  <link href="../../../Estilos/estilo_alumno.css" rel="stylesheet" type="text/css"/>
<?php
include("../../../../Scripts/conexion.php");
$id=$_GET['id'];

$consulta_cuota_tabla=mysql_query("SELECT monto FROM cuotas WHERE id_cuota='$id' ");


         $filacuota=mysql_fetch_array($consulta_cuota_tabla);
         	$monto_cuota=$filacuota['monto'];
    ?>

<input class="textform" id="montotot" name="montotot" value="<?php print $monto_cuota; ?>" readonly />



<?php
/*
	if($id=="1"){
?>
<input class="textform" id="montotot" name="montotot" value="2200" readonly />
<?php		
	}
	if($id=="2"){
?>
<input class="textform" id="montotot" name="montotot" value="1100" readonly />
<?php
}
if($id=="3"){
?>
<input class="textform" id="montotot" name="montotot" value="600" readonly />
<?php } */  ?>



<?php
}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=("../../../index.html? var=0");
  </script>
<?php } ?>