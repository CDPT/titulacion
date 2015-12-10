<?php session_start(); if($_SESSION['estatus']=='1'){ ?>
<!DOCTYPE html>

<html>

<head>
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
			background:#e6e6e4;
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

		#imagenmaestro{
			position: absolute;
			
			top:-60px;
		}

		table {
			margin-top:50px;

		}

		.campotext{
			width:250px;
			height:25px;
		}

		.boton{
			width:250px;
			height:30px;
			margin-top:10px;
		}


	</style>

	<script type="text/javascript">
		$(document).ready(function(){

			$("#activa_ventana2").click(function(){
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

		<section id="ambiente2" title="Cierra Ventan" alt="Cerrar">
			</section>

				<section id="ventana2">

					<section id="imagenmaestro">
						<img src="../../../Imagenes/cursos.png" width="90px" height="90px"/>
					</section>


					<section id="cierra_ventana2">
						<img src="../../../Imagenes/error.png" class="btn_close" title="Cierra Ventan" alt="Cerrar" />
					</section>

<form id="form1" name="form1" method="post" action="procesos_completo/guarda_grupo.php? matricula=<?php print $matricula ?>">

	<table>
		<tr id="fil">
			<td>Nombre del Grupo</td>
			<td><input type="text" class="campotext" name="nombre" maxlength="20" required /></td>
		</tr>
<!--
		<tr>
			<td>Titular</td>
			<td><input type="text" name="titular"  maxlength="10"/></td>
		</tr>-->
		
		<tr id="fil">
			<td>Capacidad</td>
			<td><input type="text" class="campotext" name="capacidad" onkeyUp="return ValNumero(this);" maxlength="4" required/></td>
		</tr>

		
    	<tr id="fil">
			<td>Periodo Inicio</td>
			<td><input type="text" class="campotext" name="periodo_inicio" id="periodo_inicio" maxlength="10" required/></td>
		</tr>


		<tr id="fil">
			<td>Periodo Fin</td>
			<td><input type="text" class="campotext" name="periodo_fin" id="periodo_fin" maxlength="10" required/></td>
		</tr>
				

		<tr id="fil">
			<td></td>
			<td><input class="boton" type="submit" value="Guardar"/></td>
		</tr>

	</table>


</form>

						<section id="result9"></section>

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