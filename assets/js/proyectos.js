$(document).ready(function() {

	$("#addProject").on("click", function(){
		$.ajax({
			type: 'post',
			url:  host+'inicio/nuevoProyecto/',
			success: function (data, status)
			{
				if(data != ''){
					$.createModal({
						title:'Agregar Proyecto',
						message: data,
						closeButton:false,
						idModal:'modal_add_proyecto'

					});
				}
			},
			error: function(jqXHR, estado, error)
			{
					console.log(error);
					alert(error);
			},
					timeout: 10000

		});

	});

	$("#addEstrategia").on("click", function(){
		$.ajax({
			type: 'post',
			url:  host+'inicio/nuevaEstrategia/',
			success: function (data, status)
			{
				if(data != ''){
					$.createModal({
						title:'Agregar Estrategia',
						message: data,
						closeButton:false,
						idModal:'modal_add_estrategia'

					});
				}
			},
			error: function(jqXHR, estado, error)
			{
					console.log(error);
					alert(error);
			},
					timeout: 10000

		});

	});

	$("#addComponente").on("click", function(){
		$.ajax({
			type: 'post',
			url:  host+'inicio/nuevoComponente/',
			success: function (data, status)
			{
				if(data != ''){
					$.createModal({
						title:'Agregar Componente',
						message: data,
						closeButton:false,
						idModal:'modal_add_componente'

					});
				}
			},
			error: function(jqXHR, estado, error)
			{
					console.log(error);
					alert(error);
			},
					timeout: 10000

		});

	});

	$("#addActividad").on("click", function(){
		$.ajax({
			type: 'post',
			url:  host+'inicio/nuevaActividad/',
			success: function (data, status)
			{
				if(data != ''){
					$.createModal({
						title:'Agregar Actividad',
						message: data,
						closeButton:false,
						idModal:'modal_add_actividad'

					});
				}
			},
			error: function(jqXHR, estado, error)
			{
					console.log(error);
					alert(error);
			},
					timeout: 10000

		});

	});
		$(document).on("click",".editar_actividad", function(){
			var id=$(this).data("id");
		$.ajax({
			type: 'post',
			url:  host+'inicio/editarActividad/',
			data:{id_actividad:id},
			success: function (data, status)
			{
				if(data != ''){
					$.createModal({
						title:'Editar Actividad',
						message: data,
						closeButton:false,
						idModal:'modal_edit_actividad'

					});
				}
			},
			error: function(jqXHR, estado, error)
			{
					console.log(error);
					alert(error);
			},
					timeout: 10000

		});

	});


	$(document).on("click",".editar_fechas", function(){
		var id=$(this).data("id");
	$.ajax({
		type: 'post',
		url:  host+'inicio/editarFechas/',
		data:{id_actividad:id},
		success: function (data, status)
		{
			if(data != ''){
				$.createModal({
					title:'Editar Fechas',
					message: data,
					closeButton:false,
					idModal:'modal_edit_fechas'

				});
			}
		},
		error: function(jqXHR, estado, error)
		{
				console.log(error);
				alert(error);
		},
				timeout: 10000

	});

});







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
			rules: {
				titulo: {required: true}
			},
			messages: {
				titulo: {required:"Ingrese titulo de proyecto"}
			}
			});

});
$(document).on("show.bs.modal", "modal_add_proyecto", function(){
		alert("hola");
});
