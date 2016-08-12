<script>
		$(document).ready(function() {
			
			$( ".fecha" ).datepicker({
			  changeMonth: true,
			  changeYear: true
			});

			$("#form_nuevo_proyecto").validate({
			rules: {
				titulo: {required: true},
				rut_responsable: {required: true},
				nombre_responsable: {required: true},
				costo: {required: true},
				descripcion: {required: true},
				fecha_inicio: {required: true},
				fecha_termino: {required: true}
				
			},
			messages: {
				titulo: {required:"Ingrese titulo de proyecto"},
				rut_responsable: {required:"Ingrese un rut de responsable"},
				nombre_responsable: {required:"Ingrese un nombre de responsable"},
				costo: {required:"Ingrese costo"},
				descripcion: {required:"Ingrese una descripción"},
				fecha_inicio: {required:"Ingrese una fecha de inicio"},
				fecha_termino: {required:"Ingrese una fecha de termino"}
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
						$("#resultado").html(data);
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
</script>

<form id="form_nuevo_proyecto" class="form-horizontal" method="post" action="inicio/nuevo_proyecto_progress" enctype="multipart/form-data">

<input type="hidden" name="fecha" value="<?php echo date('d/m/Y');?>">
  
	
  
  
  <div class="form-group form-group-sm">
		<label for="" class="col-sm-2 control-label">Título</label>
		<div class="col-sm-8">
		  <input type="text" class="form-control" id="titulo" name="titulo"></input>
		</div>
</div>
  <div class="form-group form-group-sm">
		<label for="" class="col-sm-2 control-label">Rut Responsable</label>
		<div class="col-sm-6">
		  <input type="text" class="form-control" id="rut_responsable" name="rut_responsable"></input>
		</div>
  </div>
   <div class="form-group form-group-sm">
		<label for="" class="col-sm-2 control-label">Nombre Responsable</label>
		<div class="col-sm-6">
		  <input type="text" class="form-control" id="nombre_responsable" name="nombre_responsable"></input>
		</div>
  </div>
<h4 class="form-legend">Recursos Asignados</h4>
    <div class="form-group form-group-sm">
		<label for="" class="col-sm-2 control-label">Monetario</label>
		<div class="col-sm-2">
		  <input type="text" class="form-control" id="costo" name="costo"></input>
		</div>
  </div>
		  
  <div class="form-group form-group-sm">
		<label for="" class="col-sm-2 control-label">Descripci&oacute;n del Proyecto</label>
		<div class="col-sm-8">
		  <textarea type="text" class="form-control" id="descripcion" name="descripcion" maxlength="500"></textarea>
		</div>
  </div>
   <div class="form-group form-group-sm">
		
			    <label for="" class="col-sm-2 control-label">Fecha Inicio</label>
				<div class="rangoFecha">
					<div class="col-sm-2">
						<input type="text" name="fecha_inicio" id="fecha_inicio" class="form-control fecha fecha_inicio" placeholder="dd/mm/aaaa">
					</div>
					<label for="" class="col-sm-2 control-label">Fecha Término</label>
					<div class="col-sm-2">
						<input type="text" name="fecha_termino" id="fecha_termino" class="form-control fecha fecha_termino" placeholder="dd/mm/aaaa">
					</div>
					
				</div>	
		    
    </div>

	
	

  
  
  <div class="form-group">
		<div class="col-sm-4" style="float: right;">
			<button type="submit" class="btn btn-primary enviar_solicitud">Registrar Actividad</button>
			<div id="resultado"></div>
		</div>
	</div>

  
  
  
  
 



	 


		
	
	
	
</form>
