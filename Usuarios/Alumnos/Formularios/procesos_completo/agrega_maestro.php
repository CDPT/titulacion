<?php session_start(); if($_SESSION['estatus']=='1'){ ?>

<?php
include("../../../../Scripts/conexion.php");

$matricula=$_POST['matricula'];
$nopersonal=$_POST['nopersonal'];
$nombre=strtoupper($_POST['nombre']);
$apepat=strtoupper($_POST['apepat']);
$apemat=strtoupper($_POST['apemat']);


$consulta_concidencia=mysql_query("SELECT no_personal FROM cat_profesor WHERE no_personal='$nopersonal' ") or die("no se pudo");
$compara=mysql_num_rows($consulta_concidencia);


/*consulta el numero maximo de la columna no_personal */
$consulta=mysql_query("select max(no_personal) as no_personal from cat_profesor");
$linea=mysql_fetch_array($consulta);
$proximo_num_maestro=$linea["no_personal"]+1;
?>

<form method="post" id="formenvia" name="formenvia" action="../formulario_completo.php">
	<input type="hidden" id="matricula" name="matricula" value="<?php print $matricula;?>"/>
</form>

<?php
if($nopersonal==""){
 	//print ("esta vacio y sele asignara: ".$proximo_num_maestro."Despues tendra que atualizarlo Correctamente" );
?>
<script type="text/javascript">
	var num="<?php print $proximo_num_maestro; ?>";
	alert("Se le asignara un numero de personal: "+num+" Temporalmente y Posteriormente tendra que corregilo" );
</script>

<?php

$inserta=("INSERT INTO cat_profesor(
no_personal ,
apellido_paterno ,
apellido_materno ,
nombre
)
VALUES ('$proximo_num_maestro', '$apepat', '$apemat', '$nombre')");

}else{
	if($compara != 0 ){
	?>
	<script type="text/javascript">
		var num="<?php print $proximo_num_maestro; ?>";
		alert("Esta duplicando un maestro ya existente vuelva a verificar Por Favor" );
		//document.location.href=("../formulario_completo.php? matricula=<?php print $matricula ?>");
		document.formenvia.submit();
	</script>

	<?php	 
	}else{
		$inserta=(" INSERT INTO cat_profesor(
			no_personal ,
			apellido_paterno ,
			apellido_materno ,
			nombre
			)
			VALUES ('$nopersonal', '$apepat', '$apemat', '$nombre')");
	}
}

$hace_insercion=mysql_query($inserta)or die("No se pudo");

?>

<script type="text/javascript">
	alert("Se ha Guardado Satisfactoriamente !");
	//document.location.href=("../formulario_completo.php? matricula=<?php print $matricula ?>");		
	document.formenvia.submit();
</script>


<?php
}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=("../../../index.html? var=0");
  </script>
<?php } ?>