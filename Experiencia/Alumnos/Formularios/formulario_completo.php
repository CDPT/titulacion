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

  
  <?php $sistema="EXP"; include('../../../Includes/ruta.php'); include('../../../Includes/title.php');  ?>
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


/* consultas para extraer los registros de bd*/
$consulta_salon=mysql_query("SELECT * FROM  salon WHERE order by no_salon");
$consulta_profesor=mysql_query("SELECT * FROM profesor order by apellido_paterno, apellido_materno,nombre");
$consulta_sinp1=mysql_query("SELECT * FROM profesor order by apellido_paterno, apellido_materno,nombre");
$consulta_sinp2=mysql_query("SELECT * FROM profesor order by apellido_paterno, apellido_materno,nombre");
$consulta_sins1=mysql_query("SELECT * FROM profesor order by apellido_paterno, apellido_materno,nombre");
$consulta_sins2=mysql_query("SELECT * FROM profesor order by apellido_paterno, apellido_materno,nombre");
$consulta_grupo=mysql_query("SELECT * FROM grupos ");
$periodo=mysql_query("SELECT * FROM periodo order by periodo");


/* consultas para extraer los registros de formulario*/

$consulta_dir=mysql_query("SELECT * FROM formulario WHERE matricula='$matricula' ");
$consulta_sin1=mysql_query("SELECT * FROM formulario WHERE matricula='$matricula' ");
$consulta_sin2=mysql_query("SELECT * FROM formulario WHERE matricula='$matricula' ");

$consulta_dir2=mysql_query("SELECT * FROM formulario WHERE matricula='$matricula' ");
$consulta_sin12=mysql_query("SELECT * FROM formulario WHERE matricula='$matricula' ");
$consulta_sin22=mysql_query("SELECT * FROM formulario WHERE matricula='$matricula' ");
$consulta_suple1=mysql_query("SELECT * FROM formulario WHERE matricula='$matricula' ");
$consulta_suple2=mysql_query("SELECT * FROM formulario WHERE matricula='$matricula' ");

$consulta_hora=mysql_query("SELECT * FROM formulario WHERE matricula='$matricula' ");
$consulta_fecha_exam=mysql_query("SELECT * FROM formulario WHERE matricula='$matricula' ");
$consulta_salo=mysql_query("SELECT * FROM formulario WHERE matricula='$matricula' ");
$consulta_cuota=mysql_query("SELECT * FROM formulario_cat WHERE matricula='$matricula'");
$consulta_trabajo=mysql_query("SELECT * FROM formulario WHERE matricula='$matricula'");
$consulta_estado=mysql_query("SELECT * FROM formulario_cat WHERE matricula='$matricula'");
$consulta_estatus=mysql_query("SELECT * FROM formulario_cat WHERE matricula='$matricula'");
$consulta_titulo=mysql_query("SELECT * FROM formulario WHERE matricula='$matricula' ");
$consulta_grupo2=mysql_query("SELECT * FROM formulario_cat WHERE matricula='$matricula' ");
$consulta_monto=mysql_query("SELECT * FROM formulario_cat WHERE matricula='$matricula'");
$consulta_fecha_curso=mysql_query("SELECT * FROM formulario_cat WHERE matricula='$matricula' ");
$consulta_modalidad=mysql_query("SELECT * FROM formulario WHERE matricula='$matricula' ");
$consulta_periodo=mysql_query("SELECT * FROM formulario WHERE matricula='$matricula' ");
$consulta_concepto=mysql_query("SELECT * FROM formulario_cat WHERE matricula='$matricula' ");

$consulta_cuota_tabla=mysql_query("SELECT * FROM cuotas WHERE  estado='1' ");


//---------CONSULTA PARA IMPRIMIR LOS FORMATOS----------
                      $dir=mysql_fetch_array($consulta_dir2);
                        $nodire=$dir['director'];
                        $consudir=mysql_query("SELECT * FROM profesor WHERE no_personal='$nodire' ");
                          $di=mysql_fetch_array($consudir);
                            $nomb=$di['nombre'];
                            $pate=$di['apellido_paterno'];
                            $mate=$di['apellido_materno'];
                            $noper=$di['no_personal'];
                            $director=$pate." ".$mate." ".$nomb;

                      $sin1=mysql_fetch_array($consulta_sin12);
                       $si1=$sin1['sinprop1'];
                        $co=mysql_query("SELECT * FROM profesor WHERE no_personal='$si1'");
                          $con=mysql_fetch_array($co);
                          $no=$con['nombre'];
                          $ap=$con['apellido_paterno'];
                          $ma=$con['apellido_materno'];
                          $sinodal1=$ap." ".$ma." ".$no;

                      $sin2=mysql_fetch_array($consulta_sin22);
                        $si2=$sin2['sinprop2'];
                        $co2=mysql_query("SELECT * FROM profesor WHERE no_personal='$si2'");
                          $con2=mysql_fetch_array($co2);
                          $no2=$con2['nombre'];
                          $ap2=$con2['apellido_paterno'];
                          $ma2=$con2['apellido_materno'];
                          $sinodal2=$ap2." ".$ma2." ".$no2;
//----------TERMINA IMPRIMIR LOS FORMATOS







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
 <section id="activa_ventana3" title="Agregar Periodo">
    <img src="../../../Imagenes/agregaperiodo.png" >
  </section>

 <section id="activa_ventana" title="Agregar Maestro">
    <img src="../../../Imagenes/maestros/agregar_maestro.png" >
  </section>

 <section id="activa_ventana2" title="Imprimir Formatos">
    <a href="../../../pdf/experiencia.php? matricula=<?php echo $matricula; ?>&nombre=<?php echo $nombre; ?>&apepat=<?php echo $apepat; ?>&apemat=<?php echo $apemat; ?>&carrera=<?php echo $carrera; ?>&director=<?php echo $director; ?>&sinodal1=<?php echo $sinodal1; ?>&sinodal2=<?php echo $sinodal2; ?>" target="_blank"><img src="../../../Imagenes/reportes1.png"  width="60px" height="50px"></a>
  </section>



    <section id="engloba_cuerpo">
      <section id="cuerpo">
        

<?php

$matricula=$_REQUEST['matricula'];

$co12=mysql_query("SELECT * FROM formulario WHERE matricula='$matricula'")or die(mysql_error());
$f45=mysql_fetch_array($co12);
$tipo=$f45['tipo'];
if($tipo=='ER'){
  $tipo="Experiencia Recepcional";
}else{
  $tipo="CAT";
}

$consula_alumno=mysql_query("SELECT * FROM alumno WHERE matricula='$matricula' ");

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

$consula_calif=mysql_query("SELECT * FROM formulario_er WHERE matricula='$matricula' ");

$fila=mysql_fetch_array($consula_calif);
$calificacion=$fila['calificacion'];
$inscripcion=$fila['inscripcion'];
if ($inscripcion=="" || $inscripcion==0){
  $consula_ins=mysql_query("UPDATE formulario_er SET inscripcion=1 WHERE matricula='$matricula'");
  $consula_ins1=mysql_query("SELECT * FROM formulario_er WHERE matricula='$matricula' ");
  $inscripcion=$fil['inscripcion'];
}

$submodalidad=$fila['submodalidad'];
$er1=$fila['er1'];
$protocolo=$fila['protocolo'];
$er2=$fila['er2'];
$er2t=$fila['er2t'];
$er22=$fila['er22'];
$er22t=$fila['er22t'];
$er3=$fila['er3'];
$er3t=$fila['er3t'];
$er4=$fila['er4'];
$er4t=$fila['er4t'];
$er41=$fila['er41'];
$er41t=$fila['er41t'];
$er5=$fila['er5'];
$er5t=$fila['er5t'];
$er6=$fila['er6'];


$consulta_salon=mysql_query("SELECT * FROM  salon WHERE estado='1' order by no_salon");

$consulta_profesor=mysql_query("SELECT * FROM profesor order by apellido_paterno, apellido_materno,nombre");

$consulta_sinp1=mysql_query("SELECT * FROM profesor order by apellido_paterno, apellido_materno,nombre");

$consulta_sinp2=mysql_query("SELECT * FROM profesor order by apellido_paterno, apellido_materno,nombre");

$consulta_sins1=mysql_query("SELECT * FROM profesor order by apellido_paterno, apellido_materno,nombre");

$consulta_sins2=mysql_query("SELECT * FROM profesor order by apellido_paterno, apellido_materno,nombre");
/*$consulta_profesor=mysql_query("SELECT * FROM cat_profesor where activo='1' order by nombre");

$consulta_sinp1=mysql_query("SELECT * FROM cat_profesor where activo='1' order by nombre");

$consulta_sinp2=mysql_query("SELECT * FROM cat_profesor where activo='1' order by nombre");

$consulta_sins1=mysql_query("SELECT * FROM cat_profesor where activo='1' order by nombre");

$consulta_sins2=mysql_query("SELECT * FROM cat_profesor where activo='1' order by nombre");
*/

$consulta_grupo=mysql_query("SELECT * FROM grupos WHERE estado='1' order by nombre_grupo");

$periodo=mysql_query("SELECT * FROM periodo WHERE estado='1' order by periodo");

$titulacion=mysql_query("SELECT tit FROM formulario WHERE matricula='$matricula' ");
$titulado=mysql_fetch_array($titulacion);
$tit1=$titulado['tit'];

if ($tit1==1) $tit="SI";
else $tit="NO";

$consula_calif=mysql_query("SELECT * FROM formulario_er WHERE matricula='$matricula' ");

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
$observa=$fila['observaciones'];



?>








<form id="regresar" method="post" action="../Listado/index.php">
  <input src="../../../Imagenes/regresar.png" type="image" value="Regresar"/>
</form>




<section id="titformulintro">
  REGISTRO DE ESTUDIANTE
</section>

<?php $_SESSION['matricula']=$matricula; ?>

<section id="formulario_datos">

  <fieldset id="fieldset_datos">
    <legend id="legend1" class="legendform">Datos Generales</legend>
    <form id="formuldatos" method="post" name="formuldatos" action="procesos_completo/edita_datos_generales.php? matricula=<?php print $matricula ?>" >

          <table class="tabla_form" border="0">
                  <tr>
                    <td class="titform">Matricula:</td>
                    <td><?php print $matricula; ?></td>
                  </tr>

                  <tr>
                    <td class="titform">Matricula Interna</td>
                    <td><input type="text" maxlength="9" class="textform" value="<?php print $matinterna ; ?>" id="matinterna" name="matinterna"/></td>
                  </tr>

                  <tr>
                    <td class="titform">Nombre(s):</td>
                    <td><?php print $nombre; ?></td>
                  </tr>

                  <tr>
                    <td class="titform">Apellido Paterno:</td>
                    <td><?php print $apepat; ?></td>
                  </tr>

                  <tr>
                    <td class="titform">Apellido Materno:</td>
                    <td><?php print $apemat ; ?></td>
                  </tr>

                  <tr>
                    <td class="titform">Carrera:</td>
                    <td><?php print $carrera ; ?></td>
                  </tr>

                  <tr>
                    <td class="titform">Calle:</td>
                    <td><input class="textform" maxlength="80" name="calle" type="text" id="calle" value="<?php print $calle ; ?>" required></td>
                  </tr>

                  <tr>
                    <td class="titform">Colonia:</td>
                    <td><input class="textform" type="text" maxlength="30" name="colonia" value="<?php print $colonia; ?>" id="colonia"  required></td>
                  </tr>

                  <tr>
                    <td class="titform">Código Postal:</td>
                    <td><input class="textform" type="text" maxlength="5" name="codigo" onkeyUp="return ValNumero(this);" value="<?php print $codigo; ?>" id="codigo"  required></td>
                  </tr>

                  <tr>
                    <td class="titform">Ciudad</td>
                    <td><input class="textform" type="text" maxlength="40" name="ciudad" value="<?php print $ciudad ?>" id="ciudad" required></td>
                  </tr>

                  <tr>
                    <td class="titform">Teléfono:</td>
                    <td><input class="textform" type="text" maxlength="15" onkeyUp="return ValNumero(this);" name="tel" value="<?php print $tel; ?>" id="tel" required></td>
                  </tr>

                  <tr>
                    <td class="titform">Celular:</td>
                    <td><input class="textform" type="text" maxlength="15" onkeyUp="return ValNumero(this);" name="cel" id="cel" value="<?php print $cel ?>"/></td>
                  </tr>

                  <tr>
                    <td class="titform">Correo Electrónico</td>
                    <td><input class="textform_mail" type="text" maxlength="40" id="correo" name="correo" value="<?php print $correo?>" /></td>
                  </tr>   
                  <tr>
                    <td class="titform">Tramites</td>
                    <td>
                        <select disabled class="selectopcion"  name="tramites" id="tramites" >
                          <?php if($tipo=="CAT"){?>
                          <option value="CAT"selected>CAT</option>
                          <option value="ER">ER</option> 
                          <?php }else{?>
                          <option value="CAT">CAT</option>
                          <option value="ER" selected>ER</option> 
                          <?php } ?> 
                        </select>
                    </td>
 
                  </tr>
                  <tr>
                    <td class="titform">Titulado</td>
                    <td><?php print $tit; ?></td>
                  </tr>   
                   <tr>
                    <td class="titform">Calificación</td>
                    <td><input class="textform_mail" type="text" maxlength="10" value="<?php print $calificacion?>" readonly/></td>
                  </tr> 


          </table>

          <section id="img_guar">
            <input src="../../../Imagenes/alumnos/guardar.png" type="image"/>
          </section>

 
        </form> 
          <section id="result"></section>
  </fieldset>
</section>









        <script language="JavaScript" type="text/JavaScript">
        
            $(document).ready(function(){

                $("#grupo").change(function(event){
                    var id = $("#grupo").find(':selected').val();
                    $("#desponibilidad").load('procesos_completo/verifica_grupo.php?id='+id);
                });
            });
        </script>



<input type="hidden" name="matricula" id="matricula" value="<?php print $matricula; ?>">

        <script language="JavaScript" type="text/JavaScript">

            $(document).ready(function(){
/*
      var dir = $("#director").find(':selected').val();
      var pro1= $("#sinprop1").find(':selected').val();
      var pro2= $("#sinprop2").find(':selected').val();
      var sup1= $("#sinsup1").find(':selected').val();
      var sup2= $("#sinsup2").find(':selected').val();
$("#seccion_hora").load("procesos_completo/hora_examen.php?dir="+dir+"&pro1="+pro1+"&pro2="+pro2+"&sup1="+sup1+"&sup2="+sup2+"&fecha="+fechaex);

*/




                $("#director").change(function(event){
                    var matricula = $("#matricula").val();
                    var periodo = $("#periodo_tit").find(':selected').val();
                    var submodalidad = $("#submodalidad").find(':selected').val();
                    var dir = $("#director").find(':selected').val();
                    var prop1= $("#sinprop1").find(':selected').val();
                    var prop2= $("#sinprop2").find(':selected').val();
                    var sup1= $("#sinsup1").find(':selected').val();
                    var sup2= $("#sinsup2").find(':selected').val();
                    $("#valida_sum_dir").load('valida/valida_suma_director.php?mat='+matricula+'&periodo='+periodo+"&dir="+dir+"&prop1="+prop1+"&prop2="+prop2+"&sup1="+sup1+"&sup2="+sup2+"&submodalidad="+submodalidad);
                });

                $("#sinprop1").change(function(event){
                    var matricula = $("#matricula").val();
                    var periodo = $("#periodo_tit").find(':selected').val();
                    var submodalidad = $("#submodalidad").find(':selected').val();
                    var dir = $("#director").find(':selected').val();
                    var prop1 = $("#sinprop1").find(':selected').val();                   
                    var prop2= $("#sinprop2").find(':selected').val();
                    var sup1= $("#sinsup1").find(':selected').val();
                    var sup2= $("#sinsup2").find(':selected').val();
                    $("#valida_sum_prop1").load('valida/valida_suma_prop1.php?mat='+matricula+'&periodo='+periodo+"&dir="+dir+"&prop1="+prop1+"&prop2="+prop2+"&sup1="+sup1+"&sup2="+sup2+"&submodalidad="+submodalidad);
                });

                $("#sinprop2").change(function(event){
                    var matricula = $("#matricula").val();
                    var periodo = $("#periodo_tit").find(':selected').val();
                    var dir = $("#director").find(':selected').val();
                    var prop1 = $("#sinprop1").find(':selected').val();
                    var prop2 = $("#sinprop2").find(':selected').val();
                    var sup1= $("#sinsup1").find(':selected').val();
                    var sup2= $("#sinsup2").find(':selected').val();
                    $("#valida_sum_prop2").load('valida/valida_suma_prop2.php?mat='+matricula+'&periodo='+periodo+"&dir="+dir+"&prop1="+prop1+"&prop2="+prop2+"&sup1="+sup1+"&sup2="+sup2+"&submodalidad="+submodalidad);
                });

                $("#sinsup1").change(function(event){
                    var matricula = $("#matricula").val();
                    var periodo = $("#periodo_tit").find(':selected').val();
                    var submodalidad = $("#submodalidad").find(':selected').val();
                    var dir = $("#director").find(':selected').val();
                    var prop1 = $("#sinprop1").find(':selected').val();
                    var prop2 = $("#sinprop2").find(':selected').val();                   
                    var sup1 = $("#sinsup1").find(':selected').val();
                    var sup2= $("#sinsup2").find(':selected').val();
                    $("#valida_sum_sup1").load('valida/valida_suma_sup1.php?mat='+matricula+'&periodo='+periodo+"&dir="+dir+"&prop1="+prop1+"&prop2="+prop2+"&sup1="+sup1+"&sup2="+sup2);
                });        

                $("#sinsup2").change(function(event){
                    var matricula = $("#matricula").val();
                    var periodo = $("#periodo_tit").find(':selected').val();
                    var dir = $("#director").find(':selected').val();
                    var prop1 = $("#sinprop1").find(':selected').val();
                    var prop2 = $("#sinprop2").find(':selected').val();                   
                    var sup1 = $("#sinsup1").find(':selected').val();
                    var sup2 = $("#sinsup2").find(':selected').val();
                    $("#valida_sum_sup2").load('valida/valida_suma_sup2.php?mat='+matricula+'&periodo='+periodo+"&dir="+dir+"&prop1="+prop1+"&prop2="+prop2+"&sup1="+sup1+"&sup2="+sup2);
                });  
            });
        </script>



<section id="formulario_faltante">

<fieldset id="fieldset_datos">
  <legend id="legend2" class="legendform">Datos del Proceso de Titulación</legend>
    <form method="POST" id="formuldatos2" style="display:none"  action="procesos_completo/edita_datos_titulacion.php? matricula=<?php print $matricula?>">
        <table  class="tabla_form">

        <tr>
          <td class="titform">Periodo de Titulación</td>
          <td>
            <select class="selectopcion"  name="periodo_tit" id="periodo_tit" >
              <option></option>
            <?php
               $per=mysql_fetch_array($consulta_periodo);
               $peri=$per['periodo_tit'];
               $con_per=mysql_query("SELECT * FROM periodo WHERE id_periodo='$peri'");
               $pet=mysql_fetch_array($con_per);
               $id_period=$pet['id_periodo'];   

             while($fila_periodo=mysql_fetch_array($periodo)){
               $perio=$fila_periodo['periodo'];
               $id_perio=$fila_periodo['id_periodo'];
               if ($id_period==$id_perio) { ?>
                 <option value="<?php print $id_perio ?>" selected><?php print $perio ; ?> </option> 
             <?php  }else{ ?>
              <option value="<?php print $id_perio ?>"><?php print $perio ; ?> </option> 
            <?php
              } }
             ?>
              </select> 
          </td>

        </tr>
          <tr>
            <td class="titform">No. de Inscripción</td>
                <td><?php print $inscripcion; ?></td>
          </tr>
            <tr>
              <td class="titform">Título de Trabajo</td>
              <td>
                <?php
                  $tit=mysql_fetch_array($consulta_titulo);
                  $titulotrab=$tit['titulotrab'];
                ?>
                <input class="textform" type="text" name="titulotrab" id="titulotrab" value="<?php print $titulotrab?>"></td>
              </tr>

          <tr>
            <td class="titform">Modalidad</td>
            <td><select class="selectopcion"  name="submodalidad" id="submodalidad">
              
              <option value="Trabajo" <?php if($submodalidad=="Trabajo" || $submodalidad==""){ ?>selected<?php } ?>>Trabajo</option>
              <option value="Ceneval"<?php if($submodalidad=="Ceneval"){ ?>selected<?php } ?>>Ceneval</option>
               <option value="Promedio"<?php if($submodalidad=="Promedio"){ ?>selected<?php } ?>>Promedio</option>
            </select>
          </td>
        
          </tr>
            <tr>
              <td class="titform">SubModalidad</td>
              <td>
                <select class="selectopcion" name="modalidad" id="modalidad" >
                  <option></option>
                <?php
                 $cos=mysql_fetch_array($consulta_modalidad);
                 $modali=$cos['modalidad'];

                  $extrae_modalidad=mysql_query("SELECT * FROM modalidad WHERE estado='1' ");
                  while ($filamodalidad=mysql_fetch_array($extrae_modalidad)) {
                      $id_mod=$filamodalidad['id_modalidad'];
                      $concepto_mod=$filamodalidad['concepto'];
                      if ($modali==$concepto_mod) { ?>
                   <option  value="<?php print $concepto_mod; ?>" selected><?php print $concepto_mod; ?> </option>  
                <?php  }else{  ?>
                <option  value="<?php print $concepto_mod; ?>"><?php print $concepto_mod; ?> </option>
                <?php } }  ?>
                </select>
              </td>
            </tr>




          <tr>
            <td class="titform">Director de Tesis</td>
            <td> 
              <?php
                  $con=mysql_fetch_array($consulta_dir);
                  $dire=$con['director'];
                  $pru=explode("-", $dire);
                  ?>
                <select class="selectopcion" name="director" id="director" <?php if ($pru[1]=="pen" || $dire=="rechazado") { ?> style="color:red"<?php }?>>
                  <option></option>
                  <?php if ($dire=="rechazado") {
                    echo "<option value='rechazado' selected>Profesor rechazado seleccione otro</option>";
                  }
                  /*$con=mysql_fetch_array($consulta_dir);
                  $dire=$con['director'];
                  $pru=explode("-", $dire);*/
                  $consu=mysql_query("SELECT * FROM profesor WHERE no_personal='$dire' ");
                  $di=mysql_fetch_array($consu);
                      $noperd=$di['no_personal'];
  
                while($fila_profesor=mysql_fetch_array($consulta_profesor)){
                $nom=$fila_profesor['nombre'];
                      $pat=$fila_profesor['apellido_paterno'];
                      $mat=$fila_profesor['apellido_materno'];
                      $director=$pat." ".$mat." ".$nom;
                      $noper=$fila_profesor['no_personal'];
                if ($noperd==$noper) { ?>
             <option id="op" name="director" value="<?php print $noper ?>" selected><?php print $director; if ($pru[1]=="pen" ) {echo "- Pendiente";} ?></option> 
               <?php }else{?>
             <option id="op" name="director" value="<?php print $noper ?>"><?php print $director ?></option>
                <?php } } ?>
                </select>
            </td>
         <td id="valida_sum_dir"> </td>   
          <td id="valida_director"> </td>   
          </tr>




          <tr>
            <td class="titform">Sinodal Propietario 1</td>
            <?php
                $sin1=mysql_fetch_array($consulta_sin1);
                $si1=$sin1['sinprop1'];
                $pru=explode("-", $si1);
                ?>
            <td><select class="selectopcion" name="sinprop1"  id="sinprop1" <?php if ($pru[1]=="pen" || $si1=="rechazado") { ?> style="color:red"<?php }?> >
              <option></option>
              <?php
              if ($si1=="rechazado") {
                    echo "<option value='rechazado' selected>Profesor rechazado seleccione otro</option>";
                  }
                /*$sin1=mysql_fetch_array($consulta_sin1);
                $si1=$sin1['sinprop1'];*/
                $co=mysql_query("SELECT * FROM profesor WHERE no_personal='$si1'");
                $con=mysql_fetch_array($co);
                $noprosup1=$con['no_personal'];

                while($fil=mysql_fetch_array($consulta_sinp1)){
                 $nom=$fil['nombre'];
                 $pat=$fil['apellido_paterno'];
                 $mat=$fil['apellido_materno'];
                 $dir=$pat." ".$mat." ".$nom;
                 $nosup1=$fil['no_personal'];
                 if ($noprosup1==$nosup1) { ?>
               <option id="op" value="<?php print $nosup1?>" selected><?php print $dir ; if ($pru[1]=="pen" ) {echo "- Pendiente";} ?>    
                 <?php }else{ ?>
              <option id="op" value="<?php print $nosup1?>"><?php print $dir ;?>
              <?php } } ?>
              </option>
            </select>
          </td>
          <td id="valida_sum_prop1"></td>
          <td id="valida_prop1"></td>
        </tr>




        <tr>
          <td class="titform">Sinodal propietario 2</td>
          <?php
             $sin2=mysql_fetch_array($consulta_sin2);
             $si2=$sin2['sinprop2'];
             $pru=explode("-", $si2);
             ?>
          <td><select class="selectopcion" name="sinprop2" id="sinprop2" <?php if ($pru[1]=="pen" || $si2=="rechazado") { ?> style="color:red"<?php }?>>
            <option></option>
            <?php
            if ($si2=="rechazado") {
                    echo "<option value='rechazado' selected>Profesor rechazado seleccione otro</option>";
                  }
             /*$sin2=mysql_fetch_array($consulta_sin2);
             $si2=$sin2['sinprop2'];*/
             $co2=mysql_query("SELECT * FROM profesor WHERE no_personal='$si2'");
             $con2=mysql_fetch_array($co2);

             $nosinpro2=$con2['no_personal'];

              while($filap2=mysql_fetch_array($consulta_sinp2)){
                $nom=$filap2['nombre'];
                $pat=$filap2['apellido_paterno'];
                $mat=$filap2['apellido_materno'];
                $dir=$pat." ".$mat." ".$nom;
                $nosin2=$filap2['no_personal'];
                if($nosinpro2==$nosin2){ ?>
                  <option value="<?php print $nosin2 ?>" selected><?php print $dir; if ($pru[1]=="pen") {echo "- Pendiente";} ?>
             <?php  }else{ ?>
              <option value="<?php print $nosin2 ?>"><?php print $dir;?>
            <?php } } ?>
             </option>
            </select>
          </td>
          <td id="valida_sum_prop2"></td>
          <td id="valida_prop2"></td>
        </tr>
      </table>


      <section id="resin">
        <table  class="tabla_form" style="margin-top:-40px; margin-left:60px;">
          <?php if($submodalidad=="Trabajo" || $submodalidad==""){ ?>
        <tr id="sup1">
          <td class="titform">Sinodal Suplente 1</td>
          <?php
             $sins1=mysql_fetch_array($consulta_suple1);
             $sisu1=$sins1['sinsup1'];
             $pru=explode("-", $sisu1);
             ?>
          <td><select class="selectopcion" name="sinsup1" id="sinsup1" <?php if ($pru[1]=="pen" || $sisu1=="rechazado") { ?> style="color:red"<?php }?>>
            <option></option>
            <?php
            if ($sisu1=="rechazado") {
                    echo "<option value='rechazado' selected>Profesor rechazado seleccione otro</option>";
                  }
             /*$sins1=mysql_fetch_array($consulta_suple1);
             $sisu1=$sins1['sinsup1'];*/
             $cosu1=mysql_query("SELECT * FROM profesor WHERE no_personal='$sisu1'");
             $consu1=mysql_fetch_array($cosu1);
             $nosinsup1=$consu1['no_personal'];

             while($filas1=mysql_fetch_array($consulta_sins1)){
              $nom=$filas1['nombre'];
              $pat=$filas1['apellido_paterno'];
              $mat=$filas1['apellido_materno'];
              $dir=$pat." ".$mat." ".$nom;
              $nosup1=$filas1['no_personal'];
              if ($nosinsup1==$nosup1) { ?>
              <option value="<?php print $nosup1 ?>" selected><?php print $dir; if ($pru[1]=="pen" ) {echo "- Pendiente";} ?>    
              <?php }else{ ?>
              <option value="<?php print $nosup1 ?>"><?php print $dir;?>
            <?php  }  } ?>
              </option>
              </select>
            </td>
            <td id="valida_sum_sup1"></td>
            <td id="valida_sup1"></td>
        </tr>

        <tr id="sup2">
         <td class="titform">Sinodal Suplente 2</td>
          <?php
             $suple2=mysql_fetch_array($consulta_suple2);
             $supl2=$suple2['sinsup2'];
             $pru=explode("-", $sisu1);
             ?>
          <td><select class="selectopcion" name="sinsup2" id="sinsup2" <?php if ($pru[1]=="pen" || $supl2=="rechazado") { ?> style="color:red"<?php }?>>
            <option></option>
            <?php
            if ($supl2=="rechazado") {
                    echo "<option value='rechazado' selected>Profesor rechazado seleccione otro</option>";
              }
             /*$suple2=mysql_fetch_array($consulta_suple2);
             $supl2=$suple2['sinsup2'];*/
             $consup=mysql_query("SELECT * FROM profesor WHERE no_personal='$supl2'");
             $suples2=mysql_fetch_array($consup);
             $nosinsup2=$suples2['no_personal'];

              while($filas1=mysql_fetch_array($consulta_sins2)){
               $nom=$filas1['nombre'];
               $pat=$filas1['apellido_paterno'];
               $mat=$filas1['apellido_materno'];
               $dir=$pat." ".$mat." ".$nom;
               $nosin2=$filas1['no_personal'];
               if ($nosinsup2==$nosin2) { ?>
              <option value="<?php print $nosin2 ?>" selected><?php print $dir; if ($pru[1]=="pen") {echo "- Pendiente";} ?>  
               <?php }else{  ?>
              <option value="<?php print $nosin2 ?>"><?php print $dir;?>
            <?php }  }  ?>
              </option>
              </select>
            </td>
            <td id="valida_sum_sup2"></td>
            <td id="valida_sup2"></td>
        </tr>


        <tr>
          <td class="titform">Fecha Exámen</td>
          <td>
            <?php
               $fec=mysql_fetch_array($consulta_fecha_exam);
               $fech=$fec['fechaexam'];
            ?>
              <input  class="textform" type="date" name="fechaexam" id="fechaexam" value="<?php if($fech=="0000-00-00"){print "";}else{ print $fech; }?>"></td>
          <td id="validafecha"><img src="../../../Imagenes/alumnos/iconbuscar.png" style="cursor:pointer;"></td> 
          <td></td> 
        </tr>


<script type="text/javascript">
  $(document).ready(function(){

      $("#fechaexam").change(function(event){
        //var fechaex = $("#fechaexam").find(':selected').val();
        var fechaex = $("#fechaexam").val();

        if (fechaex==""){
          $("#seccion_hora").css("display","none");
          $("#seccion_salon").css("display","none"); 
          $("#valida_director").html("");
          $("#valida_prop1").html("");
          $("#valida_prop2").html("");
          $("#valida_sup1").html("");
          $("#valida_sup2").html("");
          $("#seccion_hora").html("<input type='hidden' name='horaexam' id='horaexam' value=''/> ");
          $("#seccion_salon").html("<input type='hidden' name='salon' id='salon'/> ");                   

        }else{

      var dir = $("#director").find(':selected').val();
      var pro1= $("#sinprop1").find(':selected').val();
      var pro2= $("#sinprop2").find(':selected').val();
      var sup1= $("#sinsup1").find(':selected').val();
      var sup2= $("#sinsup2").find(':selected').val();
      //var fech= $("#fechaexam").val();
      var hora= $("#horaexam").find(':selected').val();
      var salon= $("#salon").find(':selected').val();
$("#seccion_hora").load("procesos_completo/hora_examen.php?dir="+dir+"&pro1="+pro1+"&pro2="+pro2+"&sup1="+sup1+"&sup2="+sup2+"&fecha="+fechaex);

       //   $("#seccion_hora").load("procesos_completo/hora_examen.php?fecha="+fechaex);
        // alert("lleno"+fechaex);

          $("#seccion_hora").css("display","block");
          $("#seccion_salon").css("display","none");
          $("#observa").css("display","none");
          
          $("#valida_director").html("");
          $("#valida_prop1").html("");
          $("#valida_prop2").html("");
          $("#valida_sup1").html("");
          $("#valida_sup2").html("");  
          $("valida_salon").html("");       
        }


      });
  });
</script>
  
<?php
$verdad=mysql_num_rows($consulta_hora);
                $aaa=mysql_fetch_array($consulta_hora);
                   $hora=$aaa['horaexam'];?>        
        <tr id="hrexam">
          <td class="titform">Hora Exámen</td>

          <td>
<section id="seccion_hora">  
<?php
  if ($hora!="") {
 ?>
 <section>
<?php $se=mysql_query("SELECT * FROM horas_exam WHERE id='$hora'")or die(mysql_error());
         $sae=mysql_fetch_array($se);
          $id_hora=$sae['id'];
          $hora_ini=$sae['hora_ini'];
          $hora_fin=$sae['hora_fin'];
          $hor=$hora_ini." - ".$hora_fin;
         ?>
      <input class="textform" type="text" name="horaexam" id="horaexam" value="<?php if($hor!=" - "){print $hor; }?>" maxlength="8" readonly/>
 </section>
<?php } ?>
</section>        
          </td>

        </tr>


        <tr id="saexam">
          <td class="titform">Salón</td>
          <td>
            <section id="seccion_salon">
              <?php
                $sa=mysql_fetch_array($consulta_salo);
                $salo=$sa['salon'];
              ?> 
          <section style="display:<?php  if($salo==""){print "none";}else{print "block";} ?>;">
<!--  
                <select class="selectopcion" name="salon" id="salon">
                
                  <option value="<?php print $salo ?>"><?php print $salo ?></option>
                    <?php
                     while($fila_salon=mysql_fetch_array($consulta_salon)){ ?>
                        <option value="<?php print $fila_salon['no_salon']; ?>"><?php print $fila_salon['no_salon'];
                    ?>
                  </option>
                  <?php  } ?>
                </select>-->
                
                <input type="text"  class="textform" name="salon" id="salon" value="<?php print $salo; ?>" readonly/>

    </table>
    </section>
      <?php } ?>
      <section id="resin">
      <table class="tabla-form" style="margin-top:-40px; margin-left:90px;">
          <tr id="saexam">
            <td class="titform">Observaciones   </td>
            <td><textarea name="observaciones" rows="1"  cols="35" id="observaciones" value="<?php print $observaciones; ?>"><?php print $observa?></textarea></td>
          </tr>
        </table>
      <section>
        <section id="observa" name="observa">
          <input src="../../../Imagenes/alumnos/guardar.png" type="image"/>
        </section>
  </form>
  <section id="result2"></section>
</fieldset> 

<script language="JavaScript" type="text/JavaScript">
        
            $(document).ready(function(){

                $("#er2").change(function(event){
                    var f1 = $("#er2").val();
                    var matricula = $("#matricula").val();
                    var cbd = "er2t";
                    $("#valida1").load('valida/valida_dia.php?f1='+f1+'&mat='+matricula+'&cbd='+cbd);
                });
            });
           
            $(document).ready(function(){

                $("#er22").change(function(event){
                    var f1 = $("#er22").val();
                    var matricula = $("#matricula").val();
                    var cbd = "er22t";
                    $("#valida2").load('valida/valida_dia.php?f1='+f1+'&mat='+matricula+'&cbd='+cbd);
                });
            });

            $(document).ready(function(){

                $("#er3").change(function(event){
                    var f1 = $("#er3").val();
                    var matricula = $("#matricula").val();
                    var cbd = "er3t";
                    $("#valida3").load('valida/valida_dia.php?f1='+f1+'&mat='+matricula+'&cbd='+cbd);
                });
            });

            $(document).ready(function(){

                $("#er4s1").change(function(event){
                    var f1 = $("#er4s1").val();
                    var matricula = $("#matricula").val();
                    var cbd = "er4t";
                    $("#valida4").load('valida/valida_dia.php?f1='+f1+'&mat='+matricula+'&cbd='+cbd);
                });
            });

            $(document).ready(function(){

                $("#er4s2").change(function(event){
                    var f1 = $("#er4s2").val();
                    var matricula = $("#matricula").val();
                    var cbd = "er41t";
                    $("#valida5").load('valida/valida_dia.php?f1='+f1+'&mat='+matricula+'&cbd='+cbd);
                });
            });

            $(document).ready(function(){

                $("#er5").change(function(event){
                    var f1 = $("#er5").val();
                    var matricula = $("#matricula").val();
                    var cbd = "er5t";
                    $("#valida6").load('valida/valida_dia.php?f1='+f1+'&mat='+matricula+'&cbd='+cbd);
                });
            });

            $(document).ready(function(){
                $("#submodalidad").change(function(event){
                    var f1 = $("#submodalidad").val();
                    var matricula = $("#matricula").val();
                    $("#resmod").load('valida/modalidad.php?f1='+f1+'&matricula='+matricula);
                });
            });

            $(document).ready(function(){
              $("#submodalidad").change(function(event){
                var opcion = $("#submodalidad").val();
                    if (opcion=="Trabajo"){
                        $("#sup1").css("display","block");
                        $("#sup2").css("display","block");
                        $("#fechexam").css("display","block");
                        $("#hrexam").css("display","block");
                        $("#saexam").css("display","block");
                        $("#resin").css("display","block");
                    }else{
                      $("#sup1").css("display","none");
                        $("#sup2").css("display","none");
                        $("#fechexam").css("display","none");
                        $("#hrexam").css("display","none");
                        $("#saexam").css("display","none");
                        $("#resin").css("display","none");
                    }
                });
            });
        </script>



<fieldset id="fieldset_datos">

  <legend id="legend4" class="legendform">Fechas de Entrega</legend>
    <form  id="formuldatos4" style="display:none" action="procesos_completo/edita_datos_cuota.php? matricula=<?php print $matricula?>" > 
        <section id="resmod">
<?php
;
if($submodalidad=="Trabajo" || $submodalidad=="") {

?>
<table class="tabla_form">
          <tr>
            <td class="titform">ER-1</td>
            <td><input type="date" name="er1" id="er1" value="<?php if($er1!=0000-00-00){echo $er1;}else{echo "";} ?>"></td>
          </tr>

          <tr>
            <td class="titform">Protocolo</td>
            <td><input type="date" name="protocolo" id="protocolo" value="<?php if($protocolo!=0000-00-00){echo $protocolo;}else{echo "";} ?>"></td>
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
            <td><input type="date" name="er2t" id="er2t" value="<?php if($er2t!=0000-00-00){echo $er2t;}else{echo "";} ?>"></td>
            <td><input type="date" name="er2" id="er2" value="<?php if($er2!=0000-00-00){echo $er2;}else{echo "";} ?>"></td> 
            <td><input type="text" name="califer2" size="2" value="<?php echo $califer2; ?>"></td>
            <td><section id="valida1"></section></td>
          </tr>
          <tr>
            <td class="titform">ER-2-2</td>
            <td><input type="date" name="er22t" id="er22t" value="<?php if($er22t!=0000-00-00){echo $er22t;}else{echo "";} ?>"></td>
            <td><input type="date" name="er22" id="er22" value="<?php if($er22!=0000-00-00){echo $er22; }else{echo "";}?>"></td>
            <td><input type="text" name="califer22" size="2" value="<?php echo $califer22; ?>"></td>
            <td><section id="valida2"></section></td>
          </tr>
          <tr>
            <td class="titform">ER-3</td>
            <td><input type="date" name="er3t" id="er3t" value="<?php if($er3t!=0000-00-00){echo $er3t;}else{echo "";} ?>"></td>
            <td><input type="date" name="er3" id="er3" value="<?php if($er3!=0000-00-00){echo $er3; }else{echo "";}?>"></td>
            <td><section id="valida3"></section></td>
          </tr>
          <tr>
            <td class="titform">ER-4 SINODAL1</td>
            <td><input type="date" name="er4s1t" id="er4s1t" value="<?php if($er4t!=0000-00-00){echo $er4t; }else{echo "";}?>"></td>
            <td><input type="date" name="er4s1" id="er4s1" value="<?php if($er4!=0000-00-00){echo $er4; }else{echo "";}?>"></td>
            <td><section id="valida4"></section></td>
          </tr>
          <tr>
            <td class="titform">ER-4 SINODAL2</td>
            <td><input type="date" name="er4s2t" id="er4s2t" value="<?php if($er41t!=0000-00-00){echo $er41t;}else{echo "";} ?>"></td>
            <td><input type="date" name="er4s2" id="er4s2" value="<?php if($er41!=0000-00-00){echo $er41; }else{echo "";}?>"></td>
            <td><section id="valida5"></section></td>
          </tr>
          <tr>
            <td class="titform">ER-5 FECHA EXAMEN</td>
            <td><input type="date" name="er5t" id="er5t" value="<?php if($er5t!=0000-00-00){echo $er5t; }else{echo "";}?>"></td>
            <td><input type="date" name="er5" id="er5" value="<?php if($er5!=0000-00-00){echo $er5; }else{echo "";}?>"></td>
            <td><section id="valida6"></section></td>
          </tr>
          <tr>
            <td class="titform">ER-6</td>
            <td><input type="text" name="er6" id="er6" value="<?php echo $er6; ?>"></td>
          </tr>
          <tr>
            <td class="titform">Calificación</td>
            <td><input type="text" name="calificacion" id="calificacion" value="<?php echo $calificacion; ?>"></td>
          </tr>
        </table>
        <?php }else{ ?>

<table class="tabla_form">
          <tr>
            <td class="titform">Fecha Examen</td>
            <td><input type="text" name="protocolo" id="protocolo" value="<?php if($protocolo!=0000-00-00){echo $protocolo;}else{echo "";} ?>"></td>
          </tr>
          <tr>
            <td class="titform">Calificación</td>
            <td><input type="text" name="calificacion" id="calificacion" value="<?php echo $calificacion; ?>"></td>
          </tr>
        </table>
        <?php } ?>
        </section>
      <input name="guardamonto" id="guardamonto" src="../../../Imagenes/alumnos/guardar.png" type="image"/>
    </form>
        <section id="result4"></section>
  </fieldset>
</section>
 <?php 
   $resul=mysql_query("SELECT count( * ) FROM `formulario2_er` WHERE `matricula` ='$matricula'");
   $cuenta=mysql_result($resul, 0);
  if($cuenta==1){?>
      
      <p align="right"><a href="primeraIns.php? matricula=<?php echo $matricula;?>" target="_self"><legend class="legendform">Primera Inscripción</legend></a></p>

<?php } ?>


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
