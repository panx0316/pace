
<script>
		$(document).ready(function() {

		jQuery.validator.addMethod("letras", function(value, element) {
        return this.optional(element) || /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test(value);
        });


			$( ".fecha" ).datepicker({
			  changeMonth: true,
			  changeYear: true
			});
			$( "#fecha_inicio" ).on("change", function(){
				var fecha_inicio=$(this).val();
				if(fecha_inicio!=''){
				 $("#fecha_inicio").removeClass('error');
				 $("#fecha_inicio-error").hide();
				}
			});
			$( "#fecha_termino" ).on("change", function(){
				var fecha_termino=$(this).val();
			if(fecha_termino!=''){
			 $("#fecha_termino").removeClass('error');
			 $("#fecha_termino-error").hide();
			}
			});


			$("#form_nueva_actividad").validate({
			rules: {
				proyecto: {required: true},
				estrategia: {required: true},
				estrategia: {required: true},
				titulo: {required: true},
				rut_responsable: {required: true},
				// nombre_responsable: {required: true, letras:true},
				costo: {required: true, number : true},
				descripcion: {required: true, rangelength: [1,1000]},
				fecha_inicio: {required: true},
				fecha_termino: {required: true}

			},
			messages: {
				proyecto: {required:"Seleccione un proyecto"},
				estrategia: {required:"Seleccione un estrategia del proyecto"} ,
				estrategia: {required:"Seleccione un estrategia del proyecto"} ,
				titulo: {required:"Ingrese titulo de proyecto"},
				rut_responsable: {required:"Ingrese un rut de responsable"},
				// nombre_responsable: {required:"Ingrese un nombre de responsable", letras:"Ingrese solo letras"},
				costo: {required:"Ingrese costo", number: "Ingrese solo numeros"},
				descripcion: {required:"Ingrese una descripción", rangelength: "Máximo 1000 caracteres"},
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
						$('#modal_add_actividad').on('hidden.bs.modal', function (e) {
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
				$('#estrategia').attr('disabled',true);
				$('#estrategia').val("");
				$('#componente').attr('readonly',true);
				$('#componente').attr('disabled',true);
				$('#componente').val("");
				}
				else{
				if(data!=''){
				$('#estrategia').html(data);
				$('#estrategia').attr('readonly',false);
				$('#estrategia').attr('disabled',false);
				$('#componente').attr('readonly',false);
				$('#componente').attr('disabled',false);
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

	$('#estrategia').on('change', function (){
		var estrategia = $(this).val();
		var proyecto = $("#proyecto").val();

		if(proyecto=='' || estrategia==''){
			$('#componente').attr('readonly',true);
			$('#componente').attr('disabled',false);
		}
		$.ajax({
			type: 'post',
			url:  host+'inicio/getComponentes',
			data: {estrategia : estrategia, proyecto:proyecto},
			success: function (data, status)
			{

				if(data!=''){
					$('#componente').html(data);
					$('#componente').attr('readonly',false);
					$('#componente').attr('disabled',false);
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

<form id="form_nueva_actividad" class="form-horizontal" method="post" action="inicio/nueva_actividad_progress" enctype="multipart/form-data">


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
		  <select class="form-control" id="estrategia" name="estrategia" disabled readonly>
		  <option value="">--Seleccione una Estrategia--</option>
		  <?php foreach ($estrategias as $data_estrategias){
		  echo "<option value=".$data_estrategias->P_ID_ESTRATEGIA.">".$data_estrategias->P_NOMBRE_ESTRATEGIA."</option>";
		  } ?>
		  <select>
		</div>
</div>
<div class="form-group form-group-sm">
		<label for="" class="col-sm-2 control-label">Componente</label>
		<div class="col-sm-8">
		  <select class="form-control" id="componente" name="componente" disabled readonly>
		  <option value="">--Seleccione un Componente--</option>
		  <?php foreach ($componentes as $data_componentes){
		  echo "<option value=".$data_componentes->P_ID_COMPONENTE.">".$data_componentes->P_NOMBRE_COMPONENTE."</option>";
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
		<label for="" class="col-sm-2 control-label">Nombre Responsable</label>
		<div class="col-sm-6">
		  <input type="text" class="form-control" id="nombre_responsable" name="nombre_responsable" disabled></input>
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
		<label for="" class="col-sm-2 control-label">Descripción del Proyecto</label>
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
