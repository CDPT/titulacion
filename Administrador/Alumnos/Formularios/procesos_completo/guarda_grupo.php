<?php session_start(); if($_SESSION['estatus']=='1'){ 
include("../../../../Scripts/conexion.php");
$nombre=$_POST['nombre'];
//$titular=$_POST['titular'];
$capacidad=$_POST['capacidad'];
 $matricula=$_POST['matricula'];

$periodo_inicio=$_POST['periodo_inicio'];
$periodo_fin=$_POST['periodo_fin'];
?>
<form method="post" id="formenvia" name="formenvia" action="../formulario_completo.php">
	<input type="hidden" name="matricula" id="matricula" value="<?php print $matricula; ?>" />
</form>

<?php
//$Fecha = "07/09/2007";
$arrFE1 = explode("/",$periodo_inicio);
//$dia = $arrFE1[2];
$mes1 = $arrFE1[1];
switch ($mes1) {
	case 1:
		$mes1="Enero";
		break;
	case 2:
		$mes1="Febrero";
		break;
	case 3:
		$mes1="Marzo";
		break;
	case 4:
		$mes1="Abril";
		break;
	case 5:
		$mes1="Mayo";
		break;
	case 6:
		$mes1="Junio";
		break;

	case 7:
		$mes1="Julio";
		break;

	case 8:
		$mes1="Agosto";
		break;		

	case 9:
		$mes1="Septiembre";
		break;

	case 10:
		$mes1="Octubre";
		break;		

	case 11:
		$mes1="Noviembre";
		break;		

	case 12:
		$mes1="Diciembre";
		break;	

	default:
		$mes1="Existe una falla1";
		break;
}
$ano1 = $arrFE1[0];
/*y por ultimo concatenas*/
//print $NombreFecha = $dia." de ".$mes." del ".$ano;




$arrFE2 = explode("/",$periodo_fin);
$mes2 = $arrFE2[1];
switch ($mes2) {
	case 1:
		$mes2="Enero";
		break;
	case 2:
		$mes2="Febrero";
		break;
	case 3:
		$mes2="Marzo";
		break;
	case 4:
		$mes2="Abril";
		break;
	case 5:
		$mes2="Mayo";
		break;
	case 6:
		$mes2="Junio";
		break;

	case 7:
		$mes2="Julio";
		break;

	case 8:
		$mes2="Agosto";
		break;		

	case 9:
		$mes2="Septiembre";
		break;

	case 10:
		$mes2="Octubre";
		break;		

	case 11:
		$mes2="Noviembre";
		break;		

	case 12:
		$mes2="Diciembre";
		break;	

	default:
		$mes2="Existe una falla2";
		break;
}
$ano2 = $arrFE2[0];






$periodo=$mes1." ".$ano1."-".$mes2." ".$ano2;




$guardar=mysql_query("INSERT INTO grupos (nombre_grupo,capacidad,total,periodo,estado) VALUES('$nombre','$capacidad','0','$periodo','1') ")or die("no se pudo realizar la consulta");

if($guardar){
?>		
<script type="text/javascript">
	alert("Se Guardo Correctamente");
	//document.location.href=("../formulario_completo.php? matricula=<?php print $matricula ?>");
	document.formenvia.submit();
</script>
<?php
}
?>


<?php
}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=("../../../index.html");
  </script>
<?php } ?>