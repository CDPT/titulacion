<?php   
  session_start();
  error_reporting(0);
 ?>
<!DOCTYPE html>
<html>
<head>
  <script src="ajax.js" language="javascript"></script>
  <meta name="author" content="Víctor Javier Báez Morales">
  <meta charset="utf-8" lang="esp" http-equiv="Content-Type" content="text/html;">
  <meta name="keywords" lang="es" content="CAT, Centro, Apoyo, Titulación">
  <link href="../../../Estilos/estilo_global.css" rel="stylesheet" type="text/css"/>
	<link href="../../Estilos/estilo_alumno.css" rel="stylesheet" type="text/css"/>

  
  <?php $sistema="JEFE"; include('../../../Includes/ruta.php'); include('../../../Includes/title.php');  ?>
  <script type="text/javascript" src="../../../Scripts/FuncionesAjax.js"></script>
  <script type="text/javascript" src="../../../Scripts/FuncionesjQuery.js"></script>




<script language="javascript" src="../../../Scripts/jquery-1.7.1.min.js"></script>
  <script type="text/javascript" src="../../../Scripts/jquery-ui.min.js"></script>


<link rel="stylesheet" type="text/css" href="../../Estilos/jquery-ui-1.7.2.custom.css" />
  <script type="text/javascript">
jQuery(function($){
  $.datepicker.regional['es'] = {
    closeText: 'Cerrar',
    prevText: '&#x3c;Ant',
    nextText: 'Sig&#x3e;',
    currentText: 'Hoy',
    monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
    'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
    'Jul','Ago','Sep','Oct','Nov','Dic'],
    dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
    dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
    weekHeader: 'Sm',
    //dateFormat: 'dd/mm/yy',
    dateFormat: 'yy/mm/dd',
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ''};
  $.datepicker.setDefaults($.datepicker.regional['es']);
});    

$(document).ready(function(){
   $("#fecha_curso").datepicker({
    /*$("#fechaexam,#fecha_curso").datepicker({*/
    changeMonth: true 
    });
});
    </script>


   
<!-- 
<script language="javascript" src="../../jq/jquery-1.6.4.min.js"></script> -->
<script language="javascript">
$(document).ready(function() {

    $().ajaxStart(function() {
        $('#result').hide();
    }).ajaxStop(function() {
        $('#result').fadeIn('slow');
    });

    $('#formuldatos').submit(function() {
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(data) {
                $('#result').html(data);
            }
        })
        return false;
    }); 


    $('#formuldatos2').submit(function() {
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(data) {
                $('#result2').html(data);
            }
        })
        return false;
    }); 

    $('#formuldatos3').submit(function() {
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(data) {
                $('#result3').html(data);
            }
        })
        return false;
    });     



    $('#formuldatos4').submit(function() {
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(data) {
                $('#result4').html(data);
            }
        })
        return false;
    }); 

})  
</script>





<script language="javascript" type="text/javascript">
    function Solo_Numerico(variable){
        Numer=parseInt(variable);
        if (isNaN(Numer)){
            return "";
        }
        return Numer;
    }
    function ValNumero(Control){
        Control.value=Solo_Numerico(Control.value);
    }
</script>




<script type="text/javascript">
$(document).ready(function(){
    
    $("#legend1").click(function(){
        $("#formuldatos").slideToggle(900);
    });

  $("#legend2").click(function(){
        $("#formuldatos2").slideToggle(900);
    });

  $("#legend3").click(function(){
        $("#formuldatos3").slideToggle(900);
    });

  $("#legend4").click(function(){
        $("#formuldatos4").slideToggle(900);
    });


});

</script>


	<style type="text/css">
		#op2{
					background:#044b89;
					border-radius:0px 0px 10px 10px;
					border:3px solid #033663;
					font-weight: bold;
					box-shadow: 0 0 7px 1px #9dcaf1;
		}
	</style>




<?php
include("../../../Scripts/conexion.php");

$matricula=$_GET['matricula'];

$consula_alumno=mysql_query("SELECT * FROM alumno WHERE matricula='$matricula' ");
{
  $fila=mysql_fetch_array($consula_alumno);
  $matricula=$fila['matricula'];
  $matinterna=$fila['matricula_interna'];
  $nombre=$fila['nombre'];
  $apepat=$fila['apepat'];
  $apemat=$fila['apemat'];
  $carrera=$fila['carrera'];
  $calle=$fila['calle'];
  $colonia=$fila['colonia'];
  $ciudad=$fila['ciudad'];
  $tel=$fila['tel_emergencia'];
  $codigo=$fila['codigo_postal'];
  $cel=$fila['celular'];
  $correo=$fila['correo'];
}








class accion{
    public function extrmaestro(){
      $consulta5=mysql_query("SELECT * FROM profesor order by nombre");
      while($fila5=mysql_fetch_array($consulta5)){
              $nom5=$fila5['nombre'];
              $pat5=$fila5['apellido_paterno'];
              $mat5=$fila5['apellido_materno'];
              $director5=$pat5." ".$mat5." ".$nom5;
              $noper5=$fila5['no_personal'];
              print "<option value='"; print  $noper5; print "' >"; print $director5 ; print"</option>";
          // print($director5);   
        }
             function imprime(){

              
              return $this->extrmaestro();
              } 
    }

}

$accion = new accion();
?>

<!--<select>
 <option >hola</option>
<?php $accion->extrmaestro(); ?>
</select>-->

</head>

<?php
if($_SESSION['estatus']==1){
      include("../../../Scripts/conexion.php");
    
?>
<body oncontextmenu="return false">

  <section id="global">

    <header id="baner">
        <?php include ("../../../Includes/header.php"); ?>

              <aside id="engloba_notificacion">
                  <aside id="notificaciones">
                    <?php include ('../../../Includes/salir.php'); ?>
            </aside>
          </asid>

      </header>

    <nav id="global_menu">
      <nav id="marco_menu">
        <ul>
<?php include ('../../../Menus/menu_administrador.php'); ?>
        </ul>
      </nav>
    </nav>



<style type="text/css">
#regresar{
  float: left;
}

#activa_ventana{
  width:60px;
  height:50px;
  position: fixed;
  background:#a8bcfe;
  color: #fff;
  margin-top:150px;
  box-shadow: 1px 5px 5px #a4a5a6;
  text-align:center;
  border-radius: 0px 5px 5px 0px;
  padding: 5px 0px 5px 0px;
}

#activa_ventana2{
  width:60px;
  height:50px;
  position: fixed;
  background:#a8bcfe;
  color: #fff;
  margin-top:230px;
  box-shadow: 1px 5px 5px #a4a5a6;
  text-align:center;
  border-radius: 0px 5px 5px 0px;
  padding: 5px 0px 5px 0px;
}

#activa_ventana3{
  width:60px;
  height:50px;
  position: fixed;
  background:#a8bcfe;
  color: #fff;
  margin-top:70px;
  box-shadow: 1px 5px 5px #a4a5a6;
  text-align:center;
  border-radius: 0px 5px 5px 0px;
  padding: 5px 0px 5px 0px;
}

#result_pagado{
  background:#4ce71c;
}

#result_deudor{
  background:#f41b20;
  color: #fff;
}

</style>
<?php
  include("VentanaMod.html");
include("VentanaPeriodo.html");

 ?>

    <section id="engloba_cuerpo">
      <section id="cuerpo">
        
<?php
$matricula=$_REQUEST['matricula'];
?>

<form id="regresar" method="post" action="formulario_completo.php">
  <td  class="textfiltab">
        <a  href="../Formularios/formulario_completo.php? matricula=<?php echo $matricula;?>" ><!--  -->
          <img src="../../../Imagenes/regresar.png"  />
        </a>
    </td>
    <td  class="textfiltab">
</form>

<section id="titformulintro">
  PRIMERA INSCRIPCIÓN
</section>

<?php $_SESSION['matricula']=$matricula; ?>

<section id="formulario_datos">

<fieldset id="fieldset_datos">

  <legend id="legend4" class="legendform">Fechas de Entrega</legend>
        <section id="resmod"><?php
          $consula_calif=mysql_query("SELECT * FROM formulario2_er WHERE matricula='$matricula' ");

$fila=mysql_fetch_array($consula_calif);
$calificacion=$fila['calificacion'];
$inscripcion=$fila['inscripcion'];
$submodalidad=$fila['submodalidad'];
$er1=$fila['er1'];
$protocolo=$fila['protocolo'];
$er2=$fila['er2'];
$er2t=$fila['er2t'];
$califer2=$fila['califer2'];
$er22=$fila['er22'];
$er22t=$fila['er22t'];
$califer22=$fila['califer22'];
$er3=$fila['er3'];
$er3t=$fila['er3t'];
$er4=$fila['er4'];
$er4t=$fila['er4t'];
$er41=$fila['er41'];
$er41t=$fila['er41t'];
$er5=$fila['er5'];
$er5t=$fila['er5t'];
$er6=$fila['er6'];
if($submodalidad=="Trabajo" || $submodalidad=="") {

?>
<table class="tabla_form">
          <tr>
            <td class="titform">ER-1</td>
            <td><?php print $er1; ?></td>
          </tr>

          <tr>
            <td class="titform">Protocolo</td>
            <td><?php print $protocolo; ?></td>
          </tr>
          <tr>
            <th></th>
            <th class="titform" colspan="2" style="text-align:center;">FECHAS</th>
          </tr>
          <tr>
            <td></td>
            <td class="titform" align="center">Tentativa</td>
            <td class="titform" align="center">Entrega</td>
            <td class="titform" align="center">Calificación</td>
          </tr>
          <tr>
            <td class="titform">ER-2</td>
            <td><?php print $er2t; ?></td>
            <td><?php print $er2; ?></td>
            <td><?php print $califer2; ?></td>
            <td><section id="valida1"></section></td>
          </tr>
          <tr>
            <td class="titform">ER-2-2</td>
            <td><?php print $er22t; ?></td>
            <td><?php print $er22; ?></td>
            <td><?php print $califer22; ?></td>
            <td><section id="valida2"></section></td>
          </tr>
          <tr>
            <td class="titform">ER-3</td>
            <td><?php print $er3t; ?></td>
            <td><?php print $er3; ?></td>
            <td><section id="valida3"></section></td>
          </tr>
          <tr>
            <td class="titform">ER-4 SINODAL1</td>
            <td><?php print $er4t; ?></td>
            <td><?php print$er4t; ?></td>
            <td><section id="valida4"></section></td>
          </tr>
          <tr>
            <td class="titform">ER-4 SINODAL2</td>
            <td><?php print $er41t; ?></td>
            <td><?php print $er41; ?></td>
            <td><section id="valida5"></section></td>
          </tr>
          <tr>
            <td class="titform">ER-5 FECHA EXAMEN</td>
            <td><?php print $er5t; ?></td>
            <td><?php print $er5; ?></td>
            <td><section id="valida6"></section></td>
          </tr>
          <tr>
            <td class="titform">ER-6</td>
            <td><?php print $er6; ?></td>
          </tr>
          <tr>
            <td class="titform">Calificación</td>
            <td><?php print $calificacion; ?></td>
          </tr>
        </table>
        <?php }else{ ?>

<table class="tabla_form">
          <tr>
            <td class="titform">Fecha Examen</td>
            <td><?php print $protocolo; ?></td>
          </tr>
          <tr>
            <td class="titform">Calificación</td>
            <td><?php print $calificacion; ?></td>
          </tr>
        </table>
        <?php } ?>
        </section>
  </fieldset>
</section>


      </section>  
      
    
    </section>

  </section>
<?php
mysql_free_result($consulta_salon);
mysql_free_result($consulta_profesor);
mysql_free_result($consulta_sinp1);
mysql_free_result($consulta_sinp2);
mysql_free_result($consulta_sins1);
mysql_free_result($consulta_sins2);
mysql_free_result($consulta_grupo);
mysql_free_result($periodo);
mysql_free_result($consulta_dir);
mysql_free_result($consulta_sin1);
mysql_free_result($consulta_sin2);
mysql_free_result($consulta_suple1);
mysql_free_result($consulta_suple2);
mysql_free_result($consulta_hora);
mysql_free_result($consulta_fecha_exam);
mysql_free_result($consulta_salo);
mysql_free_result($consulta_cuota);
mysql_free_result($consulta_trabajo);
mysql_free_result($consulta_estado);
mysql_free_result($consulta_estatus);
mysql_free_result($consulta_titulo);
mysql_free_result($consulta_grupo2);
mysql_free_result($consulta_monto);
mysql_free_result($consulta_fecha_curso);
mysql_free_result($consulta_modalidad);
mysql_free_result($consulta_periodo);
mysql_free_result($consulta_concepto);
mysql_free_result($consulta_cuota_tabla);
mysql_free_result($consulta5);
mysql_free_result($co12);
mysql_free_result($consula_alumno);
mysql_free_result($consulta_salon);
mysql_free_result($consulta_profesor);
mysql_free_result($consulta_sinp1);
mysql_free_result($consulta_sinp2);
mysql_free_result($consulta_sins1);
mysql_free_result($consulta_sins2);
mysql_free_result($consulta_grupo);
mysql_free_result($periodo);
mysql_free_result($con_per);
mysql_free_result($extrae_modalidad);
mysql_free_result($consu);
mysql_free_result($co);
mysql_free_result($co2);
mysql_free_result($cosu1);
mysql_free_result($consup);
mysql_free_result($consulta_das);
mysql_close();

?>




















<footer id="pie_pagina">
<?php include ('../../../Includes/pie_pagina.php'); ?>  
</footer>

</body>
<?php
}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=("../../../index.html? var=0");
  </script>
<?php } ?>
</html>
