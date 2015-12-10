<?php session_start(); if($_SESSION['estatus']=='1'){ ?>
<!-- Autor: Víctor Javier Báez Morales LSCA-->
<?php
include ("config.php");
$c=new Buscador;
$c->Conectar();
$q = $_GET['q'];


  if ($q==null){
	  print 'Ingrese algun dato para buscar';
  }else	{

$c->Buscar($q);
 }
?>
<?php
/*
include("../../../Scripts/conexion.php");
	

$q = $_GET['q'];


if($q==""){
	print "cosulta";
}else{
	print "siiii";
}*/

?>

<?php
}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=("../../../index.html? var=0");
  </script>
<?php } ?>