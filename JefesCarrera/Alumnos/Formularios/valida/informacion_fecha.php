<?php session_start(); if($_SESSION['estatus']=='1'){ ?>
<!DOCTYPE html>

<html>

<head>
<script language="javascript" src="../../../../Scripts/jquery-1.7.1.min.js"></script>
  <script type="text/javascript" src="../../../../Scripts/jquery-ui.min.js"></script>
<link href="../../../Estilos/estilo_alumno.css" rel="stylesheet" type="text/css"/>

<link rel="stylesheet" type="text/css" href="../../../Estilos/jquery-ui-1.7.2.custom.css" />
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
   $("#fechaconsul").datepicker({
    changeMonth: true 
    });
});
    </script>

	<!--
<script language="javascript" src="../../../../Scripts/jquery-1.7.1.min.js"></script>-->
	<style type="text/css">


		#ambiente2{
			background:#aca5a5;
			filter:alpha(opacity=60);
  			opacity:0.6;
  			position:fixed;
  			/*position: static/relative/absolute/fixed;*/
  			width:100%;
  			height:100%;
  			top:0px;
  			display:none;
  			cursor:pointer;
		}


		#ventana2{
			position: fixed;
			background:#ecf7eb;
			width:500px;
			height:300px;
			left:30%;
			top:30%;
			border:1px solid black;
			display:none;
			border-radius:5px 0px 5px 5px;
			box-shadow:5px 5px 2px #8f8888;
		}


		#cierra_ventana2{
			cursor:pointer;
			/*margin:right;*/
			float:right;
			margin-top:-16px;
			margin-right:-16px;
		}

		#imagenmaestro2{
			position: absolute;
			
			top:-60px;
		}

		table {
			margin-top:50px;

		}

		.campotext2{
			width:250px;
			height:25px;
		}

		.boton2{
			width:250px;
			height:30px;
			margin-top:10px;
		}


	</style>

	<script type="text/javascript">
		$(document).ready(function(){

			$("#activa_informacion").click(function(){
				//alert("hoa");
				$("#ambiente2,#ventana2").css("display", "block");

			});

			$("#cierra_ventana2").click(function(){
				$("#ambiente2,#ventana2").css("display", "none"); 
			});

			$("#ambiente2").click(function(){
				$("#ambiente2,#ventana2").css("display", "none"); 
			});	

/*

				    $().ajaxStart(function() {
				        $('#result').hide();
				    }).ajaxStop(function() {
				        $('#result').fadeIn('slow');
				    });

				    $('#formguardamaes').submit(function() {
				        $.ajax({
				            type: 'POST',
				            url: $(this).attr('action'),
				            data: $(this).serialize(),
				            success: function(data) {
				                $('#result').html(data);
				            }
				        })
				        return false;
				    }); 	*/		

		});
	</script>
</head>

<body>
	<!--

		<section id="ambiente2" title="Cerrar" alt="Cerrar">
			</section>-->

				<section id="ventana2">

					<section id="imagenmaestro2">
						<img src="../../../../Imagenes/periodos.png" width="90px" height="90px"/>
					</section>


					<section id="cierra_ventana2">
						<img src="../../../../Imagenes/error.png" class="btn_close" title="Cerrar" alt="Cerrar" />
					</section>


        <script language="JavaScript" type="text/JavaScript">
            $(document).ready(function(){

                $("#fechaconsul").change(function(event){
                   var fecha = $("#fechaconsul").val();
                $("#cargafechas").load('cambiafecha.php?fech='+fecha);                   
                }); 


            });
        </script>


					<table>
							<tr>
								<td></td>
							<!--	<td>Fecha</td>
								<td>
									<input type="text" class="campotext2" id="fechaconsul" name="fechaconsul">
								</td>-->
							</tr>
							<td></td>
							<td></td>							
					</table>


						<center>  Alumnos ya Inscritos  </center> 




				<section id="cargafechas" name="cargafechas"> </section>
						<table class="tablesorter" name="agreg_maestro2">

							<tr>
								<td class="titbuscar">Matricula</td>
								<td class="titbuscar">Fecha</td>
								<td class="titbuscar">Hora</td>
								<td class="titbuscar">Salon</td>
								<!--<td>Nombre</td>
								<td>Apellido Paterno</td>
								<td>Apellido Materno</td>-->
							</tr>
<?php
//print "esta".$fecha=$_SESSION['fecha'];
//$consul="SELECT * FROM alumno INNER JOIN formulario ON alumno.matricula=formulario.matricula WHERE formulario.matricula like '%$bus%' ";
					$con=mysql_query("SELECT * FROM formulario WHERE fechaexam='$fecha' ")or die("no se pude");
						while ($fila=mysql_fetch_array($con)) {
							$mat=$fila['matricula'];
							$fe=$fila['fechaexam'];
							$ho=$fila['horaexam'];
							$sal=$fila['salon'];
 ?>						  <tbody class="cont_tabla">
							<tr>
								<td  class="textfiltab"><?php print $mat; ?></td>
								<td  class="textfiltab"><?php  print $fe; ?></td>
								<td  class="textfiltab"><?php if($ho=='00:00:00'){ print "";}else{ print $ho; } ?></td>
								<td  class="textfiltab"><?php print $sal; ?></td>
								<!--<td><?php //print $mat; ?></td>
								<td><?php //print $ho; ?></td>
								<td><?php //print $ho; ?></td>-->
							</tr>	
							</tbody>
							<?php } ?>						
							</tr>

						</table>
			<!--	</section>-->






				</section>
			
</body>


</html>




<?php
}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=("../../../index.html? var=0");
  </script>
<?php } ?>