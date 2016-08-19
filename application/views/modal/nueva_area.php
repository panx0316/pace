
<script>
		$(document).ready(function() {

		jQuery.validator.addMethod("letras", function(value, element) {
        return this.optional(element) || /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test(value);
        }); 
			
			
			$( ".fecha" ).datepicker({
			  changeMonth: true,
			  changeYear: true
			});

			$("#form_nueva_area").validate({
			rules: {
				proyecto: {required: true},
				titulo: {required: true},
				abreviacion: {required: true},
				rut_responsable: {required: true,number : true}
				
			},
			messages: {
				proyecto: {required:"Seleccione un proyecto"},
				titulo: {required:"Ingrese titulo de proyecto"},
				abreviacion: {required:"Ingrese una abreviación"},
				rut_responsable: {required:"Ingrese un rut de responsable"},
				
				
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

<form id="form_nueva_area" class="form-horizontal" method="post" action="inicio/nueva_area_progress" enctype="multipart/form-data">


<input type="hidden" name="fecha" value="<?php echo date('d/m/Y');?>">
  
  <div class="form-group form-group-sm">
		<label for="" class="col-sm-2 control-label">Proyecto</label>
		<div class="col-sm-8">
		  <select class="form-control" id="proyecto" name="proyecto">
		  <option value="">--Seleccione un Proyecto--</option>
		  <?php foreach ($proyectos as $data_proyectos){
		  echo "<option value=".$data_proyectos->P_ID_PROYECTO.">".$data_proyectos->P_NOMBRE_PROYECTO."</option>";
		  } ?>
		  <select>
		</div>
</div> 
<div class="form-group form-group-sm">
		<label for="" class="col-sm-2 control-label">Título Área</label>
		<div class="col-sm-8">
		  <input type="text" class="form-control" id="titulo" name="titulo"></input>
		</div>
</div>
<div class="form-group form-group-sm">
		<label for="" class="col-sm-2 control-label">Abreviación Área</label>
		<div class="col-sm-8">
		  <input type="text" class="form-control" id="abreviacion" name="abreviacion"></input>
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
		  <input type="text" class="form-control" id="nombre_responsable" name="nombre_responsable" readonly></input>
		</div>
  </div>
<div class="form-group">
		<div class="col-sm-4" style="float: right;">
			<button type="submit" class="btn btn-primary enviar_solicitud">Registrar Area</button>
			<div id="resultado"></div>
		</div>
	</div>
	
</form>
