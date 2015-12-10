<!DOCTYPE html>
<html>
<head>
	<meta name="author" content="Víctor Javier Báez Morales">
	<meta charset="utf-8" lang="esp" http-equiv="Content-Type" content="text/html;">
	<meta name="keywords" lang="es" content="CAT, Centro, Apoyo, Titulación">
	<title>Registro Usuario CAT</title>
	<link href="../Estilos/estilo_global.css" rel="stylesheet" type="text/css"/>
	<link href="../Imagenes/iconocat.ico" rel="shortcut icon" />

	<script src="ajax.js" language="javascript"></script>


	<style type="text/css">
			.titulo_registro{
			font-size:20px;
			color: #fff;
			position: relative;
			padding: 5px 0px 0px 0px;
			font-family: Arial, "MS Trebuchet", sans-serif;
		}
			#marco_menu{
				text-align:center;
				padding: 20px 0px 0px 0px;
			}

			.textfil{
				width:250px;
				height:25px;
				font-family: Arial, "MS Trebuchet", sans-serif;
				color: #005baa;
				text-align:center;
				font-size:16px;
				border-radius:5px 5px 5px 5px;
			}

			.lbl{
				font-family: Arial, "MS Trebuchet", sans-serif;
				float:right;
				padding: 10px 20px 10px 0px;
			}

			.boton{
				margin-top:20px;
				padding: 5px 10px 5px 10px;
				
			}

			#resultados{
			position:absolute;
			/*position: static/relative/absolute/fixed;*/
			width:250px;
			float: left;
			margin-left:250px;
			margin-top:-27px;
			text-align:center;
			padding: 5px 0px 0px 5px;
			}

	</style>

</head>

<body  oncontextmenu="return false">

	<section id="global">

		<header id="baner">
				<header id="cabecera">
					<section id="imagenes">
						<section id="imagen_cat">
							<img src="../Imagenes/logocat.png" width="140px" height="150px">
						</section>

						<section id="titulocat">
							Centro de Apoyo a la Titulación
						</section>

			            <section id="imagen_uv">
			            	<img src="../Imagenes/Logouv.png" width="160px" height="150px">
			            </section>  
			        </section>

				</header>  

			        <aside id="engloba_notificacion">
			            <aside id="notificaciones">
						
							<a class="salir" href="../index.php" >Regresar</a> 
						</aside>
					</asid>

			</header>

		<nav id="global_menu">
			<nav id="marco_menu">
				<label class="titulo_registro"> - REGISTRO DE USUARIOS - </label>
			</nav>
		</nav>



		<section id="engloba_cuerpo">


			<section id="cuerpo">
			<form method="post" id="formuldatos" action="guarda_registro.php">
				<table>
					<tr>
						<td>
						<label class="lbl">Introduce tu Nombre completo: </label>
						</td>

						<td>
						<input class="textfil" type="text" name="nombre" id="nombre" required />
						</br>
						</td>
					</tr>

					<tr>
						<td>
							<label class="lbl" >Introduce tu Usuario: </label>
						</td>

						<td>
							<input class="textfil" id="usuario" type="text" name="usuario" onKeyUp="Buscar()"/>
							<section class="resultados" id="resultados"></section>
						</td>

						<td>
							<section class="resultados" id="resultados"></section>
						</td>

					</tr>

					<tr>
						<td>
						<label class="lbl">Introduce tu Password: </label> 
						</td>

						<td>
						<input class="textfil" type="password" name="password" id="password" required /></br>
						</td>
					</tr>

					<tr>
						<td>
						<label class="lbl">Tipo de usuario</label>
						</td>

						<td>
							<select  class="textfil" id="tipo" name="tipo" required>
								<option value=""></option>
								<option value="Usuario">Usuario</option>
								<option value="Usuario">Experiencia</option>
								<!--<option value="Alumno">Alumno</option>-->
							</select>
						</td>
					</tr>
					<tr>
						<td> </td>
						<td>
							<input class="boton" type="submit" value="Registrar"/>
						</td>
					</tr>
				</table>
			</form>
<!--
<div class="input">BUSCAR
  <input type="text" size="40" class="caja" id="valor" onKeyUp="Buscar()" />

</div>
</center>
<div class="resultados" id="resultados">
</div>
-->

	</section>	
			
		
		</section>

	</section>



<footer id="pie_pagina">
	<footer id="pie">

	    <a href="../index.php">Inicio</a> | <a href="../Autores/index.html">Autores</a> | <a href="">Contacto</a> </br>
	    Derechos de Autor © 2012  | Centro de Apoyo a la Titulación
    </footer>
</footer>

</body>

</html>
