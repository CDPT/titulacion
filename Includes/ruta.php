<?php 
$servidor=$_SERVER['SERVER_NAME'];
$ruta='http://'.$servidor.'/Titulacion/';

if($_SESSION['estatus']=='1'){ 


}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=("<?php print $ruta; ?>index.html");
  </script>
<?php } ?>				
