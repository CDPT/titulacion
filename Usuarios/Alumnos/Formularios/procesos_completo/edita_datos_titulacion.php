<?php session_start(); if($_SESSION['estatus']=='1'){ ?>
<!-- Autor: Víctor Javier Báez Morales LSCA-->
<section id="limpiar" name="limpiar">
			<head>
			<style type="text/css">
				#resultado_positivo{
					background:#bbfd6c;
					color: #46780a;
					padding: 0px 0px 10px 0px;
					font-size:19px;
				}

				#mensaje_error{
					background:#fdfb4f;
					color: #fd0404;
					padding: 0px 0px 10px 0px;
					font-size:19px;
				}
			</style>
			</head>
			

			<?php
			include("../../../../Scripts/conexion.php");
			//print $matricula=$_POST['matricula']; 
			$matricula=$_SESSION['matricula'];
			$periodo_tit=$_POST['periodo_tit'];
			$titulotrab=strtoupper($_POST['titulotrab']);
			$modalidad=$_POST['modalidad'];
			$director=$_POST['director'];
			$sinprop1=$_POST['sinprop1'];
			$sinprop2=$_POST['sinprop2'];
			$sinsup1=$_POST['sinsup1'];
			$sinsup2=$_POST['sinsup2'];
			$fechaexam=$_POST['fechaexam'];
			$horaexam=$_POST['horaexam'];
			$salon=$_POST['salon'];
			




			$edicion=mysql_query("UPDATE formulario SET 
			periodo_tit	= '$periodo_tit',
			titulotrab = '$titulotrab',
			modalidad =  '$modalidad',
			director = '$director',
			sinprop1 = '$sinprop1',
			sinprop2 = '$sinprop2',
			sinsup1 = '$sinsup1',
			sinsup2 = '$sinsup2',
			horaexam = '$horaexam',
			fechaexam = '$fechaexam',
			salon = '$salon'
			WHERE matricula='$matricula' ") or die("No se Puedo Guardar, Consulte ".mysql_error());

			if($edicion){  ?>
			      <section id="resultado_positivo">	
				      Se guardo correctamente
			           <img src="../../../Imagenes/exito.png" />
			       </section>
			  <?php } 	?>
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

