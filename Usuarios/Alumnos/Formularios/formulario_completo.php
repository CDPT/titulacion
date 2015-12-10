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

  
  <?php $sistema="CAT"; include('../../../Includes/ruta.php'); include('../../../Includes/title.php');  ?>
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

$matricula=$_POST['matricula'];

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
$consulta_salon=mysql_query("SELECT * FROM  cat_salon WHERE order by no_salon");
$consulta_profesor=mysql_query("SELECT * FROM cat_profesor order by nombre");
$consulta_sinp1=mysql_query("SELECT * FROM cat_profesor order by nombre");
$consulta_sinp2=mysql_query("SELECT * FROM cat_profesor order by nombre");
$consulta_sins1=mysql_query("SELECT * FROM cat_profesor order by nombre");
$consulta_sins2=mysql_query("SELECT * FROM cat_profesor order by nombre");
$consulta_grupo=mysql_query("SELECT * FROM grupos_cat ");
$periodo=mysql_query("SELECT * FROM periodo_cat order by periodo");


/* consultas para extraer los registros de formulario*/

$consulta_dir=mysql_query("SELECT * FROM formulario WHERE matricula='$matricula' ");
$consulta_sin1=mysql_query("SELECT * FROM formulario WHERE matricula='$matricula' ");
$consulta_sin2=mysql_query("SELECT * FROM formulario WHERE matricula='$matricula' ");
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










class accion{
    public function extrmaestro(){
      $consulta5=mysql_query("SELECT * FROM cat_profesor order by nombre");
      while($fila5=mysql_fetch_array($consulta5)){
              $nom5=$fila5['nombre'];
              $pat5=$fila5['apellido_paterno'];
              $mat5=$fila5['apellido_materno'];
              $director5=$nom5." ".$pat5." ".$mat5;
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
<?php include ('../../../Menus/menu_usuarios.php'); ?>
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
#rojo{
  color:red;
}

</style>
<?php
  include("VentanaMod.html");
include("VentanaGrupo.php");
include("VentanaPeriodo.html");

 ?>
 <section id="activa_ventana3" title="Agregar Periodo">
    <img src="../../../Imagenes/agregaperiodo.png" >
  </section>

 <section id="activa_ventana" title="Agregar Maestro">
    <img src="../../../Imagenes/maestros/agregar_maestro.png" >
  </section>

  <section id="activa_ventana2" title="Agregar Grupo">
    <img src="../../../Imagenes/agregagrupo.png" >
  </section>

 
<!--/* pestañas */-->
<!--
<a href="procesos_completo/formato_agrega_maestro.php? matricula=<?php print $matricula ?>">
  <section id="engloba_pestana">
    <img src="../../Imagenes/maestros/agregar_maestro.png" >
  </section>
</a>
-->


		<section id="engloba_cuerpo">
			<section id="cuerpo">
				

<?php

$matricula=$_REQUEST['matricula'];

$consulta_matricula="SELECT * FROM formulario WHERE matricula='$matricula'";
$compara_matricula=mysql_query($consulta_matricula) or die ("no se pudo");
$cons=mysql_num_rows($compara_matricula);




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


$consulta_salon=mysql_query("SELECT * FROM  cat_salon WHERE estado='1' order by no_salon");

$consulta_profesor=mysql_query("SELECT * FROM cat_profesor order by nombre");

$consulta_sinp1=mysql_query("SELECT * FROM cat_profesor order by nombre");

$consulta_sinp2=mysql_query("SELECT * FROM cat_profesor order by nombre");

$consulta_sins1=mysql_query("SELECT * FROM cat_profesor order by nombre");

$consulta_sins2=mysql_query("SELECT * FROM cat_profesor order by nombre");

$consulta_grupo=mysql_query("SELECT * FROM grupos_cat WHERE estado='1' order by nombre_grupo");

$periodo=mysql_query("SELECT * FROM periodo_cat WHERE estado='1' order by periodo");

?>








<form method="post" id="regresar" action="../panel_alumno.php">
  <input type="hidden" value="<?php print $matricula; ?>" name="matricula">
  <input type="hidden" value="<?php print $nombre; ?>" name="nombre">
  <input type="hidden" value="<?php print $apepat; ?>" name="apepat">
  <input type="hidden" value="<?php print $apemat; ?>" name="apemat">
  <input type="hidden" value="<?php print $carrera; ?>" name="carrera">

  <input type="image" src="../../../Imagenes/regresar.png" type="image" value="Regresar"/>
</form>




<section id="titformulintro">
  REGISTRO DE ALUMNO
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


<fieldset id="fieldset_datos">
  <legend id="legend3" class="legendform">Datos de Curso</legend>
    <form id="formuldatos3" style="display:none" action="procesos_completo/edita_datos_cursos.php? matricula=<?php print $matricula?>">
          <table class="tabla_form">

<tr>
  <td></td>
  <td></td>
  <td class="titform">Disponibles</td>
</tr>
            <tr>
              <td class="titform">Grupo</td>

              <td>
                <select class="selectopcion" name="grupo" id="grupo">
                  <option></option>
                  <?php
                   $gru=mysql_fetch_array($consulta_grupo2);
                   $grup=$gru['grupo'];
                    while($fila_grupo=mysql_fetch_array($consulta_grupo)){
                     $grupo=$fila_grupo['nombre_grupo'];
                     if ($grup==$grupo) {?>
                       <option value="<?php print $grupo ?>" selected><?php print $grupo ?></option>
                     <?php }else{ ?>
                    <option value="<?php print $grupo ?>"><?php print $grupo ?></option>
                  <?php } } ?>
                </select>
              
              </td>
              <td id="desponibilidad" name="desponibilidad"></td>

            </tr>


        <tr>
          <td class="titform">Estatus</td>
          <td>
            <select class="selectopcion" class="textform" name="estatus" id="estatus" >
              <?php
             $es=mysql_fetch_array($consulta_estatus);
               $estad=$es['estatus'];
              ?>
                <option value="<?php  print $estad ?>"><?php  print $estad ?> </option>
                <option value="ESTUDIANTE">ESTUDIANTE</option>
                <option value="EGRESADO">EGRESADO</option>
            </select>
          </td>
        </tr>


        <tr>
          <td class="titform">Estado</td>
          <td>
            <select class="selectopcion" class="textform" name="estado" id="estado" >
              <?php
                $est=mysql_fetch_array($consulta_estado);
                $esta=$est['estado'];   
                $monto=$est['montotot'];
               ?>
                <option value="<?php print $esta; ?>"><?php  print $esta; ?></option>
                <option  value="CURSO">CURSO</option>
                <option  value="TITULADO">TITULADO</option>
            </select></td> 
          </tr>



              <tr>
                <td class="titform">Cuota de Recuperación</td>
              <td id="resultadodecuota">
                <section id="resultadodecuota" name="resultadodecuota"></section>
               
                <section id="res"><?php include("procesos_completo/genera_cuota_recuperacion.php"); ?></section>
                

              <?php
              /*
                $consulta78=mysql_query("SELECT * FROM pagos_cat WHERE matricula='$matricula'") or die("No se puede ejecutar consulta");
                            !@$total==0;
                            while($fila78= mysql_fetch_array($consulta78)){
                                 $importe=$fila78['monto_pago'];
                                 $total=$total+$importe."<br>";
                                }
                                $deve=$monto-$total;
                          $avance= $total * 100 / $monto;
                       if($avance < 100 ){
                    ?>
                      <section id="result_deudor">
                        Deudor de <?php print $deve ?>
                      </section>
                <?php }else{ ?>
                       <section id="result_pagado">
                        Pagado al 100%
                      </section>
                <?php } */ ?>      

               </td>
            </tr>

          </table>

          <input src="../../../Imagenes/alumnos/guardar.png" type="image"/>
      </form>
      <section id="result3"></section>
</fieldset>





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
                    var dir = $("#director").find(':selected').val();
                    var prop1= $("#sinprop1").find(':selected').val();
                    var prop2= $("#sinprop2").find(':selected').val();
                    var sup1= $("#sinsup1").find(':selected').val();
                    var sup2= $("#sinsup2").find(':selected').val();
                    $("#valida_sum_dir").load('valida/valida_suma_director.php?mat='+matricula+'&periodo='+periodo+"&dir="+dir+"&prop1="+prop1+"&prop2="+prop2+"&sup1="+sup1+"&sup2="+sup2);
                });

                $("#sinprop1").change(function(event){
                    var matricula = $("#matricula").val();
                    var periodo = $("#periodo_tit").find(':selected').val();
                    var dir = $("#director").find(':selected').val();
                    var prop1 = $("#sinprop1").find(':selected').val();                   
                    var prop2= $("#sinprop2").find(':selected').val();
                    var sup1= $("#sinsup1").find(':selected').val();
                    var sup2= $("#sinsup2").find(':selected').val();
                    $("#valida_sum_prop1").load('valida/valida_suma_prop1.php?mat='+matricula+'&periodo='+periodo+"&dir="+dir+"&prop1="+prop1+"&prop2="+prop2+"&sup1="+sup1+"&sup2="+sup2);
                });

                $("#sinprop2").change(function(event){
                    var matricula = $("#matricula").val();
                    var periodo = $("#periodo_tit").find(':selected').val();
                    var dir = $("#director").find(':selected').val();
                    var prop1 = $("#sinprop1").find(':selected').val();
                    var prop2 = $("#sinprop2").find(':selected').val();
                    var sup1= $("#sinsup1").find(':selected').val();
                    var sup2= $("#sinsup2").find(':selected').val();
                    $("#valida_sum_prop2").load('valida/valida_suma_prop2.php?mat='+matricula+'&periodo='+periodo+"&dir="+dir+"&prop1="+prop1+"&prop2="+prop2+"&sup1="+sup1+"&sup2="+sup2);
                });

                $("#sinsup1").change(function(event){
                    var matricula = $("#matricula").val();
                    var periodo = $("#periodo_tit").find(':selected').val();
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
<input type="hidden" name="matricula" value="<?php print $matricula; ?>">
        <tr>
          <td class="titform">Periodo de Titulación</td>
          <td>
            <select class="selectopcion"  name="periodo_tit" id="periodo_tit" >
              <option></option>
            <?php
               $per=mysql_fetch_array($consulta_periodo);
               $peri=$per['periodo_tit'];
               $con_per=mysql_query("SELECT * FROM periodo_cat WHERE id_periodo='$peri'");
               $pet=mysql_fetch_array($con_per);
               $id_period=$pet['id_periodo'];   

             while($fila_periodo=mysql_fetch_array($periodo)){
               $perio=$fila_periodo['periodo'];
               $id_perio=$fila_periodo['id_periodo'];
               if ($id_period==$id_perio) { ?>
                 <option value="<?php print $id_perio ?>" selected><?php print $perio; ?> </option> 
             <?php  }else{ ?>
              <option value="<?php print $id_perio ?>"><?php print $perio; ?> </option> 
            <?php
              } }
             ?>
              </select> 
          </td>

        </tr>

            <tr>
              <td class="titform">Título de Trabajo</td>
              <td>
                <?php
                  $tit=mysql_fetch_array($consulta_titulo);
                  $titulotrab=$tit['titulotrab'];
                ?>
                <input class="textform" type="text" name="titulotrab" id="titulotrab" value="<?php print $titulotrab?>" maxlength="80"></td>
              </tr>


            <tr>
              <td class="titform">Modalidad</td>
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
                <?php
                if ($dire=="rechazado") {
                    echo "<option value='rechazado' selected>Profesor rechazado seleccione otro</option>";
                  }
              	  /*$con=mysql_fetch_array($consulta_dir);
              	  $dire=$con['director'];
                  $pru=explode("-", $dire);*/
          	      $consu=mysql_query("SELECT * FROM cat_profesor WHERE no_personal='$dire' ");
          	      $di=mysql_fetch_array($consu);
          		      	$noperd=$di['no_personal'];
  
                while($fila_profesor=mysql_fetch_array($consulta_profesor)){
          		  $nom=$fila_profesor['nombre'];
                      $pat=$fila_profesor['apellido_paterno'];
                      $mat=$fila_profesor['apellido_materno'];
            	        $director=$nom." ".$pat." ".$mat;
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
	              $co=mysql_query("SELECT * FROM cat_profesor WHERE no_personal='$si1'");
		            $con=mysql_fetch_array($co);
				        $noprosup1=$con['no_personal'];

                while($fil=mysql_fetch_array($consulta_sinp1)){
	               $nom=$fil['nombre'];
                 $pat=$fil['apellido_paterno'];
                 $mat=$fil['apellido_materno'];
	               $dir=$nom." ".$pat." ".$mat;
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
	           $co2=mysql_query("SELECT * FROM cat_profesor WHERE no_personal='$si2'");
		         $con2=mysql_fetch_array($co2);

				     $nosinpro2=$con2['no_personal'];

              while($filap2=mysql_fetch_array($consulta_sinp2)){
	              $nom=$filap2['nombre'];
                $pat=$filap2['apellido_paterno'];
                $mat=$filap2['apellido_materno'];
	              $dir=$nom." ".$pat." ".$mat;
			          $nosin2=$filap2['no_personal'];
                if($nosinpro2==$nosin2){ ?>
                  <option value="<?php print $nosin2 ?>" selected><?php print $dir; if ($pru[1]=="pen" ) {echo "- Pendiente";} ?>
             <?php  }else{ ?>
              <option value="<?php print $nosin2 ?>"><?php print $dir;?>
            <?php } } ?>
             </option>
            </select>
          </td>
          <td id="valida_sum_prop2"></td>
          <td id="valida_prop2"></td>
        </tr>






        <tr>
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
	           $cosu1=mysql_query("SELECT * FROM cat_profesor WHERE no_personal='$sisu1'");
		         $consu1=mysql_fetch_array($cosu1);
				     $nosinsup1=$consu1['no_personal'];

             while($filas1=mysql_fetch_array($consulta_sins1)){
    	        $nom=$filas1['nombre'];
              $pat=$filas1['apellido_paterno'];
              $mat=$filas1['apellido_materno'];
    	        $dir=$nom." ".$pat." ".$mat;
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




        <tr>
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
			       $consup=mysql_query("SELECT * FROM cat_profesor WHERE no_personal='$supl2'");
			       $suples2=mysql_fetch_array($consup);
				     $nosinsup2=$suples2['no_personal'];

              while($filas1=mysql_fetch_array($consulta_sins2)){
	             $nom=$filas1['nombre'];
               $pat=$filas1['apellido_paterno'];
               $mat=$filas1['apellido_materno'];
	             $dir=$nom." ".$pat." ".$mat;
			         $nosin2=$filas1['no_personal'];
               if ($nosinsup2==$nosin2) { ?>
              <option value="<?php print $nosin2 ?>" selected><?php print $dir; if ($pru[1]=="pen" ) {echo "- Pendiente";} ?>  
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
        <tr>
          <td class="titform">Hora Exámen</td>

          <td>
<section id="seccion_hora">  

 <section style="display:<?php if($hora=="00:00:00" || $hora==""){print "none";}else{print "block";} ?>;">
<?php $se=mysql_query("SELECT * FROM horas_exam WHERE id='$hora'")or die(mysql_error());
         $sae=mysql_fetch_array($se);
          $id_hora=$sae['id'];
          $hora_ini=$sae['hora_ini'];
          $hora_fin=$sae['hora_fin'];
          $hor=$hora_ini." - ".$hora_fin;
         ?>
        <input class="textform" type="text" name="horaexam" id="horaexam" value="<?php if($hor!=" - "){print $hor; }?>" maxlength="8" readonly/>
 </section>

</section>        
          </td>

        </tr>
 





        <tr>
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
          </section>
          </td>
          <td id="valida_salon"> </td>
        </tr>
        <section id="verif_disp"> </section>

    </table>
        <section id="observa" name="observa">
          <input src="../../../Imagenes/alumnos/guardar.png" type="image"/>
        </section>
  </form>
  <section id="result2"></section>
</fieldset> 
 



        <script language="JavaScript" type="text/JavaScript">
            $(document).ready(function(){

                $("#concepto").change(function(event){
                    var id = $("#concepto").find(':selected').val();
                    $("#cantidad").load('procesos_completo/genera_monto.php?id='+id);
                });

            });
        </script>


<fieldset id="fieldset_datos">

  <legend id="legend4" class="legendform">Datos de Cuota</legend>
    <form  id="formuldatos4" style="display:none" action="procesos_completo/edita_datos_cuota.php? matricula=<?php print $matricula?>" > 
        <table class="tabla_form">

          <tr>
            <td class="titform">Concepto</td>
            <td>
              <?php
          	    $con=mysql_fetch_array($consulta_concepto);
        	      $id_concepto=$con['concepto'];            	?>
              <select name="concepto" id="concepto"  class="selectopcion" required>
                <option></option>
                <?php 
                  while ($filacuota=mysql_fetch_array($consulta_cuota_tabla)) {
                    $id_cuota=$filacuota['id_cuota'];
                    $concepto_cuota=$filacuota['concepto'];
                    //$monto_cuota=$filacuota[''];
                    if ($id_concepto==$id_cuota) { ?>
                      <option value="<?php print $id_cuota; ?>" selected><?php print $concepto_cuota; ?></option>
                    <?php }else{ ?>
                      <option value="<?php print $id_cuota; ?>"><?php print $concepto_cuota; ?></option>
                    <?php } } ?>

              </select>
              <!--<input class="textform" type="text" name="concepto" id="concepto" value="<?// print $concepto ?>" >-->
            </td>
          </tr>


          <tr>
            <td class="titform">Monto Total</td>

            <td id="cantidad" name="cantidad">

              <?php
                $mon=mysql_fetch_array($consulta_monto);
          	    $monto=$mon['montotot'];
          	  ?>
              <input class="textform" type="text" id="montotot" name="montotot" value="<?php print $monto ?>" readonly />
                  <span id="montotot2" class="message"></span>
              </td>
            </tr>

        </table>
      <input name="guardamonto" id="guardamonto" src="../../../Imagenes/alumnos/guardar.png" type="image"/>
    </form>
        <section id="result4"></section>
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
mysql_free_result($consulta_matricula);
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
    document.location.href=("../../../index.html");
  </script>
<?php } ?>
</html>
