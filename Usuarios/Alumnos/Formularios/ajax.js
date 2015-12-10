function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
  		}
	}

	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}


/*
function formulario(mat){
	divContenido = document.getElementById('res');
	ajax=objetoAjax();
	ajax.open("GET", "genera_cuota_recuperacion.php?matricula="+mat);
	divContenido.innerHTML= '<img src="../../Imagenes/anim.gif">';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divContenido.innerHTML = ajax.responseText
		}
	}
	ajax.send(null)
}*/


function Cargar() {
    mat = document.getElementById('s09013861').value;
    c = document.getElementById('resultadodecuota');
    ajax = Cargar();
    ajax.open("GET","genera_cuota_recuperacion.php?matricula="+mat);
    ajax.onreadystatechange = function() {
       if (ajax.readyState == 4) {
           c.innerHTML = ajax.responseText;
       }
    }
    ajax.send(null)
}
 