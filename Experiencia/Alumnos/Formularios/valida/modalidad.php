<?php session_start(); if($_SESSION['estatus']=='1'){ ?>
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
    dateFormat: 'yy-mm-dd',
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ''};
  $.datepicker.setDefaults($.datepicker.regional['es']);
});    

$(document).ready(function(){
   $("#er1,#protocolo, #er2t, #er2, #er22t, #er22, #er3t, #er3, #er4s1t, #er4s1, #er4s2t, #er4s2, #er5t, #er5").datepicker({
    changeMonth: true 
    });
});
    </script>
<? 
$modalidad=$_GET['f1'];

include("../../../../Scripts/conexion.php");
$consula_calif=mysql_query("SELECT * FROM formulario_er WHERE matricula='$matricula' ");

$fila=mysql_fetch_array($consula_calif);
$calificacion=$fila['calificacion'];
$inscripcion=$fila['inscripcion'];
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
if($modalidad=="Trabajo" || $modalidad=="") {

?>
<table class="tabla_form">
          <tr>
            <td class="titform">ER-1</td>
            <td><input type="text" name="er1" id="er1" value="<? if($er1!=0000-00-00){echo $er1;}else{echo "";} ?>"></td>
          </tr>

          <tr>
            <td class="titform">Protocolo</td>
            <td><input type="text" name="protocolo" id="protocolo" value="<? if($protocolo!=0000-00-00){echo $protocolo;}else{echo "";} ?>"></td>
          </tr>
          <tr>
            <th></th>
            <th class="titform" colspan="2" style="text-align:center;">FECHAS</th>
          </tr>
          <tr>
            <td></td>
            <td class="titform" align="center">Tentativa</td>
            <td class="titform" align="center">Entrega</td>
          </tr>
          <tr>
            <td class="titform">ER-2</td>
            <td><input type="text" name="er2t" id="er2t" value="<? if($er2t!=0000-00-00){echo $er2t;}else{echo "";} ?>"></td>
            <td><input type="text" name="er2" id="er2" value="<? if($er2!=0000-00-00){echo $er2;}else{echo "";} ?>"></td> 
            <td><section id="valida1"></section></td>
          </tr>
          <tr>
            <td class="titform">ER-2-2</td>
            <td><input type="text" name="er22t" id="er22t" value="<? if($er22t!=0000-00-00){echo $er22t;}else{echo "";} ?>"></td>
            <td><input type="text" name="er22" id="er22" value="<? if($er22!=0000-00-00){echo $er22; }else{echo "";}?>"></td>
            <td><section id="valida2"></section></td>
          </tr>
          <tr>
            <td class="titform">ER-3</td>
            <td><input type="text" name="er3t" id="er3t" value="<? if($er3t!=0000-00-00){echo $er3t;}else{echo "";} ?>"></td>
            <td><input type="text" name="er3" id="er3" value="<? if($er3!=0000-00-00){echo $er3; }else{echo "";}?>"></td>
            <td><section id="valida3"></section></td>
          </tr>
          <tr>
            <td class="titform">ER-4 SINODAL1</td>
            <td><input type="text" name="er4s1t" id="er4s1t" value="<? if($er4t!=0000-00-00){echo $er4t; }else{echo "";}?>"></td>
            <td><input type="text" name="er4s1" id="er4s1" value="<? if($er4!=0000-00-00){echo $er4; }else{echo "";}?>"></td>
            <td><section id="valida4"></section></td>
          </tr>
          <tr>
            <td class="titform">ER-4 SINODAL2</td>
            <td><input type="text" name="er4s2t" id="er4s2t" value="<? if($er41t!=0000-00-00){echo $er41t;}else{echo "";} ?>"></td>
            <td><input type="text" name="er4s2" id="er4s2" value="<? if($er41!=0000-00-00){echo $er41; }else{echo "";}?>"></td>
            <td><section id="valida5"></section></td>
          </tr>
          <tr>
            <td class="titform">ER-5 FECHA EXAMEN</td>
            <td><input type="text" name="er5t" id="er5t" value="<? if($er5t!=0000-00-00){echo $er5t; }else{echo "";}?>"></td>
            <td><input type="text" name="er5" id="er5" value="<? if($er5!=0000-00-00){echo $er5; }else{echo "";}?>"></td>
            <td><section id="valida6"></section></td>
          </tr>
          <tr>
            <td class="titform">ER-6</td>
            <td><input type="text" name="er6" id="er6" value="<? echo $er6; ?>"></td>
          </tr>
          <tr>
            <td class="titform">Calificación</td>
            <td><input type="text" name="calificacion" id="calificacion" value="<? echo $calificacion; ?>"></td>
          </tr>
        </table>
        <? }else{ ?>

<table class="tabla_form">
          <tr>
            <td class="titform">Fecha Examen</td>
            <td><input type="text" name="protocolo" id="protocolo" value="<? if($protocolo!=0000-00-00){echo $protocolo;}else{echo "";} ?>"></td>
          </tr>
          <tr>
            <td class="titform">Calificación</td>
            <td><input type="text" name="calificacion" id="calificacion" value="<? echo $calificacion; ?>"></td>
          </tr>
        </table>
        <? } ?>

        <?php
}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=("../../../index.html? var=0");
  </script>
<?php } ?>