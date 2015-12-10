<?php session_start(); if($_SESSION['estatus']=='1'){ ?>
<!DOCTYPE html>

<html>

<head>


<link rel="stylesheet" href="../../Scripts/calendario/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript" src="../../Scripts/calendario/jquery-ui.js"></script>
<script type="text/javascript" src="../../Scripts/calendario/jquery-idioma.js"></script>

<script>
  $(function() {
    $("#periodo_inicio").datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      changeYear: true,
      onClose: function( selectedDate ) {
        $("#periodo_fin").datepicker( "option","minDate",selectedDate);
      }
    });
    $("#periodo_fin").datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      changeYear: true,
      onClose: function( selectedDate ) {
        $("#periodo_inicio").datepicker("option","maxDate",selectedDate);
      }
    });
  });
  </script>



	<style type="text/css">


		#ambiente{
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


		#ventana{
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


		#cierra_ventana{
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

		tr {
			padding: 0px 0px 10px 0px;
			margin-bottom: 40px;
		}

		.campotext{
			width:200px;
			height:25px;
			margin-bottom:10px;
		}

		.boton{
			width:250px;
			height:30px;
			margin-top:10px;
		}
	</style>


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

			$("#activa_ventana").click(function(){
				$("#ambiente,#ventana").css("display", "block");

			});

			$("#cierra_ventana").click(function(){
				$("#ambiente,#ventana").css("display", "none"); 

			});

			$("#ambiente").click(function(){
				$("#ambiente,#ventana").css("display", "none"); 
			});	
		});
	</script>
</head>

<body>

		<section id="ambiente" title="Cierra Ventan" alt="Cerrar">
			</section>

				<section id="ventana">

					<section id="imagenmaestro">
						<img src="../../Imagenes/agrega_usuario.png" width="90px" height="90px"/>
					</section>


					<section id="cierra_ventana">
						<img src="../../Imagenes/error.png" class="btn_close" title="Cierra Ventan" alt="Cerrar" />
					</section>

<form id="form1" name="form1" method="post" action="guarda_usuario.php">

	<table>
		<tr id="fil">
			<td>Nombre</td>
			<td><input type="text" class="campotext" name="nombre" maxlength="30" required /></td>
		</tr>
		
		<tr id="fil">
			<td>Usuario</td>
			<td><input type="text" class="campotext" name="usuario" maxlength="15" required/></td>
		</tr>

		
    	<tr id="fil">
			<td>Password</td>
			<td><input type="text" class="campotext" name="pass" id="pass" maxlength="10" required/></td>
		</tr>


		<tr id="fil">
			<td>Tipo</td>
			<td>
				<select name="tipo" id="tipo" required>
					<option value=""></option>
					<option value="Administrador">Administrador</option>
					<option value="Usuario">Usuario</option>
				</select>
			</td>
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
    document.location.href=("../../index.html");
  </script>
<?php } ?>