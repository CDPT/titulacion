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

/************logueo****************/
function boton_login(){
   var us = document.getElementById('usuario').value; 
   var pw = document.getElementById('password').value; 
    ajax = objetoAjax();
     ajax.open("POST", "scripts/logueo.php",true);
    document.getElementById('transaccion').innerHTML='<table><tr><td><img src="imagenes/loading.gif" width="40px"></td></tr></table>'; 
       ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
        result = ajax.responseText;
       document.getElementById('transaccion').innerHTML = result;
        }
    }
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("usuario="+us+"&password="+pw);        
}

/*************************** Usuarios ****************************/
function editusuario(permiso,id){
    ajax = objetoAjax();
     ajax.open("POST", "edita_permiso.php",true);
       ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
        result = ajax.responseText;
       document.getElementById('transaccion').innerHTML = result;
       location.reload();
        }
    }
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("permiso="+permiso+"&id="+id);        
}


function elimusuario(id){
if (confirm("¿Desa Eliminarlo?")) {    
//   var id = document.getElementById('usuario').value; 
  // var pw = document.getElementById('password').value; 
    ajax = objetoAjax();
     ajax.open("POST", "elimina_usuario.php",true);
       ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
        result = ajax.responseText;
       document.getElementById('transaccion').innerHTML = result;
       location.reload();
        }
    }
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("id="+id);        
}

}

/******************************************************************/

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



function isNumberKey(evt)
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;
 
return true;
}