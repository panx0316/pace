$(function () {

	$("#addProject").on("click", function(){
		
		$.ajax({
			type: 'post',
			url:  host+'/inicio/nuevoProyecto/',
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


});