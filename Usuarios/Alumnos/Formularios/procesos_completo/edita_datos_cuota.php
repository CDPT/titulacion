<?php session_start(); if($_SESSION['estatus']=='1'){ ?>

<!-- Autor: Víctor Javier Báez Morales LSCA-->	
<section id="limpiar" name="limpiar">
		<style type="text/css">
			#resultado_positivo{
				background:#bbfd6c;
				color: #46780a;
				padding: 0px 0px 10px 0px;
				font-size:19px;
			}
		</style>
		
				<?php
				include("../../../../Scripts/conexion.php");

				//$matricula=$_REQUEST['matricula']; 
				$matricula=$_SESSION['matricula'];
				$concepto=strtoupper($_POST['concepto']);
				$montotot=$_POST['montotot'];
				//$cuotas=$_POST['cuotas'];

				$edicion=mysql_query("UPDATE formulario_cat SET 
				concepto = '$concepto',
				montotot  = '$montotot'
				WHERE matricula = '$matricula'") or die("No se Puedo Guardar, Consulte ".mysql_error());

				if($edicion){ ?>
							<section id="resultado_positivo">
								Se guardo correctamente
								<img src="../../../Imagenes/exito.png" />
					        </section>
				<?php }  ?>  

</section>


<script>
	function r() { 
		document.getElementById("limpiar").innerHTML=" ";
	}
		setTimeout ("r()", 2000); //Parametro de timpo.
</script>


<?php
}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=("../../../index.html? var=0");
  </script>
<?php } ?>