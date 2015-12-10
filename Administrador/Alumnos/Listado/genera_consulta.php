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

$consul="SELECT * FROM alumno INNER JOIN formulario ON alumno.matricula=formulario.matricula WHERE formulario.matricula like '%$bus%' AND tipo='CAT'";
}else{
$consul="SELECT * FROM alumno INNER JOIN formulario ON alumno.matricula=formulario.matricula where tipo='CAT' ORDER BY -fecha_creacion LIMIT $RegistrosAEmpezar, $RegistrosAMostrar";

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
       <td class="titbuscar">Expediente</td>
       <td class="titbuscar">Formatos</td>
       <td class="titbuscar">Estado</td>
    </tr> 

<?php
  //mysqul_fectch_array me permite obtener los registros de el resultado de las consulta, y a travez de filaconsulta se puede acceder a los elementos de la tabla 
  while ($filaconsulta=mysql_fetch_array($resul)){
  $matricula=$filaconsulta['matricula'];
  $nombre=$filaconsulta['nombre'];
  $apepat=$filaconsulta['apepat'];
  $apemat=$filaconsulta['apemat'];
  $carrera=$filaconsulta['carrera'];


?>
<script language="javascript" src="../../../Scripts/jquery-1.7.1.min.js"></script>
  <tbody class="cont_tabla">
    <tr>
      <td  class="textfiltab"><?php echo $matricula; ?></td>
      <td  class="textfiltab"><?php echo $nombre; ?></td>
      <td  class="textfiltab"><?php echo $apepat; ?></td>
      <td  class="textfiltab"><?php echo $apemat; ?></td>
      <td  class="textfiltab"><?php echo $carrera; ?></td>

    <td  class="textfiltab">
      <form method="post" action="../panel_alumno.php">
        <input type="hidden" value="<?php print $matricula; ?>" name="matricula">
        <input type="hidden" value="<?php print $nombre; ?>" name="nombre">
        <input type="hidden" value="<?php print $apepat; ?>" name="apepat">
        <input type="hidden" value="<?php print $apemat; ?>" name="apemat">
        <input type="hidden" value="<?php print $carrera; ?>" name="carrera">

       <!-- <a  href="../panel_alumno.php? matricula=<?php echo $matricula;?> & nombre=<?php echo $nombre; ?> & apepat=<?php echo $apepat; ?> & apemat=<?php echo $apemat; ?> & carrera=<?php echo $carrera; ?>" >  -->
          <input type="image" src="../../../Imagenes/alumnos/expediente.png" width="32" height="32" border="0" align="absbottom" />
      <!--  </a>-->
        </form>
    </td>

      <td class="celdaform">


        <form method="post" action="../Formatos/index.php">
        <input type="hidden" value="<?php print $matricula; ?>" name="matricula">
     <!-- <a  href="../panel_alumno.php? matricula=<?php echo $matricula;?> & nombre=<?php echo $nombre; ?> & apepat=<?php echo $apepat; ?> & apemat=<?php echo $apemat; ?> & carrera=<?php echo $carrera; ?>" >  -->
          <input type="image" src="../../../Imagenes/alumnos/archivo-de-libro.png" width="32" height="32" border="0" align="absbottom" />
      <!--  </a>-->
        </form>
  </td>

<!--
        <td  class="textfiltab">
        <section id="container"> 
          <a  href="elimina_alumlista.php? matricula=<?php echo $matricula;?> & nombre=<?php echo $nombre;?> & apepat=<?php echo $apepat;?> & apemat=<?php echo $apemat;?> & carrera=<?php echo $carrera; ?>  ;" class="ask-custom">
            <img src="../../Imagenes/alumnos/trash.png" border="0" align="absbottom" />
          </a>
      </section>
      </td>  -->

    <td  class="textfiltab">
<?php
/*
  $consulta_matricula="SELECT * FROM formulario WHERE matricula='$matricula'";
  $compara_matricula=mysql_query($consulta_matricula) or die ("no se pudo");
  $cons=mysql_num_rows($compara_matricula);
  while($filaformul=mysql_fetch_array($compara_matricula)){
    $monto=$filaformul['montotot'];
  }

*/


  $consulta_matricula=mysql_query("SELECT * FROM formulario_cat WHERE matricula='$matricula'")or die ("no se puedo");
while($filaformul=mysql_fetch_array($consulta_matricula)){
    $monto=$filaformul['montotot'];
  }
$sinodal=400;
//print $monto;

if ($monto != 0) {


                $consulta78=mysql_query("SELECT * FROM pagos WHERE matricula='$matricula'") or die("No se puede ejecutar consulta");
                            $total=0;
                            while($fila78= mysql_fetch_array($consulta78)){
                                 $importe=$fila78['monto_pago'];
                                 $total=$total+$importe;
                                }
                                //print "total".$total;
                                $tot=$monto+$sinodal;
                                $deve=$tot-$total;
                                 
                        !@$avance= $total * 100 / $monto;
                         
                        //DE AQUI SON PRUEBAS


                        if($deve==0){ ?>

                          <section id="result_deudor">
                        <img src="../../../Imagenes/alumnos/azul.png" /><br>
                        <h6>Pagado al 100%</h6>
                      </section>
                        <?php }
                        else{
                            if($deve==400){ ?>
                                <section id="result_deudor">
                                  <img src="../../../Imagenes/alumnos/verde.png" /><br>
                                  <h6>Debe pago de sinodales</h6>
                                </section>
                          <?php }else{
                                if($deve>400){ ?>
                                    <section id="result_deudor">
                                      <img src="../../../Imagenes/alumnos/rojo.png" /><br>
                                      <h6>Debe pagos</h6>
                                    </section>
                                <?php }
                              }
                        }                   
}else{
?>              
  <img src="../../../Imagenes/alumnos/alerta.png" /><br>
  <h6>No tiene cuota</h6>
  <?php
}
 ?>          
    </td>


<?php } ?>
    </tr>
      </tbody>
</table>
<?php
$NroRegistros=mysql_num_rows(mysql_query("SELECT * FROM alumno INNER JOIN formulario ON alumno.matricula=formulario.matricula where tipo='CAT'"));
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
  $consu_tipo=mysql_query("SELECT * FROM formulario WHERE matricula='$var'") or die ("no se pued econsultar el tipo");
  $filatipo=mysql_fetch_array($consu_tipo);
  $tipo=$filatipo['tipo'];
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
               <?php
                if($tipo=='CAT'){
               ?>
               <th class="titbuscar">Eliminar</th>
               <th class="titbuscar">Expediente</th>
               <?php
                }
               ?>
           </tr>  
      </thead>


    <?php
$con="SELECT * FROM alumno WHERE matricula='$var'";
$nu=mysql_query($con);

$ss="SELECT * FROM formulario WHERE matricula='$var' ";
$nus=mysql_query($ss);
$ns=mysql_num_rows($nus);
echo "REGISTROS TOTALES ENCONTRADOS: " .$ns;

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
      
      <?php
                if($tipo=='CAT'){
               ?>
      <td class="celdaform">
     <section id="container"> 

      <form id="formeliminaalum" name="formeliminaalum" method="post" action="elimina_alumlista.php">
        <input type="hidden" name="matricula" value="<?php echo $matricula;?>"> 
      </form>
      <input type="image" src="../../../Imagenes/alumnos/trash.png" title="eliminar"  align="absbottom" onclick="elimina();">
    </section></td>  

<script type="text/javascript">
function elimina(){ 
  if (confirm("¿Desea Eliminar solo del Sistema CAT?")) {
   document.formeliminaalum.submit();
 }
} 
</script>
         
               
  <td class="celdaform">
    <form method="post" action="../panel_alumno.php">
        <input type="hidden" value="<?php print $matricula; ?>" name="matricula">
        <input type="hidden" value="<?php print $nombre; ?>" name="nombre">
        <input type="hidden" value="<?php print $apepat; ?>" name="apepat">
        <input type="hidden" value="<?php print $apemat; ?>" name="apemat">
        <input type="hidden" value="<?php print $carrera; ?>" name="carrera">
     <input type="image" src="../../../Imagenes/alumnos/expediente.png" width="32" height="32" border="0" align="absbottom" />
    </form>
  </td> 
  <?php } else{ ?>
                  <th class="celdaform">Alumno Inscrito En<br>Experiencia Recepcional</th>
                <?php }?>    
 </tr>

</table>
<?php
  mysql_close();
}
/*
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