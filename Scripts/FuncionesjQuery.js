$(document).ready(function(){

/*********************************** Place Holder ***************************************/
  function add() {
            if($(this).val() === ''){
                $(this).val($(this).attr('placeholder')).addClass('placeholder');
            }
        }
        function remove() {
            if($(this).val() === $(this).attr('placeholder')){
                $(this).val('').removeClass('placeholder');
            }
        }
        // Create a dummy element for feature detection
        if (!('placeholder' in $('<input>')[0])) {
            // Select the elements that have a placeholder attribute
            $('input[placeholder], textarea[placeholder]').blur(add).focus(remove).each(add);

            // Remove the placeholder text before the form is submitted
            $('form').submit(function(){
                $(this).find('input[placeholder], textarea[placeholder]').each(remove);
            });
        }




/******************************************Logeo************************************************/
    $('#formlogueo').submit(function() {
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(data) {
                 $('#transaccion').html(data);
            }
        })
        return false;
    });

$("#imagener").animate({
            width:"toggle",
            opacity:"toggle",
            duration:"fast"},1000,
            function(){$("#titulo").animate({height:"toggle",opacity:"toggle",duration:"fast"},2000
            );


            
                $("#logueo").animate({
                height:"toggle",
                opacity:"toggle",
                duration:"fast"},1000);

                $("#titulo2").animate({
                height:"toggle",
                opacity:"toggle",
                duration:"fast"},1000);

                $("#imagener2").animate({
            width:"toggle",
            opacity:"toggle",
            duration:"fast"},1000);

            });





/****  usuarios/no_afiliados &&  usuarios/afliados  ***/
    $('#codigo').submit(function() {
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(data) {
                $('#resultado').html(data);
            }
        })
        return false;
    });




/****  usuarios/no_afiliados ***/
    $('#inicio').submit(function() {
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(data) {
             $('#res').html(data);
            }
        })
            return false;
    });


    $('#formulariobuscar').submit(function() {
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(data) {
             $('#resultadobuqueda').html(data);
            }
        })
            return false;
    });



    $("#boton_agrega_clave").click(function(event){
        $("#transaccion").load('agregarclave.php');              
   }); 

/**/
    $('#formperfil').submit(function() {
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(data) {
             $('#transaccion').html(data);
            }
        })
            return false;
    });





/***************parametros**************/
    $("#crear_congreso").click(function(event){
        $("#transaccion").load('crea_congreso.php');              
   }); 



    $('#formguarda_DP').submit(function() {
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(data) {
             $('#transaccion').html(data);
            }
        })
            return false;
    });



    $("#estatus").click(function(event){
        var id= $("#id").val();
        var es= $("#estatus").val();
        $("#transaccion").load('edita_estatus.php?id='+id+'&estatus='+es);              
   }); 



});
