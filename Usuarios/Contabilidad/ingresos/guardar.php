<?php session_start(); if($_SESSION['estatus']=='1'){ ?>
<!-- Autor: Angel Antonio Contreras Moctezuma LSCA-->
<?php
include("../../../Scripts/conexion.php");
$fecha=$_POST['fecha'];
$nombre=$_POST['nombre'];
//$grupo=$_POST['grupo'];
$concepto=$_POST['concepto'];
$importe=$_POST['importe'];


$consulta="INSERT INTO ingresos(fecha,nombre,concepto,importe)
VALUES
('$fecha','$nombre','$concepto','$importe')";

$con=mysql_query($consulta)or die ("no se pudo realizar la consulta");

?>

<script>


alert("se guardo correctamente registro");
document.location=("index.php");

</script>



<?php
}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=("../../../index.html? var=0");
  </script>
<?php } ?>