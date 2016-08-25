<script>
		$(document).ready(function() {

		jQuery.validator.addMethod("letras", function(value, element) {
        return this.optional(element) || /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test(value);
        });

			$( ".fecha" ).datepicker({
			  changeMonth: true,
			  changeYear: true
			});

			$("#form_nuevo_componente").validate({
			rules: {
				proyecto: {required: true},
				estrategia: {required: true},
				titulo: {required: true},
				rut_responsable: {required: true},
				// nombre_responsable: {required: true, letras:true},

				descripcion: {required: true, rangelength: [1,1000]}


			},
			messages: {
				proyecto: {required:"Seleccione un proyecto"},
				estrategia: {required:"Seleccione un estrategia del proyecto"} ,
				titulo: {required:"Ingrese titulo de proyecto"},
				rut_responsable: {required:"Ingrese un rut de responsable"},
				// nombre_responsable: {required:"Ingrese un nombre de responsable", letras:"Ingrese solo letras"},
				descripcion: {required:"Ingrese una descripción", rangelength: "Máximo 1000 caracteres"}

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
						$('#modal_add_componente').on('hidden.bs.modal', function (e) {
						location.reload();
						});
					},
					error: function(jqXHR, estado, error)
					{
						console.log(error);
						alert(error);
					},

				});
			}
		});


		$('#proyecto').on('change', function (){
		var opcion = $(this).val();


		$.ajax({
			type: 'post',
			url:  host+'inicio/getEstrategias',
			data: {opcion : opcion},
			success: function (data, status)
			{
				if(opcion==''){
					$('#estrategia').attr('readonly',true);
					$('#estrategia').attr('disabled',false);
				}
				else{
					if(data!=''){
					$('#estrategia').html(data);
					$('#estrategia').attr('readonly',false);
					$('#estrategia').attr('disabled',false);
					}
				}


			},
			error: function(jqXHR, estado, error)
			{
				console.log(error);
				alert(error);
			},
			timeout: 20000
		});
	});


	});
</script>

<form id="form_nuevo_componente" class="form-horizontal" method="post" action="inicio/nuevo_componente_progress" enctype="multipart/form-data">


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
		<label for="" class="col-sm-2 control-label">Estrategia</label>
		<div class="col-sm-8">
		  <select class="form-control" id="estrategia" name="estrategia" readonly disabled>
		  <option value="">--Seleccione una Estrategia--</option>
		  <?php foreach ($estrategias as $data_estrategias){
		  echo "<option value=".$data_estrategias->P_ID_ESTRATEGIA.">".$data_estrategias->P_NOMBRE_ESTRATEGIA."</option>";
		  } ?>
		  <select>
		</div>
</div>
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
		<label for="" class="col-sm-2 control-label">Descripción del Componente</label>
		<div class="col-sm-8">
		  <textarea type="text" class="form-control" id="descripcion" name="descripcion" maxlength="500"></textarea>
		</div>
  </div>



  <div class="form-group">
		<div class="col-sm-4" style="float: right;">
			<button type="submit" class="btn btn-primary enviar_solicitud">Registrar Componente</button>
			<div id="resultado"></div>
		</div>
	</div>

</form>
