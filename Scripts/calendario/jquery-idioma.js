jQuery(function($){
	$.datepicker.regional['es'] = {clearText: 'Effacer', clearStatus: '',
		closeText: 'Fermer', closeStatus: 'Fermer sans modifier',
		prevText: '<Ant', prevStatus: 'Voir le mois précédent',
		nextText: 'Sig>', nextStatus: 'Voir le mois suivant',
		currentText: 'Hoy', currentStatus: 'Voir le mois courant',
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
    	'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
    	'Jul','Ago','Sep','Oct','Nov','Dic'],
		monthStatus: 'Voir un autre mois', yearStatus: 'Voir un autre année',
		weekHeader: 'Sm', weekStatus: '',
		dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
		dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
    	dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
		dayStatus: 'Utiliser DD comme premier jour de la semaine', dateStatus: 'Choisir le DD, MM d',
		dateFormat: 'dd/mm/yy', firstDay: 0, 
		initStatus: 'Choisir la date', isRTL: false};
	$.datepicker.setDefaults($.datepicker.regional['es']);
});