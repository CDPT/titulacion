<?php 	session_start();
 if($_SESSION['estatus']=='1'){
include("../../../Scripts/conexion.php");
 $id=$_POST['id'];

$tel=$_POST['telefono'];
$mail=$_POST['mail'];
$ap=$_POST['apemat'];
$am=$_POST['apepat'];
$nombre=$_POST['nombre'];
$no=$_POST['no'];

if ($id==$no) {
	$co=0;
}else{	
$se=mysql_query("SELECT no_personal,nombre,apellido_paterno,apellido_materno FROM profesor WHERE no_personal='$no'")or die("no se puede");

$co=mysql_num_rows($se);
}
if ($co<1) {
	
$editar=mysql_query("UPDATE profesor SET no_personal='$no',nombre='$nombre',apellido_paterno='$ap',apellido_materno='$am',email='$mail',telefono='$tel' WHERE no_personal='$id'")or die("no se pudo realizar la consulta");

if($editar){
?>		
<script type="text/javascript">
	alert("Se edito Correctamente");
	document.location.href=("index.php");
</script>
<?php } 

}else{
$s=mysql_fetch_array($se);
	$nom=$s['nombre'];
	$ap=$s['apellido_paterno'];
	$am=$s['apellido_materno'];
	?>
<form id="envia" method="post" name="envia" action="formato_edita.php">
	<input type="hidden" name="id_per" value="<?php print $id; ?>">
</form>

<script type="text/javascript">
	alert("Ya Existe un Mestro con este Numero de Personal es:<?php print $nom.' '.$ap.' '.$am; ?> Verificar bien Por Favor ");
	document.envia.submit();
</script>


<?php }


}else{
	session_destroy();
?>

	<script type="text/javascript">
		document.location.href=("../../index.html");
		
	</script>
<?php }  ?>