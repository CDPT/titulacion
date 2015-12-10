<?php session_start(); if($_SESSION['estatus']=='1'){ 
include("../../../Scripts/conexion.php");


		$RegistrosAMostrar=30;

		if(isset($_GET['pag'])){
			$RegistrosAEmpezar=($_GET['pag']-1)*$RegistrosAMostrar;
			$PagAct=$_GET['pag'];

		}else{
			$RegistrosAEmpezar=0;
			$PagAct=1;
			
		}



if(isset($_REQUEST['bus'])){
		
	$bus=$_REQUEST['busca'];

	$consul="SELECT * FROM profesor WHERE nombre LIKE '%$bus%' ORDER BY nombre ";
}else{
	$consul="SELECT * FROM profesor ORDER BY nombre LIMIT $RegistrosAEmpezar, $RegistrosAMostrar ";	
}



$resul=mysql_query($consul)or die ("no se pudo realizar la consulta");
$numregistro=mysql_num_rows($resul);

echo "REGISTROS TOTALES ENCONTRADOS: " .$numregistro;
if ($numregistro == 0) {
?>
		<section id="mensajebusca">
			<img src="../../../Imagenes/alerta.png"/>
			   "No Se Encontro Ningun Resultado<br>
				   Intentelo de Nuevo"
		</section>
<?php
}else{

?>

<table>

  <tr class="titulo_tabla">
       <td class="titbuscar">NO_PERSONAL</td>
       <td class="titbuscar">NOMBRE</td>
       <td class="titbuscar">APELLIDO PATERNO</td>
       <td class="titbuscar">APELLIDO MATERNO</td>
       <td class="titbuscar">E-MAIL</td>
       <td class="titbuscar">TELÉFONO</td>
    </tr> 
  

   
<?php
	while ($filaconsulta=mysql_fetch_array($resul)){
	$no_personal=$filaconsulta['no_personal'];
	$nombre=$filaconsulta['nombre'];
	$apepat=$filaconsulta['apellido_paterno'];
	$apemat=$filaconsulta['apellido_materno'];
	$correo=$filaconsulta['email'];
	$telefono=$filaconsulta['telefono'];

?>
<tbody  align="center" class="cont_tabla">
    <tr>
      <td class="textfiltab"><?php echo $no_personal ;?></td>
      <td class="textfiltab"><?php echo $nombre ; ?></td>
      <td class="textfiltab"><?php echo $apepat; ?></td>
      <td class="textfiltab"><?php echo $apemat ;?></td>
      <td class="textfiltab"><?php echo $correo ;?></td>
      <td class="textfiltab"><?php echo $telefono ;?></td>
    </tr>
  </tbody>
  	    <?php  }  ?>


</table>
<?php
$NroRegistros=mysql_num_rows(mysql_query("SELECT * FROM profesor"));
$PagAnt=$PagAct-1;
$PagSig=$PagAct+1;
$PagUlt=$NroRegistros/$RegistrosAMostrar;

$Res=$NroRegistros%$RegistrosAMostrar;

if($Res>0) $PagUlt=floor($PagUlt)+1;
/*
echo "<a onclick=\"Pagina('1')\">Primero</a> ";
if($PagAct>1) echo "<a onclick=\"Pagina('$PagAnt')\">Anterior</a> ";
echo "<strong>Pagina ".$PagAct."/".$PagUlt."</strong>";
if($PagAct<$PagUlt)  echo " <a onclick=\"Pagina('$PagSig')\">Siguiente</a> ";
echo "<a onclick=\"Pagina('$PagUlt')\">Ultimo</a>";
*/
?>
<section id="barra_pagina">

<a class="pag" id="primero" onclick="Pagina(<?php print '1' ?>)">Primero</a>

<?php
if($PagAct>1){?>
<a class="pag" id="anterior" onclick="Pagina(<?php print $PagAnt; ?>)">
	<!--Anterior--><input src="../../../Imagenes/anterior.png" type="image"/>
</a>
<?php } ?>



<strong id="paginas" class="pag">Pagina <?php print $PagAct."/".$PagUlt ?></strong>



<?php if($PagAct<$PagUlt){ ?>
<a id="siguiente" class="pag" onclick="Pagina(<?php print $PagSig ?>)">
	<!--Siguiente--> <input src="../../../Imagenes/siguiente.png" type="image"/>
</a>
<?php } ?>

<a id="ultimo" class="pag" onclick="Pagina(<?php print $PagUlt; ?>)">Ultimo</a>

</section>

<?php
    }
		mysql_free_result($resul);
		mysql_close(); 
?>


<?php
}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=("../../../index.html? var=0");
  </script>
<?php } ?>