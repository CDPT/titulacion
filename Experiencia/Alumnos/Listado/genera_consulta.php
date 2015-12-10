<?php session_start(); if($_SESSION['estatus']=='1'){ ?>
<?php
  include("../../../Scripts/conexion.php");


      $RegistrosAMostrar=10;
      if(isset($_GET['pag'])){
        $RegistrosAEmpezar=($_GET['pag']-1)*$RegistrosAMostrar;
        $PagAct=$_GET['pag'];

      }else{
        $RegistrosAEmpezar=0;
        $PagAct=1;
      }


if(isset($_REQUEST['bus'])){

$bus=$_REQUEST['busqueda'];

$consul="SELECT * FROM alumno INNER JOIN formulario ON alumno.matricula=formulario.matricula WHERE formulario.matricula like '%$bus%'";
}else{
$consul="SELECT * FROM alumno INNER JOIN formulario ON alumno.matricula=formulario.matricula ORDER BY -fecha_creacion  LIMIT $RegistrosAEmpezar, $RegistrosAMostrar";
}
$resul=mysql_query($consul) or die ("no se pudo realizar la consulta1");

$numregistro=mysql_num_rows($resul);

!@$var=$_REQUEST['id'];
if(!@$var){
echo "REGISTROS ENCONTRADOS: " .$numregistro;

if($numregistro==0){
?>
    <section id="mensajebusca">
      <img src="../../../Imagenes/alerta.png"/>
         "No Se Encontro Ningun Resultado<br>
           Intentelo de Nuevo"
    </section>
<?php
}else{
?>

<table border="0" class="tablesorter" id="tablesorter-demo">

  <tr class="titulo_tabla">
       <td class="titbuscar">MATRICULA</td>
       <td class="titbuscar">NOMBRE</td>
       <td class="titbuscar">APELLIDO PATERNO</td>
       <td class="titbuscar">APELLIDO MATERNO</td>
       <td class="titbuscar">CARRERA</td>
       <td class="titbuscar">TIPO</td>
       <td class="titbuscar">Expediente</td>
       <td class="titbuscar">Formatos</td>
       <td class="titbuscar"></td>
      <!-- <td class="titbuscar">Eliminar</td>
       <td class="titbuscar">Estado</td>-->
    </tr> 

<?php
  //mysqul_fectch_array me permite obtener los registros de el resultado de las consulta, y a travez de filaconsulta se puede acceder a los elementos de la tabla 
  while ($filaconsulta=mysql_fetch_array($resul)){
  $matricula=$filaconsulta['matricula'];
  $nombre=$filaconsulta['nombre'];
  $apepat=$filaconsulta['apepat'];
  $apemat=$filaconsulta['apemat'];
  $carrera=$filaconsulta['carrera'];
  $tipo=$filaconsulta['tipo'];


?>
  <tbody class="cont_tabla">
    <tr>
      <td  class="textfiltab"><?php echo $matricula ;?></td>
      <td  class="textfiltab"><?php echo $nombre ; ?></td>
      <td  class="textfiltab"><?php echo $apepat; ?></td>
      <td  class="textfiltab"><?php echo $apemat ;?></td>
      <td  class="textfiltab"><?php echo $carrera ;?></td>
      <td  class="textfiltab"><?php echo $tipo ;?></td>

    <td  class="textfiltab">
        <a  href="../Formularios/formulario_completo.php? matricula=<?php echo $matricula;?> & nombre=<?php echo $nombre; ?> & apepat=<?php echo $apepat; ?> & apemat=<?php echo $apemat; ?> & carrera=<?php echo $carrera; ?> ;" ><!--  -->
          <img src="../../../Imagenes/alumnos/expediente.png" width="32" height="32" border="0" align="absbottom" />
        </a>
    </td>

    <td class="celdaform">


        <form method="post" action="../Formatos/index.php">
        <input type="hidden" value="<?php print $matricula; ?>" name="matricula">
     <!-- <a  href="../panel_alumno.php? matricula=<?php echo $matricula;?> & nombre=<?php echo $nombre; ?> & apepat=<?php echo $apepat; ?> & apemat=<?php echo $apemat; ?> & carrera=<?php echo $carrera; ?>" >  -->
          <input type="image" src="../../../Imagenes/alumnos/archivo-de-libro.png" width="32" height="32" border="0" align="absbottom" />
      <!--  </a>-->
        </form>
  </td>
    <td  class="textfiltab">
  <?php 
        $consu=mysql_query("SELECT * FROM formulario_er WHERE matricula='$matricula'") or die(mysql_error());
        $fi=mysql_fetch_array($consu);
        $er2=$fi['er2'];
        $er2t=$fi['er2t'];
        $er22=$fi['er22'];
        $er22t=$fi['er22t'];
        $er3=$fi['er3'];
        $er3t=$fi['er3t'];
        $er4=$fi['er4'];
        $er4t=$fi['er4t'];
        $er41=$fi['er41'];
        $er41t=$fi['er41t'];
        $er5=$fi['er5'];
        $er5t=$fi['er5t'];

        $hoy=date("Y-m-d");
        if ($er2t=="0000-00-00" || $er22t=="0000-00-00" || $er3t=="0000-00-00" || $er4t=="0000-00-00" || $er41t=="0000-00-00" || $er5t=="0000-00-00") {
          ?>
          <img src="../../../Imagenes/error.png" title="Sin fechas establecidas">
     <?php
        }elseif (($er2=="0000-00-00" && $hoy>$er2t) || ($er22=="0000-00-00" && $hoy>$er22t) || ($er3=="0000-00-00" && $hoy>$er3t) || ($er4=="0000-00-00" && $hoy>$er4t) || ($er41=="0000-00-00" && $hoy>$er41t) || ($er5=="0000-00-00" && $hoy>$er5t)) {
      ?>
          <img src="../../../Imagenes/alerta.png" title="Se paso la fecha de entrega">
      <?php
        }
     ?>
    </td>

<?php } ?>
    </tr>
      </tbody>
</table>
<?php
$NroRegistros=mysql_num_rows(mysql_query("SELECT * FROM alumno INNER JOIN formulario ON alumno.matricula=formulario.matricula"));
$PagAnt=$PagAct-1;
$PagSig=$PagAct+1;
$PagUlt=$NroRegistros/$RegistrosAMostrar;

$Res=$NroRegistros%$RegistrosAMostrar;

if($Res>0) $PagUlt=floor($PagUlt)+1;

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

<?php
if($PagAct<$PagUlt){
?>
<a id="siguiente" class="pag" onclick="Pagina(<?php print $PagSig ?>)">
  <!--Siguiente--> <input src="../../../Imagenes/siguiente.png" type="image"/>
</a>
<?php } ?>

<a id="ultimo" class="pag" onclick="Pagina(<?php print $PagUlt; ?>)">Ultimo</a>

</section>

<?php
    mysql_free_result($resul);
    mysql_close(); 
?>
<?php }
}else{
  
  ?>
  
  </p>

<table border="0" class="tablesorter" id="tablesorter-demo">
      <thead>
           <tr>
               <th class="titbuscar">MATRICULA</th>
               <th class="titbuscar">NOMBRE</th>
               <th class="titbuscar">APELLIDO PATERNO</th>
               <th class="titbuscar">APELLIDO MATERNO</th>
               <th class="titbuscar">CARRERA</th>
               <th class="titbuscar">TIPO</th>
               <th class="titbuscar">Eliminar</th>
               <th class="titbuscar">Expediente</th>
               <th class="titbuscar">Formatos</th>
           </tr>  
      </thead>


    <?php
$con="SELECT * FROM alumno WHERE matricula='$var'";
$nu=mysql_query($con);

$ss="SELECT * FROM formulario WHERE matricula='$var' ";
$nus=mysql_query($ss);
$ns=mysql_num_rows($nus);
echo "REGISTROS TOTALES ENCONTRADOS: " .$ns;
$filatipo=mysql_fetch_array($nus);
$tipo=$filatipo['tipo'];

$filaconsulta2=mysql_fetch_array($nu);//){

$matricula=$filaconsulta2['matricula'];
$nombre=$filaconsulta2['nombre'];
$apepat=$filaconsulta2['apepat'];
$apemat=$filaconsulta2['apemat'];
$carrera=$filaconsulta2['carrera'];


?>
<style>
td{
background: #6F3;/*verde*/
animation:myfirst 2s;/*amarillo*/
-moz-animation:myfirst 2s; /* Firefox */
-webkit-animation:myfirst 2s; /* Safari and Chrome */
}

@keyframes myfirst
{
from {background:#fbdc61;}
to {background: #f9fb61;}
}

@-moz-keyframes myfirst /* Firefox */
{
from { background:#fbdc61;}
to {background:#f9fb61;}
}

@-webkit-keyframes myfirst /* Safari and Chrome */
{
from {background:#fbdc61;}
to {background:#f9fb61;}
}
</style>

    <tr>
      <td class="celdaform"><?php echo $matricula ;?></td>
      <td class="celdaform"><?php echo $nombre ; ?></td>
      <td class="celdaform"><?php echo $apepat; ?></td>
      <td class="celdaform"><?php echo $apemat ;?></td>
      <td class="celdaform"><?php echo $carrera ;?></td>
      <td class="celdaform"><?php echo $tipo ;?></td>
      
      
      <td class="celdaform">
     <section id="container"> 
      <a  href="elimina_alumlista.php? matricula=<?php echo $matricula;?> & nombre=<?php echo $nombre;?> & apepat=<?php echo $apepat;?> & apemat=<?php echo $apemat;?> & carrera=<?php echo $carrera; ?> & correo=<?php echo $correo;?> ;" class="ask-custom"><!--  -->
      <img src="../../../Imagenes/alumnos/trash.png" border="0" align="absbottom" />
      </a></section></td>  
          
               
  <td class="celdaform">
        <a  href="../Formularios/formulario_completo.php? matricula=<?php echo $matricula;?> & nombre=<?php echo $nombre;?> & apepat=<?php echo $apepat;?> & apemat=<?php echo $apemat;?> & carrera=<?php echo $carrera; ?> & correo=<?php echo $correo ;?> ;" ><!--  -->
     <img src="../../../Imagenes/alumnos/expediente.png" width="32" height="32" border="0" align="absbottom" />
  </a>
  </td> 

    <td class="celdaform">
        <a  href="../Formatos/index.php? matricula=<?php echo $matricula;?>"><!--  -->
     <img src="../../../Imagenes/alumnos/expediente.png" width="32" height="32" border="0" align="absbottom" />
  </a>
  </td>    
 </tr>

</table>
<?php
  mysql_close();
}/*
mysql_free_result($resul);
mysql_free_result($numregistro);
mysql_free_result($consulta_matricula);
mysql_free_result($consulta78);
mysql_free_result($NroRegistros);
mysql_free_result($con);
mysql_free_result($ss);*/
?>





<?php
}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=("../../../index.html? var=0");
  </script>
<?php } ?>