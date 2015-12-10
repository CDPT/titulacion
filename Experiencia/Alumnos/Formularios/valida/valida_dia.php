<?php session_start(); if($_SESSION['estatus']=='1'){ ?>
<? 
include("../../../../Scripts/conexion.php");
$f1=$_REQUEST['f1'];
$matricula=$_REQUEST['mat'];
$cbd=$_REQUEST['cbd'];

function fechanueva($f1){
    list($a,$m,$d)=explode("/",$f1);
    return $a."-".$m."-".$d;
};
$f1=fechanueva($f1);
list($a2,$m2,$d2)=explode("-",$f1);

$consulta=mysql_query("SELECT * FROM formulario_er WHERE matricula='$matricula'") or die ("No se puede");
$fila=mysql_fetch_array($consulta);
$f2=$fila["$cbd"];
list($a1,$m1,$d1)=explode("-",$f2);

$timestamp1 = mktime(0,0,0,$m1,$d1,$a1); 
$timestamp2 = mktime(4,12,0,$m2,$d2,$a2); 
$segundos_diferencia = $timestamp2 - $timestamp1; 
$dias_diferencia = $segundos_diferencia / (60 * 60 * 24); 
//$dias_diferencia = abs($dias_diferencia); 
$dias_diferencia = floor($dias_diferencia); 

echo $dias_diferencia/*." Dias"*/; 
?>
        <?php
}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=("../../../index.html? var=0");
  </script>
<?php } ?>