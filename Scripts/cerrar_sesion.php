<?php session_start(); session_destroy();
 $sistema=$_GET['sistema'];?>

<script type="text/javascript">
<?php if ($sistema=="CAT"){ ?>
	document.location.href=("../cat.html");
<?php }elseif($sistema=="EXP"){ ?>
	document.location.href=("../experiencia.html");
<?php }elseif ($sistema=="JEFE"){ ?>
	document.location.href=("../jefes.html");
<?php } ?>
</script>