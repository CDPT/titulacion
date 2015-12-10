<?php session_start(); if($_SESSION['estatus']=='1'){


include("../../../../Scripts/conexion.php");

 $mat=$_GET['mat'];
 $dir=$_GET['dir'];
 $periodo=$_GET['periodo'];

/*
$con_per=mysql_query("SELECT * FROM periodo_cat WHERE id_periodo='$periodo'");
               $pet=mysql_fetch_array($con_per);
               $perti=$pet['periodo'];
               $id_perio=$pet['id_periodo'];  

*/



$consulta1=mysql_query("SELECT COUNT(director) FROM formulario WHERE director='$dir' and periodo_tit='$periodo'  ");
	//$conicidencia1=mysql_num_rows($consulta1);
	$fila=mysql_fetch_array($consulta1);
		$cuenta=$fila['COUNT(director)'];


/*
$consulta2=mysql_query("SELECT cuentas.nombre,SUM(monto_saldo) FROM saldos INNER JOIN cuentas ON saldos.no_cuenta=cuentas.no_cuenta WHERE periodo='$tipoperiodo' GROUP BY cuentas.nombre ");
while($extrae2 = mysql_fetch_array($consulta2)){
	$nombre = $extrae2['nombre'];	 
	$cantidad = $extrae2 ['SUM(monto_saldo)'];
*/



	//if($conicidencia1 != 0){
		if($cuenta < 6){
		//print "eviste".$conicidencia1."coincidencias";
			  include("informacion_hora.php");
			  print $cuenta;
?>
<img src="../../../../Imagenes/alumnos/verde.png" width="32" value="1" height="32" border="0"  />
<script type="text/javascript">
	$("#observa").css("display","block");
</script>

<?

	}else{
?>
<section id="activa_informacion3">
	<img src="../../../../Imagenes/alumnos/rojo.png" name="negativo" value="1" width="32" height="32" border="0"  />
		<script type="text/javascript">
			alert("Verifique fecha y hora de click sobre el circulo rojo Porfavor");
		</script>
</section>

<script type="text/javascript">
	$("#observa").css("display","none");
</script>

<? print $cuenta;
	}

?>


<?php
}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=("../../../index.html? var=0");
  </script>
<?php } ?>

