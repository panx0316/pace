<script>
		$(document).ready(function() {
			$("#form_editar_actividad").validate({
			rules: {
				titulo: {required: true},
				rut_responsable: {required: true},
				nombre_responsable: {required: true},
				descripcion: {required: true,rangelength: [1,1000]},
				avance: {required: true}


			},
			messages: {
				titulo: {required:"Ingrese un nombre de actividad"},
				rut_responsable: {required:"Ingrese el rut del responsable del proyecto"} ,
				nombre_responsable: {required:"Ingrese el nombre de responsable del proyecto"} ,
				descripcion: {required:"Ingrese una descripcion de la actividad"},
				avance: {required:"Ingrese un porcentaje de avance"}
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
						$('#modal_edit_actividad').on('hidden.bs.modal', function (e) {
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
		});
</script>



<form id="form_editar_actividad" class="form-horizontal" method="post" action="inicio/editar_actividad_progress" enctype="multipart/form-data">

<input type="hidden" name="fecha" value="<?php echo date('d/m/Y');?>">
<input type="hidden" id="id_actividad" name="id_actividad" value="<?php echo $actividades[0]->P_ID_ACTIVIDAD; ?>">

  <div class="form-group form-group-sm">
		<label for="" class="col-sm-2 control-label">Título</label>
		<div class="col-sm-8">
		  <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $actividades[0]->P_NOMBRE_ACTIVIDAD; ?>"></input>
		</div>
</div>
  <div class="form-group form-group-sm">
		<label for="" class="col-sm-2 control-label">Rut Responsable</label>
		<div class="col-sm-6">
		  <input type="text" class="form-control" id="rut_responsable" name="rut_responsable" value="<?php echo $actividades[0]->P_RESPONSABLE_ACTIVIDAD; ?>"></input>
		</div>
  </div>
   <div class="form-group form-group-sm">
		<label for="" class="col-sm-2 control-label">Nombre Responsable</label>
		<div class="col-sm-6">
		  <input type="text" class="form-control" id="nombre_responsable" name="nombre_responsable" value="<?php echo GetNombreResponsable($actividades[0]->P_RESPONSABLE_ACTIVIDAD); ?>" disabled readonly></input>
		</div>
  </div>
  <div class="form-group form-group-sm">
		<label for="" class="col-sm-2 control-label">Descripción de la actividad</label>
		<div class="col-sm-8">
		  <textarea type="text" class="form-control" id="descripcion" name="descripcion" maxlength="500"><?php echo $actividades[0]->P_DESCRIPCION; ?></textarea>
		</div>
  </div>


   <div class="form-group form-group-sm">

			    <label for="" class="col-sm-2 control-label">Item Total</label>

					<div class="col-sm-2">
						<input type="text" name="sem_totales" id="sem_totales" class="form-control" value="<?php echo GetSemanasActividad($actividades[0]->P_ID_ACTIVIDAD); ?>" disabled readonly>
					</div>


    </div>

   <div class="form-group form-group-sm">

			    <label for="" class="col-sm-2 control-label">Item Ejecutados</label>

					<div class="col-sm-2">
						<input type="text" name="sem_ejecutadas" id="sem_ejecutadas" class="form-control" value="<?php echo $actividades[0]->P_SEM_EJECUTADAS; ?>">
					</div>


    </div>


  <div class="form-group">
		<div class="col-sm-4" style="float: right;">
			<button type="submit" class="btn btn-primary enviar_solicitud">Guardar Cambios</button>
			<div id="resultado"></div>
		</div>
	</div>

</form>
