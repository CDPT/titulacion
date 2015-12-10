<?php session_start(); if($_SESSION['estatus']=='1'){
include("../../../Scripts/conexion.php");
error_reporting(0);
$id_pago=$_POST['id_pago'];
$matricula=$_POST['matricula'];

$elimina=mysql_query("DELETE FROM pagos WHERE id_pago='$id_pago' ")or die(mysql_error());
?>
<script type="text/javascript">
alert("Registro eliminado");
document.location.href="index.php?matricula=<?php echo $matricula; ?>";
</script>	


<?php
}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=("../../../index.html");
  </script>
<?php } ?>