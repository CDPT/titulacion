<?php
include ("config.php");
$c=new Buscador;
$c->Conectar();
$q = $_GET['q'];
  if ($q==null){
	  print 'Ingrese su Usuario';
  }else	{
$c->Buscar($q);
 }
?>
