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
		<label for="" class="col-sm-2 control-label">Área</label>
		<div class="col-sm-8">
		  <select class="form-control" id="area" name="area">
		  <option value="">--Seleccione un área--</option>
		  <?php foreach ($areas as $data_areas){
		  echo "<option value=".$data_areas->P_ID_AREA.">".$data_areas->P_NOMBRE_AREA."</option>";
		  } ?>
		  <select>
		</div>
</div>  
<div class="form-group form-group-sm">
		<label for="" class="col-sm-2 control-label">Hito</label>
		<div class="col-sm-8">
		  <select class="form-control" id="hito" name="hito">
		  <option value="">--Seleccione un Hito--</option>
		  <?php foreach ($hitos as $data_hitos){
		  echo "<option value=".$data_hitos->P_ID_HITO.">".$data_hitos->P_NOMBRE_HITO."</option>";
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