<div class="container" style="width:80%; margin:0 auto;">
  <h3>Módulo Financiero</h3>

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

<br>
<br>
<br>

 <div class="form-group form-group-sm">
   <label for="" class="col-sm-2 control-label">Proyecto</label>
   <div class="col-sm-8">
     <select class="form-control" id="select_proyecto_financiero" name="select_proyecto_financiero">
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
<br>
<br>
</div>
 </div>
<a href="<?php echo base_url().'inicio' ?>" id="goToFinanzas"  class="btn btn-default"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> Ir a Vista Avance - Árbol</a>
<a href="<?php echo base_url().'lista' ?>" id="goToFinanzas"  class="btn btn-default"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> Ir a Vista Avance - Lista</a>
