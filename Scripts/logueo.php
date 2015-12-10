<?php
include ('conexion.php');  error_reporting(0); ?>
	<script type="text/javascript" src="modernizr262.js"></script>
<meta charset="utf-8">
<style type="text/css">
	.error{
		position: fixed;
		width: 100%;
		height: 100px;	
		text-align: center;
		background-color: rgba(255,3,3,.5);
		color: #fff;
		top:40%;
	}
</style>

<?php
$usuario=$_POST["usuario"];
$password=$_POST["password"];
$tipo=$_POST["tipo"];
$clave=filter_var($password, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
$var=sha1('aezakmi');
$passmd5=sha1("{$clave}:{sha1($var)}").":".sha1(base64_encode($var))."";



if($usuario=="" || $password==""){
  	# print "Usuario y Password Vacio";
}else{

	$consulta = mysql_query("SELECT * FROM usuarios WHERE usuario='$usuario' AND password='$passmd5' AND tipoinstitucion='$tipo' ") or die("No fue posible la consulta");
$numero=mysql_num_rows($consulta);

if ($numero!='0') {
//echo $numero. ' numero ';
$fila = mysql_fetch_array($consulta);
			$id_usuario=$fila['id_usuario'];
			$privilegios=$fila['tipo'];
			$usu=$fila['usuario'];
			$pass=$fila['password'];
			$nick=$fila['nick'];
			$estatus=$fila['estatus'];
			//$tipo=$fila['tipoinstitucion'];

if($estatus=='1'){
	if($tipo=='CAT'){
		session_start();
			switch($privilegios){

				case "Administrador":
					$_SESSION['nick']=$nick;
					$_SESSION['estatus']=$estatus;
					$_SESSION['usu']=$usu;
					?>
					<script type="text/javascript">
						document.location.href=("Administrador/index.php");
					</script>	
				    <?php			
				break;

				case "Usuario":
					$_SESSION['nick']=$nick;
					$_SESSION['estatus']=$estatus;
			?>
					<script type="text/javascript">
						document.location.href=("Usuarios/index.php");
					</script>	
			<?php				
				break;
			}


	}elseif($tipo=='EXP'){
		session_start();
			switch($privilegios){
				case "Administrador":
					$_SESSION['nick']=$nick;
					$_SESSION['estatus']=$estatus;
					$_SESSION['usu']=$usu;
					?>
					<script type="text/javascript">
						document.location.href=("Experiencia/index.php");
					</script>	
			<?php			
				break;
			}

	}elseif($tipo=='JEFE'){	
		session_start();
			switch($privilegios){
				
				case "Administrador":
					$_SESSION['nick']=$nick;
					$_SESSION['estatus']=$estatus;
					$_SESSION['usu']=$usu; 
					?>
					<script type="text/javascript">
						document.location.href=("JefesCarrera/index.php");
					</script>	
				<?php			
				break;
				
			}
	}		




	}else{ ?>	


	<section id="err">
		<section class="error"><section class="">Usuario Incorrecto</section></section>
	</section>

<script>
	function r(){ document.getElementById("err").innerHTML=" ";}
		setTimeout ("r()", 2000);
</script>

<?php	}

}else{ ?>

 <section id="err"><section class="error">Usuario Incorrecto</section></section>
<script>
	function r(){document.getElementById("err").innerHTML=" ";}
		setTimeout ("r()", 2000); 
</script>

<?php } 

mysql_free_result($consulta);
}
mysql_close();
 ?>
<script type="text/javascript">
/*
	$(".error").css({"background":"rgba(255,3,3,.5)",
					 "position":"fixed",
					 "width":"100%",
					 "height":"100px",
					 "text-align":"center",
					 "color":"#fff",
					 "top":"40%"  });*/
$(".error").animate({
			//height:"toggle",
			opacity:"toggle",
	        duration:"slow"},3000);

</script>
