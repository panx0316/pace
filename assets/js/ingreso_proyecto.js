$(function () {

	
	$.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
	$.datepicker.setDefaults( $.datepicker.regional[ "es" ] );
	$( ".fecha" ).datepicker({
      changeMonth: true,
      changeYear: true
    });

	
	
	

	$("#form_nuevo_proyecto").validate({
		ignore: [],
		rules: {
			titulo: {required: true}
		},
		messages: {
			titulo: {required:"Ingrese titulo de proyecto"}
		},
		
		submitHandler: function() {
			
			
			var form =  $('form.form-horizontal'),action = form.attr('action');
			
			var formData = new FormData(form[0]);

			$.ajax({
				type: 'post',
				url:  host+action,
				data: formData, //form.serialize()
				cache: false,
				contentType: false,
				processData: false,
				timeout: 20000,
				
				beforeSend: function () {
					$('.enviar_solicitud').prop('disabled', true);
				},
				success: function (data, status)
				{
					console.log(data);
										
					$.createModal({
						message: data,
						closeButton:true,
						size:'md',
						labelButton:'Cerrar',
					});
				
				
					return false;
				},
				error: function(jqXHR, estado, error)
				{
					console.log(error);
					alert(error);
				},
				
			});
		}
	});
});