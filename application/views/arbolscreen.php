  <h3>Proyectos</h3>
  <div id="datos_usuario" style="position: absolute; right: 0px; top: 10%; margin-right: 37px;">
  <h4><?php echo $username; ?><a href="<?php echo base_url().'logout' ?>" id="goToFinanzas"  class="btn btn-default"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> Salir</a></h4>
  </div>
<br>
<br>
<br>
<br>
<br>
  <div class="form-group form-group-sm">
    <label for="" class="col-sm-2 control-label">Proyecto</label>
    <div class="col-sm-8">
      <select class="form-control" id="select_proyecto_arbol" name="select_proyecto_arbol">
      <option value="">--Seleccione un Proyecto--</option>
      <?php foreach ($proyectos as $data_proyectos){
      echo "<option value=".$data_proyectos->P_ID_PROYECTO.">".$data_proyectos->P_NOMBRE_PROYECTO."</option>";
      } ?>
      <select>
    </div>
  </div>
 <br>
 <br>
 <div id="respuesta">

 </div>

 <br>
 <br>

<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle"
          data-toggle="dropdown">
   Agregar <span class="caret"></span>
  </button>

  <ul class="dropdown-menu" role="menu">
    <li><a href="#" id="addProject"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Proyecto</a></li>
    <li><a href="#" id="addEstrategia"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nueva Estrategia</a></li>
    <li><a href="#" id="addComponente"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Componente</a></li>
    <li><a href="#" id="addActividad"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nueva Actividad</a></li>
    <li><a href="#" id="addResultado"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Resultado</a></li>

  </ul>
</div>

<a href="<?php echo base_url().'lista' ?>" id="goToFinanzas"  class="btn btn-default"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> Ir a Vista de Lista</a>
<a href="<?php echo base_url().'financiero' ?>" id="goToFinanzas"  class="btn btn-default"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> Ir a Finanzas</a>
