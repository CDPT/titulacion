<?php if($_SESSION['estatus']=='1'){ ?>

<label class="bienvenida"><?php print "Bienvenido Administrador: ".$_SESSION['nick']; ?></label>

<a class="salir" onClick="salir()">Salir</a> 



<script type="text/javascript">
function salir(){
    if(confirm("Desea Salir")){
        document.location.href=("<?php print $ruta; ?>Scripts/cerrar_sesion.php?sistema=<?php print $sistema; ?>");
    }
}
</script>


<?php
}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=(<?php print $ruta; ?>"index.html");
  </script>
<?php } ?>				