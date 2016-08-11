<script>
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
	
	
	});
</script>

<form id="IngresoActividad" class="form-horizontal" method="post" action="/actividades/ingreso/ingreso_process" enctype="multipart/form-data">

<input type="hidden" name="fecha" value="<?php echo date('d/m/Y');?>">
  
	
  
  
  <div class="form-group form-group-sm">
		<label for="" class="col-sm-2 control-label">Título</label>
		<div class="col-sm-8">
		  <input type="text" class="form-control" id="nombre_actividad" name="nombre_actividad"></input>
		</div>
</div>
  <div class="form-group form-group-sm">
		<label for="" class="col-sm-2 control-label">Responsable</label>
		<div class="col-sm-6">
		  <input type="text" class="form-control" id="nombre_responsable" name="nombre_responsable"></input>
		</div>
  </div>

		  
  <div class="form-group form-group-sm">
		<label for="" class="col-sm-2 control-label">Descripci&oacute;n del Proyecto</label>
		<div class="col-sm-8">
		  <textarea type="text" class="form-control" id="descripcion_actividad" name="descripcion_actividad" maxlength="500"></textarea>
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
		</div>
	</div>

  
  
  
  
 



	 


		
	
	
	
</form>
