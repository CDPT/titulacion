<?php 	session_start();
 if($_SESSION['estatus']=='1'){
include("../../Scripts/conexion.php");
/*
$nopersonal=$_REQUEST['nopersonal'];
$nombre=strtoupper($_POST['nombre']);
$apepat=strtoupper($_POST['apepat']);
$apemat=strtoupper($_POST['apemat']);
$correo=$_POST['correo'];
$telefono=$_POST['telefono'];
*/

$nope=filter_var($_REQUEST['nopersonal'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
$nom=filter_var($_POST['nombre'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
$apep=filter_var($_POST['apepat'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
$apem=filter_var($_POST['apemat'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
$corr=filter_var($_POST['correo'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
$tel=filter_var($_POST['telefono'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);

$nopersonal=$nope;
$nombre=strtoupper($nom);
$apepat=strtoupper($apep);
$apemat=strtoupper($apem);
$correo=$corr;
$telefono=$tel;

$consulta_concidencia=mysql_query("SELECT no_personal FROM profesor WHERE no_personal='$nopersonal' ");
$compara=mysql_num_rows($consulta_concidencia);

/*consulta el numero maximo de la columna no_personal */
$consulta=mysql_query("SELECT max(no_personal) as no_personal FROM profesor");
$linea=mysql_fetch_array($consulta);
$proximo_num_maestro=$linea["no_personal"]+1;

if($nopersonal==""){
 	//print ("esta vacio y sele asignara: ".$proximo_num_maestro."Despues tendra que atualizarlo Correctamente" );
?>
<script type="text/javascript">
	var num="<?php print $proximo_num_maestro; ?>";
	alert("Se le asignara un numero de personal: "+num+" Temporalmente Posteriormente tendra que corregilo" );
</script>

<?php
$inserta=("INSERT INTO profesor(
no_personal,
apellido_paterno,
apellido_materno,
nombre,
email,
telefono
)
VALUES ('$proximo_num_maestro', '$apepat', '$apemat', '$nombre', '$correo', '$telefono' )");

}else{
	if($compara !='0'){
	?>
	<script type="text/javascript">
		var num="<?php print $proximo_num_maestro; ?>";
		alert("Esta duplicando un maestro ya existente vuelva a verificar Por Favor" );
		document.location.href=("Listado_maestros.php/index.php");
	</script>

	<?php	 
	}else{

		$inserta=("INSERT INTO profesor(
			no_personal,
			apellido_paterno,
			apellido_materno,
			nombre,
			email,
			telefono
			)
			VALUES ('$nopersonal', '$apepat', '$apemat', '$nombre', '$correo', '$telefono' )");
	}
}

$hace_insercion=mysql_query($inserta); ?>
<script type="text/javascript">
	alert("Se guardo Correctamente");
	document.location.href=('Listado_maestros/index.php');

</script>

<!--
<script type="text/javascript">
	alert("Se ha Guardado Satisfactoriamente !");
	document.location.href=("../formulario_completo.php? matricula=<?php print $matricula ?>");
</script>
-->

<?php
}else{
	session_destroy();
?>
	<script type="text/javascript">
		document.location.href=("../../index.html? var=0");
	</script>
<?php }  ?>